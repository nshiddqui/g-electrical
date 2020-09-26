<?php
$this->assign('title', 'Reports');
?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">List Reports</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <?= $this->DataTables->render('Reports') ?>
    </div>
</div>