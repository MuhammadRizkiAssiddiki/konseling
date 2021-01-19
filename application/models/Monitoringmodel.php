<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoringmodel extends CI_Model{

  public function __construct()
  {
    parent::__construct();

  }

  function tampilmonitoring()
  {
    $this->db->select('*');
    $this->db->from('monitoring');
    return $this->db->get()->result();
  }


  function detailmonitoring($id){
    $this->db->select('*');
    $this->db->from('monitoring, orangtua');
    $this->db->where('monitoring.idorangtua = orangtua.idorangtua');
    $this->db->where('monitoring.idmonitoring', $id);

    return $this->db->get()->result();
  }

  function koreksi($data){
    $this->db->insert('koreksi', $data);
  }


}
