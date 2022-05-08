<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
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

        if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {
            $data = [
                'title' => "Barang",
                'toko' => "Toko Hj Evi",
                'nama' => $this->session->userdata('nama'),
                'kat' => $this->m_kategori->tampil_kategori(),
                'sat' => $this->m_satuan->tampil_satuan(),
                'sup' => $this->m_suplier->tampil_suplier()
            ];

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('admin/barang', $data);
        } else {
            echo "Halaman tidak ditemukan";
        }
    }

    public function read()
    {
        header('Content-type: application/json');
        if ($this->m_barang->read()->num_rows() > 0) {
            foreach ($this->m_barang->read()->result() as $barang) {
                $data[] = array(
                    // 'barcode' => $barang->barang_id,
                    'barang_nama' => $barang->barang_nama,
                    'satuan_nama' => $barang->satuan_nama . " & " . $barang->satuan_turunan,
                    'barang_harpok' => $barang->barang_harpok,
                    'barang_harjul' => $barang->barang_harjul,
                    'barang_harjul_grosir' => $barang->barang_harjul_grosir,
                    'barang_stok' => round($barang->barang_stok) . " " . $barang->satuan_nama,
                    'barang_stok_turunan' => round($barang->barang_stok * $barang->barang_min_stok). " " . $barang->satuan_turunan,
                    'barang_min_stok' => $barang->barang_min_stok,
                    'kategori_nama' => $barang->kategori_nama,
                    'action' => '<button class="btn btn-sm btn-warning" onclick="edit(' . $barang->id . ')"><i class="fas fa-edit"></i></button> <button class="btn btn-sm btn-danger" onclick="remove(' . $barang->id . ')"><i class="fas fa-trash"></i></button>',
                );
            }
        } else {
            $data = array();
        }
        $pelanggan = array(
            'data' => $data
        );
        echo json_encode($pelanggan);
    }

    public function add()
    {
        $kodebarang = $this->m_barang->get_kobar();
        $data = array(
            'barang_id' => $kodebarang,
            'barcode' => $kodebarang,
            'barang_nama' => $this->input->post('nabar'),
            'barang_harpok' => $this->input->post('harpok'),
            'barang_harjul' => $this->input->post('harjul'),
            'barang_harjul_grosir' => $this->input->post('harjul_grosir'),
            'barang_stok' => $this->input->post('stok'),
            'barang_min_stok' => $this->input->post('min_stok'),
            'barang_satuan_id' => $this->input->post('satuan'),
            'barang_kategori_id' => $this->input->post('kategori'),
            'barang_suplier_id' => $this->input->post('suplier'),
            'barang_user_id' => $this->session->userdata('idadmin'),
            'active' => '1'
        );

        if ($this->m_barang->create($data)) {
            echo json_encode('sukses');
        }
    }

    public function get_barang()
    {
        $id = $this->input->post('id');
        $barang = $this->m_barang->getBarang($id);
        if ($barang->row()) {
            echo json_encode($barang->row());
        }
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $data = array(
            'active' => '0'
        );

        if ($this->m_barang->updatedelete($id, $data)) {
            echo json_encode('sukses');
        }
    }


    public function edit()
    {
        $id = $this->input->post('kobar');

        $data = array(
            'barang_nama' => $this->input->post('nabar'),
            'barang_harpok' => $this->input->post('harpok'),
            'barang_harjul' => $this->input->post('harjul'),
            'barang_harjul_grosir' => $this->input->post('harjul_grosir'),
            'barang_tgl_last_update' => date('Y-m-d H:i:s'),
            'barang_min_stok' => $this->input->post('min_stok'),
            'barang_satuan_id' => $this->input->post('satuan'),
            'barang_kategori_id' => $this->input->post('kategori'),
            'barang_suplier_id' => $this->input->post('suplier'),
            'barang_user_id' => $this->session->userdata('idadmin'),
        );

        if ($this->m_barang->update($id, $data)) {
            echo json_encode('sukses');
        }
    }

    // public function get_barcode()
    // {
    //     header('Content-type: application/json');
    //     $barcode = $this->input->post('barcode');
    //     $search = $this->m_barang->getBarcode($barcode);
    //     foreach ($search as $barcode) {
    //         $data[] = array(
    //             'id' => $barcode->barang_id,
    //             'text' => $barcode->barang_nama
    //         );
    //     }
    //     echo json_encode($data);
    // }

    public function get_barcode()
    {
        header('Content-type: application/json');
        $barcode = $this->input->post('barcode');
        $search = $this->m_barang->ambilBarcode($barcode);
        $data = [];
        foreach ($search as $barcode) {
            $data[] = [
                'id' => $barcode['barang_id'],
                'text' => $barcode['barang_nama']
            ];
        }
        echo json_encode($data);
    }
}
