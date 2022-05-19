  <!--**********************************
            Content body start
        ***********************************-->
  <div class="content-body">

      <div class="row page-titles mx-0">
          <div class="col p-md-0">
              <ol class="breadcrumb">
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
                  <div class="card">
                      <div class="card-body">
                          <a href="<?= base_url('auth/register'); ?>" class="btn btn-primary ml-4">Tambah User</a>
                          <div class="table-responsive">
                              <table class="table table-striped table-bordered zero-configuration">
                                  <thead>
                                      <tr>
                                          <th>No</th>
                                          <th>Username</th>
                                          <th>Role</th>
                                          <th>Kecamatan</th>
                                          <th>Opsi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                        $no = 1;
                                        foreach ($users as $user) :
                                        ?>
                                          <tr>
                                              <td><?= $no++; ?></td>
                                              <td><?= $user->username; ?></td>
                                              <?php if ($user->role_id == 1) : ?>
                                                  <td>Admin </td>
                                              <?php else : ?>
                                                  <td>Petugas</td>
                                              <?php endif; ?>
                                              <td><?= $user->kec; ?></td>
                                              <td>
                                                  <a href="http://" class="badge badge-warning text-white">Edit</a>
                                                  <a href="<?= base_url('admin/hapususer') . $user->id; ?>" class="badge badge-danger" onclick="return confirm('Yakin menghapus <?= $user->username ?> ?'); ">Hapus</a>
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