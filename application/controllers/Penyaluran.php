<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyaluran extends CI_Controller
{

    public function index()
    {
        $this->kecamatan();
    }

    public function kecamatan()
    {

        $kec_id = $this->uri->segment(3);
        $kec = $this->db->get('tb_kec')->result();
        $title = $this->input->get('kec_id');

        foreach ($kec as $row) {
            if ($row->id === $kec_id) {
                $title = $row->kec;
            }
        }



        $data = [
            'judul'         => $title ? $title : 'Penyaluran',
            // 'id_kec'        => $kec_id,
            'penyaluran'    => $this->Model_kpm->penyaluranAll()->result(),
            'user'          => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
        ];


        $this->load->view('app/header', $data);
        $this->load->view('app/topbar', $data);
        $this->load->view('app/sidebar');
        $this->load->view('penyaluran/index', $data);
        $this->load->view('app/footer');
    }




    // Admin
    public function kec()
    {

        $kec_id = $this->uri->segment(3);
        $kec = $this->db->get('tb_kec')->result();
        $title = $this->input->get('kec_id');

        foreach ($kec as $row) {
            if ($row->id === $title) {
                $title = $row->kec;
            }
        }



        $data = [
            'judul'         => $title ? $title : 'Penyaluran',
            // 'id_kec'        => $kec_id,
            'penyaluran'    => $this->Model_kpm->penyaluranAll()->result(),
            'user'          => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
        ];


        $this->load->view('app/header', $data);
        $this->load->view('app/topbar', $data);
        $this->load->view('app/sidebar');
        $this->load->view('penyaluran/index', $data);
        $this->load->view('app/footer');
    }

    public function tambah($id)
    {

        $kec_id = $this->uri->segment(3);
        $kec = $this->db->get('tb_kec')->result();
        $title = $this->input->get('kec_id');

        foreach ($kec as $row) {
            if ($row->id === $title) {
                $title = $row->kec;
            }
        }

        $data = [
            'judul'          => $title ? $title : 'Penyaluran',
            'id_kec'         => $kec_id,
            'penyaluran'     => $this->db->get_where('tb_penyaluran', ['id_penyaluran' => $id])->row(),
            'warongs'        => $this->Model_kpm->tampilDataWarong($kec_id)->result(),
            'user'           => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
        ];

        $this->form_validation->set_rules(
            'warong_id',
            'warong_id',
            'required|trim|numeric|is_unique[tb_penyaluran.warong_id]',
            [
                'required'      => 'Nama warong wajib disisi',
                'numeric'       => 'ktp harus angka !',
                'is_unique'     => 'Nama warong sudah terinput',
            ]
        );
        $this->form_validation->set_rules(
            'jumlah_kuota',
            'jumlah_kuota',
            'required',
            ['required' => 'Jumlah kuota wajib disisi']
        );


        if ($this->form_validation->run() == false) {
            $this->load->view('app/header', $data);
            $this->load->view('app/topbar', $data);
            $this->load->view('app/sidebar');
            $this->load->view('penyaluran/add', $data);
            $this->load->view('app/footer');
        } else {
            $this->Model_kpm->addPenyaluran();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
               Berhasil menambahkan data baru
              </div>');
            redirect('penyaluran/kecamatan/' . $kec_id);
        }
    }

    public function update($id, $kec)
    {

        date_default_timezone_set('asia/jakarta');
        $warong_id = $this->input->post('warong');


        $sql = "SELECT count('id') as jumlah FROM tb_kpm WHERE tb_kpm.kec_id = $kec AND tb_kpm.warong_id = $warong_id";
        $jumlah = $this->db->query($sql)->row();

        $jumlah_transaksi = $this->input->post('jumlah_transaksi');

        $this->db->where('id_penyaluran', $id);
        $this->db->set('kpm_id', $jumlah->jumlah);
        $this->db->set('jumlah_transaksi', $jumlah_transaksi);
        $this->db->set('tgl', date('Y-m-d H:i:s'));
        $this->db->update('tb_penyaluran');

        $this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">
       Berhasil mengupdate data <i class="fas fa-check-circle"></i>
      </div>');
        redirect('penyaluran/kecamatan/' . $kec);
    }

    public function edit($id, $kec)
    {

        $this->db->where('id_penyaluran', $id);
        $this->db->set('jumlah_kuota', $this->input->post('jumlah_kuota'));
        $this->db->update('tb_penyaluran');


        $this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">
       Berhasil mengedit data <i class="fas fa-check-circle"></i>
      </div>');
        redirect('penyaluran/kecamatan/' . $kec);
    }

    public function filter()
    {

        $data = [
            'judul'   => "Penyaluran",
            'user'    => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'kec'     => $this->db->get('tb_kec')->result()
        ];


        $this->load->view('app/header', $data);
        $this->load->view('app/topbar');
        $this->load->view('app/sidebar');
        $this->load->view('penyaluran/filter', $data);
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
            $value = "SELECT * 
            FROM tb_penyaluran 
            JOIN tb_kec
            ON (tb_penyaluran.kec_id    = tb_kec.id)
            JOIN tb_warong
            ON (tb_penyaluran.warong_id = tb_warong.id_warong)
            WHERE tb_penyaluran.kpm_id  != ''
            ORDER BY 'ASC'
            ";

            $data = [
                'judul'   => 'Penyaluran',
                'kec'     => $kec ? $title : 'Semua Kecamatan',
                'bulan'   => $bulan ? $bulan : 'kosong',
                'tahun'   => $tahun ? $tahun : 'kosong',
                'value'   => $this->db->query($value)->result()
            ];
        } else {
            if ($bulan == null and $tahun == null) {
                $value = "SELECT * 
                FROM tb_penyaluran 
                JOIN tb_kec
                ON (tb_penyaluran.kec_id    = tb_kec.id)
                JOIN tb_warong
                ON (tb_penyaluran.warong_id = tb_warong.id_warong)
                WHERE tb_penyaluran.kpm_id  != ''
                AND tb_penyaluran.kec_id = $kec
                ORDER BY 'ASC'
                ";


                $data = [
                    'judul'   => 'Penyaluran',
                    'kec'     => $kec ? $title : 'Semua Kecamatan',
                    'bulan'   => $bulan ? $bulan : 'kosong',
                    'tahun'   => $tahun ? $tahun : 'kosong',
                    'value'   => $this->db->query($value)->result()
                ];
            } elseif ($bulan == null and $kec == null) {

                $value = "SELECT * 
                FROM tb_penyaluran 
                JOIN tb_kec
                ON (tb_penyaluran.kec_id    = tb_kec.id)
                JOIN tb_warong
                ON (tb_penyaluran.warong_id = tb_warong.id_warong)
                WHERE tb_penyaluran.kpm_id  != ''
                AND YEAR(tgl) = $tahun
                ORDER BY 'ASC'
                ";

                $data = [
                    'judul'   => 'Penyaluran',
                    'kec'     => $kec ? $title : 'Semua Kecamatan',
                    'bulan'   => $bulan ? $bulan : 'kosong',
                    'tahun'   => $tahun ? $tahun : 'kosong',
                    'value'   => $this->db->query($value)->result()
                ];
            } elseif ($bulan == null) {

                $value = "SELECT *
                             FROM tb_penyaluran 
                JOIN tb_kec
                ON (tb_penyaluran.kec_id    = tb_kec.id)
                JOIN tb_warong
                ON (tb_penyaluran.warong_id = tb_warong.id_warong)
                WHERE tb_penyaluran.kpm_id  != ''
                AND YEAR(tgl) = $tahun
                            AND tb_penyaluran.kec_id    = $kec
                            ORDER BY 'ASC'
                            ";

                $data = [
                    'judul'   => 'Penyaluran',
                    'kec'     => $kec ? $title : 'Semua Kecamatan',
                    'bulan'   => $bulan ? $bulan : 'kosong',
                    'tahun'   => $tahun ? $tahun : 'kosong',
                    'value'   => $this->db->query($value)->result()
                ];
            } elseif ($tahun == null) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Tahun harus diisi !!!</i>
               </div>');
                redirect('penyaluran/filter');
            } elseif ($kec == null) {

                $value = "SELECT *
                             FROM tb_penyaluran 
                JOIN tb_kec
                ON (tb_penyaluran.kec_id    = tb_kec.id)
                JOIN tb_warong
                ON (tb_penyaluran.warong_id = tb_warong.id_warong)
                WHERE tb_penyaluran.kpm_id  != ''
                AND YEAR(tgl) = $tahun
                AND MONTH(tgl) = $bulan
                ORDER BY 'ASC'
                            ";

                $data = [
                    'judul'   => 'Penyaluran',
                    'kec'     => $kec ? $title : 'Semua Kecamatan',
                    'bulan'   => $bulan ? $bulan : 'kosong',
                    'tahun'   => $tahun ? $tahun : 'kosong',
                    'value'   => $this->db->query($value)->result()
                ];
            } else {
                $value = "SELECT *
                FROM tb_penyaluran 
   JOIN tb_kec
   ON (tb_penyaluran.kec_id    = tb_kec.id)
   JOIN tb_warong
   ON (tb_penyaluran.warong_id = tb_warong.id_warong)
   WHERE tb_penyaluran.kpm_id  != ''
   AND YEAR(tgl) = $tahun
   AND MONTH(tgl) = $bulan
   AND tb_penyaluran.kec_id = $kec
   ORDER BY 'ASC'
               ";

                $data = [
                    'judul'   => 'Penyaluran',
                    'kec'     => $kec ? $title : 'Semua Kecamatan',
                    'bulan'   => $bulan ? $bulan : 'kosong',
                    'tahun'   => $tahun ? $tahun : 'kosong',
                    'value'   => $this->db->query($value)->result()
                ];
            }
        }


        $this->load->view('penyaluran/cetak', $data);

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
