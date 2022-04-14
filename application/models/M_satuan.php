<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_satuan extends CI_Model
{

    function hapus_satuan($kode)
    {
        $hsl = $this->db->query("UPDATE tbl_satuan set active='0' where satuan_id='$kode'");
        return $hsl;
    }

    function update_satuan($kode, $kat, $satTur)
    {
        $hsl = $this->db->query("UPDATE tbl_satuan set satuan_nama='$kat', satuan_turunan='$satTur' where satuan_id='$kode'");
        return $hsl;
    }

    function tampil_satuan()
    {
        $this->db->where('active', '1');
		return $this->db->get('tbl_satuan');
    }

    function simpan_satuan($kat ,$satTur)
    {
        $hsl = $this->db->query("INSERT INTO tbl_satuan(satuan_nama, satuan_turunan, active) VALUES ('$kat', '$satTur', '1')");
        return $hsl;
    }
}
