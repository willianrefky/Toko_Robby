<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Barangmasuk_m extends CI_Model{

	public function get($id = null)
	{
	// 	// $this->db->select('*');
	// 	// $this->db->join('supplier', 'barang_masuk.supplier_id = supplier.supplier_id');
	// 	// $this->db->join('p_item', 'barang_masuk.barcode = p_item.barcode');
	// 	// $this->db->join('p_unit', 'p_item.unit_id = p_unit.unit_id');
		$this->db->select('barang_masuk.* ,p_item.name as item_name,supplier.name as supplier_name');
		$this->db->from('barang_masuk');
		$this->db->join('supplier', 'supplier.supplier_id = barang_masuk.supplier_id');
		$this->db->join('p_item', 'p_item.barcode = barang_masuk.barcode');
		// $this->db->join('p_unit', 'p_unit.unit_id = p_item.unit_id');
		// if ($limit != null) {
  //           $this->db->limit($limit);
  //       }
		if($id != null){
			$this->db->where('barcode', $id);
		}
		// if ($range != null) {
  //           $this->db->where('tanggal_masuk' . ' >=', $range['mulai']);
  //           $this->db->where('tanggal_masuk' . ' <=', $range['akhir']);
  //       }

  //       $this->db->order_by('id_barang_masuk', 'DESC');
		// return $this->db->get('barang_masuk bm')->result_array();
		$query = $this->db->get();
		return $query;
	}
	// public function get1() {
	// 	$query = $this->db->query("SELECT barang_masuk.id_barang_masuk, p_item.name as itemname, supplier.name as suppliername, barang_masuk.jumlah_masuk, barang_masuk.tanggal_masuk FROM p_item, supplier, barang_masuk WHERE barang_masuk.barcode = p_item.barcode AND barang_masuk.supplier_id = supplier.supplier_id");
	// 	return $query->result();
	// }

	public function getMax($table, $field, $kode = null)
    {
        $this->db->select_max($field);
        if ($kode != null) {
            $this->db->like($field, $kode, 'after');
        }
        return $this->db->get($table)->row_array()[$field];
    }
    public function cekstok($id)
    {
        $this->db->join('p_unit', 'p_item.unit_id=p_unit.unit_id');
        return $this->db->get_where('barang', ['barcode' => $id])->row_array();
    }

    public function add($post) {
  //   	$params = [
		// 	'id_barang_masuk' => $post['id_barang_masuk'],
		// 	'barcode' => $post['barcode'],
		// 	'supplier_id' => $post['supplier_name'],
		// 	'jumlah_masuk' => $post['jumlah_masuk'],
		// 	'tanggal_masuk' => $post['date'],
		// ];
		// $this->db->insert('barang_masuk', $params);
		$idbm = $post['id_barang_masuk'];
		$brcd = $post['barcode_barang'];
		$sn = $post['supplier_name'];
		$jm = $post['jumlah_masuk'];
		$tm = $post['date'];
		$this->db->query("INSERT INTO barang_masuk VALUES ('$idbm','$brcd','$sn','$jm','$tm')");
    }

    public function checkstock($post) {
    	$barcode = $post['barcode_barang'];
    	$querydatabarang = $this->db->query("SELECT stock FROM p_item WHERE barcode = '$barcode'");
    	return $querydatabarang->result();
    }

    public function updatestok($barcode, $stock) {
    	$this->db->query("UPDATE p_item SET stock = '$stock' WHERE barcode = '$barcode'");
    }




    //========================== cobak
    function fetch_data($query)
 {
  $this->db->query("SELECT p_unit.name FROM p_unit, p_item WHERE p_unit.unit_id = p_item.unit_id AND p_item.barcode = '$query'");
  return $this->db->get();
 }

	// function search_brg($nama_barang){
	// 	$this->db->like('item_name', $nama_barang , 'both');
	//  	$this->db->select('p_item.name as item_name, p_item.stock, p_unit.name as unit_name');
	//  	$this->db->from('p_item, p_unit');
	//  	$this->db->join('p_unit', 'p_unit.unit_id=p_item.unit_id');
	//  	$this->db->order_by('item_name', 'ASC');
	//  	$this->db->limit(5);
	//  	return $this->db->get()->result();
	//  }

	function search_brg($nama_barang){
	 	$this->db->select('p_item.name as item_name, p_item.stock, p_unit.name as unit_name');
		$this->db->like('item_name', $nama_barang , 'both');
	 	$this->db->from('p_item');
	 	$this->db->join('p_unit', 'p_unit.unit_id = p_item.unit_id');
	 	$this->db->order_by('item_name', 'ASC');
	 	$this->db->limit(5);
	 	return $this->db->get()->result();
	 }

}