<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporanmodel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function getpendidikan(){
    return $this->db->get('pendidikan')->result();
  }

  function getpekerjaan(){
    return $this->db->get('pekerjaan')->result();
  }
  function getortu(){
    return $this->db->get('orangtua')->result();
  }
  function getpasien(){
    return $this->db->get('pasien')->result();
  }

  function tampillaporan(){
    $this->db->select('*');
    $this->db->from('diagnosa, konseling, pasien, orangtua');
    $this->db->where('diagnosa.nopmr = konseling.nopmr');
    $this->db->where('konseling.idpasien = pasien.idpasien');
    $this->db->where('pasien.idorangtua = orangtua.idorangtua');
    $this->db->where('konseling.status', 'Sudah Didiagnosa');

    return $this->db->get()->result();
  }

  function cetaklaporan(){
    $this->db->select('*');
    $this->db->from('diagnosa, konseling, pasien, orangtua');
    $this->db->where('diagnosa.nopmr = konseling.nopmr');
    $this->db->where('konseling.idpasien = pasien.idpasien');
    $this->db->where('pasien.idorangtua = orangtua.idorangtua');
    $this->db->where('konseling.status', 'Sudah Didiagnosa');

    return $this->db->get()->result_array();
  }

  function viewbypekerjaan($pekerjaan){
    $this->db->select('*');
    $this->db->from('diagnosa, konseling, pasien, orangtua');
    $this->db->where('diagnosa.nopmr = konseling.nopmr');
    $this->db->where('konseling.idpasien = pasien.idpasien');
    $this->db->where('pasien.idorangtua = orangtua.idorangtua');
    $this->db->where('konseling.status', 'Sudah Didiagnosa');
    $this->db->where('orangtua.pekerjaan', $pekerjaan);

    return $this->db->get()->result();
  }

  function viewbypendidikan($pendidikan){
    $this->db->select('*');
    $this->db->from('diagnosa, konseling, pasien, orangtua');
    $this->db->where('diagnosa.nopmr = konseling.nopmr');
    $this->db->where('konseling.idpasien = pasien.idpasien');
    $this->db->where('pasien.idorangtua = orangtua.idorangtua');
    $this->db->where('konseling.status', 'Sudah Didiagnosa');
    $this->db->where('orangtua.pendidikan', $pendidikan);

    return $this->db->get()->result();
  }

  function viewbyortu($ortu){
    $this->db->select('*');
    $this->db->from('diagnosa, konseling, pasien, orangtua');
    $this->db->where('diagnosa.nopmr = konseling.nopmr');
    $this->db->where('konseling.idpasien = pasien.idpasien');
    $this->db->where('pasien.idorangtua = orangtua.idorangtua');
    $this->db->where('konseling.status', 'Sudah Didiagnosa');
    $this->db->where('orangtua.namaorangtua', $ortu);

    return $this->db->get()->result();
  }

  function viewbypasien($pasien){
    $this->db->select('*');
    $this->db->from('diagnosa, konseling, pasien');
    $this->db->where('diagnosa.nopmr = konseling.nopmr');
    $this->db->where('konseling.idpasien = pasien.idpasien');
    $this->db->where('konseling.status', 'Sudah Didiagnosa');
    $this->db->where('pasien.namapasien', $pasien);

    return $this->db->get()->result();
  }

  function viewbydate($tgl){
    $this->db->select('*');
    $this->db->from('diagnosa, konseling, pasien');
    $this->db->where('diagnosa.nopmr = konseling.nopmr');
    $this->db->where('konseling.idpasien = pasien.idpasien');
    $this->db->where('konseling.status', 'Sudah Didiagnosa');
    $this->db->where('DATE(konseling.tanggalpmr)', $tgl);

    return $this->db->get()->result();
  }

  function viewbybulan($bulan, $tahun){
    $this->db->select('*');
    $this->db->from('diagnosa, konseling, pasien');
    $this->db->where('diagnosa.nopmr = konseling.nopmr');
    $this->db->where('konseling.idpasien = pasien.idpasien');
    $this->db->where('konseling.status', 'Sudah Didiagnosa');
    $this->db->where('MONTH(konseling.tanggalpmr)', $bulan);
    $this->db->where('YEAR(konseling.tanggalpmr)', $tahun);

    return $this->db->get()->result();
  }

  function viewbytahun($tahun){
    $this->db->select('*');
    $this->db->from('diagnosa, konseling, pasien');
    $this->db->where('diagnosa.nopmr = konseling.nopmr');
    $this->db->where('konseling.idpasien = pasien.idpasien');
    $this->db->where('konseling.status', 'Sudah Didiagnosa');
    $this->db->where('YEAR(konseling.tanggalpmr)', $tahun);

    return $this->db->get()->result();
  }

  function option_tahun(){
    $this->db->select('YEAR(tanggalpmr) AS tahun');
    $this->db->from('konseling');
    $this->db->order_by('YEAR(tanggalpmr)');
    $this->db->group_by('YEAR(tanggalpmr)');

    return $this->db->get()->result();
  }

}
