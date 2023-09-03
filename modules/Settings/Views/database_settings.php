<div  id="branch_table_view">
    <div class="mb-3">
        <a href="javascript:void(0)" class="btn btn-secondary"><i class="fas fa-sync-alt mr-2"></i>Refresh</a>
        <a href="javascript:void(0)" class="btn btn-info" id="database_backup"><i class="fas fa-cloud-download-alt mr-2"></i>Database Backup
        </a>  
    </div>
    <div id="table_view">
        <table id="table" class="table table-striped table-hover va-middle">
            <thead>
                <tr>
                    <th>Database Backup</th>
                    <th>Date</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php $backups = list_files(ROOTPATH.'public/uploads/backups'); ?>
                <?php foreach ($backups as $backup) {
                        $fullPath              = ROOTPATH.'public/uploads/backups/' . $backup;
                        $backupNameNoExtension = preg_replace('/\\.[^.\\s]{3,4}$/', '', $backup); ?>
                <tr>
                    <td>
                        <a href="<?php echo site_url('admin/download/' . $backupNameNoExtension); ?>">
                            <?php echo $backup; ?>
                        </a>
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        <a href="<?php echo site_url('admin/deleteBackup/' . $backup); ?>"
                            class="tw-mt-px tw-text-neutral-500 hover:tw-text-neutral-700 focus:tw-text-neutral-700 _delete">
                            <i class="fas fa-trash-alt mr-2"></i>
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<script>
   $(function () {
        $('body').on('click', '#database_backup', function(event) {
            $.ajax({
                url: '<?= site_url('admin/backup') ?>',
                type: 'POST',
                dataType: 'json',
            }).done(function(res) {
                Toast.fire({
                    icon: res.type,
                    title: res.message,
                });
                location.reload(false);
            });
        });
   });
</script>