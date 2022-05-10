<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url();
            redirect($url);
        };

        $this->load->model('m_kategori');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {

            $data = [
                'title' => "Kategori",
                'toko' => "Toko Hj Evi",
                'nama' => $this->session->userdata('nama'),
                'data' =>  $this->m_kategori->tampil_kategori()
            ];

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('admin/kategori', $data);
        } else {
            echo "Halaman tidak ditemukan";
        }
    }

    public function tambah_kategori()
    {
        if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {
            $kat = $this->input->post('kategori');
            $this->m_kategori->simpan_kategori($kat);
            echo $this->session->set_flashdata('msgKategori', 'add');
            redirect('kategori');
        } else {
            echo "Halaman tidak ditemukan";
        }
    }

    public function edit_kategori()
    {
        if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {
            $kode = $this->input->post('kode');
            $kat = $this->input->post('kategori');
            $this->m_kategori->update_kategori($kode, $kat);
            echo $this->session->set_flashdata('msgKategori', 'edit');
            redirect('kategori');
        } else {
            echo "Halaman tidak ditemukan";
        }
    }

    public function hapus_kategori()
    {
        if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {
            $kode = $this->input->post('kode');
            $this->m_kategori->hapus_kategori($kode);
            echo $this->session->set_flashdata('msgKategori', 'remove');
            redirect('kategori');
        } else {
            echo "Halaman tidak ditemukan";
        }
    }
}
