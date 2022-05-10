<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_suplier extends CI_Model
{

	private $table = 'tbl_suplier';

	public function create($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function read()
	{
		return $this->db->get($this->table);
	}

	public function update($id, $data)
	{
		$this->db->where('suplier_id', $id);
		return $this->db->update($this->table, $data);
	}

	public function delete($id)
	{
		$this->db->where('suplier_id', $id);
		return $this->db->delete($this->table);
	}

	public function getSupplier($id)
	{
		$this->db->where('suplier_id', $id);
		return $this->db->get($this->table);
	}

	function tampil_suplier()
	{
		$this->db->where('active', '1');
		return $this->db->get($this->table);
	}

	public function search($search = "")
	{
		$this->db->like('suplier_nama', $search);
		return $this->db->get($this->table)->result();
	}
}
