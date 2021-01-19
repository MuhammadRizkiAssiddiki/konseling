<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orangtua extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('orangtuamodel');
    $this->load->model('loggingmodel');
    if ($this->session->userdata('username')=="")  {
      redirect('login');
    } else if ($this->session->userdata('level') =="pasien") {
      redirect('error');
    }
  }

  function index()
  {
    $user = $this->session->userdata('username');
    $data['total'] = $this->loggingmodel->gettotal($user);
    $data['pendidikan'] = $this->orangtuamodel->getpendidikan();
    $data['pekerjaan'] = $this->orangtuamodel->getpekerjaan();
    $data['ortu'] = $this->orangtuamodel->tampilortu();
    $data['level'] = $this->session->userdata('level');
    $this->load->view('orangtua', $data);
  }

  function tambahortu(){
    $data = array(
      'idorangtua' => $this->input->post('idorangtua'),
      'namaorangtua' => $this->input->post('namaorangtua'),
      'umurortu' => $this->input->post('umurortu'),
      'pendidikan' => $this->input->post('pendidikan'),
      'pekerjaan' => $this->input->post('pekerjaan'),
      'sukubangsa' => $this->input->post('sukubangsa')
    );
    $this->orangtuamodel->tambahortu($data);

    $kode = $this->input->post('namaorangtua');
    $user = $this->session->userdata('username');
    $ket  = "Admin Menambahkan Data Orang Tua dengan Nama ".$kode;
    $url  = base_url('orangtua?user='.$user);
    $this->loggingmodel->tambahdata($url, $user, $ket);
    redirect('orangtua');
  }

  function editortu(){
    $id = $this->input->post('idorangtua');
    $data = array(
      'namaorangtua' => $this->input->post('namaorangtua'),
      'umurortu' => $this->input->post('umurortu'),
      'pendidikan' => $this->input->post('pendidikan'),
      'pekerjaan' => $this->input->post('pekerjaan'),
      'sukubangsa' => $this->input->post('sukubangsa')
    );
    $this->orangtuamodel->editortu($id, $data);

    $kode = $this->input->post('namaorangtua');
    $user = $this->session->userdata('username');
    $ket  = "Admin Mengubah Data Orang Tua dengan Nama ".$kode;
    $url  = base_url('orangtua?user='.$user);
    $this->loggingmodel->editdata($url, $user, $ket);
    redirect('orangtua');
  }

  function hapusortu($id){
    $data2['orangtua'] = $this->orangtuamodel->getdata($id);
    $kode = $data2['orangtua']['namaorangtua'];
    $user = $this->session->userdata('username');
    $ket  = "Admin Menghapus Data Orang Tua dengan Nama ".$kode;
    $url  = base_url('orangtua?user='.$user);
    $this->loggingmodel->hapusdata($url, $user, $ket);
    
    $this->orangtuamodel->hapusortu($id);
    redirect('orangtua');
  }

}
