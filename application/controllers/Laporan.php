<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
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
		// jika user belum login, arahkan ke halaman login
        if($this->session->userdata('status') != "login"){
        	$this->session->set_flashdata("alert", "<script>alert('Login terlebih dahulu!');</script>"); // session flash data, ditampilkan jika user mencoba membuka halaman tertentu.
            redirect(base_url("login"));
        }
        
		$data = [
			'isi' => 'laporan/laporan_masuk'
		];
		$this->load->view('Templates/master_dashboard', $data);
	}

	public function laporan_keluar()
	{
		// jika user belum login, arahkan ke halaman login
        if($this->session->userdata('status') != "login"){
        	$this->session->set_flashdata("alert", "<script>alert('Login terlebih dahulu!');</script>"); // session flash data, ditampilkan jika user mencoba membuka halaman tertentu.
            redirect(base_url("login"));
        }

		$data = [
			'isi' => 'laporan/laporan_keluar'
		];
		$this->load->view('Templates/master_dashboard', $data);
	}


	public function data_barang_masuk()
	{
		$this->load->model('laporan_m');

		$bulan = $this->input->post('month');
		$tahun = $this->input->post('year');

		$qbulan = "MONTH";

		$query = $bulan."AND".$tahun;
		if($this->input->post('query'))
		{
			$query = $this->input->post('query');
		}
		$data = $this->laporan_m->fetch_data_bulanan($query);
		$outut .= '';
		if ($data->num_rows() > 0) 
		{
			foreach ($data->result() as $row) {
				$output .= '
				<tr>
					<td>'.$row->id_barang_masuk.'</td>
					<td>'.$row->name_item.'</td>
					<td>'.$row->name_supplier.'</td>
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
	}

}