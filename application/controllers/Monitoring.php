<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoring extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('monitoringmodel');
    if ($this->session->userdata('username')=="") {
        redirect('login');
    }
    // else if ($this->session->userdata('level')!="administrator") {
    //     redirect('error');
    // }
  }

  function index()
  {
    $data['monitoring'] = $this->monitoringmodel->tampilmonitoring();
    $data['level'] = $this->session->userdata('level');
    $this->load->view('monitoring', $data);
  }



  function detailmonitoring($id){
    $data['monitoring'] = $this->monitoringmodel->detailmonitoring($id);
    $data['level'] = $this->session->userdata('level');
    $this->load->view('detailmonitoring', $data);

  }


  function hapusmonitoring($id){
    $this->monitoringmodel->hapusmonitoring($id);
    redirect('monitoring');
  }

  function koreksi(){
    date_default_timezone_set("Asia/Jakarta");
     $waktu = date('Y-m-d H:i:s');
    $data = array(
        'waktu' => $waktu,
        'user' => $this->input->post('user'),
        'perihal' => $this->input->post('perihal'),
        'catatan' => $this->input->post('catatan'),
        'url' => $this->input->post('url')
    );
    $this->monitoringmodel->koreksi($data);
    redirect('memokoreksi');
  }

}
