<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url();
            redirect($url);
        };
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {

            $data = [
                'title' => "Pengaturan Toko",
                'toko' => "Toko Hj Evi",
                'nama' => $this->session->userdata('nama'),
                'data' =>  $this->db->get('tbl_toko')->row()
            ];

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('admin/pengaturan', $data);
        } else {
            echo "Halaman tidak ditemukan";
        }
    }

    public function edit_toko()
    {
        if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {
            $id = $this->input->post('id');
            $data = array(
                'nama' => $this->input->post('nama'),
                'minPoint' => $this->input->post('point'),
                'jumUang' => $this->input->post('uang'),
                'uang' => $this->input->post('dapatuang'),
                'point' => $this->input->post('dapatpoint'),
                'alamat' => $this->input->post('alamat')
            );

            $this->db->where('id', $id);
            $this->db->update('tbl_toko', $data);
            echo $this->session->set_flashdata('msgPengaturan', 'edit');
            redirect('pengaturan');
        } else {
            echo "Halaman tidak ditemukan";
        }
    }
}
