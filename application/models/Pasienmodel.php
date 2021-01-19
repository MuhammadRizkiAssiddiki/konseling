<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasienmodel extends CI_Model{

  public function __construct()
  {
    parent::__construct();

  }

  function tampilpasien()
  {
    $this->db->select('*');
    $this->db->from('pasien, orangtua');
    $this->db->where('pasien.idorangtua = orangtua.idorangtua');
    return $this->db->get()->result();
  }

  function getortu(){
    return $this->db->get('orangtua')->result();
  }
  function getortubyid($id){
    $this->db->select('*');
    $this->db->from('orangtua');
    $this->db->where('idorangtua', $id);

    return $this->db->get()->result();
  }

  function tambahortu($ortu){
    $this->db->insert('orangtua', $ortu);
  }

  function tambahpasien($pasien){
    $this->db->insert('pasien', $pasien);
  }

  function tambahakun($akun){
    $this->db->insert('admin', $akun);
  }

  function detailpasien($id){
    $this->db->select('*');
    $this->db->from('pasien, orangtua');
    $this->db->where('pasien.idorangtua = orangtua.idorangtua');
    $this->db->where('pasien.idpasien', $id);

    return $this->db->get()->result();
  }

  function editpasien($pasien, $id){
    $this->db->where('idpasien', $id);
    $this->db->update('pasien', $pasien);
  }

  function getdata($id){
    $this->db->select('namapasien');
    $this->db->from('pasien');
    $this->db->where('idpasien', $id);
    //$this->db->where('pasien.idpasien = riwayatkeluhan.idpasien');

    return $this->db->get()->row_array();
  }

  function hapuspasien($id){
    $this->db->delete('pasien', array('idpasien' => $id));
  }

}
