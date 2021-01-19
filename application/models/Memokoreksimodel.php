<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Memokoreksimodel extends CI_Model{

  public function __construct()
  {
    parent::__construct();

  }

  function getmemo()
  {
    $this->db->select('*');
    $this->db->from('koreksi');
    return $this->db->get()->result();
  }

  function getkoreksi($user)
  {
    $this->db->select('*');
    $this->db->from('koreksi');
    $this->db->where('user', $user);
    $this->db->order_by('status', 'asc');

    return $this->db->get()->result();
  }

  function ubahstatus($id, $data)
  {
    $this->db->where('idkoreksi', $id);
    $this->db->update('koreksi', $data);
  }

  function editkoreksi($id, $data)
  {
    $this->db->where('idkoreksi', $id);
    $this->db->update('koreksi', $data);
  }

  function hapuskoreksi($id)
  {
    return $this->db->delete('koreksi', array('idkoreksi' => $id));
  }


}
