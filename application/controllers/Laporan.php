<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('laporanmodel');
    $this->load->model('loggingmodel');
    $this->load->library('mypdf');
    if ($this->session->userdata('username')=="") {
            redirect('login');
        }
        else if ($this->session->userdata('level')!="administrator" && $this->session->userdata('level')!="psikolog" && $this->session->userdata('level')!="pengawas") {
            redirect('error');
        }
  }

  function index()
  {

    if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if($filter == '6'){ // Jika filter nya 5 (Berdasarkan Pekerjaan)
                $pekerjaan = $_GET['pekerjaan'];

                $ket = 'Data Laporan Diagnosa Konseling Pasien Berdasarkan Pekerjaan Orang Tua ';
                $url_cetak = 'laporan/cetak?filter=6&pekerjaan='.$pekerjaan;
                $laporan = $this->laporanmodel->viewbypekerjaan($pekerjaan); // Panggil fungsi view_by_date yang ada di laporanmodel
            }else if($filter == '7'){ // Jika filter nya 6 (Berdasarkan Pendidikan)
                $pendidikan = $_GET['pendidikan'];

                $ket = 'Data Laporan Diagnosa Konseling Pasien Berdasarkan Pekerjaan Orang Tua';
                $url_cetak = 'laporan/cetak?filter=7&pendidikan='.$pendidikan;
                $laporan = $this->laporanmodel->viewbypendidikan($pendidikan); // Panggil fungsi view_by_date yang ada di laporanmodel
            }else if($filter == '5'){ // Jika filter nya 7 (Berdasarkan Pasien)
                $pasien = $_GET['pasien'];

                $ket = 'Data Laporan Diagnosa Konseling Pasien Berdasarkan Nama Pasien ';
                $url_cetak = 'laporan/cetak?filter=5&pasien='.$pasien;
                $laporan = $this->laporanmodel->viewbypasien($pasien); // Panggil fungsi view_by_date yang ada di laporanmodel
            }
            else if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggallaporan'];
                $tanggal = date("Y-m-d", strtotime($tgl));

                $ket = 'Data Laporan Diagnosa Konseling Pasien Tanggal '.date('d-m-y', strtotime($tgl));
                $url_cetak = 'laporan/cetak?filter=1&tanggal='.$tanggal;
                $laporan = $this->laporanmodel->viewbydate($tanggal); // Panggil fungsi view_by_date yang ada di laporanmodel
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulanlaporan'];
                $tahun = $_GET['tahunlaporan'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

                $ket = 'Data Laporan Diagnosa Konseling Pasien Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $url_cetak = 'laporan/cetak?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $laporan = $this->laporanmodel->viewbybulan($bulan, $tahun); // Panggil fungsi view_by_month yang ada di laporanmodel
            }else if($filter == '3'){ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahunlaporan'];

                $ket = 'Data Laporan Diagnosa Konseling Pasien Tahun '.$tahun;
                $url_cetak = 'laporan/cetak?filter=3&tahun='.$tahun;
                $laporan = $this->laporanmodel->viewbytahun($tahun); // Panggil fungsi view_by_year yang ada di laporanmodel
            } else{
              $ortu = $_GET['orangtua'];

              $ket = 'Data Laporan Diagnosa Konseling Pasien Berdasarkan Oghang Tuo dio ';
              $url_cetak = 'laporan/cetak?filter=4&orangtua='.$ortu;
              $laporan = $this->laporanmodel->viewbyortu($ortu);
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $url_cetak = 'laporan/cetak';
            $laporan = $this->laporanmodel->tampillaporan(); // Panggil fungsi view_all yang ada di laporanmodel
        }

		$data['ket'] = $ket;
		$data['url_cetak'] = base_url($url_cetak);
		$data['laporan'] = $laporan;
    $data['option_tahun'] = $this->laporanmodel->option_tahun();
		//$this->load->view('view', $data);

    $data['pendidikan'] = $this->laporanmodel->getpendidikan();
    $data['pekerjaan'] = $this->laporanmodel->getpekerjaan();
    $data['ortu'] = $this->laporanmodel->getortu();
    $data['pasien'] = $this->laporanmodel->getpasien();
    $data['level'] = $this->session->userdata('level');
    //$data['laporan'] = $this->laporanmodel->tampillaporan();
    $user = $this->session->userdata('username');
    $data['total'] = $this->loggingmodel->gettotal($user);
    $this->load->view('laporan', $data);
    //$this->mypdf->generate('dompdf');
  }

  function cetak(){
    if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if($filter == '5'){ // Jika filter nya 1 (per tanggal)
                $pasien = $_GET['pasien'];

                $ket = 'Data Laporan Diagnosa Konseling Pasien <br> Berdasarkan Nama Pasien: '.$pasien;
                $laporan = $this->laporanmodel->viewbypasien($pasien); // Panggil fungsi view_by_date yang ada di laporanmodel
            }else if($filter == '6'){ // Jika filter nya 1 (per tanggal)
                $pekerjaan = $_GET['pekerjaan'];

                $ket = 'Data Laporan Diagnosa Konseling Pasien <br> Berdasarkan Pekerjaan Orang Tua: '.$pekerjaan;
                $laporan = $this->laporanmodel->viewbypekerjaan($pekerjaan); // Panggil fungsi view_by_date yang ada di laporanmodel
            }else if($filter == '7'){ // Jika filter nya 1 (per tanggal)
                $pendidikan = $_GET['pendidikan'];

                $ket = 'Data Laporan Diagnosa Konseling Pasien <br> Berdasarkan Pendidikan Orang Tua: '.$pendidikan;
                $laporan = $this->laporanmodel->viewbypendidikan($pendidikan); // Panggil fungsi view_by_date yang ada di laporanmodel
            }else if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                $tanggal = date("Y-m-d", strtotime($tgl));

                $ket = 'Data Laporan Diagnosa Konseling Pasien Tanggal '.date('d-m-y', strtotime($tgl));
                $laporan = $this->laporanmodel->viewbydate($tanggal); // Panggil fungsi view_by_date yang ada di laporanmodel
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

                $ket = 'Data Laporan Diagnosa Konseling Pasien Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $laporan = $this->laporanmodel->viewbybulan($bulan, $tahun); // Panggil fungsi view_by_month yang ada di laporanmodel
            }else if($filter == '3'){ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Laporan Diagnosa Konseling Pasien Tahun '.$tahun;
                $laporan = $this->laporanmodel->viewbytahun($tahun); // Panggil fungsi view_by_year yang ada di laporanmodel
            } else{
              $ortu = $_GET['orangtua'];

              $ket = 'Data Laporan Diagnosa Konseling Pasien <br> Berdasarkan Orang Tua: '.$ortu;
              $laporan = $this->laporanmodel->viewbyortu($ortu);
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'LAPORAN KONSELING';
            $laporan = $this->laporanmodel->tampillaporan(); // Panggil fungsi view_all yang ada di laporanmodel
        }

		$data['ket'] = $ket;
		$data['data'] = $laporan;
    //$data['option_tahun'] = $this->laporanmodel->option_tahun();
		//$this->load->view('view', $data);

    //$data['pendidikan'] = $this->laporanmodel->getpendidikan();
    //$data['pekerjaan'] = $this->laporanmodel->getpekerjaan();
    //$data['laporan'] = $this->laporanmodel->tampillaporan();
    //$this->load->view('dompdf', $data);
    $this->mypdf->generate('dompdf', $data);
  }

}
