<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_grafik extends CI_Model{

   function qry_jk_pasien() {
      $data = $this->db->query("SELECT jenis_kelamin, COUNT(*) as 'jumlahnya' FROM tbl_pasien GROUP BY jenis_kelamin");
      return $data->result();
   }
   
} 