<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayatkonseling extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('riwayatkonselingmodel');
  }

  function index()
  {
    $pasien = $this->session->userdata('username');
    $data['level'] = $this->session->userdata('level');
    $data['rk'] = $this->riwayatkonselingmodel->getrk($pasien);

    $this->load->view('rk', $data);
  }

  function detail($id){
    $data['level'] = $this->session->userdata('level');
    $data['rk'] = $this->riwayatkonselingmodel->detailrk($id);
    $this->load->view('detailrk', $data);
  }

}
