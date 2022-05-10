<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satuan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url();
            redirect($url);
        };

        $this->load->model('m_satuan');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {

            $data = [
                'title' => "Satuan",
                'toko' => "Toko Hj Evi",
                'nama' => $this->session->userdata('nama'),
                'data' =>  $this->m_satuan->tampil_satuan()
            ];

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('admin/satuan', $data);
        } else {
            echo "Halaman tidak ditemukan";
        }
    }

    public function tambah_satuan()
    {
        if ($this->session->userdata('akses') == '1'  || $this->session->userdata('akses') == '2') {
            $kat = $this->input->post('satuan');
            $satTur = $this->input->post('satuanturunan');
            $this->m_satuan->simpan_satuan($kat, $satTur);
            echo $this->session->set_flashdata('msgSatuan', 'add');
            redirect('satuan');
        } else {
            echo "Halaman tidak ditemukan";
        }
    }

    public function edit_satuan()
    {
        if ($this->session->userdata('akses') == '1'  || $this->session->userdata('akses') == '2') {
            $kode = $this->input->post('kode');
            $kat = $this->input->post('satuan');
            $satTur = $this->input->post('edtsatuanturunan');
            $this->m_satuan->update_satuan($kode, $kat, $satTur);
            echo $this->session->set_flashdata('msgSatuan', 'edit');
            redirect('satuan');
        } else {
            echo "Halaman tidak ditemukan";
        }
    }

    public function hapus_satuan()
    {
        if ($this->session->userdata('akses') == '1'  || $this->session->userdata('akses') == '2') {
            $kode = $this->input->post('kode');
            $this->m_satuan->hapus_satuan($kode);
            echo $this->session->set_flashdata('msgSatuan', 'remove');
            redirect('satuan');
        } else {
            echo "Halaman tidak ditemukan";
        }
    }
}
