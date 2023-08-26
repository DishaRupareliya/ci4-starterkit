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
      <!-- /.login-logo -->
      <div class="card card-outline card-primary">
        <div class="card-header text-center">
          <h1><b>Login</b></h1>
        </div>
        <div class="card-body">
            <?php if (session('error') !== null) : ?>
                <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
            <?php elseif (session('errors') !== null) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php if (is_array(session('errors'))) : ?>
                        <?php foreach (session('errors') as $error) : ?>
                            <?= $error ?>
                            <br>
                        <?php endforeach ?>
                    <?php else : ?>
                        <?= session('errors') ?>
                    <?php endif ?>
                </div>
            <?php endif ?>

            <?php if (session('message') !== null) : ?>
            <div class="alert alert-success" role="alert"><?= session('message') ?></div>
            <?php endif ?>
            <form action="<?= url_to('login') ?>" method="post">
                <?= csrf_field() ?>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" inputmode="email" autocomplete="email" p placeholder="Email" required />
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" inputmode="text" autocomplete="password" placeholder="Password" required />
                    <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <?php if (setting('Auth.sessionConfig')['allowRemembering']): ?>
                        <div class="form-check">
                            <label class="form-check-label icheck-primary">
                                <input type="checkbox" name="remember" class="form-check-input">
                                <b>Remember Me</b>
                            </label>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-7">
                    <?php if (setting('Auth.allowMagicLinkLogins')) : ?>
                        <p class="mb-0"><a href="<?= url_to('magic-link') ?>">Forgot password ?</a></p>
                    <?php endif ?>
                </div>
                <div class="col-5">
                    <?php if (setting('Auth.allowRegistration')) : ?>
                        <p class="mb-0"><a href="<?= url_to('register') ?>" class="pull-right">Create Account ?</a></p>
                    <?php endif ?>
                </div>
            </div>
        </div>
      </div>
    </div>
    <?= $this->include('includes/assets/footer_assets') ?>
</body>
</html>