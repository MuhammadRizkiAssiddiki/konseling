<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diagnosa extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('diagnosamodel');
    $this->load->model('konselingmodel');
    if ($this->session->userdata('username')=="") {
            redirect('login');
        }
        else if ($this->session->userdata('level')!="psikolog") {
            redirect('error');
        }
  }

  //Diagnosa Start
  function index()
  {
    $data['diagnosa'] = $this->diagnosamodel->tampildiagnosa();
    $data['level'] = $this->session->userdata('level');
    $this->load->view('diagnosa', $data);
  }

  function beridiagnosa($id){
    $idpasien = $this->uri->segment(4);
    $data['diagnosa'] = $this->diagnosamodel->beridiagnosa($id);
    $data['riwayat'] = $this->diagnosamodel->getriwayat($idpasien);
    $data['level'] = $this->session->userdata('level');
    $this->load->view('beridiagnosa', $data);
  }

  function tambahdiagnosa(){
    $diagnosa = array(
      'iddiagnosa' => $this->input->post('iddiagnosa'),
      'nopmr' => $this->input->post('nopmr'),
      'observasi' => $this->input->post('observasi'),
      'assesment' => $this->input->post('assesment'),
      'diagnosa' => $this->input->post('diagnosa'),
      'treatment' => $this->input->post('treatment')
    );
    $this->diagnosamodel->tambahdiagnosa($diagnosa);

    $keluhan = array(
      'keluhan' => $this->input->post('keluhan')
    );
    $this->diagnosamodel->updatekeluhan($keluhan, $this->input->post('nopmr'));

    $status = array(
      'status' => 'Sudah Didiagnosa'
    );
    $this->diagnosamodel->updatestatus($status, $this->input->post('nopmr'));
    redirect('diagnosa');
  }

  //Diagnosa END

  //Hasil Diagnosa Start
    function hasildiagnosa(){
      $data['diagnosa'] = $this->diagnosamodel->hasildiagnosa();
    $data['level'] = $this->session->userdata('level');
      $this->load->view('hasildiagnosa', $data);
    }

    function detaildiagnosa($id){
      $idpasien = $this->uri->segment(4);
      $data['diagnosa'] = $this->diagnosamodel->detaildiagnosa($id);
      $data['riwayat'] = $this->diagnosamodel->getriwayat($idpasien);
      $data['level'] = $this->session->userdata('level');
      $this->load->view('detaildiagnosa', $data);
    }

    function editdiagnosa(){
      $id = $this->input->post('iddiagnosa');
      $data = array(
        'diagnosa' => $this->input->post('diagnosa'),
        'treatment' => $this->input->post('treatment')
      );
      $this->diagnosamodel->editdiagnosa($id, $data);
      redirect('diagnosa/hasildiagnosa');
    }

    function hapusdiagnosa($id){
      $nopmr = $this->uri->segment(4);
      $status = array(
        'status' => 'Belum Didiagnosa'
      );
      $this->diagnosamodel->ubahstatus($nopmr, $status);
      $this->diagnosamodel->hapusdiagnosa($id);
      redirect('diagnosa/hasildiagnosa');
    }
  //Hasil Diagnosa END

}
