<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berandamodel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function gettotalpasien(){
        $this->db->select('*');
        $this->db->from('pasien');

        return $this->db->get()->num_rows();
    }

    function gettpb(){
        $hasil = $this->db->query("SELECT COUNT(*) AS bulan
                             FROM pasien
                             WHERE CONCAT(YEAR(tanggaldaftar),'/',MONTH(tanggaldaftar))=CONCAT(YEAR(NOW()),'/',MONTH(NOW()))
                             GROUP BY YEAR(tanggaldaftar),MONTH(tanggaldaftar)");
        return $hasil->result();
    }

    function gettotalkonseling(){
        $this->db->select('*');
        $this->db->from('konseling');
        
        return $this->db->get()->num_rows();
    }

    function gettkb(){
        $hasil = $this->db->query("SELECT COUNT(*) AS bulan
                             FROM konseling
                             WHERE CONCAT(YEAR(tanggalpmr),'/',MONTH(tanggalpmr))=CONCAT(YEAR(NOW()),'/',MONTH(NOW()))
                             GROUP BY YEAR(tanggalpmr),MONTH(tanggalpmr)");
        return $hasil->result();
    }

    function gettkp($user){
        $this->db->select('*');
        $this->db->from('konseling');
        $this->db->where('idpasien', $user);
        
        return $this->db->get()->num_rows();
    }

    function getlastkonsul($user){
        $this->db->select('tanggalpmr');
        $this->db->from('konseling');
        $this->db->where('idpasien', $user);
        $this->db->order_by('tanggalpmr', 'DESC');
        $this->db->limit(1);

        $hasil = $this->db->get();
        return $hasil;
        
    }
    
}
