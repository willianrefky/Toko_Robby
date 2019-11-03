<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('kategori_m');
	}
	public function index()
	{
		$data = [
			'isi' => 'produk/kategori/kategori_data',
			'data_category' => $this->kategori_m->get()
		];
		$this->load->view('Templates/master_dashboard', $data);
	}

	public function add()
	{
		$category = new stdClass();
		$category->category_id = null;
		$category->name = null; 	
		$data = array (
			'isi' => 'produk/kategori/kategori_form',
			'page' => 'tambah',
			'row' => $category
		);
		$this->load->view('Templates/master_dashboard', $data);
	}

	public function edit($id)
	{
		$data_category = $this->kategori_m->get($id);
		if($data_category->num_rows()>0){
			$category = $data_category->row();
			$data=[
				'isi' => 'produk/kategori/kategori_form',
				'page' => 'edit',
				'row' => $category
			];
			$this->load->view('Templates/master_dashboard', $data);
		}else{
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='".site_url('kategori')."';</script>";
		}
	}

	public function process()
	{
		$post =  $this->input->post(null, TRUE);
		if(isset($_POST['tambah'])){
			$this->kategori_m->add($post);
		}else if(isset($_POST['edit'])){
			$this->kategori_m->edit($post);
		}
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
			} 
			echo "<script>
				window.location='".site_url('kategori')."';</script>";
	}

	public function del($id)
	{
		$this->kategori_m->del($id);
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', 'Data berhasil dihapus');
			} 
			echo "<script>
				window.location='".site_url('kategori')."';</script>";
	}
}
