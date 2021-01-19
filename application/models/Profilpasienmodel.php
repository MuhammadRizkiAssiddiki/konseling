<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profilpasienmodel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function getpasien($pasien){
    $this->db->select('*');
    $this->db->from('pasien, orangtua');
    $this->db->where('pasien.idorangtua = orangtua.idorangtua');
    $this->db->where('pasien.idpasien', $pasien);

    return $this->db->get()->result();
  }

}
