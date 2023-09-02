<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->renderSection('title') ?></title>
    <!-- Set favicon logo -->
    <?php if (!empty(get_option('favicon_logo'))) { ?><link rel="icon" href="<?php echo base_url('uploads/general/' . get_option('favicon_logo')); ?>"><?php } ?>
    <?= $this->include('includes/assets/header_assets') ?>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?= $this->include('includes/header') ?>
        <?= $this->include('includes/aside') ?>

        <div class="content-wrapper">
            <?= $this->include('includes/content') ?>
        </div>
        
        <?= $this->include('includes/footer') ?>  
    </div>
    <?= $this->include('includes/assets/footer_assets') ?>
</body>
</html>