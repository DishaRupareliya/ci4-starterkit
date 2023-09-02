<!-- LOAD DATATABLE CSS-->
<?= $this->section('css') ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<link href="https://cdn.datatables.net/v/bs4-4.6.0/jszip-2.5.0/af-2.5.3/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/cr-1.6.2/r-2.4.1/sr-1.2.2/datatables.min.css" rel="stylesheet"/>
<?= $this->endSection() ?>
<!-- LOAD DATATABLE CSS OVER -->

<!-- LOAD DATATABLE JS -->
<?= $this->section('script') ?>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/bs4-4.6.0/jszip-2.5.0/dt-1.13.4/af-2.5.3/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/cr-1.6.2/fc-4.2.2/fh-3.3.2/r-2.4.1/rr-1.3.3/sc-2.1.1/sb-1.4.2/sp-2.1.2/sl-1.6.2/sr-1.2.2/datatables.min.js"></script>
<script>
    // Miscellaneous Settings : Start
    // Set dynamic export buttons
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
<?= $this->endSection() ?>
<!-- LOAD DATATABLE JS OVER -->