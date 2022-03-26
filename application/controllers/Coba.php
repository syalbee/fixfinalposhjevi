<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Coba extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url();
            redirect($url);
        };
        $this->load->model('m_satuan');
        $this->load->model('m_kategori');
        $this->load->model('m_barang');
        $this->load->model('m_suplier');
        date_default_timezone_set('Asia/Jakarta');
    }
    public function index()
    {

       echo date('Y-m-d H:i:s');
    }
}