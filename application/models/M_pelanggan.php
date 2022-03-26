<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pelanggan extends CI_Model
{
    private $table = 'tbl_member';


    public function read()
    {
        return $this->db->get($this->table);
    }

    public function simpanPelanggan($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function getPelanggan($id)
    {
        $this->db->where('id', $id);
        return $this->db->get($this->table);
    }

    public function getPoint($id)
    {
        $this->db->select('point');
        $this->db->where('kode', $id);
        return $this->db->get($this->table)->row();
    }

    public function setPoint($id, $data)
    {
        $this->db->set('point', $data);
        $this->db->where('kode', $id);
        return $this->db->update($this->table);
    }

    public function cariPoint($id)
    {
        $this->db->select('nama, point');
        $this->db->where('kode', $id);
        return $this->db->get($this->table)->row();
    }

    public function updatePoint($id, $data)
    {
        $this->db->where('kode', $id);
        return $this->db->update($this->table, $data);
    }

    public function ambilNama($search = '')
    {
        $this->db->select('tbl_member.kode, tbl_member.nama', 1);
        $this->db->like('nama', $search);
        $this->db->where('active', '1');
        return $this->db->get($this->table)->result_array();
    }
}
