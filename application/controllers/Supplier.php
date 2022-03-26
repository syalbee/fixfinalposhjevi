<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url();
            redirect($url);
        };
        $this->load->model('m_suplier');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        if ($this->session->userdata('akses') == '1') {

            $data = [
                'title' => "Supplier",
                'toko' => "Toko Hj Evi",
                'nama' => $this->session->userdata('nama'),
            ];

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('admin/supplier', $data);
        } else {
            echo "Halaman tidak ditemukan";
        }
    }

    public function read()
    {
        header('Content-type: application/json');
        $iterasi = 1;
        if ($this->m_suplier->read()->num_rows() > 0) {
            foreach ($this->m_suplier->read()->result() as $supplier) {
                if ($supplier->active != '0') {
                    $data[] = array(
                        'no' => $iterasi++,
                        'nama' => $supplier->suplier_nama,
                        'alamat' => $supplier->suplier_alamat,
                        'telepon' => $supplier->suplier_notelp,
                        'action' => '<button class="btn btn-sm btn-warning" onclick="edit(' . $supplier->suplier_id . ')"><i class="fas fa-edit"></i></button> <button class="btn btn-sm btn-danger" onclick="remove(' . $supplier->suplier_id . ')"><i class="fas fa-trash"></i></button>'
                    );
                }
            }
        } else {
            $data = array();
        }
        $supplier = array(
            'data' => $data
        );
        echo json_encode($supplier);
    }

    public function add()
    {
        $data = array(
            'suplier_nama' => $this->input->post('addnama'),
            'suplier_alamat' => $this->input->post('addalamat'),
            'suplier_notelp' => $this->input->post('addtelepon'),
            'active' => '1'
        );

        if ($this->m_suplier->create($data)) {
            echo json_encode('sukses');
        }
    }

    public function get_supplier()
    {
        $id = $this->input->post('id');
        $supplier = $this->m_suplier->getSupplier($id);
        if ($supplier->row()) {
            echo json_encode($supplier->row());
        }
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $data = array(
            'suplier_nama' => $this->input->post('edtnama'),
            'suplier_alamat' => $this->input->post('edtalamat'),
            'suplier_notelp' => $this->input->post('edttelepon')
        );
        if ($this->m_suplier->update($id, $data)) {
            echo json_encode('sukses');
        }
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $data = array(
            'active' => '0'
        );

        if ($this->m_suplier->update($id, $data)) {
            echo json_encode('sukses');
        }
    }

}
