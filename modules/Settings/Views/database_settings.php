<div  id="branch_table_view">
    <div class="mb-3">
        <a href="javascript:void(0)" class="btn btn-danger"><i class="fas fa-trash-alt mr-2"></i>Delete All</a>
        <a href="javascript:void(0)" class="btn btn-secondary"><i class="fas fa-sync-alt mr-2"></i>Refresh</a>
        <a href="javascript:void(0)" class="btn btn-info" id="database_backup"><i class="fas fa-cloud-download-alt mr-2"></i>Database Backup
        </a>  
    </div>
    <div id="table_view">
        <table id="table" class="table table-striped table-hover va-middle">
            <thead>
                <tr>
                    <th style="width: 10px;">#</th>
                    <th>Srno</th>
                    <th>Database Backup</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
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
                console.log(res);
            });
        });
   });
</script>