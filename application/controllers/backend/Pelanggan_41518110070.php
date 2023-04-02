<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_41518110070 extends CI_Controller {
	function __construct(){
	parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model('getkod_model');
		$this->getsecurity();
		date_default_timezone_set("Asia/Jakarta");
	}
	function getsecurity($value=''){
		$username = $this->session->userdata('level');
		if ($username == '2') {
			$this->session->sess_destroy();
			redirect('backend/home_41518110070');
		}
	}
	public function index(){
		$data['title'] = "List Pelanggan";
		$data['pelanggan'] = $this->db->query("SELECT * FROM tbl_pelanggan_41518110070")->result_array();
		// die(print_r($data));
		$this->load->view('backend/pelanggan', $data);
	}

}