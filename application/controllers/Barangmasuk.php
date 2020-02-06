<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barangmasuk extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		// check_not_login();
		$this->load->model(['barangmasuk_m', 'item_m', 'supplier_m']);
		$this->load->library('cart');
	}
	public function index()
	{
		$data = [
			'isi' => 'transaksi/barangmasuk/barang_masuk_data',
			'data_barangmasuk' => $this->barangmasuk_m->get(),
			'data_transfer' => $this->barangmasuk_m->getQuery("SELECT p_item.item_id, p_item.barcode, p_item.name, p_category.name as category_name, p_unit.name as unit_name, p_unit.unit_id, stok.id_stok, stok.hargabeli, stok.hargajual, stok.jumlah_stok FROM stok, p_category, p_unit, p_item WHERE p_unit.unit_id = stok.unit_id AND p_item.barcode = stok.barcode AND p_category.category_id = p_item.category_id AND p_unit.unit_id <> '1'")
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
			'id_barang_masuk' => $kode . $number,
			'detail' => $this->barangmasuk_m->tampil_detail_barangmasuk()->result()
		);
		$this->load->view('Templates/master_dashboard', $data);
	}

	public function delete()
	{

	}

	// public function process() {
	// 	$post =  $this->input->post(null, TRUE);
	// 	if(isset($_POST['add'])){
	// 		$jmlmasuk = $post['jumlah_masuk'];
	// 		$barcode = $post['barcode_barang'];
	// 		$this->barangmasuk_m->add($post);
	// 		$stock = $this->barangmasuk_m->checkstock($post);
	// 		foreach ($stock as $stk) {
	// 			$jmstock = $stk->stock;
	// 		}
	// 		$totaljumlah = $jmlmasuk + $jmstock;
	// 		$this->barangmasuk_m->updatestok($barcode, $totaljumlah);
	// 	}
	// 	redirect(base_url("barangmasuk"));
	// }


	// tambah cart
	public function add_cart()
	{
		if(!empty($this->uri->segment(3))){
			$id = $this->uri->segment(3);
			$idstk = $this->uri->segment(4);

			$get = $this->barangmasuk_m->get_brgmodal($id, $idstk)->row();
			$auto = count($this->cart->contents());

			$data = array(
				'id' => $auto+1,
				'barcode' => $get->barcode,
				'name' => $get->name,
				'unit' => $get->unit_name,
				'price' => $get->hargabeli,
				'qty' => 1
			);

			$this->cart->insert($data);

			

			redirect('barangmasuk/add');
		}		
	}

	// update cart
	public function update_cart(){

		$qty = $this->input->post('jumlah_brg');
		$unit = $this->input->post('unt_brg');
		$id = $this->input->post('id_brg');

		$queryunit = $this->barangmasuk_m->get_unit($id, $unit)->row();

		$get = $this->barangmasuk_m->get_brgup($id, $queryunit->unit_id)->row();

		$cek = $get->jumlah_stok;

		// if($qty > $cek){
		// 	$this->session->set_flashdata('error', 'jumlah tidak memadai');
		// 	redirect('barangmasuk/add');
		// }else{
			$data = array(
				'qty' => str_replace(',', '.', $qty),
				'rowid' => $this->uri->segment(3)
			);

			$this->cart->update($data);

			redirect('barangmasuk/add');

		// }

	}

	// delete cart
	public function delete_cart(){
		$rowid = $this->uri->segment(3);

		$this->cart->remove($rowid);
		redirect('barangmasuk/add');
	}

	public function transaksi(){
		date_default_timezone_set("Asia/Jakarta");
		$total_harga = $this->input->post('a');

		foreach ($this->cart->contents() as $key) {

			$id = $key['id'];
			$bcd = $key['barcode'];
			$jml = $this->cart->total_items();
			$unt = $key['unit'];
			$prc = $key['price']*$key['qty'];

		$queryunit = $this->barangmasuk_m->get_unit($bcd, $unt)->row();

		$detail = [
			'id_barang_masuk' => $this->input->post('id_barang_masuk'),
			'barcode' => $bcd,
			'unit' => $queryunit->unit_id,
			'jumlah' => $key['qty'],
			'harga' => $prc,
			'tanggal_masuk' => date('Y-m-d H:i:s'),
		];

		// $barang = $this->barangkeluar_m->get_where('p_item', array('barcode' => $id))->row();
		$barang = $this->barangmasuk_m->get_brgdet($bcd, $unt)->row();

		$stokbarang = $barang->jumlah_stok;
		$totalstok = $stokbarang+$key['qty'];

		$this->barangmasuk_m->update_stok($bcd, $queryunit->unit_id, $totalstok);

		$this->db->insert('detail_barang_masuk', $detail);

		}
		
		$data = [
			'id_barang_masuk' => $this->input->post('id_barang_masuk'),
			'tanggal_masuk' => date('Y-m-d H:i:s'),
			'jumlah_masuk' => $jml,
			'total_masuk' => $total_harga,
		];
			$this->barangmasuk_m->simpan_barang($data);

			$this->cart->destroy();
			redirect('barangmasuk');

	}

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

	// detail transaksi masuk
	public function aho()
	 {
	  $output = '';
	  $query = '';

	  if($this->input->post('query'))
	  {
	   $query = $this->input->post('query');
	  }
	  $data = $this->barangmasuk_m->datatransaksi($query);
	  $output .= '
	  <div class="table-responsive">
	     <table class="table table-bordered table-striped">
	      <tr>
	        <th>Barcode</th>
			<th>Nama Barang</th>
			<th>Jumlah Pembelian</th>
			<th>Harga Satuan</th>
			<th>Harga</th>
	      </tr>
	  ';
	  if($data->num_rows() > 0)
	  {
	   foreach($data->result() as $row)
	   {
	    $output .= '
	      <tr>
	       <td>'.$row->barcode.'</td>
	       <td>'.$row->name.'</td>
	       <td>'.$row->jumlah.'</td>
	       <td>'.$row->hargabeli.'</td>
	       <td>'.($row->hargabeli * $row->jumlah).'</td>
	      </tr>
	    ';
	   }
	  }
	  else
	  {
	   $output .= '<tr>
	       <td colspan="5">No Data Found</td>
	      </tr>';
	  }
	  $output .= '</table>';
	  echo $output;
	 }

	function get_barcode() {
		$barcode = $this->input->post('barcode');
		$unit = $this->input->post('unit');

		$query = $this->barangmasuk_m->getQuery("SELECT p_item.item_id, p_item.barcode, p_item.name, p_category.name as category_name, p_unit.name as unit_name, p_unit.unit_id,stok.id_stok, stok.hargabeli, stok.hargajual, stok.jumlah_stok FROM stok, p_category, p_unit, p_item WHERE p_unit.unit_id = stok.unit_id AND p_item.barcode = stok.barcode AND p_category.category_id = p_item.category_id AND p_unit.unit_id <> '$unit' AND p_item.barcode = '$barcode'");

		if ($query->num_rows() == 0) {
			$out = '<option value = "">- Stok Kosong -</option>';	
		} else {
			$out = '';
			foreach ($query->result() as $qwr) {
				$out .= '<option value = '.$qwr->unit_id.'>'.$qwr->name.' - '.$qwr->unit_name.'</option>';
			}
			$out .= '';
		}
		echo $out;
	}

	function trans_brg() {
		$bc_sc = $this->input->post('bc_sc');
		$un_sc = $this->input->post('un_sc');
		$jm_sc = $this->input->post('jm_sc');
		$un_trgt = $this->input->post('un_trgt');
		$jm_trgt = $this->input->post('jm_trgt');

		// $bc_sc = 'A001'; $un_sc = '5'; $jm_sc = '5'; $un_trgt = '3'; $jm_trgt = '10';

		$querysc = $this->barangmasuk_m->getQuery("SELECT barcode, unit_id, jumlah_stok FROM stok WHERE barcode = '$bc_sc' AND unit_id = '$un_sc'")->row_array();

		$upstmin = $this->barangmasuk_m->getQuery("UPDATE stok SET jumlah_stok = ((SELECT jumlah_stok FROM stok WHERE barcode = '$bc_sc' AND unit_id = '$un_sc')-'$jm_sc') WHERE barcode = '$bc_sc' AND unit_id = '$un_sc'");
		$total = $jm_sc*$jm_trgt;
		$upstpl = $this->barangmasuk_m->getQuery("UPDATE stok SET jumlah_stok = ((SELECT jumlah_stok FROM stok WHERE barcode = '$bc_sc' AND unit_id = '$un_trgt')+'$total') WHERE barcode = '$bc_sc' AND unit_id = '$un_trgt'");

	}
}