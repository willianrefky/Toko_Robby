<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		// check_not_login();
		$this->load->model(['item_m', 'kategori_m', 'unit_m']);
	}

	public function index()
	{
		$data = [
			'isi' => 'produk/item/item_data',
			'data_item' => $this->item_m->get()
		];
		$this->load->view('Templates/master_dashboard', $data);
	}

	public function add()
	{
		$item = new stdClass();
		$item->item_id = null;
		$item->barcode= null;
		$item->name = null;
		$item->price = null;

		// mengambil data kategori
		$query_category = $this->kategori_m->get();
		$category[null] = '- Pilih -';
		foreach ($query_category->result() as $cat){
			$category[$cat->category_id] = $cat->name;
		}

		// mengambil data unit
		$query_unit = $this->unit_m->get();
		$unit[null] = '- Pilih -';
		foreach ($query_unit->result() as $un) {
			$unit[$un->unit_id] = $un->name;
		}

		$data = array(
			'isi' => 'produk/item/item_form',
			'page' => 'add',
			'page1' => 'tambah',
			'row' => $item,
			'data_category' => $category, 'selectedkategori' => null,
			'data_unit' => $unit, 'selectedunit' => null
		);
		$this->load->view('Templates/master_dashboard', $data);
	}

	public function edit($id)
	{
		$data_item = $this->item_m->get($id);
		if($data_item->num_rows()>0){
			$item = $data_item->row();
			//mengambil data categori
			$query_category = $this->kategori_m->get();
			$category[null] = '- Pilih -';
			foreach ($query_category->result() as $cat){
				$category[$cat->category_id] = $cat->name;
			}
			//mengambil data unit
			$query_unit = $this->unit_m->get();
			$unit[null] = '- Pilih -';
			foreach ($query_unit->result() as $unt) {
				$unit[$unt->unit_id] = $unt->name;
			}

			$data = array(
				'isi' => 'produk/item/item_form',
				'page' => 'edit',
				'page1' => 'edit',
				'row' => $item,
				'data_category' => $category, 'selectedkategori' => $item->category_id,
				'data_unit' => $unit, 'selectedunit' => $item->unit_id,
			);
			$this->load->view('Templates/master_dashboard', $data);
		}else{
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='".site_url('item')."';</script>";
		}
	}

	public function process()
	{
		$post =  $this->input->post(null, TRUE);
		if(isset($_POST['add'])){
			if($this->item_m->check_barcode($post['barcode'])->num_rows() > 0){
				$this->session->set_flashdata('error', "Barcode $post[barcode] sudah digunakan!");
				redirect('item/add');
			} else {
				$this->item_m->add($post);
			}
		}else if(isset($_POST['edit'])){
			if($this->item_m->check_barcode($post['barcode'], $post['id'])->num_rows() > 0){
				$this->session->set_flashdata('error', "Barcode $post[barcode] sudah digunakan!");
				redirect('item/edit/'.$post['id']);
			}else{
				$this->item_m->edit($post);
			}
		}
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
			} 
			echo "<script>
				window.location='".site_url('item')."';</script>";
	}

	public function del($id)
	{
		$this->item_m->del($id);
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', 'Data berhasil dihapus');
			} 
			echo "<script>
				window.location='".site_url('item')."';</script>";
	}

	public function getstok($getId)
    {
        $id = encode_php_tags($getId);
        $query = $this->item_m->cekstok($id);
        output_json($query);
    }
}