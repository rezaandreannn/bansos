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

      <div class="container">
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

                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                        $no = 1;
                                        foreach ($kpm as $warong) :
                                        ?>

                                          <tr>
                                              <td><?= $no++; ?></td>
                                              <td><?= $warong->id_kpm; ?></td>

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

  </div>