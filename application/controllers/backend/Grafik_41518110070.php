<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Grafik extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('model_grafik');
    }

    Public function lihat_grafik(){
        $data['data_rawatinap'] = $this->model_grafik->graph_rawatinap();
        $this->load->view('backend/laporan/laporan_grafik',$data);
    } // tutup fucntion
} // tutup controller