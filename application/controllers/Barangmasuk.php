<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barangmasuk extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		// check_not_login();
		$this->load->model(['barangmasuk_m', 'item_m', 'supplier_m']);
	}
	public function index()
	{
		$data = [
			'isi' => 'transaksi/barangmasuk/barang_masuk_data',
			'data_barangmasuk' => $this->barangmasuk_m->get(),
		];
		$this->load->view('Templates/master_dashboard', $data);
	}

	public function add()
	{
		$barangmasuk = new stdClass();
		$barangmasuk->id_barang_masuk = null;
		$barangmasuk->jumlah_masuk = null;
		$barangmasuk->tanggal_masuk = null;
		
		// mengambil data item
		// $query_item = $this->item_m->get();
		// $item[null] = '- Pilih -';
		// foreach ($query_item->result() as $it){
		// 	$item[$it->barcode] = $it->name;
		// }

		// mengambil data supplier
		$query_supplier = $this->supplier_m->get();
		// $supplier[null] = '- Pilih -';
		// foreach ($query_supplier->result() as $sup) {
		// 	$supplier[$sup->supplier_id] = $sup->name;
		// }

		// Mendapatkan dan men-generate kode transaksi barang masuk
        $kode = 'T-BM-' . date('ymd');
        $kode_terakhir = $this->barangmasuk_m->getMax('barang_masuk', 'id_barang_masuk', $kode);
        $kode_tambah = substr($kode_terakhir, -5, 5);
        $kode_tambah++;
        $number = str_pad($kode_tambah, 5, '0', STR_PAD_LEFT);


		$data = array(
			'isi' => 'transaksi/barangmasuk/barang_masuk_form',
			'page' => 'add',
			'page1' => 'tambah',
			'data_item' => $this->item_m->get(),

			// 'row' => $item,
			// 'data_item' => $item, 'selecteditem' => null,
			// 'data_item' => $query_item,
			'data_supplier' => $query_supplier,
			'id_barang_masuk' => $kode . $number
		);
		$this->load->view('Templates/master_dashboard', $data);
	}

	public function delete()
	{

	}

	public function process() {
		$post =  $this->input->post(null, TRUE);
		if(isset($_POST['add'])){
			$jmlmasuk = $post['jumlah_masuk'];
			$barcode = $post['barcode_barang'];
			$this->barangmasuk_m->add($post);
			$stock = $this->barangmasuk_m->checkstock($post);
			foreach ($stock as $stk) {
				$jmstock = $stk->stock;
			}
			$totaljumlah = $jmlmasuk + $jmstock;
			$this->barangmasuk_m->updatestok($barcode, $totaljumlah);
		}
		redirect(base_url("barangmasuk"));
	}
	//=========================================================== nyobak
	// function fetch()
 // {
 //  $output = '';
 //  $query = '';
 //  $this->load->model('Barangmasuk_m');
 //  if($this->input->post('barcode'))
 //  {
 //   $query = $this->input->post('barcode');
 //  }
 //  $data = $this->Barangmasuk_m->fetch_data($query);
 //  $output .= '
 //  ';
 //  if($data->num_rows() > 0)
 //  {
 //   foreach($data->result() as $row)
 //   {
 //    $output .= ''.$row->name.'';
 //   }
 //  }
 //  else
 //  {
 //   $output .= '';
 //  }
 //  $output .= '';
 //  echo $output;
 // }
	function get_autocomplete(){
		if (isset($_GET['term'])) {
		  	$result = $this->barangmasuk_m->search_brg($_GET['term']);
		   	if (count($result) > 0) {
		    foreach ($result as $row)
		  //    	$arr_result[] = array(
				// 	'label'	=> $row->item_name,
				// 	'stok'	=> $row->stock,
				// );
				$arr_result[] = $row->item_name;
		     	echo json_encode($arr_result);
		   	}
		}
	}
}