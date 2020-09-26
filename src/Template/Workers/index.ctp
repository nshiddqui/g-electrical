<?php
$this->assign('title', 'Workers');
?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">List Workers</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <?= $this->DataTables->render('Workers') ?>
    </div>
</div>