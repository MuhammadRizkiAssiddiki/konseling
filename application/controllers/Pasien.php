<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('pasienmodel');
    $this->load->model('loggingmodel');
    if ($this->session->userdata('username')=="") {
        redirect('login');
    }
    // else if ($this->session->userdata('level')!="administrator") {
    //     redirect('error');
    // }
  }

  function index()
  {
    $user = $this->session->userdata('username');
    $data['total'] = $this->loggingmodel->gettotal($user);
    $data['pasien'] = $this->pasienmodel->tampilpasien();
    $data['level'] = $this->session->userdata('level');
    $this->load->view('pasien', $data);
  }

  function tambahpasien()
  {
    $user = $this->session->userdata('username');
    $data['total'] = $this->loggingmodel->gettotal($user);
    $data['level'] = $this->session->userdata('level');
    $this->load->view('tambahpasien', $data);
  }

  function getortu(){
    $data = $this->pasienmodel->getortu();
    echo json_encode($data);
  }

  function getortubyid(){
    $id = $this->input->post('id');
    $data = $this->pasienmodel->getortubyid($id);
    echo json_encode($data);
  }

  function prosestambahpasien(){
    if ($this->input->post('pilihortu') == 1) {
      $pasien = array(
        'idpasien'=> $this->input->post('idpasien'),
        'idorangtua' => $this->input->post('daftarortu'),
        'namapasien' => $this->input->post('namapasien'),
        'tempatlahir' => $this->input->post('tempatlahir'),
        'tanggallahir' => $this->input->post('tanggallahir'),
        'umur' => $this->input->post('umur'),
        'alamat' => $this->input->post('alamat'),
        'notelp' => $this->input->post('notelp'),
        'anakke' => $this->input->post('anakke'),
        'sekolah' => $this->input->post('sekolah'),
        'password' => $this->input->post('password'),
        'tanggaldaftar' => date("Y-m-d")
      );
      $this->pasienmodel->tambahpasien($pasien);

      $akun = array(
        'username' => $this->input->post('idpasien'),
        'password' => $this->input->post('password'),
        'level' => 'pasien'
      );
      $this->pasienmodel->tambahakun($akun);

      $id = $this->input->post('idpasien');
      $kode = $this->input->post('namapasien');
      $user = $this->session->userdata('username');
      $ket  = "Admin Menambahkan Data Pasien dengan Nama ".$kode;
      $url  = base_url('pasien?user='.$user);
      $this->loggingmodel->tambahdata($url, $user, $ket);
    }
    else if($this->input->post('pilihortu') == 2){
      $ortu = array(
        'idorangtua' => $this->input->post('idorangtua'),
        'namaorangtua' => $this->input->post('namaorangtua'),
        'umurortu' => $this->input->post('umurortu'),
        'pendidikan' => $this->input->post('pendidikan'),
        'pekerjaan' => $this->input->post('pekerjaan'),
        'sukubangsa' => $this->input->post('sukubangsa')
      );
      $this->pasienmodel->tambahortu($ortu);

      $pasien = array(
        'idpasien'=> $this->input->post('idpasien'),
        'idorangtua' => $this->input->post('idorangtua'),
        'namapasien' => $this->input->post('namapasien'),
        'tempatlahir' => $this->input->post('tempatlahir'),
        'tanggallahir' => $this->input->post('tanggallahir'),
        'umur' => $this->input->post('umur'),
        'alamat' => $this->input->post('alamat'),
        'notelp' => $this->input->post('notelp'),
        'anakke' => $this->input->post('anakke'),
        'sekolah' => $this->input->post('sekolah'),
        'password' => $this->input->post('password'),
        'tanggaldaftar' => date("Y-m-d")
      );
      $this->pasienmodel->tambahpasien($pasien);

      $id = $this->input->post('idpasien');
      $kode = $this->input->post('namapasien');
      $user = $this->session->userdata('username');
      $ket  = "Admin Menambahkan Data Pasien dengan Nama ".$kode;
      $url  = base_url('pasien?user='.$user);
      $this->loggingmodel->tambahdata($url, $user, $ket);

    }
    redirect('pasien');
  }

  function detailpasien($id){
    $user = $this->session->userdata('username');
    $data['total'] = $this->loggingmodel->gettotal($user);
    $data['pasien'] = $this->pasienmodel->detailpasien($id);
    $data['level'] = $this->session->userdata('level');
    $this->load->view('detailpasien', $data);

  }

  function editpasien($id){
    $user = $this->session->userdata('username');
    $data['total'] = $this->loggingmodel->gettotal($user);
    $data['pasien'] = $this->pasienmodel->detailpasien($id);
    $data['ortu'] = $this->pasienmodel->getortu();
    $data['level'] = $this->session->userdata('level');
    $this->load->view('editpasien', $data);
  }

  function proseseditpasien(){
    $id = $this->input->post('idpasien');
    $pasien = array(
      'idorangtua' => $this->input->post('idorangtua'),
      'namapasien' => $this->input->post('namapasien'),
      'tempatlahir' => $this->input->post('tempatlahir'),
      'tanggallahir' => $this->input->post('tanggallahir'),
      'umur' => $this->input->post('umur'),
      'alamat' => $this->input->post('alamat'),
      'notelp' => $this->input->post('notelp'),
      'anakke' => $this->input->post('anakke'),
      'sekolah' => $this->input->post('sekolah'),
      'password' => $this->input->post('password')
    );
    $this->pasienmodel->editpasien($pasien, $id);

    $kode = $this->input->post('namapasien');
    $user = $this->session->userdata('username');
    $ket  = "Admin Mengubah Data Pasien dengan Nama ".$kode;
    $url  = base_url('pasien?user='.$user);
    $this->loggingmodel->editdata($url, $user, $ket);
    redirect('pasien');
  }

  function hapuspasien($id){
    $data2['pasien'] = $this->pasienmodel->getdata($id);
    $kode = $data2['pasien']['namapasien'];
    $user = $this->session->userdata('username');
    $ket  = "Admin Menghapus Data Pasien dengan Nama ".$kode;
    $url  = base_url('pasien?user='.$user);
    $this->loggingmodel->hapusdata($url, $user, $ket);

    $this->pasienmodel->hapuspasien($id);
    
    redirect('pasien');
  }

}
