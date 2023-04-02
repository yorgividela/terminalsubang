<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank_41518110070 extends CI_Controller {
	function __construct(){
	parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model('getkod_model');
		$this->getsecurity();
		date_default_timezone_set("Asia/Jakarta");
	}
	function getsecurity($value=''){
		$username = $this->session->userdata('username_admin');
		if (empty($username)) {
			$this->session->sess_destroy();
			redirect('backend/login_41518110070');
		}
	}
	public function index(){
	$data['title'] = "Link BANK";
 	$data['bank'] = $this->db->query("SELECT * FROM tbl_bank_41518110070 ")->result_array();
		// die(print_r($data));
	$this->load->view('backend/bank', $data);	
	}
	public function viewbank($id=""){
	$data['title'] = "Link BANK";
 	$data['bank'] = $this->db->query("SELECT * FROM tbl_bank_41518110070 WHERE kd_bank = '".$id."'")->row_array();
		// die(print_r($data));
	$this->load->view('backend/view_bank', $data);	
	}

}