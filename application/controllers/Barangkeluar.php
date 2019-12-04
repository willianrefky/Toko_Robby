<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barangkeluar extends CI_Controller{

	function __construct()
	{
		parent::__construct();

		// jika user belum login, arahkan ke halaman login
        if($this->session->userdata('status') != "login"){
        	$this->session->set_flashdata("alert", "<script>alert('Login terlebih dahulu!');</script>"); // session flash data, ditampilkan jika user mencoba membuka halaman tertentu.
            redirect(base_url("login"));
        }
        
		$this->load->model(['barangkeluar_m','item_m','supplier_m']);
		$this->load->library('cart');
	}
	public function index()
	{
			$data = [
				'isi' => 'transaksi/barangkeluar/barang_keluar_data',
				'data_barangkeluar' => $this->barangkeluar_m->get()
			];
			$this->load->view('Templates/master_dashboard', $data);
		
	}

	// public function add()
	// {
	// 	$kode = 'T-BK-' . date('ymd');
	// 	$kode_terakhir = $this->barangkeluar_m->getMax('barang_keluar','id_barang_keluar', $kode);
	// 	$kode_tambah = substr($kode_terakhir, -5, 5);
	// 	$kode_tambah++;
	// 	$number = str_pad($kode_tambah, 5, '0', STR_PAD_LEFT); 
	// 	if (isset($_POST['submit'])) 
	// 	{
	// 		$this->barangkeluar_m->simpan_barang();
	// 		redirect('barangkeluar/add')j;
	// 	}else{
	// 		$kode = 'T-BK-' . date('ymd');
	// 		$kode_terakhir = $this->barangkeluar_m->getMax('barang_keluar','id_barang_keluar', $kode);
	// 		$kode_tambah = substr($kode_terakhir, -5, 5);
	// 		$kode_tambah++;
	// 		$number = str_pad($kode_tambah, 5, '0', STR_PAD_LEFT); 
	// 		$data = array(
	// 			'isi' => 'transaksi/barangkeluar/barang_keluar_form',
	// 			'page' => 'add',
	// 			'page1' => 'tambah',
	// 			'data_item' => $this->item_m->get(),
	// 			'id_barang_keluar' => $kode . $number,
	// 			'detail' => $this->barangkeluar_m->tampil_detail_barangkeluar()->result()
	// 		);
	// 		$this->load->view('Templates/master_dashboard', $data);
	// 	}
		
	// }
	public function add()
	{
		$kode = 'T-BK-' . date('ymd');
		$kode_terakhir = $this->barangkeluar_m->getMax('barang_keluar','id_barang_keluar', $kode);
		$kode_tambah = substr($kode_terakhir, -5, 5);
		$kode_tambah++;
		$number = str_pad($kode_tambah, 5, '0', STR_PAD_LEFT); 

			$kode = 'T-BK-' . date('ymd');
			$kode_terakhir = $this->barangkeluar_m->getMax('barang_keluar','id_barang_keluar', $kode);
			$kode_tambah = substr($kode_terakhir, -5, 5);
			$kode_tambah++;
			$number = str_pad($kode_tambah, 5, '0', STR_PAD_LEFT); 
			$data = array(
				'isi' => 'transaksi/barangkeluar/barang_keluar_form',
				'page' => 'add',
				'page1' => 'tambah',
				'data_item' => $this->item_m->get(),
				'id_barang_keluar' => $kode . $number,
				'detail' => $this->barangkeluar_m->tampil_detail_barangkeluar()->result()
			);
			$this->load->view('Templates/master_dashboard', $data);
		
		
	}

	public function transaksi(){
		date_default_timezone_set("Asia/Jakarta");
		$total_harga = $this->input->post('a');

		foreach ($this->cart->contents() as $key) {

			$id = $key['id'];
			$jml = $this->cart->total_items();
			$prc = $key['price']*$key['qty'];

		$detail = [
			'id_barang_keluar' => $this->input->post('id_barang_keluar'),
			'barcode' => $id,
			'jumlah' => $key['qty'],
			'harga' => $prc,
			'tanggal_keluar' => date('Y-m-d H:i:s'),
		];


		$barang = $this->barangkeluar_m->get_where('p_item', array('barcode' => $id))->row();

		$stokbarang = $barang->stock;
		$totalstok = $stokbarang-$key['qty'];

		$this->barangkeluar_m->updatestok($id, $totalstok);

		$this->db->insert('detail_barang_keluar', $detail);

			# code...
		}
		
		$data = [
			'id_barang_keluar' => $this->input->post('id_barang_keluar'),
			'barcode' => $id,
			'tanggal_keluar' => date('Y-m-d H:i:s'),
			'jumlah_keluar' => $jml,
			'harga' => $total_harga,
		];
			$this->barangkeluar_m->simpan_barang($data);


			$this->cart->destroy();
			redirect('barangkeluar');

	}

	public function update_cart(){

		$qty = $this->input->post('jumlah_brg');
		$id = $this->input->post('id_brg');

		$get = $this->barangkeluar_m->get_where('p_item', array('barcode' => $id))->row();

		$cek = $get->stock;

		if($qty > $cek){
			$this->session->set_flashdata('error', 'jumlah tidak memadai');
			redirect('barangkeluar/add');
		}else{
			$data = array(
				'qty' => str_replace(',', '.', $qty),
				'rowid' => $this->uri->segment(3)
			);

			$this->cart->update($data);

			redirect('barangkeluar/add');

		}

	}

	public function delete_cart(){
		$rowid = $this->uri->segment(3);

		$this->cart->remove($rowid);
			redirect('barangkeluar/add');

	}

	public function add_cart()
	{
		if(!empty($this->uri->segment(3))){
			$id= $this->uri->segment(3);
			$get = $this->barangkeluar_m->get_where('p_item', array('barcode' => $id))->row();

			$data = array(
				'id' => $get->barcode,
				'name' => $get->name,
				'price' => $get->price,
				'qty' => 1
			);
			if($get->stock < 5){
			$this->session->set_flashdata('error', "Stok kurang dari 5, tidak bisa melanjutkan Transaksi");
			redirect('barangkeluar/add', );

			}else{

			$this->cart->insert($data);

			}

			redirect('barangkeluar/add');

		}
	}

	public function hapusitem()
	{
		$id=  $this->uri->segment(3);
        $this->barangkeluar_m->hapusitem($id);
        redirect('barangkeluar/add');
	}

	// public function selesai_belanja()
	// {
	// 	// $tanggal= date('Y-m-d');
	// 	// $data = array(
	// 	// 	'tanggal_keluar' => $tanggal);
	// 	$this->barangkeluar_m->selesai_belanja();
	// 	redirect('barangkeluar');		
	// } 
	

	// public function process() {
	// 	$post = $this->input->post(null, TRUE);
	// 	if(isset($_POST['add'])){
	// 		$jmlkeluar = $post['jumlah_keluar'];
	// 		$barcode = $post['barcode_barang'];
	// 		$harga = $post['price_b'];
	// 		$post['total_harga'] = $jmlkeluar * $harga ;

			
	// 		$stock = $this->barangkeluar_m->checkstock($post);
	// 		foreach ($stock as $stk){
	// 			$jmstock = $stk->stock;
	// 		}
	// 		$totaljumlah = $jmstock - $jmlkeluar ;
		
	// 	if($jmstock == 0 ){
	// 		if($totaljumlah <  $jmstock){

	// 			$this->session->set_flashdata('error', 'Stok Sudah Habis');

	// 			redirect(base_url("barangkeluar/add"));
	// 		}

	// 		$this->session->set_flashdata('error', 'Data Barang Kosong');

	// 		redirect(base_url("barangkeluar/add"));


	// 	}else{
	// 		if($jmlkeluar > $jmstock){
	// 			$this->session->set_flashdata('error', 'Jumlah Melebihi Stok');

	// 			redirect(base_url("barangkeluar/add"));
	// 		}else{
	// 			$this->barangkeluar_m->updatestok($barcode, $totaljumlah);
	// 			$this->session->set_flashdata('success', 'Data success');
	// 			$this->barangkeluar_m->add($post);
	// 			redirect(base_url("barangkeluar"));	
	// 		}
	// 	}

	// 	}


	// }

	public function datatransaksis() {
		$search = $this->input->post('query');

		$query = $this->barangkeluar_m->datatransaksi($search);

		foreach ($query as $row) {
			$output = 
				"<tr>
	      		  <td style='width:5%;'>#</td>
				  <td>'" .$row['barcode']. "'</td>
				  <td>'" .$row['name']. "'</td>
				  <td>'" .$row['jumlah']. "'</td>
				  <td>'" .$row['price']. "'</td>
				  <td>'" .$row['harga']. "'</td>
			    </tr>";
		}
		echo $output; 
	}

	function fetch()
	 {
	  $output = '';
	  $query = '';
	  $this->load->model('barangkeluar_m');
	  if($this->input->post('query'))
	  {
	   $query = $this->input->post('query');
	  }
	  $data = $this->barangkeluar_m->datatransaksi($query);
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
	       <td>'.$row->price.'</td>
	       <td>'.$row->harga.'</td>
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

}