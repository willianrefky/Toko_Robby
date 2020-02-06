<?php 

/**
 * 
 */
class Laporan_m extends CI_Model
{
	
	function fetch_data_masuk($query)
	{
		$this->db->select('barang_masuk.id_barang_masuk, barang_masuk.total_masuk, barang_masuk.jumlah_masuk, barang_masuk.tanggal_masuk');
		$this->db->from('barang_masuk');
		$this->db->like('tanggal_masuk', $query);
		$data = $this->db->get();
		return $data;

	}

	function fetch_data_keluar($query)
	{
		$this->db->select('barang_keluar.id_barang_keluar, barang_keluar.tanggal_keluar, barang_keluar.harga');
		$this->db->from('barang_keluar');
		$this->db->like('tanggal_keluar',$query);
		$data = $this->db->get();
		return $data;
	}
}