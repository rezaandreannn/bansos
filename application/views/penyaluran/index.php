  <!--**********************************
            Content body start
        ***********************************-->
  <div class="content-body">

      <?php
        // $uri = $this->uri->segment(1);
        $title = $this->input->get('kec_id');
        $kec = $this->db->get('tb_kec')->result();

        ?>

      <div class="row page-titles mx-0">
          <div class="col p-md-0">
              <ol class="breadcrumb">
                  <!-- <?php if ($title) : ?>
                      <li class="breadcrumb-item"><a href="javascript:void(0)">Penyaluran</a></li>
                  <?php endif; ?> -->
                  <li class="breadcrumb-item"><a href="javascript:void(0)"><?= $judul; ?></a></li>
                  <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
              </ol>
          </div>
      </div>
      <!-- row -->

      <div class="container-fluid">
          <div class="row">
              <div class="col-12">
                  <?= $this->session->flashdata('pesan'); ?>
                  <!-- <div class="alert alert-danger" role="alert">
                Gagal menambahkan data
                <hr>
            </div> -->


                  <div class="card">
                      <div class="card-body">
                          <?php if ($this->session->userdata('role_id') == 1) : ?>
                              <a href="" class="btn btn-success text-white ml-4" data-toggle="modal" data-target="#filter">Filter <i class="fas fa-sort"></i></a>
                              <?php
                                if ($this->input->get('kec_id') != null) : ?>
                                  <a href="<?= base_url('penyaluran/tambah/') . $this->input->get('kec_id'); ?>" class="btn btn-primary text-white ">Tambah <i class="fas fa-plus"></i></a>
                              <?php elseif ($this->uri->segment(3) == true) : ?>
                                  <a href="<?= base_url('penyaluran/tambah/') . $this->uri->segment(3); ?>" class="btn btn-primary text-white ">Tambah <i class="fas fa-plus"></i></a>
                              <?php endif; ?>
                          <?php endif ?>
                          <div class="table-responsive">
                              <table class="table table-striped table-bordered zero-configuration">
                                  <thead>
                                      <tr>
                                          <th>No</th>
                                          <th>Nama Warong</th>
                                          <th>jumlah kuota</th>
                                          <th>kpm gagal</th>
                                          <th>kpm berhasil</th>
                                          <th>Opsi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                        $no = 1;
                                        foreach ($penyaluran as $p => $value) :
                                        ?>
                                          <tr>
                                              <td><?= $no++; ?></td>
                                              <td><?= $value->nama_warong; ?></td>
                                              <td><?= $value->jumlah_kuota; ?></td>
                                              <td>
                                                  <?php if ($value->kpm_id != null) : ?>
                                                      <?= $value->kpm_id; ?>
                                                  <?php else : ?>
                                                      belum terinput oleh petugas
                                                  <?php endif; ?>
                                              </td>
                                              <td>
                                                  <?php if ($value->jumlah_transaksi != null) : ?>
                                                      <?= $value->jumlah_transaksi; ?>
                                                  <?php else : ?>
                                                      belum terinput oleh petugas
                                                  <?php endif; ?>
                                              </td>
                                              <td>
                                                  <?php if ($this->session->userdata('role_id') == 2) : ?>
                                                      <a href="<?= base_url('penyaluran/tambah/') . $value->id_penyaluran . "/" . $this->uri->segment(3) . "/" . $value->id_warong; ?>" class="badge badge-success text-white">Update</a>
                                                  <?php else : ?>
                                                      <a href="" class="badge badge-success text-white" data-toggle="modal" data-target="#editPenyaluran<?= $value->id_penyaluran; ?>">Edit</a>
                                                  <?php endif; ?>
                                              </td>
                                          </tr>
                                      <?php endforeach; ?>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- #/ container -->
  </div>
  <!--**********************************
Content body end
***********************************-->


  <?php
    $kec = $this->db->get('tb_kec')->result();
    ?>

  <!-- Modal -->
  <div class="modal fade" id="filter" tabindex="-1" aria-labelledby="filterLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="filterLabel">Pilih</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form action="<?= base_url('penyaluran/kec'); ?>" method="get">
                      <div class="form-group">
                          <label for="kec_id">Kecamatan</label>
                          <select name="kec_id" id="kec_id" class="form-control">
                              <option value="">Silahkan pilih kecamatan</option>
                              <?php foreach ($kec as $k => $value) : ?>
                                  <option value="<?= $value->id; ?>"><?= $value->kec; ?></option>
                              <?php endforeach; ?>
                          </select>
                      </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  </form>
              </div>
          </div>
      </div>
  </div>


  <!-- edit -->

  <?php
    $no = 1;
    foreach ($penyaluran as $p => $value) : $no++; ?>


      <div class="modal fade" id="editPenyaluran<?= $value->id_penyaluran; ?>" tabindex="-1" aria-labelledby="editPenyaluranLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="editPenyaluranLabel">Pilih</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form action="<?= base_url('penyaluran/edit/') . $value->id_penyaluran . "/" . $value->kec_id; ?>" method="post">
                          <div class="form-group">
                              <label for="nama_warong">Nama Warong</label>
                              <input type="text" class="form-control" id="nama_warong" name="nama_warong" value="<?= $value->nama_warong; ?>" disabled>
                          </div>
                          <div class="form-group">
                              <label for="jumlah_kuota">Jumlah kuota</label>
                              <input type="text" class="form-control" id="jumlah_kuota" name="jumlah_kuota" value="<?= $value->jumlah_kuota; ?>">
                          </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
      <!-- </div> -->
  <?php endforeach; ?>