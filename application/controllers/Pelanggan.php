<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url();
            redirect($url);
        };
        $this->load->model('m_pelanggan');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {

            $data = [
                'title' => "Pelanggan",
                'toko' => "Toko Hj Evi",
                'nama' => $this->session->userdata('nama'),
            ];

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('admin/pelanggan', $data);
        } else {
            echo "Halaman tidak ditemukan";
        }
    }

    public function read()
    {
        header('Content-type: application/json');
        if ($this->m_pelanggan->read()->num_rows() > 0) {
            foreach ($this->m_pelanggan->read()->result() as $pelanggan) {
                if ($pelanggan->active != '0') {
                    $data[] = array(
                        'kode' => $pelanggan->kode,
                        'nama' => $pelanggan->nama,
                        'notelp' => $pelanggan->notelp,
                        'alamat' => $pelanggan->alamat,
                        'nik' => $pelanggan->nik,
                        'point' => $pelanggan->point,
                        'action' => '<button class="btn btn-sm btn-warning" onclick="edit(' . $pelanggan->id . ')"><i class="fas fa-edit"></i></button> <button class="btn btn-sm btn-danger" onclick="remove(' . $pelanggan->id . ')"><i class="fas fa-trash"></i></button>'
                    );
                }
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
        $data = array(
            'kode' => $this->_generateKodepelanggan(),
            'nama' => $this->input->post('addnama'),
            'notelp' => $this->input->post('addtelepon'),
            'alamat' => $this->input->post('addalamat'),
            'nik' => $this->input->post('addnik'),
            'point' => '0',
            'active' => '1'
        );

        if ($this->m_pelanggan->simpanPelanggan($data)) {
            echo json_encode('sukses');
        }
    }

    public function get_pelanggan()
    {
        $id = $this->input->post('id');
        $pelanggan = $this->m_pelanggan->getPelanggan($id);
        if ($pelanggan->row()) {
            echo json_encode($pelanggan->row());
        }
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $data = array(
            'nama' => $this->input->post('edtnama'),
            'notelp' => $this->input->post('edttelepon'),
            'alamat' => $this->input->post('edtalamat'),
            'nik' => $this->input->post('edtnik')
        );
        if ($this->m_pelanggan->update($id, $data)) {
            echo json_encode('sukses');
        }
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $data = array(
            'active' => '0'
        );

        if ($this->m_pelanggan->update($id, $data)) {
            echo json_encode('sukses');
        }
    }

    public function tukarpoint()
    {
        if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {

            $data = [
                'title' => "Pelanggan (Tukar Point)",
                'toko' => "Toko Hj Evi",
                'nama' => $this->session->userdata('nama'),
            ];

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('admin/tukarpoint', $data);
        } else {
            echo "Halaman tidak ditemukan";
        }
    }


    private function _generateKodepelanggan()
    {

        $this->db->select('RIGHT(kode,4) as kode', false);
        $this->db->order_by("kode", "DESC");
        $this->db->limit(1);
        $query = $this->db->get('tbl_member');

        if ($query->num_rows() <> 0) {

            $data       = $query->row();
            $kodepelanggan  = intval($data->kode) + 1;
        } else {
            $kodepelanggan  = 1;
        }

        $lastKode = str_pad($kodepelanggan, 4, "0", STR_PAD_LEFT);
        $tahun    = date("y");
        $PLG      = "PLG";

        $newKode  = $PLG . $tahun . $lastKode;

        return $newKode;
    }

    public function cekdataPoint()
    {
        header('Content-type: application/json');
        $pelanggan = $this->input->post('id');

        $toko = $this->db->get('tbl_toko')->row();
        $search = $this->m_pelanggan->cariPoint($pelanggan);
        $data = array(
            'nama' => $search->nama,
            'point' => $search->point,
            'uang' => $toko->uang,
            'minpoint' => $toko->minPoint
        );
        echo json_encode($data);
    }

    public function updatePoint()
    {
        header('Content-type: application/json');
        $pelanggan = $this->input->post('id');
        $point = $this->input->post('point');
        $toko = $this->db->get('tbl_toko')->row();
        $search = $this->m_pelanggan->cariPoint($pelanggan);

        $insert = array(
            'id_pelanggan' => $pelanggan,
            'tukar_point' => $point,
            'jumlah_uangkeluar' => ($point / $toko->minPoint) * $toko->uang
        );

        $data = array(
            'point' => $search->point - $point,
        );

        if ($this->m_pelanggan->updatePoint($pelanggan, $data) && $this->db->insert('tbl_tukar_point', $insert)) {
            echo ($point / $toko->minPoint) * $toko->uang;
        }
    }

    public function get_pelangganid()
    {
        header('Content-type: application/json');
        $idPelanggan = $this->input->post('namaID');
        $search = $this->m_pelanggan->ambilNama($idPelanggan);
        $data = [];
        foreach ($search as $idPelanggan) {
            $data[] = [
                'id' => $idPelanggan['kode'],
                'text' => $idPelanggan['nama'] . " | " . $idPelanggan['kode']
            ];
        }
        echo json_encode($data);
    }
}
