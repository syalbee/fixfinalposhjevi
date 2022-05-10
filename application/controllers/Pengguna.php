<?php
class Pengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url();
            redirect($url);
        };
        $this->load->model('m_pengguna');
    }

    public function index()
    {
        if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {
            $data = [
                'title' => "Pengguna",
                'toko' => "Toko Hj Evi",
                'nama' => $this->session->userdata('nama'),
            ];

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('admin/pengguna', $data);
        } else {
            echo "Halaman tidak ditemukan";
        }
    }


    public function read()
    {
        header('Content-type: application/json');
        $iterasi = 1;
        if ($this->m_pengguna->read()->num_rows() > 0) {
            foreach ($this->m_pengguna->read()->result() as $pengguna) {
                if ($pengguna->user_status != '0') {
                    $data[] = array(
                        'no' => $iterasi++,
                        'nama' => $pengguna->user_nama,
                        'username' => $pengguna->user_username,
                        'level' => $pengguna->user_level  == '1' ? 'Admin' : 'Kasir',
                        'status' => $pengguna->user_status  == '1' ? 'Aktif' : 'Tidak KAtif',
                        'action' => '<button class="btn btn-sm btn-warning" onclick="edit(' . $pengguna->user_id . ')"><i class="fas fa-edit"></i></button> <button class="btn btn-sm btn-danger" onclick="remove(' . $pengguna->user_id . ')"><i class="fas fa-trash"></i></button>'
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
            'user_nama' => $this->input->post('addnama'),
            'user_password' => password_hash($this->input->post('addpassword'), PASSWORD_DEFAULT),
            'user_username' => $this->input->post('addusername'),
            'user_level' => $this->input->post('addlevel'),
            'user_status' => '1'
        );

        if ($this->m_pengguna->create($data)) {
            echo json_encode('sukses');
        }
    }

    public function get_pengguna()
    {
        $id = $this->input->post('id');
        $pengguna = $this->m_pengguna->getPengguna($id);
        if ($pengguna->row()) {
            echo json_encode($pengguna->row());
        }
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $password = "";

        if (empty($this->input->post('edtpassword')) || $this->input->post('edtpassword') === "") {
            $password =  $this->input->post('Etpassword');
        } else {
            $password =  password_hash($this->input->post('edtpassword'), PASSWORD_DEFAULT);
        }

        $data = array(
            'user_nama' => $this->input->post('edtnama'),
            'user_username' => $this->input->post('edtusername'),
            'user_password' => $password,
            'user_level' => $this->input->post('edtlevel'),
            'user_status' => '1'
        );

        if ($this->m_pengguna->update($id, $data)) {
            echo json_encode('sukses');
        }
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $data = array(
            'user_status' => '0'
        );

        if ($this->m_pengguna->update($id, $data)) {
            echo json_encode('sukses');
        }
    }
}
