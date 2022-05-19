<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $data = [
            'judul'  => 'Login'
        ];

        $this->form_validation->set_rules('username', 'username', 'required', ['required' => 'Username wajib disisi']);
        $this->form_validation->set_rules('password', 'password', 'required', ['required' => 'Password wajib disisi']);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('app_login/header', $data);
            $this->load->view('app_login/login', $data);
            $this->load->view('app_login/footer');
        } else {
            $username      = $this->input->post('username');
            $password      = $this->input->post('password');

            $user = $this->db->get_where('tb_user', ['username' => $username])->row_array();

            if ($user) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'username'   => $user['username'],
                        'role_id'    => $user['role_id'],
                        'kec_id'     => $user['kec_id']
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
                        coba cek kembali role id anda !!!
                        </div>');
                            redirect('auth');
                            break;
                    }
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Password yang anda masukan salah !!!
              </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Mohon cek kembali username anda !!!
          </div>');
                redirect('auth');
            }
        }
    }

    public function register()
    {
        $data = [
            'judul'  => 'Register',
            'kec'    => $this->db->get('tb_kec')->result()
        ];

        $this->form_validation->set_rules('username', 'username', 'required',  ['required' => 'username wajib diisi']);
        $this->form_validation->set_rules('password1', 'password', 'required|matches[password2]', [
            'required' => 'password wajib diisi', 'matches' => 'password tidak cocok'
        ]);
        $this->form_validation->set_rules('password2', 'password', 'required|matches[password1]', [
            'required' => 'konfirmasi password wajib diisi', 'matches' => 'password tidak cocok'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('app_login/header', $data);
            $this->load->view('app_login/register', $data);
            $this->load->view('app_login/footer');
        } else {
            $data = array(
                'username'  => $this->input->post('username'),
                'password'  => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id'   => $this->input->post('role_id'),
                'kec_id'    => $this->input->post('kec_id')
            );
            $this->db->insert('tb_user', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Berhasil menambahkan data baru 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>');
            redirect('admin/user');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        Anda berhasil logout 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>');
        redirect('auth');
    }
}
