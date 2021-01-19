<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Memokoreksi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('memokoreksimodel');
    $this->load->model('loggingmodel');
    if ($this->session->userdata('username')=="")  {
      redirect('login');
    } else if ($this->session->userdata('level') != "pengawas" && $this->session->userdata('level') != "administrator") {
      redirect('error');
    }
  }

  function index()
  {
    $user = $this->session->userdata('username');
    $data['total'] = $this->loggingmodel->gettotal($user);
    $data['memo'] = $this->memokoreksimodel->getkoreksi($user);
    $data['koreksi'] = $this->memokoreksimodel->getmemo();
    $data['level'] = $this->session->userdata('level');
    $this->load->view('koreksi', $data);
  }

  function ubahstatus(){
    $id = $this->input->post('id');
    $data = array(
      'status' => $this->input->post('ubah')
    );
    $this->memokoreksimodel->ubahstatus($id, $data);
    redirect('memokoreksi');
  }

  function editkoreksi()
  {
    $id = $this->input->post('idkoreksi');
    $data = array(
      'catatan' => $this->input->post('catatan')
    );
    $this->memokoreksimodel->editkoreksi($id, $data);
    redirect('memokoreksi');
  }

  function hapuskoreksi($id)
  {
    $this->memokoreksimodel->hapuskoreksi($id);
    redirect('memokoreksi');
  }

}
