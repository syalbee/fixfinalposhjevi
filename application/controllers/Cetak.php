<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') !== 'login') {
            redirect('login');
        }
		$this->load->model('m_penjualan');
		$this->load->model('m_pelanggan');
        $this->load->library('escpos');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function struk($id)
    {
        $connector = new Escpos\PrintConnectors\WindowsPrintConnector('thermalprint');
        $printer = new Escpos\Printer($connector);

        $this->db->where('d_jual_nofak', $id);
        $produk = $this->db->get('tbl_detail_jual')->result();

        $this->db->where('jual_nofak', $id);
        $transaksi = $this->db->get('tbl_jual')->result();
        $date = new DateTime($transaksi[0]->jual_tanggal);
       
        $this->db->select('tbl_user.user_nama as kasir');
		$this->db->from('tbl_user');
		$this->db->join('tbl_jual', 'tbl_jual.jual_user_id = tbl_user.user_id');
		$this->db->where('tbl_jual.jual_nofak', $id);
		$kasir= $this->db->get()->result();

        $printer->initialize();
        $printer->setJustification(Escpos\Printer::JUSTIFY_CENTER);
        $printer->setFont(Escpos\Printer::FONT_A);
        $printer->text($this->db->get('tbl_toko')->result()[0]->nama . "\n");
        $printer->text($this->db->get('tbl_toko')->result()[0]->alamat . "\n");
        $printer->text("-------------------------------");

        $printer->initialize();
        $printer->setJustification(Escpos\Printer::JUSTIFY_LEFT);
        $printer->text("No Nota : " . $transaksi[0]->jual_nofak . "\n");
        $printer->text("Tanggal : " . $date->format('d/m/y H:i') . "\n");
        $printer->text("Kasir   : " . $kasir[0]->kasir . "\n");
        $printer->text("-------------------------------");
        $printer->text("\n");

        foreach ($produk as $key) {

            $printer->initialize();
            $printer->setFont(Escpos\Printer::FONT_A);
            $printer->text($key->d_jual_barang_nama . "  \n");

            $printer->initialize();
            $printer->setFont(Escpos\Printer::FONT_C);
            
            if($key->d_jual_diskon != '0'){
                $printer->text("Diskon = " . $key->d_jual_diskon);
            }
            
            $printer->text($key->d_jual_qty . " * ");
            $printer->text($key->d_jual_barang_harjul . " = ");

          
            $printer->text($key->d_jual_total . "\n");
            $printer->initialize();
            $printer->setFont(Escpos\Printer::FONT_A);
        }

        $printer->text("-------------------------------");
        $printer->text("\n");

        if (!empty($transaksi[0]->jual_member_id)) {

            $this->db->select('nama, point');
            $this->db->where('id', $transaksi[0]->jual_member_id);
            $pelanggan = $this->db->get('tbl_member')->result();

            $printer->text("Nama    : " . $pelanggan[0]->nama . "\n");
            $printer->text("Point   : " . $pelanggan[0]->point . "\n");
            $printer->text("--------------------------------");
        }

        $printer->text("Total   : " . $transaksi[0]->jual_total . "\n");
        $printer->text("Tunai   : " . $transaksi[0]->jual_jml_uang . "\n");
        $printer->text("Kembali : " . $transaksi[0]->jual_kembalian . "\n");
        $printer->text("\n");

        $printer->initialize();
        $printer->setJustification(Escpos\Printer::JUSTIFY_CENTER);
        $printer->text("TERIMA KASIH \n");

        $printer->feed(2); // mencetak 2 baris kosong, agar kertas terangkat ke atas
        $printer->close();
        
    }
}
