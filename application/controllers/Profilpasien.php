<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profilpasien extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('profilpasienmodel');
  }

  function index()
  {
    $data['level'] = $this->session->userdata('level');
    $pasien = $this->session->userdata('username');
    $data['pasien'] = $this->profilpasienmodel->getpasien($pasien);

    $this->load->view('profilpasien', $data);
  }

}
