<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporanbarangmasukpdf extends CI_Controller{

	function __construct()
	{
		parent::__construct();

		// jika user belum login, arahkan ke halaman login
        if($this->session->userdata('status') != "login"){
        	$this->session->set_flashdata("alert", "<script>alert('Login terlebih dahulu!');</script>"); // session flash data, ditampilkan jika user mencoba membuka halaman tertentu.
            redirect(base_url("login"));
        }

        $this->load->library('pdf');
        //$this->load->model('laporan_m');
	}

	public function index()
	{
		$pdf = new FPDF('P','mm','A4'); // halaman diset ke potrait, satuan mm, ukuran A4
		// membuat halaman baru
		$pdf->AddPage();
		// setting jenis font yang akan digunakan
		$pdf->SetFont('Arial','B',14);
		// mencetak string
		$pdf->Cell(190,7,'Laporan Barang Masuk Bulan Desember 2019',0,1,'C');
		// menampilkan halaman
		$pdf->Output();
	}

}