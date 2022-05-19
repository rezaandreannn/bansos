<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function index()
	{



		$data =
			[
				'judul'  => 'Dashboard',
				'user'   => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
				// 'countAll' => $this->Model_kpm->hitungKpm(),
				// 'metropusat' => $this->Model_kpm->hitungKpmMetroPusat()
			];

		$this->load->view('app/header', $data);
		$this->load->view('app/topbar', $data);
		$this->load->view('app/sidebar');
		$this->load->view('dashboard-user', $data);
		$this->load->view('app/footer');
	}
}
