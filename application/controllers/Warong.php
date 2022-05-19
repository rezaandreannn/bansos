<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Warong extends CI_Controller
{

    public function index()
    {
        $this->kec();
    }

    public function kec()
    {

        $kec_id = $this->uri->segment(3);
        $kec = $this->db->get('tb_kec')->result();

        foreach ($kec as $row) {
            if ($row->id === $kec_id) {
                $title = $row->kec;
            }
        }


        $data = [
            'judul'      => $title,
            'id_kec'     => $kec_id,
            'warongs'    => $this->Model_kpm->tampilDataWarong($kec_id)->result(),
            'user'       => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
        ];

        $this->load->view('app/header', $data);
        $this->load->view('app/topbar');
        $this->load->view('app/sidebar');
        $this->load->view('warong/index', $data);
        $this->load->view('app/footer');
    }

    public function tambah($kpm_kec)
    {

        $this->form_validation->set_rules(
            'nama_warong',
            'nama_warong',
            'required|trim',
            [
                'required'      => 'Nama warong wajib disisi',
            ]
        );
        $this->form_validation->set_rules(
            'alamat',
            'alamat',
            'required',
            ['required' => 'Alamat wajib disisi']
        );
        $this->form_validation->set_rules(
            'nama_ketua',
            'nama_ketua',
            'required',
            ['required' => 'Nama ketua wajib disisi']
        );
        $this->form_validation->set_rules(
            'thn_berdiri',
            'thn_berdiri',
            'required',
            ['required' => 'Tahun berdiri wajib disisi']
        );

        $data = [
            'nama_warong'   => $this->input->post('nama_warong'),
            'alamat'        => $this->input->post('alamat'),
            'nama_ketua'    => $this->input->post('nama_ketua'),
            'thn_berdiri'   => $this->input->post('thn_berdiri'),
            'kec_id'        => $kpm_kec,
        ];

        if ($this->form_validation->run() == false) {
            redirect('warong/kec/' . $kpm_kec);
        } else {
            $this->db->insert('tb_warong', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
           Berhasil menambahkan data warong baru
          </div>');
            redirect('warong/kec/' . $kpm_kec);
        }
    }

    public function edit($id, $kpm_kec)
    {

        $this->form_validation->set_rules(
            'nama_warong',
            'nama_warong',
            'required|trim',
            [
                'required'      => 'Nama warong wajib disisi',
            ]
        );
        $this->form_validation->set_rules(
            'alamat',
            'alamat',
            'required',
            ['required' => 'Alamat wajib disisi']
        );
        $this->form_validation->set_rules(
            'nama_ketua',
            'nama_ketua',
            'required',
            ['required' => 'Nama ketua wajib disisi']
        );
        $this->form_validation->set_rules(
            'thn_berdiri',
            'thn_berdiri',
            'required',
            ['required' => 'Tahun berdiri wajib disisi']
        );

        $data = [
            'nama_warong' => $this->input->post('nama_warong'),
            'alamat'      => $this->input->post('alamat'),
            'nama_ketua'  => $this->input->post('nama_ketua'),
            'thn_berdiri' => $this->input->post('thn_berdiri'),
            'kec_id'      => $kpm_kec,
        ];

        if ($this->form_validation->run() == false) {
            redirect('warong/kec/' . $kpm_kec);
        } else {
            $this->db->where('id_warong', $id);
            $this->db->update('tb_warong', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">
           Berhasil mengubah data warong 
          </div>');
            redirect('warong/kec/' . $kpm_kec);
        }
    }

    public function hapus($id, $kpm_kec)
    {
        $this->db->where('id_warong', $id);
        $this->db->delete('tb_warong');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
        Berhasil menghapus data warong
       </div>');
        redirect('warong/kec/' . $kpm_kec);
    }
}
