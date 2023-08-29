<?= $this->include('App\Views\load\datatables') ?>
<?= $this->extend('master') ?>
<?= $this->section('title') ?><?= $title ?><?= $this->endSection() ?>
<?= $this->section('content_header') ?><h1><?= $title ?></h1><?= $this->endSection() ?>
<?= $this->section('link') ?>User<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="card card-primary card-outline">
    <div class="card-header">
        <div class="card-tools">
            <div class="btn-group">
                <a href="<?= route_to('admin/user/manage') ?>" class="btn btn-sm btn-block btn-primary"><i class="fa fa-plus"></i>
                    Add User
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="table-user" class="table table-striped table-hover va-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Active</th>
                                <th>Member since</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>