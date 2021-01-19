<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayatkonselingmodel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function getrk($pasien){
    $this->db->select('*');
    $this->db->from('diagnosa, konseling, pasien');
    $this->db->where('diagnosa.nopmr = konseling.nopmr');
    $this->db->where('konseling.idpasien = pasien.idpasien');
    $this->db->where('konseling.status', 'Sudah Didiagnosa');
    $this->db->where('konseling.idpasien', $pasien);

    return $this->db->get()->result();
  }

  function detailrk($id){
    $this->db->select('*');
    $this->db->from('diagnosa, konseling, pasien');
    $this->db->where('diagnosa.nopmr = konseling.nopmr');
    $this->db->where('konseling.idpasien = pasien.idpasien');
    $this->db->where('konseling.status', 'Sudah Didiagnosa');
    $this->db->where('konseling.nopmr', $id);

    return $this->db->get()->result();
  }

}
