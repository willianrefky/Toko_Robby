<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Barangkeluar_m extends CI_Model{

	public function get_where($table= null, $data= null){
		$this->db->from($table);
		$this->db->where($data);
		
		return $this->db->get();
	}

	public function get($id= null)
	{
		$this->db->select('barang_keluar.* ,p_item.name as item_name');
		$this->db->from('barang_keluar');
		// $this->db->join('supplier', 'supplier.supplier_id = barang_keluar.supplier_id');
		$this->db->join('p_item', 'p_item.barcode = barang_keluar.barcode');

		
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
		// $idbrk = $this->input->post('id_barang_keluar');
		// $tk = $this->input->post('date');
		// $brcd = $this->input->post('barcode_barang');
		// $nm_brg = $this->input->post('nama_barang');
		// $jml_keluar = $this->input->post('jumlah_keluar');
		// $idbrg = $this->db->get_where('p_item', array('name' => $nm_brg))->row_array();
		
		// $data = [
		// 	'id_barang_keluar' => $this->input->post('id_barang_keluar'),
		// 	'barcode' => $idbrg['barcode'],
		// 	'jumlah' => $jml_keluar,
		// 	'harga' => $idbrg['price'],
		// 	'tanggal_keluar' => $this->input->post('date')
		// ];
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

	// public function selesai_belanja()
	// {
	// 	$idbrk = $this->input->post('id_barang_keluar');
	// 	$idk = $this->db->get_where('barang_keluar_detail', array('id_barang_keluar' => $idbrk))->row_array();
	// 	$tanggal = data('Y-m-d');
	// 	$data = array(
	// 		'tanggal_keluar' => $date,
	// 		'id_barang_keluar' => $idk['id_barang_keluar']
	// 	);
	// 	$this->db->insert('barang_keluar', $data);
	// }

	public function datatransaksi($idtransaksi) {
		return $this->db->query("SELECT detail_barang_keluar.barcode, p_item.name, detail_barang_keluar.jumlah, detail_barang_keluar.harga, p_item.price FROM detail_barang_keluar, p_item WHERE detail_barang_keluar.barcode = p_item.barcode AND detail_barang_keluar.id_barang_keluar = '$idtransaksi'");
	}

	public function updatestok($barcode, $stock)
	{
		$this->db->set('stock', $stock);
		$this->db->where('barcode', $barcode);
		$this->db->update('p_item');
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

	
}