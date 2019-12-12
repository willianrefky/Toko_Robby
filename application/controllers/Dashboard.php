<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	function __construct()
    {
        parent::__construct();

        // jika user belum login, arahkan ke halaman login
        if($this->session->userdata('status') != "login"){
            $this->session->set_flashdata("alert", "<script>alert('Login terlebih dahulu!');</script>"); // session flash data, ditampilkan jika user mencoba membuka halaman tertentu.
            redirect(base_url("login"));
        }        

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
            'barang_min' =>$this->item_m->min('p_item', 'stock', 5),
            // 'mjanuari' => $this->barang_m->grafik('01')->row_array(),
            // 'mjanuari' => $this->barang_m->grafik('02')->row_array(),
            // 'mjanuari' => $this->barang_m->grafik('03')->row_array(),
            // 'mjanuari' => $this->barang_m->grafik('04')->row_array(),
            // 'mjanuari' => $this->barang_m->grafik('05')->row_array(),
            // 'mjanuari' => $this->barang_m->grafik('06')->row_array(),
            // 'mjanuari' => $this->barang_m->grafik('07')->row_array(),
            // 'mjanuari' => $this->barang_m->grafik('08')->row_array(),
            // 'mjanuari' => $this->barang_m->grafik('09')->row_array(),
            // 'mjanuari' => $this->barang_m->grafik('10')->row_array(),
            // 'mjanuari' => $this->barang_m->grafik('11')->row_array(),
            // 'mjanuari' => $this->barang_m->grafik('12')->row_array(),
        ];
        $this->load->view('Templates/master_dashboard', $data);
    }
}