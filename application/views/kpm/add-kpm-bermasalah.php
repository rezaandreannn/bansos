<style>
    #tableInput {
        padding: 0;
        margin: 0;
    }
</style>
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Tambah</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Kpm Bermasalah</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('kpmbermasalah/kec/') . $this->uri->segment(3); ?>"><?= $judul; ?></a></li>
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
                            <form action="<?= base_url('kpmbermasalah/tambah/') . $this->uri->segment(3); ?>" method="post">
                                <input type="hidden" id="id_input" name="id_kpm">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="ktp_input" placeholder="silahkan pilih ktp" disabled>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#tambahKpmBermasalah">Pilih</button>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nama_kpm">Nama Kpm</label>
                                    <input type="text" id="nama_input" name="nama_kpm" class="form-control input-flat" placeholder="Nama Kpm" disabled>
                                    <?= form_error('id_kpm', '<div class="text-danger small ml-2">', '</div>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="warong_id">Nama Warong</label>
                                    <select name="warong_id" id="warong_id" class="form-control">
                                        <option value="">Pilih Nama Warong</option>
                                        <?php foreach ($warongs as $w) : ?>
                                            <option value="<?= $w->id_warong; ?>"><?= $w->nama_warong; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('warong_id', '<div class="text-danger small ml-2">', '</div>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea class="form-control" id="keterangan" rows="3" placeholder="input keterangan" name="keterangan"></textarea>
                                    <?= form_error('keterangan', '<div class="text-danger small ml-2">', '</div>') ?>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <!-- <button type="reset" class="btn btn-danger">Kembali</button> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- tambah kpm bermasalah di page -->
<div class="modal fade" id="tambahKpmBermasalah" tabindex="-1" aria-labelledby="tambahKpmBermasalahLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahKpmBermasalahLabel">Silahkan pilih data ktp</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?php if ($kpmM == true) : ?>
                <div class="row mt5">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration" id="tableInput">
                                <thead>
                                    <tr>
                                        <th>KTP</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($kpmM as $kpm) :
                                    ?>
                                        <tr>
                                            <td><?= $kpm->ktp; ?></td>
                                            <td>
                                                <button class="btn btn-primary" id="select" data-id="<?= $kpm->id_kpm; ?>" data-ktp="<?= $kpm->ktp; ?>" data-nama="<?= $kpm->nama_kpm; ?>">pilih</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <div class="modal-body">
                    <div class="alert alert-primary alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button> <strong><i class="fas fa-sad-cry"></i>Maaf !</strong> Data ktp sudah terinput semua.
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>