<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konseling extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('konselingmodel');
    $this->load->model('loggingmodel');
    if ($this->session->userdata('username')=="") {
            redirect('login');
        }
        else if ($this->session->userdata('level') =="pasien" ) {
            redirect('error');
        }
  }

  function index()
  {
    $user = $this->session->userdata('username');
    $data['total'] = $this->loggingmodel->gettotal($user);
    $data['konseling'] = $this->konselingmodel->tampilkonseling();
    $data['pasien'] = $this->konselingmodel->getpasien();
    $data['level'] = $this->session->userdata('level');
    $this->load->view('konseling', $data);
  }


  function getdatapasien(){
    $id = $this->input->post('id');
    $hasil = array();
    $data1 = $this->konselingmodel->getdatapasien($id);
    $data2 = $this->konselingmodel->getkeluhan($id);

    $data = array(
        'pasien' => $data1,
        'keluhan' => $data2

      );

    $result['data1'] = $data1;
    $result['data2'] = $data2;

    echo json_encode($data);
  }

  function tambahkonseling(){
    $user = $this->session->userdata('username');
    $data['total'] = $this->loggingmodel->gettotal($user);
    $data['pasien'] = $this->konselingmodel->getpasien();
    $data['level'] =$this->session->userdata('level');
    $this->load->view('tambahkonseling', $data);
  }

  function prosestambahkonseling(){
    $konseling = array(
      'nopmr' => $this->input->post('nopmr'),
      'idpasien' => $this->input->post('pilihpasien'),
      'tanggalpmr' => $this->input->post('tanggalpmr'),
      'keluhan' => $this->input->post('keluhan')
    );
    $this->konselingmodel->tambahkonseling($konseling);

    $kode = $this->input->post('nopmr');
    $user = $this->session->userdata('username');
    $ket  = "Admin Menambahkan Data Konseling dengan Nomor PMR ".$kode;
    $url  = base_url('konseling?user='.$user);
    $this->loggingmodel->tambahdata($url, $user, $ket);
    redirect('konseling');
  }

  function editkonseling($id){
    $id = $this->input->post('nopmr');
    $newDate = date("Y-m-d", strtotime($this->input->post('tanggalpmr')));
    $data = array(
      'idpasien' => $this->input->post('idpasien'),
      'tanggalpmr' => $newDate,
      'keluhan' => $this->input->post('keluhan')
    );
    $this->konselingmodel->editkonseling($id, $data);

    $kode = $this->input->post('nopmr');
    $user = $this->session->userdata('username');
    $ket  = "Admin Mengubah Data Konseling dengan Nomor PMR ".$kode;
    $url  = base_url('konseling?user='.$user);
    $this->loggingmodel->editdata($url, $user, $ket);
    redirect('konseling');
  }

  function hapuskonseling($id){
    $user = $this->session->userdata('username');
    $ket  = "Admin Menghapus Data Konseling dengan Nomor PMR ".$id;
    $url  = base_url('konseling?user='.$user);
    $this->loggingmodel->hapusdata($url, $user, $ket);
    $this->konselingmodel->hapuskonseling($id);
    //$kode = $this->input->post('nopmr');
    
    redirect('konseling');
  }

}
