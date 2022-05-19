<div class="content-body">

    <div class="container mt-3">
        <div class="row">

            <?php
            // query
            // hitung total
            $pusat      = "SELECT count('id') as jumlah FROM tb_kpm WHERE tb_kpm.kec_id = 1";
            $timur      = "SELECT count('id') as jumlah FROM tb_kpm WHERE tb_kpm.kec_id = 2";
            $barat      = "SELECT count('id') as jumlah FROM tb_kpm WHERE tb_kpm.kec_id = 3";
            $utara      = "SELECT count('id') as jumlah FROM tb_kpm WHERE tb_kpm.kec_id = 4";
            $selatan    = "SELECT count('id') as jumlah FROM tb_kpm WHERE tb_kpm.kec_id = 5";
            $metroPusatAll   = $this->db->query($pusat)->row();
            $metroTimurAll   = $this->db->query($timur)->row();
            $metroBaratAll   = $this->db->query($barat)->row();
            $metroUtaraAll   = $this->db->query($utara)->row();
            $metroSelatanAll = $this->db->query($selatan)->row();

            // hitung yang bermasalah
            $mp = "SELECT count('id') as masalah FROM tb_kpm WHERE tb_kpm.kec_id = 1 AND tb_kpm.status = 1";
            $mt = "SELECT count('id') as masalah FROM tb_kpm WHERE tb_kpm.kec_id = 2 AND tb_kpm.status = 1";
            $mb = "SELECT count('id') as masalah FROM tb_kpm WHERE tb_kpm.kec_id = 3 AND tb_kpm.status = 1";
            $mu = "SELECT count('id') as masalah FROM tb_kpm WHERE tb_kpm.kec_id = 4 AND tb_kpm.status = 1";
            $ms = "SELECT count('id') as masalah FROM tb_kpm WHERE tb_kpm.kec_id = 5 AND tb_kpm.status = 1";
            $metroPusatBermasalah   = $this->db->query($mp)->row();
            $metroTimurBermasalah   = $this->db->query($mt)->row();
            $metroBaratBermasalah   = $this->db->query($mb)->row();
            $metroUtaraBermasalah   = $this->db->query($mu)->row();
            $metroSelatanBermasalah = $this->db->query($ms)->row();

            // $persen = $jumlah->jumlah - $metropusat->masalah;
            ?>
            <!-- metro pusat -->
            <?php if ($this->session->userdata('kec_id') === '1') : ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-4">
                        <div class="card-body">
                            <h3 class="card-title text-white">KPM</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white"><?= $metroPusatAll->jumlah; ?></h2>
                                <p class="text-white mb-0"><?= date('d-m-Y'); ?></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fas fa-fw fa-server mr-1"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-3">
                        <div class="card-body">
                            <h3 class="card-title text-white">Kpm Bermasalah</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white"><?= $metroPusatBermasalah->masalah; ?></h2>
                                <p class="text-white mb-0"><?= date('d-m-Y'); ?></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fas fa-fw fa-exclamation-triangle mr-1"></i></span>
                        </div>
                    </div>
                </div>

                <!-- metro pusat end -->
                <!-- metro timur -->
            <?php elseif ($this->session->userdata('kec_id') === '2') : ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-4">
                        <div class="card-body">
                            <h3 class="card-title text-white">KPM</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white"><?= $metroTimurAll->jumlah; ?></h2>
                                <p class="text-white mb-0"><?= date('d-m-Y'); ?></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fas fa-fw fa-server mr-1"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-3">
                        <div class="card-body">
                            <h3 class="card-title text-white">Kpm Bermasalah</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white"><?= $metroTimurBermasalah->masalah; ?></h2>
                                <p class="text-white mb-0"><?= date('d-m-Y'); ?></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fas fa-fw fa-exclamation-triangle mr-1"></i></span>
                        </div>
                    </div>
                </div>
                <!-- metro timur end -->
                <!-- metro barat -->
            <?php elseif ($this->session->userdata('kec_id') === '3') : ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-4">
                        <div class="card-body">
                            <h3 class="card-title text-white">KPM</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white"><?= $metroBaratAll->jumlah; ?></h2>
                                <p class="text-white mb-0"><?= date('d-m-Y'); ?></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fas fa-fw fa-server mr-1"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-3">
                        <div class="card-body">
                            <h3 class="card-title text-white">Kpm Bermasalah</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white"><?= $metroBaratBermasalah->masalah; ?></h2>
                                <p class="text-white mb-0"><?= date('d-m-Y'); ?></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fas fa-fw fa-exclamation-triangle mr-1"></i></span>
                        </div>
                    </div>
                </div>
                <!-- metro barat end -->
                <!-- metro utara -->
            <?php elseif ($this->session->userdata('kec_id') === '4') : ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-4">
                        <div class="card-body">
                            <h3 class="card-title text-white">KPM</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white"><?= $metroUtaraAll->jumlah; ?></h2>
                                <p class="text-white mb-0"><?= date('d-m-Y'); ?></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fas fa-fw fa-server mr-1"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-3">
                        <div class="card-body">
                            <h3 class="card-title text-white">Kpm Bermasalah</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white"><?= $metroUtaraBermasalah->masalah; ?></h2>
                                <p class="text-white mb-0"><?= date('d-m-Y'); ?></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fas fa-fw fa-exclamation-triangle mr-1"></i></span>
                        </div>
                    </div>
                </div>
                <!-- metro utara end -->
                <!-- metro selatan -->
            <?php elseif ($this->session->userdata('kec_id') === '5') : ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-4">
                        <div class="card-body">
                            <h3 class="card-title text-white">KPM</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white"><?= $metroSelatanAll->jumlah; ?></h2>
                                <p class="text-white mb-0"><?= date('d-m-Y'); ?></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fas fa-fw fa-server mr-1"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-3">
                        <div class="card-body">
                            <h3 class="card-title text-white">Kpm Bermasalah</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white"><?= $metroSelatanBermasalah->masalah; ?></h2>
                                <p class="text-white mb-0"><?= date('d-m-Y'); ?></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fas fa-fw fa-exclamation-triangle mr-1"></i></span>
                        </div>
                    </div>
                </div>
                <!-- metro utara end -->
            <?php endif; ?>
        </div>
    </div>
    <!-- #/ container -->
</div>