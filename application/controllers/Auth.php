<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => "Halaman Login"
        ];

        $this->load->view('login', $data);
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tbl_user', ['user_username' => $username])->row_array();

        if ($user) {
            if (password_verify($password, $user['user_password'])) {

                if ($user['user_status'] === '0') {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User Tidak Active</div>');
                    redirect('auth');
                }

                $data = [
                    'id' => $user['user_id'],
                    'username' => $user['user_username'],
                    'nama' => $user['user_nama'],
                    'role' => $user['user_level'] == '1' ? 'admin' : 'user',
                    'status' => 'login',
                    'masuk' => TRUE,
                    'idadmin' => $user['user_id'],
                ];

                $this->session->set_userdata($data);

                if ($user['user_level'] === '1') {
                    $this->session->set_userdata('akses', '1');
                    redirect('dashboard');
                } else {
                    $this->session->set_userdata('akses', '2');
                    redirect('dashboard');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Salah Password !</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username Tidak Ditemukan !</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('status');
        $this->session->unset_userdata('akses');
        $this->session->unset_userdata('masuk');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses Logout !</div>');
        redirect('auth');
    }
}
