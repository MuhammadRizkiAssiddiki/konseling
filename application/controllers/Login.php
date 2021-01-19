<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Login extends CI_Controller {

function __construct()
{
	parent::__construct();
	$this->load->helper('form');
	$this->load->library('session');
  $this->load->model('loginmodel'); // load loginmodel



}
public function index($error = NULL)
{
	$data = array(
					'error' => $error
			);
	$this->load->view('login', $data);
}

public function validasi() {
	 // $data = array('nip' => $this->input->post('username', TRUE),
	 				// 'password' => ($this->input->post('password', TRUE))
		// );
  $username = $this->input->post('username');
  $password = $this->input->post('password');
  $login = $this->loginmodel->cekuser($username, $password);

	//$hasil = $this->loginmodel->cek_user($data);
	if ($login != NULL)  {
		foreach ($login as $sess) {
			$sess_data['username'] = $sess->username;
			$sess_data['level'] = $sess->level;
			$sess_data['password'] = $sess->password;

			$this->session->set_userdata($sess_data);
		}
		if ($this->session->userdata('level')=='administrator') {
			redirect('konseling');

		}
		elseif ($this->session->userdata('level')=='pasien') {
			redirect('profilpasien');
		}
		elseif ($this->session->userdata('level')=='psikolog') {
			redirect('diagnosa');
		}
		elseif ($this->session->userdata('level')=='pengawas') {
			redirect('monitoring');
		}
		else {
			$error = 'Akun Tidak Bisa Digunakan';
			$this->index($error);
		}

	}
	else {

		$error = 'Username atau Password salah';
		$this->index($error);
	}
}

public function logout()
{
	$this->session->unset_userdata('username');
	$this->session->unset_userdata('level');
	session_destroy();
	redirect('login');
}

}

?>
