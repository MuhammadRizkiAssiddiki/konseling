<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konselingmodel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function tampilkonseling(){
    $this->db->select('*');
    $this->db->from('konseling, pasien');
    $this->db->where('konseling.idpasien = pasien.idpasien');

    return $this->db->get()->result();
  }

  function getpasien(){
    return $this->db->get('pasien')->result();
  }

  function getdatapasien($id){
    $this->db->select('*');
    $this->db->from('pasien');
    $this->db->where('idpasien', $id);
    //$this->db->where('pasien.idpasien = riwayatkeluhan.idpasien');

    return $this->db->get()->result();
  }

  function getkeluhan($id){
    $this->db->select('*');
    $this->db->from('konseling');
    //$this->db->where('riwayatkeluhan.nopmr = konseling.nopmr');
    $this->db->where('konseling.idpasien', $id);
    //$this->db->where('pasien.idpasien = riwayatkeluhan.idpasien');

    return $this->db->get()->result();
  }

  function tambahkonseling($konseling){
    $this->db->insert('konseling', $konseling);
  }

  function getkonseling($id){
    $this->db->select('*');
    $this->db->from('konseling');
    $this->db->where('nopmr', $id);

    return $this->db->get()->result();
  }

  function getpmr($id, $idpasien){
    $this->db->select('*');
    $this->db->from('konseling, pasien');
    $this->db->where('pasien.idpasien', $idpasien);
    $this->db->where('konseling.nopmr !=', $id);

    return $this->db->get()->result();
  }

  function editkonseling($id, $data){
    $this->db->where('nopmr', $id);
    $this->db->update('konseling', $data);
  }

  function hapuskonseling($id){
    return $this->db->delete('konseling', array('nopmr' => $id));
  }

  function updatekeluhan($keluhan, $id)
  {
    $this->db->where('nopmr', $id);
    $this->db->update('konseling', $keluhan);
  }

}
