<?php
$this->assign('title', 'Payments');
?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">List Payments</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <?= $this->DataTables->render('Payments') ?>
    </div>
</div>