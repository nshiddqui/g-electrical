<?php
$this->assign('title', 'Jobs');
?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">List Jobs</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <?= $this->DataTables->render('Jobs') ?>
    </div>
</div>