<div class="login-form-bg h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100">
            <div class="col-xl-6">
                <div class="form-input-content">
                    <div class="card login-form mb-0">
                        <div class="card-body pt-5">

                            <a class="text-center" href="index.html">
                                <h4>Register</h4>
                            </a>

                            <form class="mt-5 mb-5 login-input" method="post" action="<?= base_url('auth/register'); ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Username" name="username">
                                    <?= form_error('username', '<div class="text-danger small ml-2">', '</div>') ?>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password" name="password1">
                                    <?= form_error('password1', '<div class="text-danger small ml-2">', '</div>') ?>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="konfirmasi Password" name="password2">
                                    <?= form_error('password2', '<div class="text-danger small ml-2">', '</div>') ?>
                                </div>
                                <!-- <div class="form-group">
                                    <select class="form-control" id="role_id" name="role_id">
                                        <option>Pilih role </option>
                                        <option value="1">Admin</option>
                                        <option value="2">Petugas</option>
                                    </select>
                                </div> -->
                                <input type="hidden" id="rolee" name="role_id" value="2">
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" id="role">
                                    <label class="custom-control-label" for="role">Admin?</label>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" id="kec_id" name="kec_id">
                                        <option>Pilih Kecamatan </option>
                                        <?php foreach ($kec as $k) : ?>
                                            <option value="<?= $k->id ?>"><?= $k->kec; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn login-form__btn submit w-100">Register</button>
                                <hr>
                                <p class="text-right mb-4">
                                    <a href="<?= base_url('admin/user'); ?>">Kembali</a>
                                </p>
                            </form>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>