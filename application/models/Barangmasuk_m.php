<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Barangmasuk_m extends CI_Model{

	public function get($id = null)
	{
		$this->db->select('barang_masuk.*');
		$this->db->from('barang_masuk');

		if($id != null){
			$this->db->where('barcode', $id);
		}
		$this->db->order_by('barang_masuk.id_barang_masuk', 'DESC');
		$query = $this->db->get();
		return $query;
	}
	public function getMax($table, $field, $kode = null)
    {
        $this->db->select_max($field);
        if ($kode != null) {
            $this->db->like($field, $kode, 'after');
        }
        return $this->db->get($table)->row_array()[$field];
    }

    public function tampil_detail_barangmasuk()
	{
		$query = "SELECT td.id_barang_masuk_detail,td.jumlah,td.harga,b.name as nama_barang
                FROM detail_barang_masuk as td,p_item as b
                WHERE b.barcode=td.barcode";
        return $this->db->query($query);
	} 


    public function cekstok($id)
    {
        $this->db->join('p_unit', 'p_item.unit_id=p_unit.unit_id');
        return $this->db->get_where('barang', ['barcode' => $id])->row_array();
    }

    public function add($post) {
    	$barcode = $post['barcode_barang'];
		$harga = $this->db->query("SELECT price_in FROM p_item WHERE barcode = '$barcode'")->row_array();

		$idbm = $post['id_barang_masuk'];
		$brcd = $post['barcode_barang'];
		$sn = $post['supplier_name'];
		$jm = $post['jumlah_masuk'];
		$totm = $post['jumlah_masuk']*$harga['price_in'];
		$tm = $post['date'];
		$this->db->query("INSERT INTO barang_masuk VALUES ('$idbm','$brcd','$sn','$jm', '$totm','$tm')");
    }

    public function checkstock($post) {
    	$barcode = $post['barcode_barang'];
    	$querydatabarang = $this->db->query("SELECT stock FROM p_item WHERE barcode = '$barcode'");
    	return $querydatabarang->result();
    }

    public function updatestok($barcode, $stock) {
    	$this->db->query("UPDATE p_item SET stock = '$stock' WHERE barcode = '$barcode'");
    }

    public function sum($table, $field)
    {
        $this->db->select_sum($field);
        return $this->db->get($table)->row_array()[$field];
    }




    function fetch_data($query)
		 {
		  $this->db->query("SELECT p_unit.name FROM p_unit, p_item WHERE p_unit.unit_id = p_item.unit_id AND p_item.barcode = '$query'");
		  return $this->db->get();
		 }

	function search_brg($nama_barang){
	 	$this->db->select('p_item.name as item_name, p_item.stock, p_unit.name as unit_name');
		$this->db->like('item_name', $nama_barang , 'both');
	 	$this->db->from('p_item');
	 	$this->db->join('p_unit', 'p_unit.unit_id = p_item.unit_id');
	 	$this->db->order_by('item_name', 'ASC');
	 	$this->db->limit(5);
	 	return $this->db->get()->result();
	}

	public function getBarangMasuk($limit = null)
	{
		$this->db->select('barang_masuk.id_barang_masuk, barang_masuk.jumlah_masuk, barang_masuk.tanggal_masuk, p_item.name');
		$this->db->join('p_item', 'p_item.barcode = stok.barcode');
		 if ($limit != null) {
            $this->db->limit($limit);
        }
		$this->db->order_by('id_barang_masuk', 'DESC');
		return $this->db->get('barang_masuk')->result_array();
	}

	public function grafik($bulan)
	{
		$bulanini = date('Y')."-".$bulan;
		$query = $this->db->query("SELECT COUNT(id_barang_masuk) as brgmasuk FROM barang_masuk WHERE tanggal_masuk LIKE '%$bulanini%'");
		return $query;
	}

	public function get_brgmodal($brcd, $idstk){
		// $this->db->select('p_item.item_id, p_item.barcode, p_item.name, p_category.name as category_name, p_unit.name as unit_name, p_item.price, p_item.stock,stok.id_stok, stok.hargabeli, stok.hargajual, stok.jumlah_stok');
		// $this->db->from('stok');
		// $this->db->join('p_unit', 'p_unit.unit_id = stok.unit_id');
		// $this->db->join('p_item', 'p_item.barcode = stok.barcode');
		// $this->db->join('p_category', 'p_category.category_id = p_item.category_id');
		// $this->db->where('p_item.barcode', $brcd);
		// $this->db->join('stok.id_stok', $idstk);

		// $query = $this->db->get();
		// return $query;
		return $this->db->query("SELECT p_item.item_id, p_item.barcode, p_item.name, p_category.name as category_name, p_unit.name as unit_name, stok.id_stok, stok.hargabeli, stok.hargajual, stok.jumlah_stok FROM p_item, p_category, p_unit, stok WHERE p_unit.unit_id = stok.unit_id AND p_item.barcode = stok.barcode AND p_category.category_id = p_item.category_id AND p_item.barcode = '$brcd' AND stok.id_stok = '$idstk'");

	}

	public function datatransaksi($idtransaksi) {
		return $this->db->query("SELECT p_item.barcode, p_item.name, detail_barang_masuk.jumlah, stok.hargabeli FROM p_item, detail_barang_masuk, p_unit, stok WHERE detail_barang_masuk.id_barang_masuk = '$idtransaksi' AND detail_barang_masuk.barcode = p_item.barcode AND p_unit.unit_id = detail_barang_masuk.unit AND stok.barcode = detail_barang_masuk.barcode AND detail_barang_masuk.unit = stok.unit_id");
	}

	public function get_unit($barcode, $unit)
	{
		return $this->db->query("SELECT stok.unit_id FROM stok, p_unit WHERE stok.unit_id = p_unit.unit_id AND stok.barcode = '$barcode' AND p_unit.name = '$unit'");
	
	}

	public function get_brgup($brcd, $unit) {
		return $this->db->query("SELECT jumlah_stok FROM stok WHERE barcode = '$brcd' AND unit_id = '$unit'");
	}

	public function get_brgdet($brcd, $unt) {
		return $this->db->query("SELECT p_item.item_id, p_item.barcode, p_item.name, p_category.name as category_name, p_unit.name as unit_name,stok.id_stok, stok.hargabeli, stok.hargajual, stok.jumlah_stok FROM p_item, p_category, p_unit, stok WHERE p_unit.unit_id = stok.unit_id AND p_item.barcode = stok.barcode AND p_category.category_id = p_item.category_id AND p_item.barcode = '$brcd' AND p_unit.name = '$unt'");
	}

	public function update_stok($barcode, $unt, $stock)
	{
		$this->db->set('jumlah_stok', $stock);
		$this->db->where('barcode', $barcode);
		$this->db->where('unit_id', $unt);
		$this->db->update('stok');
		# code...
	}

	public function simpan_barang($data)
	{
		$this->db->insert('barang_masuk', $data);

	}

	public function getQuery($query) {
		return $this->db->query($query);
	}


}