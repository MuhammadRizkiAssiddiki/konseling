<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diagnosamodel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function tampildiagnosa(){
    $this->db->select('*');
    $this->db->from('konseling, pasien');
    $this->db->where('konseling.idpasien = pasien.idpasien');
    $this->db->where('konseling.status', 'Belum Didiagnosa');

    return $this->db->get()->result();
  }

  function beridiagnosa($id){
    $this->db->select('*');
    $this->db->from('konseling, pasien');
    $this->db->where('konseling.idpasien = pasien.idpasien');
    $this->db->where('konseling.nopmr', $id);

    return $this->db->get()->result();
  }

  function getriwayat($id){
    $this->db->select('*');
    $this->db->from('diagnosa, konseling, pasien');
    $this->db->where('diagnosa.nopmr = konseling.nopmr');
    $this->db->where('konseling.idpasien = pasien.idpasien');
    $this->db->where('konseling.status', 'Sudah Didiagnosa');
    $this->db->where('konseling.idpasien', $id);

    return $this->db->get()->result();
  }

  function tambahdiagnosa($diagnosa){
    $this->db->insert('diagnosa', $diagnosa);
  }

  function updatestatus($status, $id){
    $this->db->where('nopmr', $id);
    $this->db->update('konseling', $status);
  }


  //Hasil Diagnosa Model
  function hasildiagnosa(){
    $this->db->select('*');
    $this->db->from('diagnosa, konseling, pasien');
    $this->db->where('diagnosa.nopmr = konseling.nopmr');
    $this->db->where('konseling.idpasien = pasien.idpasien');
    $this->db->where('konseling.status', 'Sudah Didiagnosa');

    return $this->db->get()->result();
  }

  function detaildiagnosa($id){
    $this->db->select('*');
    $this->db->from('diagnosa, konseling, pasien');
    $this->db->where('diagnosa.nopmr = konseling.nopmr');
    $this->db->where('konseling.idpasien = pasien.idpasien');
    $this->db->where('konseling.status', 'Sudah Didiagnosa');
    $this->db->where('diagnosa.iddiagnosa', $id);

    return $this->db->get()->result();
  }

  function editdiagnosa($id, $data){
    $this->db->where('iddiagnosa', $id);
    $this->db->update('diagnosa', $data);
  }

  function ubahstatus($nopmr, $status){
    $this->db->where('nopmr', $nopmr);
    $this->db->update('konseling', $status);
  }

  function updatekeluhan($keluhan, $id)
  {
    $this->db->where('nopmr', $id);
    $this->db->update('konseling', $keluhan);
  }

  function hapusdiagnosa($id){
    return $this->db->delete('diagnosa', array('iddiagnosa' => $id));
  }


}
