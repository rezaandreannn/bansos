<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function index()
    {
        $data =
            [
                'judul'  => 'Dashboard',
                'user'   => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
                'kpm'    => $this->Model_kpm->hitungKpm()
            ];


        $this->load->view('app/header', $data);
        $this->load->view('app/topbar', $data);
        $this->load->view('app/sidebar');
        $this->load->view('app/content', $data);
        $this->load->view('app/footer');
    }

    public function user()
    {
        $data =
            [
                'judul'  => 'User',
                'user'   => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
                'users'  => $this->Model_kpm->tampilUsers()->result()

            ];

        $this->load->view('app/header', $data);
        $this->load->view('app/topbar', $data);
        $this->load->view('app/sidebar');
        $this->load->view('admin/user', $data);
        $this->load->view('app/footer');
    }
}
