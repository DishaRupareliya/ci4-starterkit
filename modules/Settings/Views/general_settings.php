<div class="form-group mb-3 row">
	<label class="form-label col-sm-2 col-form-label">Favicon</label>
	<?php if (empty(get_option('favicon'))): ?>
		<div class="col-sm-10" id="favicon_field">
			<input type="file" class="form-control" name="favicon" id="favicon">
			<div class="col-md-9">
				<img src="<?= base_url().'/uploads/general/'.get_option('favicon').'' ?>" id="preview-favicon" class="img img-responsive mt-3" alt="" width="50%">	
			</div>
		</div>
	<?php endif ?>
	<?php if (!empty(get_option('favicon'))): ?>
		<div class="col-sm-10" id="favicon_view">
			<img src="<?= base_url().'/uploads/general/'.get_option('favicon').'' ?>" alt="" class="img img-responsive mt-3" width="50%">
			<a href="" data-name="favicon" id="delete"><i class="fas fa-times"></i></a>
		</div>
	<?php endif ?>
</div>
<div class="form-group mb-3 row">
	<label class="form-label col-sm-2 col-form-label">Logo</label>
	<?php if (empty(get_option('logo'))): ?>
		<div class="col-sm-10" id="logo_field">
			<input type="file" class="form-control" name="logo" id="logo">
			<img src="<?= base_url().'/uploads/general/'.get_option('logo').'' ?>" id="preview-logo" alt="" class="img img-responsive mt-3" width="50%">
		</div>
	<?php endif ?>
	<?php if (!empty(get_option('logo'))): ?>
		<div class="col-sm-10" id="logo_view">
			<img src="<?= base_url().'/uploads/general/'.get_option('logo').'' ?>" alt="" class="img img-responsive mt-3" width="50%">
			<a href="" data-name="logo" id="delete"><i class="fas fa-times"></i></a>
		</div>
	<?php endif ?>
</div>
<div class="form-group mb-3 row">
	<label class="form-label col-sm-2 col-form-label">Site Name</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="siteName" name="siteName" placeholder="Enter Site Name" value="<?= get_option('siteName') ?>" required>
	</div>
</div>
<div class="form-group mb-3 row">
	<label class="form-label col-sm-2 col-form-label">Footer</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="footer" name="footer" placeholder="Enter Footer" value="<?= get_option('footer') ?>" required>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('#preview-favicon').hide();
		$('#favicon').change(function(){
			let reader = new FileReader();
			reader.onload = (e) => {
				$('#preview-favicon').show();
				$('#preview-favicon').attr('src', e.target.result); 
			}
			reader.readAsDataURL(this.files[0]); 
		}); 

		$('#preview-logo').hide();
		$('#logo').change(function(){
			let reader = new FileReader();
			reader.onload = (e) => {
				$('#preview-logo').show();
				$('#preview-logo').attr('src', e.target.result); 
			}
			reader.readAsDataURL(this.files[0]); 
		}); 

		$(document).on('click', '#delete', function(event) {
			var name = $(this).data('name');
			swal({
				title: "Are you sure ??",
				text: 'You want to delete', 
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					$.ajax({
						url: '<?= site_url('oes/settings/delete/'); ?>' + name,
						type: "POST",
						dataType: "JSON",
						success: function () {
							location.reload();
						},
						error: function (xhr, ajaxOptions, thrownError) {
							swal("Error deleting!", "Please try again", "error");
						}
					});
				}
			});
		});
	});
</script>