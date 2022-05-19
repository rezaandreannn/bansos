  <!--**********************************
            Content body start
        ***********************************-->
  <!-- <style>
      table {
          max-width: 100%;
          padding: 0;
          margin: 0;
      }
  </style> -->

  <div class="content-body">

      <?php
        $uri = $this->uri->segment(1);
        ?>

      <div class="row page-titles mx-0">
          <div class="col p-md-0">
              <ol class="breadcrumb">
                  <?php if ($uri === 'kpm') : ?>
                      <li class="breadcrumb-item"><a href="javascript:void(0)">Data Kpm</a></li>
                  <?php else : ?>
                      <li class="breadcrumb-item"><a href="javascript:void(0)">Data Kpm Bermasalah</a></li>
                  <?php endif; ?>
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
                          <?php if ($uri === 'kpm') : ?>
                              <a href="" class="btn btn-primary ml-4" data-toggle="modal" data-target="#tambahKpm">Tambah kpm <i class="fas fa-fw fa-plus ml-1"></i></a>
                          <?php elseif ($this->session->userdata('role_id') === '2') : ?>
                              <!-- memunculkan button kpm bermasalah di page user -->
                              <a href="<?= base_url('kpmbermasalah/add/') . $this->uri->segment(3); ?>" class="btn btn-primary ml-4">Tambah Kpm Bermasalah <i class="fas fa-fw fa-exclamation-triangle ml-1"></i></a>
                          <?php endif; ?>
                          <div class="table-responsive">
                              <table class="table table-striped table-bordered zero-configuration">
                                  <thead>
                                      <tr>
                                          <th>No</th>
                                          <th>Ktp</th>
                                          <th>Nama</th>
                                          <?php if ($uri === 'kpm') : ?>
                                              <th>Usia</th>
                                          <?php else : ?>
                                          <?php endif; ?>
                                          <th>Alamat</th>
                                          <?php if ($uri === 'kpmbermasalah') : ?>
                                              <th>Keterangan</th>
                                              <th>Warong</th>
                                          <?php else : ?>
                                          <?php endif; ?>
                                          <th>Opsi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                        $no = 1;
                                        foreach ($kpm as $k) :
                                        ?>
                                          <tr>
                                              <td><?= $no++; ?></td>
                                              <td><?= $k->ktp; ?></td>
                                              <td><?= $k->nama_kpm; ?></td>
                                              <?php if ($uri === 'kpm') : ?>
                                                  <td><?= $k->usia; ?> thn</td>
                                              <?php else : ?>
                                              <?php endif; ?>
                                              <td><?= $k->alamat; ?></td>
                                              <?php if ($uri === 'kpmbermasalah') : ?>
                                                  <td><?= $k->Keterangan; ?></td>
                                                  <td><?= $k->nama_warong; ?></td>
                                              <?php else : ?>
                                              <?php endif; ?>
                                              <td>
                                                  <?php if ($uri === 'kpm') : ?>
                                                      <a href="" data-toggle="modal" data-target="#editKpm<?= $k->id_kpm; ?>" class=" badge badge-success text-white">Edit</a>
                                                      <a href="<?= base_url('kpm/hapus/') . $k->id_kpm . "/" . $this->uri->segment(3) ?>" class="badge badge-danger" onclick="return confirm('Yakin menghapus <?= $k->nama_kpm ?> ?'); ">Hapus</a>
                                                  <?php else : ?>
                                                      <a href="" data-toggle="modal" data-target="#editKpmBermasalah<?= $k->id_kpm; ?>" class="badge badge-success text-white">Edit</a>
                                                      <a href="<?= base_url('kpmbermasalah/hapus/') . $k->id_kpm . "/" . $this->uri->segment(3); ?>" class="badge badge-danger" onclick="return confirm('mohon cek kembali <?= $k->nama_kpm ?> ?'); ">Hapus</a>
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


  <!-- Modal -->
  <div class="modal fade" id="tambahKpm" tabindex="-1" aria-labelledby="tambahKpmLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="tambahKpmLabel">Tambah kpm</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form action="<?= base_url('kpm/tambah/') . $this->uri->segment(3); ?>" method="post">
                      <div class="form-group">
                          <input type="text" class="form-control" id="ktp" name="ktp" placeholder="input ktp">
                      </div>
                      <div class="form-group">
                          <input type="text" class="form-control" id="nama_kpm" name="nama_kpm" placeholder="input nama kpm">
                      </div>
                      <div class="form-group">
                          <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
                      </div>
                      <div class="form-group">
                          <textarea class="form-control" id="alamat" rows="3" placeholder="input alamat" name="alamat"></textarea>
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


  <!-- edit  data kpm  -->
  <?php
    $no = 1;
    foreach ($kpm as $k) : $no++; ?>

      <div class="modal fade" id="editKpm<?= $k->id_kpm; ?>" tabindex="-1" aria-labelledby="editKpmLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="editKpmLabel">Edit Kpm</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form method="post" action="<?= base_url('kpm/edit/') . $k->id_kpm . "/" . $this->uri->segment(3) ?>">
                          <input type="hidden" name="id_kpm" value="<?= $k->id_kpm; ?>">
                          <div class="form-group">
                              <label for="ktp">Ktp</label>
                              <input type="text" class="form-control" id="ktp" name="ktp" value="<?= $k->ktp; ?>">
                          </div>
                          <div class="form-group">
                              <label for="nama_kpm">Nama Kpm</label>
                              <input type="text" class="form-control" id="nama_kpm" name="nama_kpm" value="<?= $k->nama_kpm; ?>">
                          </div>
                          <div class="form-group">
                              <label for="tgl_lahir">Tgl Lahir</label>
                              <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $k->tgl_lahir; ?>">
                          </div>
                          <div class="form-group">
                              <label for="alamat">Alamat</label>
                              <textarea class="form-control" id="alamat" rows="3" placeholder="input alamat" name="alamat"><?= $k->alamat; ?></textarea>
                          </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  <?php endforeach; ?>

  <!-- edit kpm bermasalah -->
  <?php
    $no = 1;
    foreach ($kpm as $k) : $no++; ?>

      <div class="modal fade" id="editKpmBermasalah<?= $k->id_kpm; ?>" tabindex="-1" aria-labelledby="editKpmBermasalahLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="editKpmBermasalahLabel">Edit Kpm bermasalah</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form method="post" action="<?= base_url('kpmBermasalah/edit/') . $k->id_kpm . "/" . $this->uri->segment(3) ?>">
                          <input type="hidden" name="id_kpm" value="<?= $k->id_kpm; ?>">
                          <div class="form-group">
                              <label for="keterangan">Keterangan</label>
                              <textarea class="form-control" id="keterangan" rows="3" placeholder="input keterangan" name="keterangan"><?= $k->Keterangan; ?></textarea>
                          </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  <?php endforeach; ?>