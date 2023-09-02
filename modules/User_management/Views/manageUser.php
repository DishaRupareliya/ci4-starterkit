<?= $this->include('App\Views\load\select2') ?>
<?= $this->extend('master') ?>
<?= $this->section('title') ?><?= $title ?><?= $this->endSection() ?>
<?= $this->section('content_header') ?><h1><?= $title ?></h1><?= $this->endSection() ?>
<?= $this->section('link') ?>Manage User<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <div class="float-left">
                    <div class="btn-group">
                        <a href="<?= route_to('admin/user') ?>" class="btn btn-sm btn-block btn-secondary"><i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="<?= route_to('admin/user/saveUser') ?>" method="post" class="form-horizontal">
                    <?= csrf_field() ?>
                    <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Active</label>
                        <div class="col-sm-10">
                            <select class="form-control select" name="active" style="width: 100%;">
                                <option value="1" selected="selected">Active</option>
                                <option value="0">Non Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" name="email" class="form-control <?= session('error.email') ? 'is-invalid' : '' ?>" value="<?= old('email') ?>" placeholder="Email" autocomplete="off">
                                <?php if (session('error.email')) { ?>
                                <div class="invalid-feedback">
                                    <h6><?= session('error.email') ?></h6>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="username" class="form-control <?= session('error.username') ? 'is-invalid' : '' ?>" value="<?= old('username') ?>" placeholder="Username" autocomplete="off">
                                <?php if (session('error.username')) { ?>
                                <div class="invalid-feedback">
                                    <h6><?= session('error.username') ?></h6>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </div>
                                <input type="password" name="password" class="form-control <?= session('error.password') ? 'is-invalid' : '' ?>" placeholder="Password" autocomplete="off">
                                <?php if (session('error.password')) { ?>
                                <div class="invalid-feedback">
                                    <h6><?= session('error.password') ?></h6>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Repeat Password</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </div>
                                <input type="password" name="pass_confirm" class="form-control <?= session('error.pass_confirm') ? 'is-invalid' : '' ?>" placeholder="Repeat Password" autocomplete="off">
                                <?php if (session('error.pass_confirm')) { ?>
                                <div class="invalid-feedback">
                                    <h6><?= session('error.pass_confirm') ?></h6>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Permission</label>
                        <div class="col-sm-10">
                            <select class="form-control select" name="permission[]" multiple="multiple" data-placeholder="Permission" style="width: 100%;">
                            <?php foreach ($permissions as $permission) { ?>
                                <option <?= in_array($permission['id'], old('permission', [])) ? 'selected' : '' ?> value="<?= $permission['id'] ?>"><?= $permission['name'] ?></option>
                            <?php } ?>
                            </select>
                            <?php if (session('error.permission')) { ?>
                                <h6 class="text-danger"><?= session('error.permission') ?></h6>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-10">
                            <select class="form-control select" name="role[]" multiple="multiple" data-placeholder="Role" style="width: 100%;">
                            <option></option>
                            </select>
                            <?php if (session('error.role')) { ?>
                                <h6 class="text-danger"><?= session('error.role') ?></h6>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="float-right">
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-sm btn-block btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
  <script>
    $('.select').select2({
        theme: 'bootstrap4'
    });
  </script>
<?= $this->endSection() ?>