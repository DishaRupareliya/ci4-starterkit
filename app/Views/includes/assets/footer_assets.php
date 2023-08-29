<script type="text/javascript" src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/adminlte.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/select2/js/select2.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/datatables/jquery.dataTables.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/sweetalert2/sweetalert2.all.min.js') ?>"></script>

<!-- DATATABLE JS LOAD -->
<script type="text/javascript" src="<?= base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/jszip/jszip.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/pdfmake/pdfmake.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/pdfmake/vfs_fonts.js') ?>"></script>
<!-- DATATABLE LOAD JS OVER -->

<!-- SWEET ALERT MESSAGES -->
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
</script>
<!-- SWEET ALERT MESSAGES OVER -->

<?= $this->renderSection('script') ?> 