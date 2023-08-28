<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <?= $this->include('includes/assets/header_assets') ?>
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h4><b>Forgot Your Password?</b></h4>
            </div>
            <div class="card-body">
                <p class="login-box-msg">No problem! Enter your email below and we will send instructions to reset your password.</p>
                <form action="<?= url_to('magic-link') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" autocomplete="email" placeholder="Email" />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            <?= session('errors.email') ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Request new password</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <p class="mt-3 mb-1">
                    <a href="<?= route_to('login') ?>">Login</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <?= $this->include('includes/assets/footer_assets') ?>
</body>
</html>
