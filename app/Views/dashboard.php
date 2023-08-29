<?= $this->include('App\Views\load\datatables') ?>
<?= $this->include('App\Views\load\select2') ?>
<?= $this->extend('master') ?>
<?= $this->section('title') ?><?= $title ?><?= $this->endSection() ?>
<?= $this->section('content_header') ?><h1><?= $title ?></h1><?= $this->endSection() ?>
<?= $this->section('link') ?><?= $title ?><?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                          <label for="versions">Versions</label>
                          <select class="form-control select2" id="versions" style="width: 100%;" name="versions" multiple="true">
                             
                          </select>
                        </div>        
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                          <label for="item_name">Item Name</label>
                          <select class="form-control select2" id="item_name" style="width: 100%;" name="item_name" multiple="true">
                            <option></option>
                          </select>
                        </div>        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="m-0">Purchase Codes</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                    	<table id="table-purchasecode" class="table table-bordered table-striped" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Item ID</th>
                                    <th>Item Name</th>
                                    <th>Purchase Code</th>
                                    <th>I.Version</th>
                                    <th>Buyer</th>
                                    <th>License Type</th>
                                    <th>Activated Domain</th>
                                    <th>Purchase Time</th>
                                    <th>Action</th>
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
</div>

<?= $this->endSection() ?>
<?= $this->section('script'); ?>
<script>
	$(function() {
		$('#versions, #item_name').select2({
            placeholder: 'Select an option',
            allowClear: true
        });
	});
</script>
<?= $this->endSection(); ?>