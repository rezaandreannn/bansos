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
                  <div class="card">
                      <div class="card-body">
                          <div class="table-responsive">
                              <table class="table table-striped table-bordered zero-configuration">
                                  <thead>
                                      <tr>
                                          <th>No</th>
                                          <th>Nama Kpm</th>
                                          <th>Usia</th>
                                          <th>Alamat</th>
                                          <th>Kec</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                        $no = 1;
                                        foreach ($kpm as $warong) :
                                        ?>

                                          <tr>
                                              <td><?= $no++; ?></td>
                                              <td><?= $warong->nama_kpm; ?></td>
                                              <td><?= $warong->usia; ?></td>
                                              <td><?= $warong->alamat; ?></td>
                                              <td><?= $warong->kec; ?></td>

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