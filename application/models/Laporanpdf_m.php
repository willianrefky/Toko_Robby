<?php
/**
 *
 */
class Laporanpdf_m extends CI_Model
{

	function datamasuk_harian($tglmasuk) {
		$this->db->select('
			barang_masuk.id_barang_masuk as id_barang_masuk, p_item.name as item_name,
			supplier.supplier_id as id_supplier, 
			supplier.name as name_supplier, 
			barang_masuk.jumlah_masuk as jumlah_masuk, 
			barang_masuk.tanggal_masuk as tanggal_masuk');
		$this->db->from('barang_masuk');
		$this->db->join('supplier', 'supplier.supplier_id = barang_masuk.supplier_id');
		$this->db->join('p_item','p_item.barcode = barang_masuk.barcode');
		$this->db->where('tanggal_masuk', $tglmasuk);
		$data = $this->db->get();
		return $data;
	}

	function datamasuk_bulanan($blnmasuk) {
		$this->db->select('
			barang_masuk.id_barang_masuk as id_barang_masuk, p_item.name as item_name,
			supplier.supplier_id as id_supplier, 
			supplier.name as name_supplier, 
			barang_masuk.jumlah_masuk as jumlah_masuk, 
			barang_masuk.tanggal_masuk as tanggal_masuk');
		$this->db->from('barang_masuk');
		$this->db->join('supplier', 'supplier.supplier_id = barang_masuk.supplier_id');
		$this->db->join('p_item','p_item.barcode = barang_masuk.barcode');
		$this->db->like('tanggal_masuk', $blnmasuk);
		$data = $this->db->get();
		return $data;
	}

	function datakeluar_harian($tglkeluar) {
		$this->db->select('barang_keluar.id_barang_keluar as id_barang_keluar, barang_keluar.tanggal_keluar as tanggal_keluar, barang_keluar.harga as harga');
		$this->db->from('barang_keluar');
		$this->db->like('tanggal_keluar',$tglkeluar);
		$data = $this->db->get();
		return $data;
	}

	function datakeluar_bulanan($blnkeluar) {
		$this->db->select('barang_keluar.id_barang_keluar as id_barang_keluar, barang_keluar.tanggal_keluar as tanggal_keluar, barang_keluar.harga as harga');
		$this->db->from('barang_keluar');
		$this->db->like('tanggal_keluar',$blnkeluar);
		$data = $this->db->get();
		return $data;
	}

	function datadetailkeluar($idtransaksi) {
		return $this->db->query("SELECT detail_barang_keluar.barcode, p_item.name as name, detail_barang_keluar.jumlah as jumlah, detail_barang_keluar.harga as harga, p_item.price FROM detail_barang_keluar, p_item WHERE detail_barang_keluar.barcode = p_item.barcode AND detail_barang_keluar.id_barang_keluar = '$idtransaksi'");
	}
}