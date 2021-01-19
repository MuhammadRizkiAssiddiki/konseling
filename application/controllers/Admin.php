<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('adminmodel');
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
        $data['admin'] = $this->adminmodel->tampiladmin();
        $data['level'] = $this->session->userdata('level');
        $this->load->view('admin', $data);
    }

    function tambahadmin()
    {
        $data = array(
            'idadmin' => $this->input->post('idadmin'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'level' => $this->input->post('level')
        );
        $this->adminmodel->tambahadmin($data);

        $kode = $this->input->post('username');
        $user = $this->session->userdata('username');
        $ket  = "Admin Menambahkan Data User dengan Username ".$kode;
        $url  = base_url('admin?user='.$user);
        $this->loggingmodel->tambahdata($url, $user, $ket);
        redirect('admin');
    }

    function editadmin()
    {
        $id = $this->input->post('idadmin');
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'level' => $this->input->post('level')
        );
        $this->adminmodel->editadmin($id, $data);

        $kode = $this->input->post('username');
        $user = $this->session->userdata('username');
        $ket  = "Admin Mengubah Data User dengan Username ".$kode;
        $url  = base_url('admin?user='.$user);
        $this->loggingmodel->editdata($url, $user, $ket);
        redirect('admin');
        
    }
    function hapusadmin($id)
    {
        $data2['user'] = $this->adminmodel->getdata($id);
        $kode = $data2['user']['username'];
        $user = $this->session->userdata('username');
        $ket  = "Admin Menghapus Data User dengan Username ".$kode;
        $url  = base_url('admin?user='.$user);
        $this->loggingmodel->hapusdata($url, $user, $ket);

        $this->adminmodel->hapusadmin($id);
        redirect('admin');
    }
}
