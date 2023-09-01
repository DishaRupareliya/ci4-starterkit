<?= $this->include('App\Views\load\select2') ?>
<?= $this->extend('master') ?>
<?= $this->section('title') ?><?= $title ?><?= $this->endSection() ?>
<?= $this->section('link') ?><?= $title ?><?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="row">
	<div class="col-md-3"><h4>Settings</h4></div>
	<div class="col-md-9">
		<h4 id="setting_title"></h4>
	</div>
</div>
<div class="row">
	<div class="col-md-3">
		<div class="list-group list-group-transparent mb-3">
			<a class="list-group-item list-group-item-action d-flex align-items-center active" href="#" id="general_settings"><i class="fas fa-cog mr-2"></i></i>General Settings</a>
			<a class="list-group-item list-group-item-action d-flex align-items-center" href="#" id="email_settings"><i class="far fa-envelope mr-2"></i>Email Settings</a>
			<a class="list-group-item list-group-item-action d-flex align-items-center" href="#" id="recaptcha_settings"><i class="fas fa-key mr-2"></i>Re-captcha Settings</a>
			<a class="list-group-item list-group-item-action d-flex align-items-center" href="#" id="miscellaneous_settings"><i class="fas fa-list-ul mr-2"></i>Miscellaneous Settings</a>
			<a class="list-group-item list-group-item-action d-flex align-items-center" href="#" id="database_settings"><i class="fas fa-database mr-2"></i>Database Settings</a>
		</div>
	</div>
	<div class="col-sm-9">
		<div class="card">
			<div class="card-body">
				<form id="settings_form" enctype="multipart/form-data" method="post">
					<div id="display">

					</div>
				</div>
				<div class="card-footer">
					<button type="button" class="btn btn-primary" id="save_setting">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
	$(function() {
		data = {title : 'General Settings', settings_view_name : 'general_settings', csrf : $('meta[name="csrf-token"]').attr('content')};
		$('#setting_title').html('General Settings');
		$('#display').load('<?= site_url('admin/settings_view'); ?>', data);

		$('body').on('click', '.list-group a', function(event) {
			event.preventDefault();
			$('.list-group a').removeClass('active');
			$(this).addClass('active');
		});

		$('body').on('click', '#general_settings, #email_settings, #recaptcha_settings, #miscellaneous_settings, #database_settings', function(event) {
			var settings_view_name = $(this).attr('id');
			var settings_title = $(this).text();
			$('#display').show();
			$('#setting_title').html(settings_title);
			data = {title : settings_title, settings_view_name : settings_view_name, csrf : $('meta[name="csrf-token"]').attr('content')};
			$('#display').load('<?= site_url('admin/settings_view'); ?>', data);
		});

		$(document).on('click', '#save_setting', function(event) {
			var formData = new FormData($('#settings_form')[0]);
			$.ajax({
				url: '<?= site_url('admin/save_settings'); ?>',
				type: 'POST',
				dataType : 'JSON',
				data : formData,
				contentType: false,  
				cache: false,  
				processData:false,  
			}).done(function(res) {
				if(res.success == true) {
					Toast.fire({
	                    icon: 'success',
	                    title: 'Settings updated succesfully'
	                });
	                location.reload(false);
				}
			});
		});
	});
</script>
<?= $this->endSection() ?>