<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
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
		$this->load->model('m_penjualan');
		$this->load->model('m_pelanggan');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {
			$data = [
				'title' => "Penjualan Eceran",
				'toko' => $this->db->get('tbl_toko')->result_array()[0]['nama'],
				'nama' => $this->session->userdata('nama'),
			];

			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('admin/penjualan', $data);
		} else {
			echo "Halaman tidak ditemukan";
		}
	}

	public function get_barang()
	{
		if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {
			$kobar = $this->input->post('kode_brg');
			$barang = $this->m_barang->get_beliEceran($kobar);
			if ($barang->row()) {
				echo json_encode($barang->row());
			}
		} else {
			echo "Halaman tidak ditemukan";
		}
	}

	public function ambil_barang()
	{
		if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {
			$kobar = $this->input->post('kode_brg');
			$x['brg'] = $this->m_barang->get_beli($kobar);
			$this->load->view('penjualan/v_detail_barang_jual', $x);
		} else {
			echo "Halaman tidak ditemukan";
		}
	}

	public function get_barangkg()
	{
		$id = $this->input->post('kode_brg');
		$barang = $this->m_barang->get_beli($id);
		if ($barang->row()) {
			echo json_encode($barang->row());
		}
	}

	public function add_to_cart()
	{

		if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {
			$kobar = $this->input->post('kode_brg');
			$produk = $this->m_barang->get_beli($kobar);

			$i = $produk->row_array();

			$data = array(
				'id'       => $i['barang_id'],
				'name'     => $i['barang_nama'],
				'satuan'   => $i['barang_satuan'],
				'harpok'   => $i['barang_harpok'],
				'price'    => intval($i['barang_harjul']),
				'disc'     => 0,
				'qty'      => 1,
				'amount'	=> intval($i['barang_harjul'])
			);

			if ($this->cart->insert($data)) {
				echo json_encode('sukses');
			}
		} else {
			echo "Halaman tidak ditemukan";
		}
	}

	public function add_to_cart_kilo()
	{

		if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {
			
			$kobar = $this->input->post('idkg');
			$produk = $this->m_barang->get_beli($kobar);

			$i = $produk->row_array();

			$data = array(
				'id'       => $i['barang_id'],
				'name'     => $i['barang_nama'],
				'satuan'   => $i['satuan_turunan'],
				'harpok'   => $i['barang_harpok_eceran'],
				'price'    => intval($i['barang_harjul']),
				'disc'     => 0,
				'qty'      => $this->input->post('kgqty'),
				'amount'	=> intval($i['barang_harjul'])
			);

			if ($this->cart->insert($data)) {
				echo json_encode('sukses');
			}
		} else {
			echo "Halaman tidak ditemukan";
		}
	}

	public function read()
	{
		$output = '';
		$i = 1;
		foreach ($this->cart->contents() as $items) {
			echo form_hidden($i . '[rowid]', $items['rowid']);

			$output .=
				'<tr>
                <input type="hidden" id="BRGiD" name="BRGiD" value="' . $items['rowid'] . '">
                <input type="hidden" id="BRGprice" name="BRGprice" value="' . $items['amount'] . '">
                <td>' . $items['id'] . ' </td>
                <td>' . $items['name'] . ' </td>
                <td style="text-align:center;">' . $items['satuan'] . ' </td>
                <td style="text-align:right;">' . number_format($items['amount']) . ' </td>
                <td><input type="text" id="etdisc" onkeydown="search(this)" name="ETdiskon" value="' . $items['disc'] . '" class="form-control input-sm" style="width:130px;margin-right:5px;" required></td>
                <td><input type="text" id="etqty" onkeydown="search(this)" name="ETqty" value=" ' . $items['qty'] . '" class="form-control input-sm" style="width:90px;margin-right:5px;" required></td>
                <td style="text-align:right;">' . number_format($items['subtotal']) . ' </td>
                <td style="text-align:center;">
                <button id="' . $items['rowid'] . '"  class="edit_cart btn btn-warning btn-xs">Edt</button>
                <button id="' . $items['rowid'] . '"  class="hapus_cart btn btn-danger btn-xs">Hps</button>
            </td>
            </tr>
            ';
			$i++;
		}
		echo $output;
	}

	public function remove()
	{
		$this->cart->update(array(
			'rowid' => $this->input->post('row_id'),
			'qty' => 0
		));
	}

	public function edit()
	{
		$qty = $this->input->post('qty');
		$diskon = $this->input->post('diskon');
		$price = $this->input->post('price');
		$this->cart->update(array(
			'rowid' => $this->input->post('row_id'),
			'qty' => $qty,
			'price' => $price - $diskon,
			'disc' => $diskon
		));
	}

	public function simpan_penjualan()
	{
		if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {
			$total = $this->input->post('total');
			$pesan = $this->input->post('message');
			$stsBayar = $this->input->post('setTotal');

			if (empty($stsBayar)) {
				$stsBayar = '0';
			} else {
				$stsBayar = '1';
			}

			if (!empty($this->input->post('pelanggan')) || $this->input->post('pelanggan') != "" || $this->input->post('pelanggan') != null) {
				$this->db->where('kode', $this->input->post('pelanggan'));
				$pelanggan = $this->db->get('tbl_member')->result_array()[0]['id'];
				$this->setPoint($this->input->post('pelanggan'), $total);
			} else {
				$pelanggan = false;
			}

			$jml_uang = str_replace(",", "", $this->input->post('jml_uang'));
			$kembalian = $jml_uang - $total;
			if (!empty($total) && !empty($jml_uang)) {
				if ($jml_uang < $total) {
					echo $this->session->set_flashdata('msg', '<label class="label label-danger">Jumlah Uang yang anda masukan Kurang</label>');
					redirect('penjualan');
				} else {
					$nofak = $this->m_penjualan->get_nofak();
					$this->session->set_userdata('nofak', $nofak);
					$order_proses = $this->m_penjualan->simpan_penjualan($nofak, $total, $jml_uang, $kembalian, $pelanggan, $pesan, $stsBayar);
					if ($order_proses) {
						$this->cart->destroy();

						$this->session->unset_userdata('tglfak');
						$this->session->unset_userdata('nofak');
						$this->session->unset_userdata('suplier');
						$this->session->set_flashdata('msgpenjualan', $nofak);

						// redirect('cetak/struk/' . $nofak);
						$data = [
							'title' => "Penjualan",
							'toko' => "Toko Hj Evi",
							'nama' => $this->session->userdata('nama'),
							'token' => $nofak,
							'jenis' => 'eceran'
						];
						$this->load->view('template/header', $data);
						$this->load->view('template/sidebar', $data);
						$this->load->view('penjualan/alert_sukses', $data);
						// $this->load->view('admin/alert/alert_sukses');

					} else {
						redirect('penjualan');
					}
				}
			} else {
				echo $this->session->set_flashdata('msg', '<label class="label label-danger">Penjualan Gagal di Simpan, Mohon Periksa Kembali Semua Inputan Anda!</label>');
				redirect('penjualan');
			}
		} else {
			echo "Halaman tidak ditemukan";
		}
	}

	public function readtotal()
	{
		echo $this->cart->total();
	}

	private function setPoint($id, $totalBelanja)
	{
		$pelanggan = $this->m_pelanggan->getPoint($id);
		$toko =  $this->db->get('tbl_toko')->row();

		$point = $pelanggan->point;
		$minUang = $toko->jumUang;
		$pointKelipatan = round($totalBelanja / $minUang);

		if ($totalBelanja >= $minUang) {
			$hasilPoint = $toko->point * $pointKelipatan;
			$this->m_pelanggan->setPoint($id, $hasilPoint + $point);
		}
	}

	public function coba()
	{
		$this->cart->destroy();
		// // foreach ($this->cart->contents() as $items) {
		// // 	echo $items['name'] . "<br>";
		// // 	echo $items['qty'] . "<br>";

		// // 	echo $items['rowid'] . "<br>";
		// // }

		// $kobar = "BR000011";
		// $x['brg'] = $this->m_barang->get_beli($kobar);
		// $Kgid = $this->db->query('SELECT satuan_id FROM tbl_satuan WHERE satuan_nama ="Kg"')->result_array()[0]['satuan_id'];

		// if ($x['brg']->result_array()[0]['barang_satuan_id'] === $Kgid) {
		// 	echo "berhasil";
		// } else {
		// 	echo "lain";
		// }

		// $this->db->where('id', '12');
		// $data = $this->db->get('tbl_member');
		// echo json_encode($data->row());

		// $id = "BR000003";
		// $qty = 3;
		// $this->db->where('barang_id', $id);
		// $qtyBarang = $this->db->get('tbl_barang')->result_array()[0]['barang_min_stok'];

		// echo $qty / $qtyBarang;
	}
}
