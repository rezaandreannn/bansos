<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kpm extends CI_Controller
{



    public function index()
    {
        $this->kec();
    }

    public function all()
    {
        $data =
            [
                'judul'  => 'Semua Data Kpm',
                'user'   => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
                'kpm'   => $this->Model_kpm->all()
            ];

        $this->load->view('app/header', $data);
        $this->load->view('app/topbar', $data);
        $this->load->view('app/sidebar');
        $this->load->view('kpm/all', $data);
        $this->load->view('app/footer');
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
            'judul'  => $title,
            'id_kec' => $kec_id,
            'kpm'    => $this->Model_kpm->tampilDataKpm($kec_id)->result(),
            'user'   => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
        ];

        $this->load->view('app/header', $data);
        $this->load->view('app/topbar');
        $this->load->view('app/sidebar');
        $this->load->view('kpm/index', $data);
        $this->load->view('app/footer');
    }

    public function tambah($kpm_kec)
    {

        date_default_timezone_set('asia/jakarta');

        $this->form_validation->set_rules(
            'ktp',
            'ktp',
            'required|trim|numeric|is_unique[tb_kpm.ktp]|min_length[14]',
            [
                'required'      => 'ktp wajib disisi',
                'numeric'       => 'ktp harus angka !',
                'is_unique'     => 'ktp tidak boleh sama',
                'min_length'    => 'ktp harus 16 karakter'
            ]
        );
        $this->form_validation->set_rules(
            'nama_kpm',
            'nama_kpm',
            'required',
            ['required' => 'Nama wajib disisi']
        );
        $this->form_validation->set_rules(
            'tgl_lahir',
            'tgl_lahir',
            'required',
            ['required' => 'Tanggal lahir wajib disisi']
        );
        $this->form_validation->set_rules(
            'alamat',
            'alamat',
            'required',
            ['required' => 'Alamat wajib disisi']
        );



        $data = [
            'ktp'       => $this->input->post('ktp'),
            'nama_kpm'  => $this->input->post('nama_kpm'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'alamat'    => $this->input->post('alamat'),
            'kec_id'    => $kpm_kec,
            'tgl_buat'  => date('Y-m-d H:i:s'),
            'tgl_edit'  => date('Y-m-d H:i:s')
        ];

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            gagal menambahkan data baru
           </div>');
            redirect('kpm/kec/' . $kpm_kec);
        } else {
            $this->db->insert('tb_kpm', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
           Berhasil menambahkan data baru
          </div>');
            redirect('kpm/kec/' . $kpm_kec);
        }
    }

    public function edit($id, $kpm_kec)
    {

        date_default_timezone_set('asia/jakarta');

        $this->form_validation->set_rules(
            'ktp',
            'ktp',
            'required|trim|numeric|min_length[2]',
            [
                'required'      => 'ktp wajib disisi',
                'numeric'       => 'ktp harus angka !',
                // 'is_unique'     => 'ktp tidak boleh sama',
                'min_length'    => 'ktp harus 16 karakter'
            ]
        );
        $this->form_validation->set_rules(
            'nama_kpm',
            'nama_kpm',
            'required',
            ['required' => 'Nama wajib disisi']
        );
        $this->form_validation->set_rules(
            'tgl_lahir',
            'tgl_lahir',
            'required',
            ['required' => 'Tanggal lahir wajib disisi']
        );
        $this->form_validation->set_rules(
            'alamat',
            'alamat',
            'required',
            ['required' => 'Alamat wajib disisi']
        );

        $data = [
            'ktp'       => $this->input->post('ktp'),
            'nama_kpm'  => $this->input->post('nama_kpm'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'alamat'    => $this->input->post('alamat'),
            'kec_id'    => $kpm_kec,
            'tgl_edit'  => date('Y-m-d H:i:s')
        ];

        if ($this->form_validation->run() == false) {
            redirect('kpm/kec/' . $kpm_kec);
        } else {
            $this->db->where('id_kpm', $id);
            $this->db->update('tb_kpm', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">
           Berhasil mengubah data kpm
          </div>');
            redirect('kpm/kec/' . $kpm_kec);
        }
    }

    public function hapus($id, $kpm_kec)
    {
        $this->db->where('id_kpm', $id);
        $this->db->delete('tb_kpm');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
        Berhasil menghapus data kpm
       </div>');
        redirect('kpm/kec/' . $kpm_kec);
    }
}
