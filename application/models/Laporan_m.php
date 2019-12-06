<?php 

/**
 * 
 */
class Laporan_m extends CI_Model
{
	
	function fetch_data($query)
	{
		// $this->db->select('barang_masuk.* , supplier.name as name_supplier, p_item.name as item_name');
		// $this->db->from('barang_masuk');
		// $this->db->join('supplier', 'supplier.supplier_id = barang_masuk.supplier_id');
		// $this->db->join('p_item', 'p_item.barcode = barang_masuk.barcode');
		// $this->db->like('barang_masuk.tanggal_masuk' $query);
		// $satu = $this->db->get();
		// return $satu;
		return $query = $this->db->query("SELECT barang_masuk.id_barang_masuk, p_item.name as nm_brg, supplier.name as nm_sup, barang_masuk.jumlah_masuk, barang_masuk.tanggal_masuk FROM barang_masuk, supplier, p_item WHERE barang_masuk.barcode = p_item.barcode AND barang_masuk.supplier_id = supplier.supplier_id AND barang_masuk.tanggal_masuk LIKE '$query%'");
	}

	function fetch_data_dua($query)
	{
		$this->db->select('barang_keluar.id_barang_keluar, barang_keluar.tanggal_keluar, barang_keluar.harga');
		$this->db->from('barang_keluar');
		$this->db->like('tanggal_keluar',$query);
		$data = $this->db->get();
		return $data;
		// return $query = $this->db->query("SELECT barang_keluar.id_barang_keluar, barang_keluar.tanggal_keluar, barang_keluar.harga FROM barang_keluar WHERE barang_keluar.tanggal_keluar LIKE '$query%'");
	}
}