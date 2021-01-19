<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loggingmodel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

   function gagallogin($user){
     date_default_timezone_set("Asia/Jakarta");
     $waktu = date('Y-m-d H:i:s');
     $data = array(
       'user' => $user,
       'waktu' => $waktu,
       'ket' => 'User '.$user.' gagal login'
      );

      $this->db->insert('logging', $data);
   }

   public function tambahdata($url, $user, $ket) {
     date_default_timezone_set("Asia/Jakarta");
     $waktu = date('Y-m-d H:i:s');
     $data = array(
       'user' => $user,
       'waktu' => $waktu,
       'keterangan' => $ket,
       'url' => $url
     );

     $this->db->insert('monitoring', $data);
      }

      public function editdata($url, $user, $ket) {
        date_default_timezone_set("Asia/Jakarta");
        $waktu = date('Y-m-d H:i:s');
        $data = array(
          'user' => $user,
          'waktu' => $waktu,
          'keterangan' => $ket,
          'url' => $url
        );

        $this->db->insert('monitoring', $data);
        }

        public function hapusdata($url, $user, $ket) {
          date_default_timezone_set("Asia/Jakarta");
          $waktu = date('Y-m-d H:i:s');
          $data = array(
            'user' => $user,
            'waktu' => $waktu,
            'keterangan' => $ket,
            'url' => $url
          );

          $this->db->insert('monitoring', $data);
        }

  function gettotal($user){
    $this->db->select('*');
    $this->db->from('koreksi');
    $this->db->where('user', $user);
    $this->db->where('status', 'Belum Diakses');

    return $this->db->get()->num_rows();
   }



}
