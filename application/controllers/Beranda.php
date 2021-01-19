<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('berandamodel');
		$this->load->model('loggingmodel');
		if ($this->session->userdata('username') == "") {
			redirect('login');
		} 
	}

	public function index()
	{
		$data['level'] = $this->session->userdata('level');

		$user = $this->session->userdata('username');
		$data['total'] = $this->loggingmodel->gettotal($user);

		$data['totalpasien'] = $this->berandamodel->gettotalpasien();
		$data['tpb'] = $this->berandamodel->gettpb();

		$data['totalkonseling'] = $this->berandamodel->gettotalkonseling();
		$data['tkb'] = $this->berandamodel->gettkb();

		$data['tkp'] = $this->berandamodel->gettkp($user);
		$data['lastkonsul'] = $this->berandamodel->getlastkonsul($user);

		$this->load->view('beranda', $data);
	}
}
