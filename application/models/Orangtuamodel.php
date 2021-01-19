<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orangtuamodel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }

  function tampilortu(){
    return $this->db->get('orangtua')->result();
  }

  function getpendidikan(){
    return $this->db->get('pendidikan')->result();
  }

  function getpekerjaan(){
    return $this->db->get('pekerjaan')->result();
  }

  function tambahortu($data){
    $this->db->insert('orangtua', $data);
  }

  function editortu($id, $data){
    $this->db->where('idorangtua', $id);
    $this->db->update('orangtua', $data);
  }

  function getdata($id){
    $this->db->select('namaorangtua');
    $this->db->from('orangtua');
    $this->db->where('idorangtua', $id);
    //$this->db->where('pasien.idpasien = riwayatkeluhan.idpasien');

    return $this->db->get()->row_array();
  }

  function hapusortu($id){
    return $this->db->delete('orangtua', array('idorangtua' => $id));
  }

}
