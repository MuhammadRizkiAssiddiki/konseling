<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adminmodel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function tampiladmin()
    {
        return $this->db->get('admin')->result();
    }

    function tambahadmin($data)
    {
        $this->db->insert('admin', $data);
    }

    function editadmin($id, $data)
    {
        $this->db->where('idadmin', $id);
        $this->db->update('admin', $data);
    }

    function getdata($id)
    {
        $this->db->select('username');
        $this->db->from('admin');
        $this->db->where('idadmin', $id);
        //$this->db->where('pasien.idpasien = riwayatkeluhan.idpasien');

        return $this->db->get()->row_array();
    }

    function hapusadmin($id)
    {
        return $this->db->delete('admin', array('idadmin' => $id));
    }
}
