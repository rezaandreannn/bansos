    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <?= $this->session->flashdata('pesan'); ?>
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="index.html">
                                    <h4>Login</h4>
                                </a>
                                <form class="mt-5 mb-5 login-input" method="post">
                                    <div class="form-group">
                                        <input type="username" class="form-control" placeholder="username" name="username">
                                        <?= form_error('username', '<div class="text-danger small ml-2">', '</div>') ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password" name="password">
                                        <?= form_error('password', '<div class="text-danger small ml-2">', '</div>') ?>
                                    </div>
                                    <button class="btn login-form__btn submit w-100">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>