<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url();
            redirect($url);
        };
        
        $this->load->model('m_kategori');
        $this->load->model('m_barang');
        $this->load->model('m_suplier');
        $this->load->model('m_pembelian');
        $this->load->model('m_penjualan');
        $this->load->model('m_laporan');
        $this->load->model('m_satuan');
    }


    public function index()
    {

        if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {
            $data = [
                'title' => "Laporan",
                'toko' => "Toko Hj Evi",
                'nama' => $this->session->userdata('nama'),
                'data' => $this->m_barang->tampil_barang(),
                'kat' => $this->m_kategori->tampil_kategori(),
                'jual_bln' => $this->m_laporan->get_bulan_jual(),
                'jual_thn' => $this->m_laporan->get_tahun_jual(),
            ];

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('admin/laporan', $data);
        } else {
            echo "Halaman tidak ditemukan";
        }
    }

    public function lap_stok_barang()
    {
        $x['data'] = $this->m_laporan->get_stok_barang();
        $this->load->view('laporan/lap_stok_barang', $x);
    }

    public function lap_data_barang()
    {
        $x['data'] = $this->m_laporan->get_data_barang();
        $this->load->view('laporan/lap_data_barang', $x);
    }

    public function lap_data_penjualan()
    {
        $x['data'] = $this->m_laporan->get_data_penjualan();
        $x['jml'] = $this->m_laporan->get_total_penjualan();
        $this->load->view('laporan/lap_penjualan', $x);
    }

    public function lap_penjualan_pertanggal()
    {
        $tanggal = $this->input->post('tgl');
        $tanggal = date("Y-m-d", strtotime($tanggal));

        $x['jml'] = $this->m_laporan->get_data__total_jual_pertanggal($tanggal);
        $x['data'] = $this->m_laporan->get_data_jual_pertanggal($tanggal);
        $this->load->view('laporan/lap_jual_pertanggal', $x);
    }

    public function lap_penjualan_perbulan()
    {
        $bulan = $this->input->post('bln');
        $x['jml'] = $this->m_laporan->get_total_jual_perbulan($bulan);
        $x['data'] = $this->m_laporan->get_jual_perbulan($bulan);
        $this->load->view('laporan/lap_jual_perbulan', $x);
    }

    public function lap_penjualan_pertahun()
    {
        $tahun = $this->input->post('thn');
        $x['jml'] = $this->m_laporan->get_total_jual_pertahun($tahun);
        $x['data'] = $this->m_laporan->get_jual_pertahun($tahun);
        $this->load->view('laporan/lap_jual_pertahun', $x);
    }

    public function lap_laba_rugi()
    {
        $bulan = $this->input->post('bln');
        $x['jml'] = $this->m_laporan->get_total_lap_laba_rugi($bulan);
        $x['data'] = $this->m_laporan->get_lap_laba_rugi($bulan);
        $this->load->view('laporan/lap_laba_rugi', $x);
    }

    public function ecerankomplit()
    {
        if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {
            $data = [
                'title' => "Laporan Penjualan Eceran",
                'toko' => "Toko Hj Evi",
                'nama' => $this->session->userdata('nama'),
            ];

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('admin/lapeceran', $data);
        } else {
            echo "Halaman tidak ditemukan";
        }
    }

    public function grosirkomplit()
    {
        if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {
            $data = [
                'title' => "Laporan Penjualan Grosir",
                'toko' => "Toko Hj Evi",
                'nama' => $this->session->userdata('nama'),
            ];

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('admin/lapgrosir', $data);
        } else {
            echo "Halaman tidak ditemukan";
        }
    }

    public function readLapeceran()
    {
        header('Content-type: application/json');
        $iterasi = 1;
        if ($this->m_laporan->readEceran()->num_rows() > 0) {
            foreach ($this->m_laporan->readEceran()->result() as $lapEcer) {
                $idTran = (string)$lapEcer->jual_nofak;
                $data[] = array(
                    'no' => $iterasi++,
                    'jual_nofak' => $idTran,
                    'jual_tanggal' => $lapEcer->jual_tanggal,
                    'jual_total' => $lapEcer->jual_total,
                    'jual_jml_uang' => $lapEcer->jual_jml_uang,
                    'jual_kembalian' => $lapEcer->jual_kembalian,
                    'petugas' => $this->getPetugas($lapEcer->jual_user_id),
                    'note' => $lapEcer->jual_deskripsi,
                    'sts' => $lapEcer->jual_status === '1' ? "<h6 class='alert alert-danger'>Hutang</h6>" : "<h6 class='alert alert-success'>Lunas</h6>",
                    'action' => '<button class="btn btn-sm btn-warning" onclick="detail(\'' . $lapEcer->jual_nofak . '\')"><i class="fas fa-edit"></i></button> &nbsp; <button class="btn btn-sm btn-primary" onclick="lunas(\'' . $lapEcer->jual_nofak . '\')"><i class="fas fa-check"></i></button>',
                );
            }
        } else {
            $data = array();
        }
        $lapEcer = array(
            'data' => $data
        );
        echo json_encode($lapEcer);
    }

    public function readLapgrosir()
    {
        header('Content-type: application/json');
        $iterasi = 1;
        if ($this->m_laporan->readGrosir()->num_rows() > 0) {
            foreach ($this->m_laporan->readGrosir()->result() as $lapEcer) {
                $data[] = array(
                    'no' => $iterasi++,
                    'jual_nofak' => $lapEcer->jual_nofak,
                    'jual_tanggal' => $lapEcer->jual_tanggal,
                    'jual_total' => $lapEcer->jual_total,
                    'jual_jml_uang' => $lapEcer->jual_jml_uang,
                    'jual_kembalian' => $lapEcer->jual_kembalian,
                    'petugas' => $this->getPetugas($lapEcer->jual_user_id),
                    'note' => $lapEcer->jual_deskripsi,
                    'sts' => $lapEcer->jual_status === '1' ? "<h6 class='alert alert-danger'>Hutang</h6>" : "<h6 class='alert alert-success'>Lunas</h6>",
                    'action' => '<button class="btn btn-sm btn-warning" onclick="detail(\'' . $lapEcer->jual_nofak . '\')"><i class="fas fa-edit"></i></button> &nbsp; <button class="btn btn-sm btn-primary" onclick="lunas(\'' . $lapEcer->jual_nofak . '\')"><i class="fas fa-check"></i></button>',
                );
            }
        } else {
            $data = array();
        }
        $lapEcer = array(
            'data' => $data
        );
        echo json_encode($lapEcer);
    }

    public function readDetail($readDetail)
    {
        // $readDetail= $this->input->post('id');
        $output = '';
        $i = 1;
        foreach ($this->m_laporan->readDetail($readDetail)->result_array() as $items) {
            $output .=
                '<tr>
                <td>' . $i . ' </td>
                <td>' . $items['d_jual_barang_nama'] . ' </td>
                <td>' . $items['d_jual_barang_harjul'] . ' </td>
                <td>' . $items['d_jual_qty'] . ' </td>
                <td>' . $items['d_jual_diskon'] . ' </td>
                <td>' . $items['d_jual_total'] . ' </td>
            </tr>';
            $i++;
        }
        echo $output;
    }

    public function updateHutang()
    {
        $id = $this->input->post('jlStatus');

        $data = array(
            'jual_status' => '0',
        );

        $this->db->where('jual_nofak', $id);
        if ($this->db->update('tbl_jual', $data)) {
            echo json_encode("Sukses");
        }
    }

    private function getPetugas($id)
    {
        $this->db->where('user_id', $id);
        return $this->db->get('tbl_user')->result_array()[0]['user_nama'];
    }
}
