<?php 

/**
 * 
 */
class Laporan_m extends CI_Model
{
	
	function fetch_data_bulanan($qbulan, $qtahun)
	{
		$this->db->select('barang_masuk.* , supplier.name as name_supplier, p_item.name as item_name');
		$this->db->from('barang_masuk');
		$this->db->join('supplier', 'supplier.supplier_id = barang_masuk.supplier_id');
		$this->db->join('p_item', 'p_item.barcode = barang_masuk.barcode');
		$this->db->where('barang_masuk.tanggal_masuk', $qbulan);
		$satu = $this->db->get();
		return $satu;
	}
}