<div class="form-group mb-3 row">
    <div class="form-label col-sm-12">Email Settings</div>
    <div class="col-sm-12">
        <label class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="smtp" name="email_protocol" value="smtp" <?= (get_option('email_protocol') === 'smtp') ? 'checked' : 'checked' ?>>
            <span class="form-check-label">SMTP</span>
        </label>
        <label class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="send_mail" name="email_protocol" value="send_mail" <?= (get_option('email_protocol') === 'send_mail') ? 'checked' : '' ?>>
            <span class="form-check-label">SEND EMAIL</span>
        </label>
        <label class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="e_mail" name="email_protocol" value="e_mail" <?= (get_option('email_protocol') === 'e_mail') ? 'checked' : '' ?>>
            <span class="form-check-label">EMAIL</span>
        </label>
    </div>
</div>
<hr>
<div id="email_encryption_settings">
    <div class="from-group mb-3 row">
        <label class="form-label col-sm-12 col-form-label">Email Encryption</label>
        <div class="col-sm-12">
            <select class="select form-control" id="smtp_encryption" name="smtp_encryption" disabled>
                <option value="ssl" <?php if(get_option('smtp_encryption') == 'ssl') { echo 'selected'; } ?>>ssl</option>
                <option value="tls" <?php if(get_option('smtp_encryption') == 'tls') { echo 'selected'; } ?>>tls</option>
            </select>
        </div>
    </div>
    <div class="form-group mb-3 row">
        <div class="col-md-6 col-sm-12">
            <label class="form-label">SMTP host</label>
            <input type="text" class="form-control" placeholder="Enter host" id="smtp_host" name="smtp_host" required value="<?= get_option('smtp_host'); ?>" disabled>
        </div>
        <div class="col-md-6 col-sm-12">
            <label class="form-label">SMTP Port</label>
            <input type="text" class="form-control" placeholder="Enter port" id="smtp_port" name="smtp_port" required value="<?= get_option('smtp_port'); ?>" disabled>
        </div>
    </div>
    <div class="form-group mb-3 row">
        <div class="col-md-6 col-sm-12">
            <label class="form-label">SMTP Username</label>
            <input type="text" class="form-control" placeholder="Enter username" id="smtp_username" name="smtp_username" required value="<?= get_option('smtp_username'); ?>" disabled>
        </div>
        <div class="col-md-6 col-sm-12">
            <label class="form-label">SMTP Password</label>
            <input type="password" class="form-control" placeholder="Enter password" id="smtp_password" name="smtp_password" required value="<?= decode_values(get_option('smtp_password'), config('App')->encryption_key); ?>" disabled>
        </div>
    </div>
</div>
<div class="form-group mb-3 row">
    <label class="form-label col-sm-12">Email</label>
    <div class="col-sm-12">
        <input type="email" class="form-control" placeholder="Enter email" id="smtp_email" name="smtp_email" required value="<?= get_option('smtp_email'); ?>">
    </div>
</div>
<div class="form-group mb-3 row">
    <label class="form-label col-sm-12">Email Charset</label>
    <div class="col-sm-12">
        <input type="text" class="form-control" id="smtp_email_charset" name="smtp_email_charset" value="<?= get_option('smtp_email_charset') ?? ' utf-8'; ?>">
    </div>
</div>
<div class="form-group mb-3 row">
    <label class="form-label col-sm-12">BCC All Emails To</label>
    <div class="col-sm-12">
        <input type="text" class="form-control" id="bcc_emails" name="bcc_emails" value="<?= get_option('bcc_emails') ?>">
    </div>
</div>
<div class="form-group mb-3 row">
    <label class="form-label col-sm-12">Email Signature</label>
    <div class="col-sm-12">
        <textarea rows="8" class="form-control" name="email_signature" id="email_signature"><?php echo get_option('email_signature'); ?></textarea>
    </div>
</div>
<div class="form-group mb-3 row">
    <label class="form-label col-sm-12">Predefined Header</label>
    <div class="col-sm-12">
        <textarea rows="8" class="form-control" name="email_header" id="email_header"><?php echo get_option('email_header'); ?></textarea>
    </div>
</div>
<div class="form-group mb-3 row">
    <label class="form-label col-sm-12">Predefined Footer</label>
    <div class="col-sm-12">
        <textarea rows="8" class="form-control" name="email_footer" id="email_footer"><?php echo get_option('email_footer'); ?></textarea>
    </div>
</div>
<hr>
<div class="form-group mb-3">
    <label class="form-label col-md-12">Send Test Email</label>
    <div class="row">
        <div class="col-md-10 mb-3">
            <input type="email" class="form-control email_addres" placeholder="Email address">
            <small class="form-hint">Send test email to make sure that your SMTP settings is set correctly.</small>
        </div>
        <div class="col-md-2">
            <a href="javascript:void(0)" id="test_mail" class="btn btn-primary" onclick="sendTestMail()">Test</a>
        </div>
    </div>
</div>
<script>
    $(function() {
        $('.select').select2({
          theme: 'bootstrap4'
        });
        
        $('#email_encryption_settings').hide();
        var checked = $('input[name=email_protocol]:checked').val();
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
            $('#smtp_encryption, #smtp_host, #smtp_port, #smtp_username, #smtp_password').removeAttr('disabled');
        }

        function disable_additional_options() {
            $('#smtp_encryption, #smtp_host, #smtp_port, #smtp_username, #smtp_password').attr('disabled');
        }
    });
    
    function sendTestMail() {
        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        if (emailPattern.test($('.email_addres').val())) {
            $.ajax({
                url: '<?= site_url('admin/send') ?>',
                type: 'post',
                dataType : 'JSON',
                data: {
                    email : $('.email_addres').val(),
                },
            }).done(function(res) {
                Toast.fire({
                    icon : res.type,
                    title : res.message,
                });
                $('.email_addres').val('');
            });
        } else {
            Toast.fire({
                icon: 'error',
                title: 'Set valid email address',
            });
            $('.email_addres').val('');
        }
    }
</script>
