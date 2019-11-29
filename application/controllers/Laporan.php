<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function laporan_masuk()
	{
		$data = [
			'isi' => 'laporan/laporan_masuk'
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