<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Filter</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)"><?= $judul; ?></a></li>
                <!-- <li class="breadcrumb-item"><a href="<?= base_url('kpmbermasalah/kec/') . $this->uri->segment(3); ?>"><?= $judul; ?></a></li> -->
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <?= $this->session->flashdata('pesan'); ?>
                <div class="card">
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="<?= base_url('KpmBermasalah/cetak'); ?>" method="post" target="blank">
                                <div class="form-group">
                                    <label for="bulan">Pilih Bulan</label>
                                    <select name="bulan" id="bulan" class="form-control">
                                        <option value=""> --- Pilih Semua --- </option>
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tahun">Pilih Tahun</label>
                                    <select name="tahun" id="tahun" class="form-control">
                                        <option value=""> --- Pilih Semua --- </option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kec">Pilih Kecamatan</label>
                                    <select name="kec" id="kec" class="form-control">
                                        <option value=""> --- Pilih Semua --- </option>
                                        <?php foreach ($kec as $value) : ?>
                                            <option value="<?= $value->id ?>"><?= $value->kec; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>