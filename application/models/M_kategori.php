<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kategori extends CI_Model
{

    function hapus_kategori($kode)
    {
        $hsl = $this->db->query("UPDATE tbl_kategori set active='0' where kategori_id='$kode'");
        return $hsl;
    }

    function update_kategori($kode, $kat)
    {
        $hsl = $this->db->query("UPDATE tbl_kategori set kategori_nama='$kat' where kategori_id='$kode'");
        return $hsl;
    }

    function tampil_kategori()
    {
        $this->db->where('active', '1');
        return $this->db->get('tbl_kategori');
    }

    function simpan_kategori($kat)
    {
        $hsl = $this->db->query("INSERT INTO tbl_kategori(kategori_nama, active) VALUES ('$kat', '1')");
        return $hsl;
    }
}
