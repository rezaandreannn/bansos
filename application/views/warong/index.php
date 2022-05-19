  <!--**********************************
            Content body start
        ***********************************-->
  <div class="content-body">

      <?php
        $uri = $this->uri->segment(1);
        ?>

      <div class="row page-titles mx-0">
          <div class="col p-md-0">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="javascript:void(0)">Data E-warong</a></li>
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
                          <a href="" class="btn btn-primary ml-4" data-toggle="modal" data-target="#tambahWarong">Tambah E-Warong <i class="fas fa-fw fa-store-alt ml-1"></i></a>
                          <div class="table-responsive">
                              <table class="table table-striped table-bordered zero-configuration">
                                  <thead>
                                      <tr>
                                          <th>No</th>
                                          <th>Nama Warong</th>
                                          <th>Alamat</th>
                                          <th>Nama Ketua</th>
                                          <th>Thn Berdiri</th>
                                          <th>Opsi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                        $no = 1;
                                        foreach ($warongs as $warong) :
                                        ?>

                                          <tr>
                                              <td><?= $no++; ?></td>
                                              <td><?= $warong->nama_warong; ?></td>
                                              <td><?= $warong->alamat; ?></td>
                                              <td><?= $warong->nama_ketua; ?></td>
                                              <td><?= $warong->thn_berdiri; ?></td>
                                              <td>
                                                  <a href="" data-toggle="modal" data-target="#editWarong<?= $warong->id_warong; ?>" class=" badge badge-success text-white">Edit</a>
                                                  <a href="<?= base_url('warong/hapus/') . $warong->id_warong . "/" . $this->uri->segment(3) ?>" class="badge badge-danger" onclick="return confirm('Yakin menghapus data warong <?= $warong->nama_warong ?> ?'); ">Hapus</a>
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
    $tahuns = ['2015', '2016', '2017', '2018', '2019', '2020', '2021'];
    ?>
  <!-- Modal -->
  <div class="modal fade" id="tambahWarong" tabindex="-1" aria-labelledby="tambahWarongLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="tambahWarongLabel">Tambah E-Warong</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form action="<?= base_url('warong/tambah/') . $this->uri->segment(3); ?>" method="post">
                      <div class="form-group">
                          <input type="text" class="form-control" id="nama_warong" name="nama_warong" placeholder="input nama warong">
                      </div>
                      <div class="form-group">
                          <textarea class="form-control" id="alamat" rows="3" placeholder="input alamat" name="alamat"></textarea>
                      </div>
                      <div class="form-group">
                          <input type="text" class="form-control" id="nama_ketua" name="nama_ketua" placeholder="input nama ketua">
                      </div>
                      <div class="form-group">
                          <label for="thn_berdiri">Thn berdiri</label>
                          <select name="thn_berdiri" id="thn_berdiri" class="form-control">
                              <?php foreach ($tahuns as $tahun) : ?>
                                  <option value="<?= $tahun; ?>"><?= $tahun; ?></option>
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

  <!-- edit  data kpm  -->
  <?php
    $no = 1;
    foreach ($warongs as $warong) : $no++; ?>

      <div class="modal fade" id="editWarong<?= $warong->id_warong; ?>" tabindex="-1" aria-labelledby="editWarongLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="editWarongLabel">Edit E-Warong</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form method="post" action="<?= base_url('warong/edit/') . $warong->id_warong . "/" . $this->uri->segment(3) ?>">
                          <input type="hidden" name="id_kpm" value="<?= $warong->id_warong; ?>">
                          <div class="form-group">
                              <label for="nama_warong">Nama warong</label>
                              <input type="text" class="form-control" id="nama_warong" name="nama_warong" value="<?= $warong->nama_warong; ?>">
                          </div>
                          <div class="form-group">
                              <label for="alamat">Alamat</label>
                              <textarea class="form-control" id="alamat" rows="3" placeholder="input alamat" name="alamat"><?= $warong->alamat; ?></textarea>
                          </div>
                          <div class="form-group">
                              <label for="nama_ketua">Nama ketua</label>
                              <input type="text" class="form-control" id="nama_ketua" name="nama_ketua" value="<?= $warong->nama_ketua; ?>">
                          </div>
                          <div class="form-group">
                              <label for="thn_berdiri">Tahun Berdiri</label>
                              <select class="form-control" id="thn_berdiri" name="thn_berdiri">
                                  <?php foreach ($tahuns as $tahun) : ?>
                                      <?php if ($tahun == $warong->thn_berdiri) : ?>
                                          <option value="<?= $tahun; ?>" selected><?= $tahun; ?></option>
                                      <?php else : ?>
                                          <option value="<?= $tahun; ?>"><?= $tahun; ?></option>
                                      <?php endif; ?>
                                  <?php endforeach; ?>
                              </select>
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