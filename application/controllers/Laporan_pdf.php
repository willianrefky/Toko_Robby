<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_pdf extends CI_Controller{

	function __construct()
	{
		parent::__construct();

		// jika user belum login, arahkan ke halaman login
        if($this->session->userdata('status') != "login"){
        	$this->session->set_flashdata("alert", "<script>alert('Login terlebih dahulu!');</script>"); // session flash data, ditampilkan jika user mencoba membuka halaman tertentu.
            redirect(base_url("login"));
        }

        $this->load->library('pdf');
        $this->load->model('laporanpdf_m');
	}

	public function laporan_masuk_harian_pdf()
	{
		$pdf = new FPDF('P','mm','A4');
		// membuat halaman baru
		$pdf->AddPage();
		// setting jenis font yang akan digunakan
		$pdf->SetFont('Times','B',16);
		// mencetak string
		$pdf->Cell(190,7,'Laporan Barang Masuk Harian Toko Robby',0,1,'C');
		// memberikan space ke bawah
		$pdf->Cell(3,7,'',0,1);
		$pdf->SetFont('Times','','10');
		$pdf->Cell(20,7,"Tanggal:",0,0);
		$pdf->Cell(20,7,date("d-m-Y"),0,1);
		$pdf->SetFont('Times','B','10');
		$pdf->Cell(8,7,'No.',1,0);
		$pdf->Cell(40,7,'No. Transaksi',1,0);
		$pdf->Cell(40,7,'Nama Barang',1,0);
		$pdf->Cell(20,7,'ID Supplier',1,0);
		$pdf->Cell(25,7,'Nama Supplier',1,0);
		$pdf->Cell(25,7,'Jumlah Masuk',1,0);
		$pdf->Cell(25,7,'Tanggal Masuk',1,1);
		$pdf->SetFont('Times','','10');
		$tglmasuk = $this->input->post('tanggal_masuk');
		$data = $this->laporanpdf_m->datamasuk_harian($tglmasuk)->result();
		$no = 0;
		foreach ($data as $row) {
			$no++;
			$pdf->Cell(8,7,$no,1,0);
			$pdf->Cell(40,7,$row->id_barang_masuk,1,0);
			$pdf->Cell(40,7,$row->item_name,1,0);
			$pdf->Cell(20,7,$row->id_supplier,1,0);
			$pdf->Cell(25,7,$row->name_supplier,1,0);
			$pdf->Cell(25,7,$row->jumlah_masuk,1,0);
			$pdf->Cell(25,7,$row->tanggal_masuk,1,1);
		}
		$pdf->Output();
	}

	public function laporan_masuk_bulanan_pdf()
	{
		$pdf = new FPDF('P','mm','A4');
		// membuat halaman baru
		$pdf->AddPage();
		// setting jenis font yang akan digunakan
		$pdf->SetFont('Times','B',16);
		// mencetak string
		$pdf->Cell(190,7,'Laporan Barang Masuk Bulanan Toko Robby',0,1,'C');
		// memberikan space ke bawah
		$pdf->Cell(3,7,'',0,1);
		$pdf->SetFont('Times','','10');
		$pdf->Cell(20,7,"Tanggal:",0,0);
		$pdf->Cell(20,7,date("d-m-Y"),0,1);
		$pdf->SetFont('Times','B','10');
		$pdf->Cell(8,7,'No.',1,0);
		$pdf->Cell(40,7,'No. Transaksi',1,0);
		$pdf->Cell(40,7,'Nama Barang',1,0);
		$pdf->Cell(20,7,'ID Supplier',1,0);
		$pdf->Cell(25,7,'Nama Supplier',1,0);
		$pdf->Cell(25,7,'Jumlah Masuk',1,0);
		$pdf->Cell(25,7,'Tanggal Masuk',1,1);
		$pdf->SetFont('Times','','10');
		$blnmasuk = $this->input->post('bulan_masuk');
		$data = $this->laporanpdf_m->datamasuk_bulanan($blnmasuk)->result();
		$no = 0;
		foreach ($data as $row) {
			$no++;
			$pdf->Cell(8,7,$no,1,0);
			$pdf->Cell(40,7,$row->id_barang_masuk,1,0);
			$pdf->Cell(40,7,$row->item_name,1,0);
			$pdf->Cell(20,7,$row->id_supplier,1,0);
			$pdf->Cell(25,7,$row->name_supplier,1,0);
			$pdf->Cell(25,7,$row->jumlah_masuk,1,0);
			$pdf->Cell(25,7,$row->tanggal_masuk,1,1);
		}
		$pdf->Output();
	}

	public function laporan_keluar_harian_pdf ()
	{
		$pdf = new FPDF('P','mm','A4');
		// membuat halaman baru
		$pdf->AddPage();
		// setting jenis font yang akan digunakan
		$pdf->SetFont('Times','B',16);
		// mencetak string
		$pdf->Cell(190,7,'Laporan Barang Keluar Harian Toko Robby',0,1,'C');
		// memberikan space ke bawah
		$pdf->Cell(3,7,'',0,1);
		$pdf->SetFont('Times','','10');
		$pdf->Cell(20,7,"Tanggal:",0,0);
		$pdf->Cell(20,7,date("d-m-Y"),0,1);
		$pdf->SetFont('Times','B','10');
		// tabel
		$pdf->Cell(8,7,'No.',1,0);
		$pdf->Cell(40,7,'No. Transaksi Keluar',1,0);
		$pdf->Cell(40,7,'Tanggal Keluar',1,0);
		$pdf->Cell(30,7,'Harga Total',1,1);
		$pdf->SetFont('Times','','10');
		$tglkeluar = $this->input->post('tanggal_keluar');
		$data = $this->laporanpdf_m->datakeluar_harian($tglkeluar)->result();
		$no = 0;
		foreach ($data as $row) {
			$no++;
			$pdf->Cell(8,7,$no,1,0);
			$pdf->Cell(40,7,$row->id_barang_keluar,1,0);
			$pdf->Cell(40,7,$row->tanggal_keluar,1,0);
			$pdf->Cell(30,7,$row->harga,1,1);
		}
		$pdf->Output();
	}

	public function laporan_keluar_bulanan_pdf ()
	{
		$pdf = new FPDF('P','mm','A4');
		// membuat halaman baru
		$pdf->AddPage();
		// setting jenis font yang akan digunakan
		$pdf->SetFont('Times','B',16);
		// mencetak string
		$pdf->Cell(190,7,'Laporan Barang Keluar Bulanan Toko Robby',0,1,'C');
		// memberikan space ke bawah
		$pdf->Cell(3,7,'',0,1);
		$pdf->SetFont('Times','','10');
		$pdf->Cell(20,7,"Tanggal:",0,0);
		$pdf->Cell(20,7,date("d-m-Y"),0,1);
		$pdf->SetFont('Times','B','10');
		// tabel
		$pdf->Cell(8,7,'No.',1,0);
		$pdf->Cell(40,7,'No. Transaksi Keluar',1,0);
		$pdf->Cell(40,7,'Tanggal Keluar',1,0);
		$pdf->Cell(30,7,'Harga Total',1,1);
		$pdf->SetFont('Times','','10');
		$blnkeluar = $this->input->post('bulan_keluar');
		$data = $this->laporanpdf_m->datakeluar_bulanan($blnkeluar)->result();
		$no = 0;
		foreach ($data as $row) {
			$no++;
			$pdf->Cell(8,7,$no,1,0);
			$pdf->Cell(40,7,$row->id_barang_keluar,1,0);
			$pdf->Cell(40,7,$row->tanggal_keluar,1,0);
			$pdf->Cell(30,7,$row->harga,1,1);
		}
		$pdf->Output();
	}

	public function laporan_laba_pdf()
	{
		$pdf = new FPDF('P','mm','A4');
		// membuat halaman baru
		$pdf->AddPage();
		// setting jenis font yang akan digunakan
		$pdf->SetFont('Times','B',16);
		// mencetak string
		$pdf->Cell(190,7,'Laporan Laba Bulanan Toko Robby',0,1,'C');
		// memberikan space ke bawah
		$pdf->Cell(3,7,'',0,1);
		$pdf->SetFont('Times','','10');
		$pdf->Cell(20,7,"Tanggal:",0,0);
		$pdf->Cell(20,7,date("d-m-Y"),0,1);
		$pdf->Cell(3,7,'',0,1);

		$search = $this->input->post('cetak-data');
		$pdf->SetFont('Times','B','12');
		$pdf->Cell(30,7,"Pembelian (Rp)",1,0);
		$querymasuk = $this->db->query("SELECT sum(total_masuk) as totalbulanmasuk from barang_masuk WHERE tanggal_masuk LIKE '%$search%'");
		$querydata = $querymasuk->row_array();
		$outputmasuk = $querydata['totalbulanmasuk'];
		$pdf->Cell(30,7,$outputmasuk,1,1,'R');

		$pdf->SetFont('Times','B','12');
		$pdf->Cell(30,7,"Penjualan (Rp)",1,0);
		$querykeluar = $this->db->query("SELECT sum(harga) as totalbulankeluar from barang_keluar WHERE tanggal_keluar LIKE '%$search%'");
		$querydata = $querykeluar->row_array();
		$outputkeluar = $querydata['totalbulankeluar'];
		$pdf->Cell(30,7,$outputkeluar,1,1,'R');

		$pdf->SetFont('Times','B','12');
		$pdf->Cell(30,7,"Laba (Rp)",1,0);
		$querykeluar = $this->db->query("SELECT sum(harga) as totalbulankeluar from barang_keluar WHERE tanggal_keluar LIKE '%$search%'")->row_array();
		$querymasuk = $this->db->query("SELECT sum(total_masuk) as totalbulanmasuk from barang_masuk WHERE tanggal_masuk LIKE '%$search%'")->row_array();

		$querydata = $querykeluar['totalbulankeluar']-$querymasuk['totalbulanmasuk'];
		$outputlaba = $querydata;
		$pdf->Cell(30,7,$outputlaba,1,1,'R');


		$pdf->Output();
	}

}