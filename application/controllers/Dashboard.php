<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	function __construct()
    {
        parent::__construct();
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
            'barang_min' =>$this->item_m->min('stok', 'jumlah_stok', 5),
            'lima_barang_masuk' => $this->barangmasuk_m->getBarangMasuk(5),
            'mjanuari' => $this->barangmasuk_m->grafik('01')->row_array(),
            'mfebruari' => $this->barangmasuk_m->grafik('02')->row_array(),
            'mmaret' => $this->barangmasuk_m->grafik('03')->row_array(),
            'mapril' => $this->barangmasuk_m->grafik('04')->row_array(),
            'mmei' => $this->barangmasuk_m->grafik('05')->row_array(),
            'mjuni' => $this->barangmasuk_m->grafik('06')->row_array(),
            'mjuli' => $this->barangmasuk_m->grafik('07')->row_array(),
            'magustus' => $this->barangmasuk_m->grafik('08')->row_array(),
            'mseptember' => $this->barangmasuk_m->grafik('09')->row_array(),
            'moktober' => $this->barangmasuk_m->grafik('10')->row_array(),
            'mnovember' => $this->barangmasuk_m->grafik('11')->row_array(),
            'mdesember' => $this->barangmasuk_m->grafik('12')->row_array(),
            'kjanuari' => $this->barangkeluar_m->grafik('01')->row_array(),
            'kfebruari' => $this->barangkeluar_m->grafik('02')->row_array(),
            'kmaret' => $this->barangkeluar_m->grafik('03')->row_array(),
            'kapril' => $this->barangkeluar_m->grafik('04')->row_array(),
            'kmei' => $this->barangkeluar_m->grafik('05')->row_array(),
            'kjuni' => $this->barangkeluar_m->grafik('06')->row_array(),
            'kjuli' => $this->barangkeluar_m->grafik('07')->row_array(),
            'kagustus' => $this->barangkeluar_m->grafik('08')->row_array(),
            'kseptember' => $this->barangkeluar_m->grafik('09')->row_array(),
            'koktober' => $this->barangkeluar_m->grafik('10')->row_array(),
            'knovember' => $this->barangkeluar_m->grafik('11')->row_array(),
            'kdesember' => $this->barangkeluar_m->grafik('12')->row_array(),
        ];
        $this->load->view('Templates/master_dashboard', $data);
    }
}