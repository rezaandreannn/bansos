<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Tambah</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Kpm Bermasalah</a></li>
                <!-- <li class="breadcrumb-item"><a href="<?= base_url('kpmbermasalah/kec/') . $this->uri->segment(3); ?>"><?= $judul; ?></a></li> -->
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="basic-form">
                            <?php if ($this->session->userdata('role_id') == 1) : ?>
                                <form action="<?= base_url('penyaluran/tambah/') . $this->uri->segment(3); ?>" method="post">
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
                                        <label for="jumlah_kuota">Jumlah Kuota</label>
                                        <input type="text" id="jumlah_kuota" class="form-control input-flat" placeholder="jumlah Kuota" name="jumlah_kuota">
                                        <?= form_error('jumlah_kuota', '<div class="text-danger small ml-2">', '</div>') ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary">simpan</button>
                                </form>
                            <?php else : ?>
                                <form method="post" action="<?= base_url('penyaluran/update/') . $penyaluran->id_penyaluran . "/" . $this->uri->segment(4); ?>">
                                    <input type="hidden" id="id_penyaluran" value="<?= $penyaluran->id_penyaluran ?>">
                                    <input type="hidden" name="warong" value="<?= $penyaluran->warong_id; ?>">
                                    <div class="form-group">
                                        <label for="jumlah_transaksi">Jumlah transaksi</label>
                                        <input type="text" id="jumlah_transaksi" class="form-control input-flat" placeholder="jumlah transaksi" name="jumlah_transaksi">
                                        <?= form_error('jumlah_transaksi', '<div class="text-danger small ml-2">', '</div>') ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary">simpan</button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>