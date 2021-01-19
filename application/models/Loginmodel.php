<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Loginmodel extends CI_Model
{

  function __construct()
  {
  }

  public function cekuser($username, $password)
  {
    $this->db->select('*');
    $this->db->from('admin');
    $this->db->where('username', $username);
    $this->db->where('password', $password);
    
    return $this->db->get()->result();
    
    
  }
  public function cek_user($data){
    $this->db->select('*');
    $where = "pegawai.nip = jabatanpegawai.nip
		          AND pegawai.idunitkerja = unitkerja.idunitkerja
		          AND jabatanpegawai.idjabatan = jabatan.idjabatan";
    $this->db->where($where);
    $this->db->where($data);

    return $this->db->get()->result();
  }
}


 ?>
