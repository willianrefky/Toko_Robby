<?php
/**
 *
 */
class Laporanpdf_m extends CI_Model
{

	function datamasuk($tglmasuk) {
		$this->db->select('barang_masuk.id_barang_masuk, barang_masuk.total_masuk, barang_masuk.jumlah_masuk, barang_masuk.tanggal_masuk');
		$this->db->from('barang_masuk');
		$this->db->like('tanggal_masuk', $tglmasuk);
		$data = $this->db->get();
		return $data;
	}

	public function datadetailmasuk($idtransaksi) {
		return $this->db->query("SELECT p_item.barcode, p_item.name, detail_barang_masuk.jumlah, stok.hargabeli FROM p_item, detail_barang_masuk, p_unit, stok WHERE detail_barang_masuk.id_barang_masuk = '$idtransaksi' AND detail_barang_masuk.barcode = p_item.barcode AND p_unit.unit_id = detail_barang_masuk.unit AND stok.barcode = detail_barang_masuk.barcode AND detail_barang_masuk.unit = stok.unit_id");
	}

	function datakeluar($tgl) {
		$this->db->select('barang_keluar.id_barang_keluar, barang_keluar.tanggal_keluar, barang_keluar.harga');
		$this->db->from('barang_keluar');
		$this->db->like('tanggal_keluar',$tgl);
		$data = $this->db->get();
		return $data;
	}

	function datadetailkeluar($idtransaksi) {
		return $this->db->query("SELECT p_item.barcode, p_item.name, detail_barang_keluar.jumlah, stok.hargajual FROM p_item, detail_barang_keluar, p_unit, stok WHERE detail_barang_keluar.id_barang_keluar = '$idtransaksi' AND detail_barang_keluar.barcode = p_item.barcode AND p_unit.unit_id = detail_barang_keluar.unit AND stok.barcode = detail_barang_keluar.barcode AND detail_barang_keluar.unit = stok.unit_id");
	}
}