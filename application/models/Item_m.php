<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Item_m extends CI_Model{

	public function get($id = null)
	{
		$this->db->select('p_item.item_id, p_item.barcode, p_item.name, p_category.name as category_name, p_unit.name as unit_name, p_unit.unit_id,stok.id_stok, stok.hargabeli, stok.hargajual, stok.jumlah_stok');
		$this->db->from('stok, p_category');
		$this->db->join('p_unit', 'p_unit.unit_id = stok.unit_id');
		$this->db->join('p_item', 'p_item.barcode = stok.barcode');
		$this->db->where('p_category.category_id = p_item.category_id');

		if($id != null){
			$this->db->where('item_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params = [
			'barcode' => $post['barcode'],
			'name' => $post['item_name'],
			'category_id' => $post['category'],

			// 'unit_id' => '1',
			// 'price_in' => '1',
			// 'price' => '1'
		];
		$this->db->insert('p_item', $params);
	}

	public function save_batch($data){
    	return $this->db->insert_batch('stok', $data);
  	}

	public function edit($post)
	{
		$params = [
			'barcode' => $post['barcode'],
			'name' => $post['item_name'],
			'category_id' => $post['category'],
			'updated' => date('Y-m-d H:i:s')
		];
		$this->db->where('item_id', $post['id']);
		$this->db->update('p_item', $params);
	}

	function check_barcode($code, $id=null){
		$this->db->from('p_item');
		$this->db->where('barcode', $code);
		if($id != null){
			$this->db->where('item_id !=', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function del($id)
	{
		$this->db->where('item_id', $id);
		$this->db->delete('p_item');
	}

	public function cekstok($id)
    {
        $this->db->join('p_unit u', 'p_item.unit_id=p_unit.unit_id');
        return $this->db->get_where('barang b', ['barcode' => $id])->row_array();
    }

    public function count($table)
    {
    	return $this->db->count_all($table);
    }

    public function min($table, $field, $min)
    {
        $field = $field . ' <=';
        $this->db->where($field, $min);
        return $this->db->get($table)->result_array();
    }

    public function stok($post)
    {
    	$params =[
    		'barcode' => $post['barcode'],
    		'hargabeli' => $post['hargabeli'],
    		'hargajual' => $post['hargajual'],
    		'unit_id' => $post['unit']
    	];

    	$this->db->insert('stok', $params);
    }
}