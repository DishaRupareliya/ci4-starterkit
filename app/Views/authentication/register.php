<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <?= $this->include('includes/assets/header_assets') ?>
</head>
<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h1><b>Register</b></h1>
            </div>
            <div class="card-body">
                <form action="<?= url_to('register') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" inputmode="email" autocomplete="email" placeholder="Email Address" value="<?= old('email') ?>" />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            <?= session('errors.email') ?>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control <?php if(session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" inputmode="text" autocomplete="username" placeholder="Username" value="<?= old('username') ?>" />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            <?= session('errors.username') ?>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" inputmode="text" autocomplete="new-password" placeholder="Password"  />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            <?= session('errors.password') ?>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control <?php if(session('errors.password_confirm')) : ?>is-invalid<?php endif ?>" name="password_confirm" inputmode="text" autocomplete="off" placeholder="Confirm password" />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            <?= session('errors.password_confirm') ?>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                    </div>
                </form>
                <p class="text-center mt-3">Already have an account ? <a href="<?= url_to('login') ?>"> Login</a></p>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <?= $this->include('includes/assets/footer_assets') ?>
</body>
</html>
