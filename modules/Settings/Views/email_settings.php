<div class="form-group mb-3 row">
    <div class="form-label col-sm-12">Email Settings</div>
    <div class="col-sm-12">
        <label class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="smtp" name="emailSettings" value="smtp" <?= (get_option('emailSettings') === 'smtp') ? 'checked' : '' ?>>
            <span class="form-check-label">SMTP</span>
        </label>
        <label class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="send_mail" name="emailSettings" value="send_mail" <?= (get_option('emailSettings') === 'send_mail') ? 'checked' : '' ?>>
            <span class="form-check-label">SEND EMAIL</span>
        </label>
        <label class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="e_mail" name="emailSettings" value="e_mail" <?= (get_option('emailSettings') === 'e_mail') ? 'checked' : '' ?>>
            <span class="form-check-label">EMAIL</span>
        </label>
    </div>
</div>
<hr>
<div id="email_encryption_settings">
    <div class="from-group mb-3 row">
        <label class="form-label col-sm-12 col-form-label">Email Encryption</label>
        <div class="col-sm-12">
            <select class="select form-control" id="emailEncryption" name="emailEncryption" disabled>
                <option value=""></option>
                <option value="ssl" <?php if(get_option('emailEncryption') == 'ssl') { echo 'selected'; } ?>>ssl</option>
                <option value="tls" <?php if(get_option('emailEncryption') == 'tls') { echo 'selected'; } ?>>tls</option>
            </select>
        </div>
    </div>
    <div class="form-group mb-3 row">
        <div class="col-md-6 col-sm-12 mb-3">
            <label class="form-label">SMTP host</label>
            <input type="text" class="form-control" placeholder="Enter host" id="smtpHost" name="smtpHost" required value="<?= get_option('smtpHost'); ?>" disabled>
        </div>
        <div class="col-md-6 col-sm-12">
            <label class="form-label">SMTP Port</label>
            <input type="text" class="form-control" placeholder="Enter port" id="smtpPort" name="smtpPort" required value="<?= get_option('smtpPort'); ?>" disabled>
        </div>
    </div>
    <div class="form-group mb-3 row">
        <div class="col-md-6 col-sm-12 mb-3">
            <label class="form-label">SMTP Username</label>
            <input type="text" class="form-control" placeholder="Enter username" id="smtpUsername" name="smtpUsername" required value="<?= get_option('smtpUsername'); ?>" disabled>
        </div>
        <div class="col-md-6 col-sm-12">
            <label class="form-label">SMTP Password</label>
            <input type="password" class="form-control" placeholder="Enter password" id="smtpPassword" name="smtpPassword" required value="<?= get_option('smtpPassword'); ?>" disabled>
        </div>
    </div>
</div>
<div class="form-group mb-3 row">
    <label class="form-label col-sm-12">Email address</label>
    <div class="col-sm-12">
        <input type="email" class="form-control" placeholder="Enter email" id="email" name="email" required value="<?= get_option('email'); ?>">
    </div>
</div>
<hr>
<div class="form-group mb-3">
    <label class="form-label col-md-12">Send Test Email</label>
    <div class="row">
        <div class="col-md-10 mb-3">
            <input type="email" class="form-control" placeholder="Email address">
            <small class="form-hint">Send test email to make sure that your SMTP settings is set correctly.</small>
        </div>
        <div class="col-md-2">
            <a href="#" id="test_mail" class="btn btn-primary">Test</a>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.select').select2();
        $('#email_encryption_settings').hide();
        var checked = $('input[name=emailSettings]:checked').val();
        if(checked == 'send_mail' || checked == 'smtp') {
            $('#email_encryption_settings').show();
            enable_additional_options();
        }
        if(checked == 'e_mail') {
            $('#email_encryption_settings').hide();
            disable_additional_options(); 
        }
        $('#smtp, #send_mail').on('change', function () {
            $('#email_encryption_settings').show();
            enable_additional_options();
        });
        $('#e_mail').on('change', function(event) {
            $('#email_encryption_settings').hide();
            disable_additional_options();
        });

        function enable_additional_options() {
            $('#emailEncryption, #smtpHost, #smtpPort, #smtpUsername, #smtpPassword').removeAttr('disabled');
        }

        function disable_additional_options() {
            $('#emailEncryption, #smtpHost, #smtpPort, #smtpUsername, #smtpPassword').attr('disabled');
        }

    });
</script>
