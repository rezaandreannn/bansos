  <!--**********************************
            Sidebar start
        ***********************************-->
  <div class="nk-sidebar">
      <div class="nk-nav-scroll">
          <ul class="metismenu" id="menu">
              <?php if ($this->session->userdata('role_id') === '1') : ?>
                  <li class="nav-label">APPS</li>
                  <li>
                      <a href="<?= base_url('admin'); ?>" aria-expanded="false">
                          <i class="fas fa-fw fa-home mr-1"></i><span class="nav-text">Dashboard</span>
                      </a>
                  </li>
                  <li>
                      <a href="<?= base_url('admin/user'); ?>" aria-expanded="false">
                          <i class="fas fa-fw fa-user mr-1"></i><span class="nav-text">Data Petugas</span>
                      </a>
                  </li>
                  <li>
                      <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                          <i class="fas fa-fw fa-server mr-1"></i><span class="nav-text">Data Kpm</span>
                      </a>
                      <ul aria-expanded="false">
                          <li><a href="<?= base_url('kpm/all'); ?>">Semua data kpm</a></li>
                      </ul>
                      <ul aria-expanded="false">
                          <li><a href="<?= base_url('kpm/kec/1'); ?>">Metro Pusat</a></li>
                      </ul>
                      <ul aria-expanded="false">
                          <li><a href="<?= base_url('kpm/kec/2'); ?>">Metro Timur</a></li>
                      </ul>
                      <ul aria-expanded="false">
                          <li><a href="<?= base_url('kpm/kec/3'); ?>">Metro Barat</a></li>
                      </ul>
                      <ul aria-expanded="false">
                          <li><a href="<?= base_url('kpm/kec/4'); ?>">Metro Utara</a></li>
                      </ul>
                      <ul aria-expanded="false">
                          <li><a href="<?= base_url('kpm/kec/5'); ?>">Metro Selatan</a></li>
                      </ul>
                  </li>
                  <li>
                      <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                          <i class="fas fa-fw fa-exclamation-triangle mr-1"></i><span class="nav-text">Data Kpm Bermaslah</span>
                      </a>
                      <ul aria-expanded="false">
                          <li><a href="<?= base_url('kpmbermasalah/kec/1'); ?>">Metro Pusat</a></li>
                      </ul>
                      <ul aria-expanded="false">
                          <li><a href="<?= base_url('kpmbermasalah/kec/2'); ?>">Metro Timur</a></li>
                      </ul>
                      <ul aria-expanded="false">
                          <li><a href="<?= base_url('kpmbermasalah/kec/3'); ?>">Metro Barat</a></li>
                      </ul>
                      <ul aria-expanded="false">
                          <li><a href="<?= base_url('kpmbermasalah/kec/4'); ?>">Metro Utara</a></li>
                      </ul>
                      <ul aria-expanded="false">
                          <li><a href="<?= base_url('kpmbermasalah/kec/5'); ?>">Metro Selatan</a></li>
                      </ul>
                  </li>
                  <li>
                      <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                          <i class="fas fa-fw fa-store-alt mr-1"></i><span class="nav-text">Data E-Warong</span>
                      </a>
                      <ul aria-expanded="false">
                          <li><a href="<?= base_url('warong/kec/1'); ?>">Metro Pusat</a></li>
                      </ul>
                      <ul aria-expanded="false">
                          <li><a href="<?= base_url('warong/kec/2'); ?>">Metro Timur</a></li>
                      </ul>
                      <ul aria-expanded="false">
                          <li><a href="<?= base_url('warong/kec/3'); ?>">Metro Barat</a></li>
                      </ul>
                      <ul aria-expanded="false">
                          <li><a href="<?= base_url('warong/kec/4'); ?>">Metro Utara</a></li>
                      </ul>
                      <ul aria-expanded="false">
                          <li><a href="<?= base_url('warong/kec/5'); ?>">Metro Selatan</a></li>
                      </ul>
                  </li>
                  <li>
                      <a href="<?= base_url('penyaluran/kec'); ?>" aria-expanded="false">
                          <i class="fas fa-fw fa-user mr-1"></i><span class="nav-text">Penyaluran</span>
                      </a>
                  </li>
                  <li>
                      <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                          <i class="fas fa-fw fa-print mr-1"></i><span class="nav-text">Laporan</span>
                      </a>
                      <ul aria-expanded="false">
                          <li><a href="<?= base_url('KpmBermasalah/filter'); ?>">KPM Bermasalah</a></li>
                      </ul>
                      <ul aria-expanded="false">
                          <li><a href="<?= base_url('penyaluran/filter'); ?>">Penyaluran</a></li>
                      </ul>
                  </li>
              <?php else : ?>
                  <li>
                      <a href="<?= base_url('welcome'); ?>" aria-expanded="false">
                          <i class="icon-badge menu-icon"></i><span class="nav-text">Dashboard</span>
                      </a>
                  </li>
                  <li>
                      <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                          <i class="fas fa-fw fa-exclamation-triangle mr-1"></i><span class="nav-text">Data Kpm Bermaslah</span>
                      </a>
                      <?php if ($this->session->userdata('kec_id') === '1') : ?>
                          <ul aria-expanded="false">
                              <li><a href="<?= base_url('kpmbermasalah/kec/1'); ?>">Metro Pusat</a></li>
                          </ul>
                      <?php elseif ($this->session->userdata('kec_id') === '2') : ?>
                          <ul aria-expanded="false">
                              <li><a href="<?= base_url('kpmbermasalah/kec/2'); ?>">Metro Timur</a></li>
                          </ul>
                      <?php elseif ($this->session->userdata('kec_id') === '3') : ?>
                          <ul aria-expanded="false">
                              <li><a href="<?= base_url('kpmbermasalah/kec/3'); ?>">Metro Barat</a></li>
                          </ul>
                      <?php elseif ($this->session->userdata('kec_id') === '4') : ?>
                          <ul aria-expanded="false">
                              <li><a href="<?= base_url('kpmbermasalah/kec/4'); ?>">Metro Utara</a></li>
                          </ul>
                      <?php elseif ($this->session->userdata('kec_id') === '5') : ?>
                          <ul aria-expanded="false">
                              <li><a href="<?= base_url('kpmbermasalah/kec/5'); ?>">Metro Selatan</a></li>
                          </ul>
                      <?php endif; ?>
                  </li>
                  <li>
                      <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                          <i class="fas fa-fw fa-exclamation-triangle mr-1"></i><span class="nav-text">Penyaluran</span>
                      </a>
                      <?php if ($this->session->userdata('kec_id') === '1') : ?>
                          <ul aria-expanded="false">
                              <li><a href="<?= base_url('penyaluran/kecamatan/1'); ?>">Metro Pusat</a></li>
                          </ul>
                      <?php elseif ($this->session->userdata('kec_id') === '2') : ?>
                          <ul aria-expanded="false">
                              <li><a href="<?= base_url('penyaluran/kecamatan/2'); ?>">Metro Timur</a></li>
                          </ul>
                      <?php elseif ($this->session->userdata('kec_id') === '3') : ?>
                          <ul aria-expanded="false">
                              <li><a href="<?= base_url('penyaluran/kecamatan/3'); ?>">Metro Barat</a></li>
                          </ul>
                      <?php elseif ($this->session->userdata('kec_id') === '4') : ?>
                          <ul aria-expanded="false">
                              <li><a href="<?= base_url('penyaluran/kecamatan/4'); ?>">Metro Utara</a></li>
                          </ul>
                      <?php elseif ($this->session->userdata('kec_id') === '5') : ?>
                          <ul aria-expanded="false">
                              <li><a href="<?= base_url('penyaluran/kecamatan/5'); ?>">Metro Selatan</a></li>
                          </ul>
                      <?php endif; ?>
                  </li>
              <?php endif; ?>
          </ul>
      </div>
  </div>
  <!--**********************************
            Sidebar end
        ***********************************-->