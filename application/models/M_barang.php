<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_barang extends CI_Model
{

    private $table = 'tbl_barang';

    public function create($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function read()
    {
        $hsl = $this->db->query("SELECT tbl_barang.*, tbl_kategori.`kategori_nama`, tbl_satuan.`satuan_nama`
        FROM tbl_barang JOIN tbl_kategori ON tbl_barang.`barang_kategori_id` = tbl_kategori.`kategori_id` 
        JOIN tbl_satuan ON tbl_satuan.`satuan_id` = tbl_barang.`barang_satuan_id` WHERE tbl_barang.active = '1' ");
        return $hsl;
    }

    public function tampil_barang()
    {
        $hsl = $this->db->query("SELECT tbl_barang.*, tbl_kategori.`kategori_nama`, tbl_satuan.`satuan_nama`
        FROM tbl_barang JOIN tbl_kategori ON tbl_barang.`barang_kategori_id` = tbl_kategori.`kategori_id` 
        JOIN tbl_satuan ON tbl_satuan.`satuan_id` = tbl_barang.`barang_satuan_id`");
        return $hsl;
    }

    public function update($id, $data)
    {
        $this->db->where('barang_id', $id);
        return $this->db->update($this->table, $data);
    }

    public function updatedelete($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }

    public function getBarang($id)
    {
        $this->db->where('id', $id);
        return $this->db->get($this->table);
    }

    public function search($search = "")
    {
        $this->db->like('nama', $search);
        return $this->db->get($this->table)->result();
    }

    public function find_by_barcode($key)
    {
        $this->db->select('*');
        $this->db->where('barcode', $key);
        $this->db->limit(1);
        $query = $this->db->get($this->table);

        return $query->row();
    }

    public function get_kobar()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(barang_id,6)) AS kd_max FROM tbl_barang");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%06s", $tmp);
            }
        } else {
            $kd = "000001";
        }
        return "BR" . $kd;
    }


    public function getBarcode($search = '')
    {
        $this->db->select('tbl_barang.barang_id, tbl_barang.barang_nama', 1);
        $this->db->like('barcode', $search);
        $this->db->where('active', '1');
        return $this->db->get($this->table)->result();
    }

    public function ambilBarcode($search = '')
    {
        $this->db->select('tbl_barang.barang_id, tbl_barang.barang_nama', 1);
        $this->db->like('barang_nama', $search);
        $this->db->where('active', '1');
        return $this->db->get($this->table)->result_array();
    }

    public function get_barang($id)
    {
        $this->db->where('barcode', $id);
        return $this->db->get($this->table);
    }
    
    public function get_beli($kobar)
    {
        $hsl = $this->db->query("SELECT tbl_barang.*, tbl_satuan.`satuan_nama` AS barang_satuan FROM tbl_barang JOIN tbl_satuan ON tbl_barang.`barang_satuan_id` = tbl_satuan.`satuan_id` WHERE tbl_barang.barang_id='$kobar' AND tbl_barang.active ='1'");
        return $hsl;
    }
    
}
