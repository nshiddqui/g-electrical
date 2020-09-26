<?php $companyName = 'Gujarat Electricals'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <?= $this->fetch('meta') ?>
        <title>
            <?= $companyName ?>:
            <?= $this->fetch('title') ?>
        </title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <?= $this->Html->component('bootstrap/dist/css/bootstrap.min') ?>
        <!-- Font Awesome -->
        <?= $this->Html->component('font-awesome/css/font-awesome.min') ?>
        <!-- Data Table -->
        <?= $this->Html->component('DataTables/datatables.min', 'css') ?>
        <!-- Ionicons -->
        <?= $this->Html->component('Ionicons/css/ionicons.min') ?>
        <!-- Select2 -->
        <?= $this->Html->component('select2/dist/css/select2.min', 'css') ?>
        <!-- bootstrap datepicker -->
        <?= $this->Html->component('bootstrap-datepicker/dist/css/bootstrap-datepicker.min') ?>
        <!-- bootstrap datetimepicker master -->
        <?= $this->Html->component('bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min') ?>
        <!-- Theme style -->
        <?= $this->Html->css('AdminLTE.min') ?>
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <?= $this->Html->css('skins/_all-skins.min') ?>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <?= $this->Html->css('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic') ?>

        <!-- jQuery 3 -->
        <?= $this->Html->component('jquery/dist/jquery.min', 'script') ?>
        <!-- Bootstrap 3.3.7 -->
        <?= $this->Html->component('bootstrap/dist/js/bootstrap.min', 'script') ?>
        

        <!-- SlimScroll -->
        <?= $this->Html->component('jquery-slimscroll/jquery.slimscroll.min', 'script') ?>
        <!-- FastClick -->
        <?= $this->Html->component('fastclick/lib/fastclick', 'script') ?>
        <!-- Select2 -->
        <?= $this->Html->component('select2/dist/js/select2.full.min', 'script') ?>
        <!-- bootstrap datepicker -->
        <?= $this->Html->component('bootstrap-datepicker/dist/js/bootstrap-datepicker.min', 'script') ?>
        <!-- bootstrap datetimepicker master -->
        <?= $this->Html->component('bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min', 'script') ?>

        <!-- Data Table -->
        <?= $this->Html->component('DataTables/datatables.min', 'script') ?>
        <!-- AdminLTE App -->
        <?= $this->Html->script('adminlte.min') ?>
        <!-- Initialization component -->
        <?= $this->Html->script('initialization') ?>
        <!-- DataTable Plugin -->
        <?= $this->DataTables->setJs() ?>
        <!-- Script & Style sheet Code -->
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>
    <!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
    <!-- the fixed layout is not compatible with sidebar-mini -->
    <body class="hold-transition skin-blue fixed sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">

            <header class="main-header">
                <?= $this->element('header') ?>
            </header>

            <!-- =============================================== -->

            <!-- Left side column. contains the sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <?= $this->element('sidebar') ?>
                <!-- /.sidebar -->
            </aside>

            <!-- =============================================== -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?= $this->fetch('title') ?>
                        <small><?= $this->fetch('title-descition') ?></small>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <?= $this->Flash->render() ?>
                    <?php if ($this->fetch('description')) { ?>
                        <div class="callout callout-info">
                            <p><?= $this->fetch('description') ?></p>
                        </div>
                    <?php } ?>
                    <!-- Default box -->
                    <div class="<?= isset($boxDisabled) ? '' : 'box' ?>">
                        <?= $this->fetch('content') ?>
                    </div>
                    <!-- /.box -->

                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 1.0
                </div>
                <strong>Copyright &copy; 2020 <a href="/"><?= $companyName ?></a>.</strong> All rights
                reserved.
            </footer>

            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->
    </body>
</html>
