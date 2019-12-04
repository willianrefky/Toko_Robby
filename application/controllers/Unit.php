<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit extends CI_Controller{

	function __construct()
	{
		parent::__construct();

        // jika user belum login, arahkan ke halaman login
        if($this->session->userdata('status') != "login"){
            $this->session->set_flashdata("alert", "<script>alert('Login terlebih dahulu!');</script>"); // session flash data, ditampilkan jika user mencoba membuka halaman tertentu.
            redirect(base_url("login"));
        }  

		$this->load->model('unit_m');
	}

	public function index()
	{
		$data = [
			'isi' => 'produk/unit/unit_data',
			'data_unit' => $this->unit_m->get()
		];
		$this->load->view('Templates/master_dashboard', $data);
	}

	public function add()
	{
		$unit = new stdClass();
		$unit->unit_id = null;
		$unit->name = null; 	
		$data = array (
			'isi' => 'produk/unit/unit_form',
			'page' => 'tambah',
			'row' => $unit
		);
		$this->load->view('Templates/master_dashboard', $data);
	}

	public function edit($id)
	{
		$data_unit = $this->unit_m->get($id);
		if($data_unit->num_rows()>0){
			$unit = $data_unit->row();
			$data=[
				'isi' => 'produk/unit/unit_form',
				'page' => 'edit',
				'row' => $unit
			];
			$this->load->view('Templates/master_dashboard', $data);
		}else{
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='".site_url('unit')."';</script>";
		}
	}

	public function process()
	{
		$post =  $this->input->post(null, TRUE);
		if(isset($_POST['tambah'])){
			$this->unit_m->add($post);
		}else if(isset($_POST['edit'])){
			$this->unit_m->edit($post);
		}
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
			} 
			echo "<script>
				window.location='".site_url('unit')."';</script>";
	}

	public function del($id)
	{
		$this->unit_m->del($id);
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', 'Data berhasil dihapus');
			} 
			echo "<script>
				window.location='".site_url('unit')."';</script>";
	}
}