<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	function __construct()
    {
        parent::__construct();

        // jika user belum login, arahkan ke halaman login
        if($this->session->userdata('status') != "login")
            redirect(base_url("login"));

        // load model
        $this->load->model(['barangmasuk_m', 'item_m', 'supplier_m', 'barangkeluar_m']);
    }

    public function index()
    {
        
        $data = [
            'isi' => 'Dashboard/opening',
            'barang' => $this->item_m->count('p_item'),
            'supplier' => $this->supplier_m->count('supplier'),
            'b_masuk' => $this->barangmasuk_m->sum('barang_masuk', 'jumlah_masuk'),
            'b_keluar' => $this->barangkeluar_m->count('barang_keluar'),
            'barang_min' =>$this->item_m->min('p_item', 'stock', 5)
        ];
        $this->load->view('Templates/master_dashboard', $data);
    }
}