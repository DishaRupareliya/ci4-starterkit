<div  id="branch_table_view">
    <div class="mb-3 float-right">
        <a href="javascript:void(0)" class="btn btn-primary" id="database_backup"><i class="fas fa-cloud-download-alt mr-2"></i>Database Backup
        </a>  
    </div>
    <div id="table_view">
        <table id="table" class="table table-striped table-hover va-middle">
            <thead>
                <tr>
                    <th>Database Backup</th>
                    <th>Date</th>
                    <th>File Size</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php $backups = list_files(ROOTPATH.'public/uploads/backups'); ?>
                <?php foreach ($backups as $backup) {
                        $fullPath              = ROOTPATH.'public/uploads/backups/' . $backup;
                        $backupNameNoExtension = preg_replace('/\\.[^.\\s]{3,4}$/', '', $backup);
                        $fileSizeFormatted = formatFileSize(filesize($fullPath));
                    ?>
                <tr>
                    <td>
                        <a href="<?php echo site_url('admin/download/' . $backupNameNoExtension); ?>">
                            <?php echo $backup; ?>
                        </a>
                    </td>
                    <td>
                        <?php echo date('Y-m-d H:m:s', filectime($fullPath)); ?>
                    </td>
                    <td>
                        <?php echo $fileSizeFormatted ?>
                    </td>
                    <td>
                        <a href="<?php echo site_url('admin/deleteBackup/' . $backup); ?>" class="ml-4"><i class="fas fa-trash-alt "></i></a>
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