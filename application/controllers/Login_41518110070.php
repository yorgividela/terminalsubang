<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_41518110070 extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index(){
		$this->autlogin();
	}
	public function autlogin(){
			$this->load->view('frontend/login');
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login_41518110070'));
	}
	public function cekuser(){
	$username = strtolower($this->input->post('username'));
    $ambil = $this->db->query('select * from tbl_pelanggan_41518110070 where username_pelanggan = "'.$username.'"')->row_array();
    $password = $this->input->post('password');
		if ($ambil) {
			// if ($ambil['status_pelanggan'] == '1') { 
				if (password_verify($password,$ambil['password_pelanggan'])) {
		    	$this->db->where('username_pelanggan',$username);
		        $query = $this->db->get('tbl_pelanggan_41518110070');
		            foreach ($query->result() as $row) {
		                $sess = array(
		                	'kd_pelanggan' => $row->kd_pelanggan,
		                    'username' => $row->username_pelanggan,
		                    'password' => $row->password_pelanggan,
		                    'ktp'     => $row->no_ktp_pelanggan,
		                    'nama_lengkap'     => $row->nama_pelanggan,
		                    'img_pelanggan'	=> $row->img_pelanggan,
		                    'email'   => $row->email_pelanggan,
		                    'telpon'   => $row->telpon_pelanggan,
		                    'alamat'	=> $row->alamat_pelanggan
		                	);
		                }
		                $this->session->set_userdata($sess);
		                if ($this->session->userdata('jadwal') == NULL) {
		                	redirect('tiket_41518110070');
		                }else{
		                	redirect('tiket_41518110070/beforebeli/'.$this->session->userdata('jadwal').'/'.$this->session->userdata('asal').'/'.$this->session->userdata('tanggal'));
		                }
            		}else{
            		$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
					  Salah Password
					</div>');
				redirect('login_41518110070');
            	}

		}else{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
					  Username Tidak Terdaftar
					</div>');
    		redirect('login_41518110070');
		}
	
	}
	public function daftar(){
		$this->form_validation->set_rules('nomor', 'Nomor', 'trim|required|is_unique[tbl_pelanggan_41518110070.telpon_pelanggan]',array(
			'required' => 'Nomor HP Wajib Di isi.',
			'is_unique' => 'Nomor Sudah Di Gunakan.'
			 ));
		$this->form_validation->set_rules('name', 'Name', 'trim|required',array(
			'required' => 'Nama Wajib Di isi.',
			 ));
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|is_unique[tbl_pelanggan_41518110070.username_pelanggan]',array(
			'required' => 'Username Wajib Di isi.',
			'is_unique' => 'Username Sudah Di Gunakan.'
			 ));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[tbl_pelanggan_41518110070.email_pelanggan]',array(
			'required' => 'Email Wajib Di isi.',
			'valid_email' => 'Masukan Email Dengan Benar',
			'is_unique' => 'Email Sudah Di Gunakan.'
			 ));
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[8]|matches[password2]',array(
			'matches' => 'Password Tidak Sama.',
			'min_length' => 'Password Minimal 8 Karakter.'
			 ));
		$this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password1]');
		if ($this->form_validation->run() == false) {
			$this->load->view('frontend/daftar');
		} else {
			// die(print_r($_POST));
			$this->load->model('getkod_model');
			$data = array(
			'kd_pelanggan'	=> $this->getkod_model->get_kodpel(),
			'nama_pelanggan'  => $this->input->post('name'),
			'email_pelanggan'	    	=> $this->input->post('email'),
			'img_pelanggan'		=> 'assets/frontend/img/default.png',
			'alamat_pelanggan'		=> $this->input->post('alamat'),
			'telpon_pelanggan'		=> $this->input->post('nomor'),
			'username_pelanggan'		=> $this->input->post('username'),
			'status_pelanggan' => 0,
			'date_create_pelanggan' => time(),
			'password_pelanggan'		=> password_hash($this->input->post('password1'),PASSWORD_DEFAULT)
			);
			// die(print_r($data));
			// $token = md5($this->input->post('email').date("d-m-Y H:i:s"));
			// $data1 = array(
			// 	'nama_token' => $token,
			// 	'email_token' => $this->input->post('email'),
			// 	'date_create_token' => time()
			// 	 );
			// die(print_r($data1));
			$this->db->insert('tbl_pelanggan_41518110070', $data);
			// $this->db->insert('tbl_token_pelanggan', $data1);
			// $this->_sendmail($token,'verify');
			$this->session->set_flashdata('message', 'swal("Berhasil", "Pendaftaran Berhasil! Silahkan login kembali.", "success");');
    		redirect('login_41518110070');
		}

	}
	
	public function changepassword($value=''){
		if ($this->session->userdata('resetemail') == NULL) {
			redirect('login_41518110070/daftar');
		}
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[8]|matches[password2]',array(
			'matches' => 'Password Tidak Sama.',
			'min_length' => 'Password Minimal 8 Karakter.'
			 ));
		$this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password1]');
		if ($this->form_validation->run() == false) {
			$this->load->view('frontend/resetpassword');
		}else{
			$email = $this->session->userdata('resetemail');
			$update = array('password_pelanggan' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT) );
			$where = array('email_pelanggan' => $email );
			$this->db->update('tbl_pelanggan_41518110070', $update,$where);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Berhasil Reset, Login Kembali Akun Anda
					</div>');
			redirect('login_41518110070');
		}
	}
}