<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') !== 'login') {
            redirect('/');
        }
		date_default_timezone_set('Asia/Jakarta');
       
    }
	public function index()
	{
		$data = [
			'title' => "Dashboard",
			'toko' => $this->db->get('tbl_toko')->result_array()[0]['nama'],
			'nama' => $this->session->userdata('nama')
		];

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('template/footer');
	}
}
