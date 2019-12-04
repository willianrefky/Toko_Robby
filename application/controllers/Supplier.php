<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		
        // jika user belum login, arahkan ke halaman login
        if($this->session->userdata('status') != "login"){
            $this->session->set_flashdata("alert", "<script>alert('Login terlebih dahulu!');</script>"); // session flash data, ditampilkan jika user mencoba membuka halaman tertentu.
            redirect(base_url("login"));
        }  

		$this->load->model('supplier_m');
	}
	public function index()
	{
		$data = [
			'isi' => 'supplier/supplier_data',
			'data_supplier' => $this->supplier_m->get()
		];
		$this->load->view('Templates/master_dashboard', $data);
	}

	public function add()
	{
		$supplier = new stdClass();
		$supplier->supplier_id = null;
		$supplier->name = null;	
		$supplier->phone = null;
		$supplier->address = null;
		$supplier->description = null;  	
		$data = array (
			'isi' => 'supplier/supplier_form',
			'page' => 'add',
			'page1' => 'tambah',
			'row' => $supplier
		);
		$this->load->view('Templates/master_dashboard', $data);
	}

	public function edit($id)
	{
		$data_supplier = $this->supplier_m->get($id);
		if($data_supplier->num_rows()>0){
			$supplier = $data_supplier->row();
			$data=[
				'isi' => 'supplier/supplier_form',
				'page' => 'edit',
				'page1' => 'Edit',
				'row' => $supplier
			];
			$this->load->view('Templates/master_dashboard', $data);
		}else{
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='".site_url('supplier')."';</script>";
		}
	}

	public function process()
	{
		$post =  $this->input->post(null, TRUE);
		if(isset($_POST['add'])){
			$this->supplier_m->add($post);
		}else if(isset($_POST['edit'])){
			$this->supplier_m->edit($post);
		}
		if($this->db->affected_rows() > 0){
			echo "<script>
				alert('Data berhasil disimpan');
			</script>";
			} 
			echo "<script>
				window.location='".site_url('supplier')."';</script>";
	}

	public function del($id)
	{
		$this->supplier_m->del($id);
		if($this->db->affected_rows() > 0){
				echo "<script>
					alert('Data berhasil dihapus');
				</script>";
			} 
			echo "<script>
				window.location='".site_url('supplier')."';</script>";
	}
}