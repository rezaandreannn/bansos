<?php

class Model_kpm extends CI_Model
{
    public function tampilUsers()
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->join('tb_kec', 'tb_kec.id = tb_user.kec_id');
        $this->db->where('tb_user.role_id', 2);
        $query = $this->db->get();

        return $query;
    }

    public function all()
    {

        $sql = "SELECT *, YEAR(curdate()) - YEAR(tgl_lahir) as usia 
            FROM tb_kpm 
            JOIN tb_kec
            ON (tb_kpm.kec_id = tb_kec.id)";

        return $this->db->query($sql)->result();
    }

    public function allKpmbermasalah()
    {

        $sql = "SELECT *, YEAR(curdate()) - YEAR(tgl_lahir) as usia 
            FROM tb_kpm 
            JOIN tb_kec
            ON (tb_kpm.kec_id = tb_kec.id)
            JOIN tb_warong
            ON (tb_kpm.warong_id = tb_warong.id_warong)
            WHERE tb_kpm.status = 1
            ";

        return $this->db->query($sql)->result();
    }

    public function tampilDataKpm($kec_id)
    {
        $sql = "SELECT *, YEAR(curdate()) - YEAR(tgl_lahir) as usia 
            FROM tb_kpm 
            JOIN tb_kec
            ON (tb_kpm.kec_id = tb_kec.id)
            WHERE tb_kpm.kec_id = $kec_id 
            ";

        return $this->db->query($sql);
    }

    public function tampilDataKpmNon($kec_id)
    {

        $this->db->select('*');
        $this->db->from('tb_kpm');
        $this->db->join('tb_kec', 'tb_kec.id = tb_kpm.kec_id');
        $this->db->where('tb_kpm.kec_id', $kec_id);
        $this->db->where('tb_kpm.status', 0);
        $query = $this->db->get();

        return $query;
    }

    public function tampilDatakpmBermasalah($kec_id)
    {
        $this->db->select('*');
        $this->db->from('tb_kpm');
        $this->db->join('tb_kec', 'tb_kec.id = tb_kpm.kec_id');
        $this->db->join('tb_warong', 'tb_warong.id_warong = tb_kpm.warong_id');
        $this->db->where('tb_kpm.kec_id', $kec_id);
        $this->db->where('tb_kpm.status', 1);
        $query = $this->db->get();

        return $query;
    }

    // tampil data warong
    public function tampilDataWarong($kec_id)
    {

        $this->db->select('*');
        $this->db->from('tb_warong');
        $this->db->join('tb_kec', 'tb_kec.id = tb_warong.kec_id');
        $this->db->where('tb_warong.kec_id', $kec_id);
        $this->db->order_by('tb_warong.thn_berdiri', 'DESC');
        $query = $this->db->get();

        return $query;
    }

    // Penyaluran
    public function penyaluranAll()
    {
        $uri = $this->uri->segment(3);
        $kec_id = $this->input->get('kec_id');

        $this->db->select('*');
        $this->db->from('tb_penyaluran');
        $this->db->join('tb_warong', 'tb_warong.id_warong = tb_penyaluran.warong_id');
        // $this->db->join('tb_kpm', 'tb_kpm.id_kpm = tb_penyaluran.kpm_id');
        if ($kec_id != null) {
            $this->db->where('tb_penyaluran.kec_id', $kec_id);
        } elseif ($uri) {
            $this->db->where('tb_penyaluran.kec_id', $uri);
        }

        $query = $this->db->get();
        return $query;
    }
    public function addPenyaluran()
    {

        date_default_timezone_set('asia/jakarta');

        $kec = $this->uri->segment(3);
        $data = [
            'warong_id'         => $this->input->post('warong_id'),
            'kec_id'            =>  $kec,
            'kpm_id'            => null,
            'jumlah_kuota'      => $this->input->post('jumlah_kuota'),
            'jumlah_transaksi'  => null,
            'tgl'               => date('Y-m-d H:i:s')
        ];
        $this->db->insert('tb_penyaluran', $data);
    }


    // end penyaluran

    // hitung kpm bermasalah 
    public function hitungKpm()
    {

        $sql = "SELECT count('id') as jumlah FROM tb_kpm";

        return $this->db->query($sql)->row();
    }

    // hitung kpm bermaslah metro pusat
    public function hitungKpmMetroPusat()
    {

        $sql = "SELECT count('id') as jumlah FROM tb_kpm WHERE tb_kpm.kec_id = 1";
        return $this->db->query($sql)->row();
    }

    // hitung bermasalah berdasarkan warung
    public function updatePenyaluan()
    {
        $warong_id = $this->input->post('warong_id');

        $sql = "SELECT count('id') as jumlah FROM tb_kpm WHERE tb_kpm.kec_id = 1";
        return $this->db->query($sql)->row();
    }

    public function filters($value)
    {
        $sql = "SELECT *, YEAR(curdate()) - YEAR(tgl_lahir) as usia 
            FROM tb_kpm 
            JOIN tb_kec
            ON (tb_kpm.kec_id = tb_kec.id)
            WHERE tb_kpm.kec_id = $value
            ";

        return $this->db->query($sql);
    }
}
