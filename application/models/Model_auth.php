<?php

class Model_auth extends CI_Model
{

    public function cek_login()
    {
        $username      = $this->input->post('username');
        $password   = $this->input->post('password');

        $user = $this->db->get_where('tb_user', ['username' => $username])->row_array();

        if ($user) {
            //cek password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email'   => $user['username'],
                    'role_id' => $user['role_id'],
                ];
                //simpan data
                $this->session->set_userdata($data);
                //memisahkan yang login berdasarkan role id
                switch ($user['role_id']) {
                    case '1':
                        redirect('admin');
                        break;
                    case '2':
                        redirect('welcome');
                        break;
                    default:
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                        coba cek kembali role id anda
                        </div>');
                        redirect('auth');
                        break;
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Password yang anda masukan salah !
              </div>');
                redirect('auth');
            }
        }
    }
}
