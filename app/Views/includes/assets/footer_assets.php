<script type="text/javascript" src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/adminlte.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/sweetalert2/sweetalert2.all.min.js') ?>"></script>
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
<script>
    // Miscellaneous Settings : Start
    // Set dynemic export buttons
    <?php
        $exportOptions = ('yes' == get_option('table_export_btn')) ? "['colvis', 'excel', 'csv', 'copy', 'pdf', 'print']" : "['colvis']";
    ?>
    var exportButton = <?php echo $exportOptions; ?>;
    // Set Datatable related settings
    var responsive_table = "<?= ('yes' == get_option('res_table')) ? true : false; ?>";
    var length_options = [10,25,50,100];
    var length_options_names = [10,25,50,100];
    var default_length = "<?php echo !empty(get_option('tables_pagination_limit')) ? get_option('tables_pagination_limit') : 25; ?>";
    if ($.inArray(<?php echo !empty(get_option('tables_pagination_limit')) ? get_option('tables_pagination_limit') : 10; ?>, length_options) == -1) {
        length_options.push(<?php echo get_option('tables_pagination_limit'); ?>);
        length_options_names.push(<?php echo get_option('tables_pagination_limit'); ?>);
    }
    // Miscellaneous Settings : Over
</script>
<!-- SWEET ALERT MESSAGES OVER -->

<?= $this->renderSection('script') ?> 