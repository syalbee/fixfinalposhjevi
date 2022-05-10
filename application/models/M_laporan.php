<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan extends CI_Model
{
    public function get_stok_barang()
    {
        $hsl = $this->db->query("SELECT kategori_id,kategori_nama,barang_nama,barang_stok FROM tbl_kategori JOIN tbl_barang ON kategori_id=barang_kategori_id GROUP BY kategori_id,barang_nama");
        return $hsl;
    }
    public function get_data_barang()
    {
        $hsl = $this->db->query("SELECT tbl_kategori.kategori_id, tbl_barang.barang_id, tbl_kategori.kategori_nama, tbl_barang.barang_nama,
        tbl_barang.barang_harjul, tbl_barang.barang_stok, tbl_satuan.satuan_nama AS barang_satuan
        FROM tbl_kategori JOIN tbl_barang ON kategori_id=barang_kategori_id JOIN tbl_satuan ON tbl_satuan.`satuan_id` = tbl_barang.`barang_satuan_id`
        GROUP BY kategori_id,barang_nama");
        return $hsl;
    }
    public function get_data_penjualan()
    {
        $hsl = $this->db->query("SELECT jual_nofak,DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal,jual_total,d_jual_barang_id,d_jual_barang_nama,d_jual_barang_satuan,d_jual_barang_harpok,d_jual_barang_harjul,d_jual_qty,d_jual_diskon,d_jual_total FROM tbl_jual JOIN tbl_detail_jual ON jual_nofak=d_jual_nofak ORDER BY jual_nofak DESC");
        return $hsl;
    }
    public function get_total_penjualan()
    {
        $hsl = $this->db->query("SELECT jual_nofak,DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal,jual_total,d_jual_barang_id,d_jual_barang_nama,d_jual_barang_satuan,d_jual_barang_harpok,d_jual_barang_harjul,d_jual_qty,d_jual_diskon,sum(d_jual_total) as total FROM tbl_jual JOIN tbl_detail_jual ON jual_nofak=d_jual_nofak ORDER BY jual_nofak DESC");
        return $hsl;
    }
    public function get_data_jual_pertanggal($tanggal)
    {
        $hsl = $this->db->query("SELECT jual_nofak,DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal,d_jual_barang_id,d_jual_barang_nama,d_jual_barang_satuan,d_jual_barang_harpok,d_jual_barang_harjul,d_jual_qty,d_jual_diskon,d_jual_total FROM tbl_jual JOIN tbl_detail_jual ON jual_nofak=d_jual_nofak WHERE DATE(jual_tanggal)='$tanggal' ORDER BY jual_nofak DESC");
        return $hsl;
    }
    public function get_data__total_jual_pertanggal($tanggal)
    {
        $hsl = $this->db->query("SELECT jual_nofak,DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal,d_jual_barang_id,d_jual_barang_nama,d_jual_barang_satuan,d_jual_barang_harpok,d_jual_barang_harjul,d_jual_qty,d_jual_diskon,SUM(d_jual_total) as total FROM tbl_jual JOIN tbl_detail_jual ON jual_nofak=d_jual_nofak WHERE DATE(jual_tanggal)='$tanggal' ORDER BY jual_nofak DESC");
        return $hsl;
    }
    public function get_bulan_jual()
    {
        $hsl = $this->db->query("SELECT DISTINCT DATE_FORMAT(jual_tanggal,'%M %Y') AS bulan FROM tbl_jual");
        return $hsl;
    }
    public function get_tahun_jual()
    {
        $hsl = $this->db->query("SELECT DISTINCT YEAR(jual_tanggal) AS tahun FROM tbl_jual");
        return $hsl;
    }
    public function get_jual_perbulan($bulan)
    {
        $hsl = $this->db->query("SELECT jual_nofak,DATE_FORMAT(jual_tanggal,'%M %Y') AS bulan,DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal,d_jual_barang_id,d_jual_barang_nama,d_jual_barang_satuan,d_jual_barang_harpok,d_jual_barang_harjul,d_jual_qty,d_jual_diskon,d_jual_total FROM tbl_jual JOIN tbl_detail_jual ON jual_nofak=d_jual_nofak WHERE DATE_FORMAT(jual_tanggal,'%M %Y')='$bulan' ORDER BY jual_nofak DESC");
        return $hsl;
    }
    public function get_total_jual_perbulan($bulan)
    {
        $hsl = $this->db->query("SELECT jual_nofak,DATE_FORMAT(jual_tanggal,'%M %Y') AS bulan,DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal,d_jual_barang_id,d_jual_barang_nama,d_jual_barang_satuan,d_jual_barang_harpok,d_jual_barang_harjul,d_jual_qty,d_jual_diskon,SUM(d_jual_total) as total FROM tbl_jual JOIN tbl_detail_jual ON jual_nofak=d_jual_nofak WHERE DATE_FORMAT(jual_tanggal,'%M %Y')='$bulan' ORDER BY jual_nofak DESC");
        return $hsl;
    }
    public function get_jual_pertahun($tahun)
    {
        $hsl = $this->db->query("SELECT jual_nofak,YEAR(jual_tanggal) AS tahun,DATE_FORMAT(jual_tanggal,'%M %Y') AS bulan,DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal,d_jual_barang_id,d_jual_barang_nama,d_jual_barang_satuan,d_jual_barang_harpok,d_jual_barang_harjul,d_jual_qty,d_jual_diskon,d_jual_total FROM tbl_jual JOIN tbl_detail_jual ON jual_nofak=d_jual_nofak WHERE YEAR(jual_tanggal)='$tahun' ORDER BY jual_nofak DESC");
        return $hsl;
    }
    public function get_total_jual_pertahun($tahun)
    {
        $hsl = $this->db->query("SELECT jual_nofak,YEAR(jual_tanggal) AS tahun,DATE_FORMAT(jual_tanggal,'%M %Y') AS bulan,DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal,d_jual_barang_id,d_jual_barang_nama,d_jual_barang_satuan,d_jual_barang_harpok,d_jual_barang_harjul,d_jual_qty,d_jual_diskon,SUM(d_jual_total) as total FROM tbl_jual JOIN tbl_detail_jual ON jual_nofak=d_jual_nofak WHERE YEAR(jual_tanggal)='$tahun' ORDER BY jual_nofak DESC");
        return $hsl;
    }

    // //=========Laporan Laba rugi============
    // public function get_lap_laba_rugi($bulan)
    // {
    //     $hsl = $this->db->query("SELECT DATE_FORMAT(jual_tanggal,'%d %M %Y %H:%i:%s') as jual_tanggal,d_jual_barang_nama,d_jual_barang_satuan,d_jual_barang_harpok,d_jual_barang_harjul,(d_jual_barang_harjul-d_jual_barang_harpok) AS keunt,d_jual_qty,d_jual_diskon,((d_jual_barang_harjul-d_jual_barang_harpok)*d_jual_qty)-(d_jual_qty*d_jual_diskon) AS untung_bersih FROM tbl_jual JOIN tbl_detail_jual ON jual_nofak=d_jual_nofak WHERE DATE_FORMAT(jual_tanggal,'%M %Y')='$bulan'");
    //     return $hsl;
    // }
    // public function get_total_lap_laba_rugi($bulan)
    // {
    //     $hsl = $this->db->query("SELECT DATE_FORMAT(jual_tanggal,'%M %Y') AS bulan,d_jual_barang_nama,d_jual_barang_satuan,d_jual_barang_harpok,d_jual_barang_harjul,(d_jual_barang_harjul-d_jual_barang_harpok) AS keunt,d_jual_qty,d_jual_diskon, SUM(((d_jual_barang_harjul-d_jual_barang_harpok)*d_jual_qty)-(d_jual_qty*d_jual_diskon)) AS total FROM tbl_jual JOIN tbl_detail_jual ON jual_nofak=d_jual_nofak WHERE DATE_FORMAT(jual_tanggal,'%M %Y')='$bulan'");
    //     return $hsl;
    // }

    //=========Laporan Laba rugi============
    public function get_lap_laba_rugi($bulan)
    {
        $hsl = $this->db->query("SELECT DATE_FORMAT(jual_tanggal,'%M %Y') AS bulan, barang_min_stok, jual_keterangan, 
        DATE_FORMAT(jual_tanggal,'%d %M %Y %H:%i:%s') AS jual_tanggal,
        d_jual_barang_nama,d_jual_barang_satuan,d_jual_barang_harpok,d_jual_barang_harjul,d_jual_qty,d_jual_diskon
        FROM tbl_jual JOIN tbl_detail_jual ON jual_nofak=d_jual_nofak JOIN tbl_barang ON tbl_barang.`barang_id` = tbl_detail_jual.d_jual_barang_id 
        WHERE DATE_FORMAT(jual_tanggal,'%M %Y') ='$bulan'");
        return $hsl;
    }
    public function get_total_lap_laba_rugi($bulan)
    {
        $hsl = $this->db->query("SELECT DATE_FORMAT(jual_tanggal,'%M %Y') AS bulan, barang_min_stok, jual_keterangan, 
        DATE_FORMAT(jual_tanggal,'%d %M %Y %H:%i:%s') AS jual_tanggal,
        d_jual_barang_nama,d_jual_barang_satuan,d_jual_barang_harpok,d_jual_barang_harjul,d_jual_qty,d_jual_diskon
        FROM tbl_jual JOIN tbl_detail_jual ON jual_nofak=d_jual_nofak JOIN tbl_barang ON tbl_barang.`barang_id` = tbl_detail_jual.d_jual_barang_id 
        WHERE DATE_FORMAT(jual_tanggal,'%M %Y') ='$bulan'");
        return $hsl;
    }

    // Buat read laporan eceran dan grosir
    function readEceran()
    {
        $this->db->from('tbl_jual');
        $this->db->where('jual_keterangan', 'eceran');
        $this->db->order_by("jual_tanggal", "DESC");
        return $this->db->get();
    }

    function readGrosir()
    {
        $this->db->from('tbl_jual');
        $this->db->where('jual_keterangan', 'grosir');
        $this->db->order_by("jual_tanggal", "DESC");
        return $this->db->get();
    }

    public function readDetail($nofak)
    {
        $this->db->where('d_jual_nofak', $nofak);
        return $this->db->get('tbl_detail_jual');
    }
}
