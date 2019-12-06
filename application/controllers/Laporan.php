<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	function __construct()
	{	
		parent::__construct();
		
		// jika user belum login, arahkan ke halaman login
        if($this->session->userdata('status') != "login"){
        	$this->session->set_flashdata("alert", "<script>alert('Login terlebih dahulu!');</script>"); // session flash data, ditampilkan jika user mencoba membuka halaman tertentu.
            redirect(base_url("login"));
        }

		$this->load->model('laporan_m');
	}
	public function laporan_masuk()
	{
		$data = [
			'isi' => 'laporan/laporan_masuk'
		];
		$this->load->view('Templates/master_dashboard', $data);
	}

	public function laporan_keluar()
	{
		$data = [
			'isi' => 'laporan/laporan_keluar'
		];
		$this->load->view('Templates/master_dashboard', $data);
	}


	public function data()
	{
		$output = '';
	    $query = '';
		if($this->input->post('query'))
		{
			$query = $this->input->post('query');
		}
		$data = $this->laporan_m->fetch_data($query);
		$output = '
		<table  class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>No Transaksi</th>
                  <th>Nama Barang</th>
                  <th>Nama Supplier</th>
                  <th>Jumlah Masuk</th>
                  <th>Tanggal Masuk</th>
                </tr>
              </thead>
              <tbody>
		';
		if ($data->num_rows() > 0) 
		{
			$no = 1;
			foreach ($data->result() as $row) {
				$output .= '
				<tr>
					<td>'.$no++ .'</td>
					<td>'.$row->id_barang_masuk.'</td>
					<td>'.$row->nm_brg.'</td>
					<td>'.$row->nm_sup.'</td>
					<td>'.$row->jumlah_masuk.'</td>
					<td>'.$row->tanggal_masuk.'</td>
				';
			}
		}else{
			$output .= '
			<tr>
				<td colspan="7" style="text-align: center">No Data Found</td>
			</tr>
			';
		}
		$output .= '</tbody>
            </table>';
		echo $output;
	}

	public function data_dua()
	{
		$output = '';
	    $query = '';
		if($this->input->post('query'))
		{
			$query = $this->input->post('query');
		}
		$data = $this->laporan_m->fetch_data_dua($query);
		$output = '
		<table  class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>No Transaksi Keluar</th>
                  <th>Tanggal Keluar</th>
                  <th>Harga Total</th>
                  <th>#</th>
                </tr>
              </thead>
              <tbody>
		';
		if ($data->num_rows() > 0) 
		{
			$no = 1;
			foreach ($data->result() as $row) {
				$output .= '
				<tr>
					<td>'.$no++ .'</td>
					<td>'.$row->id_barang_keluar.'</td>
					<td>'.$row->tanggal_keluar.'</td>
					<td>'.$row->harga.'</td>
					<td>
						<a href='.base_url('laporan/detail/'.$row->id_barang_keluar.'').'>detail</a>
					</td>
				';
			}
		}else{
			$output .= '
			<tr>
				<td colspan="7" style="text-align: center">No Data Found</td>
			</tr>
			';
		}
		$output .= '</tbody>
            </table>';
		echo $output;
	}


	public function laba()
	{
		$data = [
			'isi' => 'laporan/laba_data'
		];
		$this->load->view('Templates/master_dashboard', $data);
	}

	//total pembelian penjualan
	public function totalpembelian() {
		$search = $this->input->post('search');

		$query = $this->db->query("SELECT sum(total_masuk) as totalbulanmasuk from barang_masuk WHERE tanggal_masuk LIKE '%$search%'");
		$querydata = $query->row_array();
		$output = $querydata['totalbulanmasuk'];
		echo $output;
	}

	public function totalpenjualan() {
		$search = $this->input->post('search');

		$query = $this->db->query("SELECT sum(harga) as totalbulankeluar from barang_keluar WHERE tanggal_keluar LIKE '%$search%'");
		$querydata = $query->row_array();
		$output = $querydata['totalbulankeluar'];
		echo $output;
	}

	public function totallaba() {
		$search = $this->input->post('search');

		$querykeluar = $this->db->query("SELECT sum(harga) as totalbulankeluar from barang_keluar WHERE tanggal_keluar LIKE '%$search%'")->row_array();
		$querymasuk = $this->db->query("SELECT sum(total_masuk) as totalbulanmasuk from barang_masuk WHERE tanggal_masuk LIKE '%$search%'")->row_array();

		$querydata = $querykeluar['totalbulankeluar']-$querymasuk['totalbulanmasuk'];
		$output = $querydata;
		echo $output;
	}

}