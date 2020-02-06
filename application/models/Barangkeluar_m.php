<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Barangkeluar_m extends CI_Model{

	public function get_where($table= null, $data= null){
		$this->db->from($table);
		$this->db->where($data);
		
		return $this->db->get();
	}

	public function get($id= null)
	{
		$this->db->select('barang_keluar.*');
		$this->db->from('barang_keluar');

		
		if($id != null){
			$this->db->where('barcode', $id);
		}
		$this->db->order_by('barang_keluar.id_barang_keluar', 'DESC');

		$query = $this->db->get();
		return $query;
	}

	public function getMax($table, $field, $kode = null){
		$this->db->select_max($field);
		if ($kode != null){
			$this->db->like($field, $kode, 'after');
		}
		return $this->db->get($table)->row_array()[$field];
	}

	public function simpan_barang($data)
	{
		$this->db->insert('barang_keluar', $data);

	}

	public function tampil_detail_barangkeluar()
	{
		$query = "SELECT td.id_barang_keluar_detail,td.jumlah,td.harga,b.name as nama_barang
                FROM detail_barang_keluar as td,p_item as b
                WHERE b.barcode=td.barcode";
        return $this->db->query($query);
	} 

	public function hapusitem($id)
	{
		$this->db->where('id_barang_keluar_detail', $id);
		$this->db->delete('detail_barang_keluar');
	}

	public function datatransaksi($idtransaksi) {
		return $this->db->query("SELECT p_item.barcode, p_item.name, detail_barang_keluar.jumlah, stok.hargajual FROM p_item, detail_barang_keluar, p_unit, stok WHERE detail_barang_keluar.id_barang_keluar = '$idtransaksi' AND detail_barang_keluar.barcode = p_item.barcode AND p_unit.unit_id = detail_barang_keluar.unit AND stok.barcode = detail_barang_keluar.barcode AND detail_barang_keluar.unit = stok.unit_id");
	}

	public function updatestok($barcode, $unt, $stock)
	{
		$this->db->set('jumlah_stok', $stock);
		$this->db->where('barcode', $barcode);
		$this->db->where('unit_id', $unt);
		$this->db->update('stok');
		# code...
	}

	public function get_unit($barcode, $unit)
	{
		return $this->db->query("SELECT stok.unit_id FROM stok, p_unit WHERE stok.unit_id = p_unit.unit_id AND stok.barcode = '$barcode' AND p_unit.name = '$unit'");
		# code...
	}

	public function sum($table, $field)
    {
        $this->db->select_sum($field);
        return $this->db->get($table)->row_array();
    }

	public function count($table)
	{
		return $this->db->count_all($table);
	}

	public function grafik($bulan)
	{
		$bulankeluar = date('Y')."-".$bulan;
		$query = $this->db->query("SELECT COUNT(id_barang_keluar) as brgkeluar FROM barang_keluar WHERE tanggal_keluar LIKE '%$bulankeluar%'");
		return $query;
	}

	public function get_brgmodal($brcd, $idstk) {
		return $this->db->query("SELECT p_item.item_id, p_item.barcode, p_item.name, p_category.name as category_name, p_unit.name as unit_name, p_item.price, p_item.stock,stok.id_stok, stok.hargabeli, stok.hargajual, stok.jumlah_stok FROM p_item, p_category, p_unit, stok WHERE p_unit.unit_id = stok.unit_id AND p_item.barcode = stok.barcode AND p_category.category_id = p_item.category_id AND p_item.barcode = '$brcd' AND stok.id_stok = '$idstk'");
	}

	public function get_brgdet($brcd, $unt) {
		return $this->db->query("SELECT p_item.item_id, p_item.barcode, p_item.name, p_category.name as category_name, p_unit.name as unit_name, p_item.price, p_item.stock,stok.id_stok, stok.hargabeli, stok.hargajual, stok.jumlah_stok FROM p_item, p_category, p_unit, stok WHERE p_unit.unit_id = stok.unit_id AND p_item.barcode = stok.barcode AND p_category.category_id = p_item.category_id AND p_item.barcode = '$brcd' AND p_unit.name = '$unt'");
	}

	public function get_brgup($brcd, $unit) {
		return $this->db->query("SELECT jumlah_stok FROM stok WHERE barcode = '$brcd' AND unit_id = '$unit'");
	}

	
}