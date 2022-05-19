<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kpmBermasalah extends CI_Controller
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
            'judul'   => $title,
            'id_kec'  => $kec_id,
            'kpmM'    => $this->Model_kpm->tampilDatakpmNon($kec_id)->result(),
            'kpm'     => $this->Model_kpm->tampilDatakpmBermasalah($kec_id)->result(),
            'warongs' => $this->Model_kpm->tampilDataWarong($kec_id)->result(),
            'user'    => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
        ];

        $this->load->view('app/header', $data);
        $this->load->view('app/topbar');
        $this->load->view('app/sidebar');
        $this->load->view('kpm/index', $data);
        $this->load->view('app/footer');
    }

    public function hapus($id, $kpm_kec)
    {
        $this->db->where('id_kpm', $id);
        $this->db->set('keterangan', null);
        $this->db->set('status', 0);
        $this->db->set('warong_id', null);
        $this->db->update('tb_kpm');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
       Berhasil menghapus data <i class="fas fa-check-circle"></i>
      </div>');
        redirect('kpmbermasalah/kec/' . $kpm_kec);
    }

    public function tambah($kpm_kec)
    {
        date_default_timezone_set('asia/jakarta');

        $this->form_validation->set_rules(
            'id_kpm',
            'id_kpm',
            'required',
            ['required' => 'Nama kpm wajib disisi']
        );
        $this->form_validation->set_rules(
            'warong_id',
            'warong_id',
            'required',
            ['required' => 'Nama Warong wajib disisi']
        );
        $this->form_validation->set_rules(
            'keterangan',
            'keterangan',
            'required',
            ['required' => 'Keterangan wajib disisi']
        );


        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Gagal menambahkan data  <i class="fas fa-check-circle"></i>
           </div>');
            $this->add();
        } else {
            $this->db->where('id_kpm', $this->input->post('id_kpm'));
            $this->db->set('status', 1);
            $this->db->set('warong_id', $this->input->post('warong_id'));
            $this->db->set('keterangan', $this->input->post('keterangan'));
            $this->db->set('tgl_edit', date('Y-m-d H:i:s'));
            $this->db->update('tb_kpm');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
           Berhasil menambahkan data baru <i class="fas fa-check-circle"></i>
          </div>');
            redirect('kpmbermasalah/kec/' . $kpm_kec);
        }
    }

    public function edit($id, $kpm_kec)
    {
        date_default_timezone_set('asia/jakarta');

        $this->form_validation->set_rules(
            'keterangan',
            'keterangan',
            'required',
            ['required' => 'Keterangan wajib disisi']
        );


        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            gagal
           </div>');
            redirect('kpmbermasalah/kec/' . $kpm_kec);
        } else {
            $this->db->where('id_kpm', $this->input->post('id_kpm'));
            $this->db->set('keterangan', $this->input->post('keterangan'));
            $this->db->set('tgl_edit', date('Y-m-d H:i:s'));
            $this->db->update('tb_kpm');
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">
           Berhasil mengubah data kpm bermasalah <i class="fas fa-check-circle"></i>
          </div>');
            redirect('kpmbermasalah/kec/' . $kpm_kec);
        }
    }

    public function add()
    {
        $kec_id = $this->uri->segment(3);
        $kec = $this->db->get('tb_kec')->result();

        foreach ($kec as $row) {
            if ($row->id === $kec_id) {
                $title = $row->kec;
            }
        }

        $data = [
            'judul'   => $title,
            'id_kec'  => $kec_id,
            'kpmM'    => $this->Model_kpm->tampilDatakpmNon($kec_id)->result(),
            'kpm'     => $this->Model_kpm->tampilDatakpmBermasalah($kec_id)->result(),
            'warongs' => $this->Model_kpm->tampilDataWarong($kec_id)->result(),
            'user'    => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
        ];

        $this->load->view('app/header', $data);
        $this->load->view('app/topbar');
        $this->load->view('app/sidebar');
        $this->load->view('kpm/add-kpm-bermasalah', $data);
        $this->load->view('app/footer');
    }

    public function filter()
    {

        $data = [
            'judul'   => "KPM Bermasalah",
            'user'    => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'kec'     => $this->db->get('tb_kec')->result()
        ];


        $this->load->view('app/header', $data);
        $this->load->view('app/topbar');
        $this->load->view('app/sidebar');
        $this->load->view('kpm/filter', $data);
        $this->load->view('app/footer');
    }

    public function cetak()
    {
        // $this->load->library('dompdf_gen');

        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $kec   = $this->input->post('kec');

        $kec_id = $this->db->get('tb_kec')->result();

        foreach ($kec_id as $row) {
            if ($row->id === $kec) {
                $title = $row->kec;
            }
        }

        if ($bulan == null and $tahun == null and $kec == null) {
            $data = [
                'judul'   => 'Kpm Bermasalah',
                'kec'     => $kec ? $title : 'Semua Kecamatan',
                'bulan'   => $bulan ? $bulan : 'kosong',
                'tahun'   => $tahun ? $tahun : 'kosong',
                'value'   => $this->Model_kpm->allKpmbermasalah()
            ];
        } else {
            if ($bulan == null and $tahun == null) {
                $value = "SELECT *, YEAR(curdate()) - YEAR(tgl_lahir) as usia 
                            FROM tb_kpm 
                            JOIN tb_kec
                            ON (tb_kpm.kec_id    = tb_kec.id)
                            JOIN tb_warong
                            ON (tb_kpm.warong_id = tb_warong.id_warong)
                            WHERE tb_kpm.kec_id  = $kec
                            AND tb_kpm.status    = 1
                            ";

                $data = [
                    'judul'   => 'Kpm Bermasalah',
                    'kec'     => $kec ? $title : 'Semua Kecamatan',
                    'bulan'   => $bulan ? $bulan : 'kosong',
                    'tahun'   => $tahun ? $tahun : 'kosong',
                    'value'   => $this->db->query($value)->result()
                ];
            } elseif ($bulan == null and $kec == null) {

                $value = "SELECT *, YEAR(curdate()) - YEAR(tgl_lahir) as usia 
                            FROM tb_kpm 
                            JOIN tb_kec
                            ON (tb_kpm.kec_id    = tb_kec.id)
                            JOIN tb_warong
                            ON (tb_kpm.warong_id = tb_warong.id_warong)
                            WHERE YEAR(tgl_buat) = $tahun
                            AND tb_kpm.status    = 1
                            ";

                $data = [
                    'judul'   => 'Kpm Bermasalah',
                    'kec'     => $kec ? $title : 'Semua Kecamatan',
                    'bulan'   => $bulan ? $bulan : 'kosong',
                    'tahun'   => $tahun ? $tahun : 'kosong',
                    'value'   => $this->db->query($value)->result()
                ];
            } elseif ($bulan == null) {

                $value = "SELECT *, YEAR(curdate()) - YEAR(tgl_lahir) as usia 
                            FROM tb_kpm 
                            JOIN tb_kec
                            ON (tb_kpm.kec_id    = tb_kec.id)
                            JOIN tb_warong
                            ON (tb_kpm.warong_id = tb_warong.id_warong)
                            WHERE YEAR(tgl_buat) = $tahun
                            AND tb_kpm.kec_id    = $kec
                            AND tb_kpm.status    = 1
                            ";

                $data = [
                    'judul'   => 'Kpm Bermasalah',
                    'kec'     => $kec ? $title : 'Semua Kecamatan',
                    'bulan'   => $bulan ? $bulan : 'kosong',
                    'tahun'   => $tahun ? $tahun : 'kosong',
                    'value'   => $this->db->query($value)->result()
                ];
            } elseif ($tahun == null) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Tahun harus diisi !!!</i>
               </div>');
                redirect('kpmbermasalah/filter');
            } elseif ($kec == null) {

                $value = "SELECT *, YEAR(curdate()) - YEAR(tgl_lahir) as usia 
                            FROM tb_kpm 
                            JOIN tb_kec
                            ON (tb_kpm.kec_id    = tb_kec.id)
                            JOIN tb_warong
                            ON (tb_kpm.warong_id = tb_warong.id_warong)
                            WHERE YEAR(tgl_buat) = $tahun
                            AND MONTH(tgl_buat)  = $bulan
                            AND tb_kpm.status    = 1
                            ";

                $data = [
                    'judul'   => 'Kpm Bermasalah',
                    'kec'     => $kec ? $title : 'Semua Kecamatan',
                    'bulan'   => $bulan ? $bulan : 'kosong',
                    'tahun'   => $tahun ? $tahun : 'kosong',
                    'value'   => $this->db->query($value)->result()
                ];
            } else {
                $value = "SELECT *, YEAR(curdate()) - YEAR(tgl_lahir) as usia 
                            FROM tb_kpm 
                            JOIN tb_kec
                            ON (tb_kpm.kec_id       = tb_kec.id)
                            JOIN tb_warong
                            ON (tb_kpm.warong_id    = tb_warong.id_warong)
                            WHERE YEAR(tgl_buat)    = $tahun
                            AND MONTH(tgl_buat)     = $bulan
                            AND tb_kpm.kec_id       = $kec
                            AND tb_kpm.status       = 1
                            ";

                $data = [
                    'judul'   => 'Kpm Bermasalah',
                    'kec'     => $kec ? $title : 'Semua Kecamatan',
                    'bulan'   => $bulan ? $bulan : 'kosong',
                    'tahun'   => $tahun ? $tahun : 'kosong',
                    'value'   => $this->db->query($value)->result()
                ];
            }
        }


        $this->load->view('kpm/cetak', $data);

        // $paper = 'A4';
        // $orientasi = 'lanscape';
        // $html = $this->output->get_output();
        // $this->dompdf->set_paper($paper, $orientasi);

        // $this->dompdf->load_html($html);
        // $this->dompdf->render();
        // $this->dompdf->stream("laporan_rekam_medis.pdf", [
        //     'attachment' => 0
        // ]);
    }
}
