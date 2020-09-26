<?php
$this->assign('title', 'Locations');
?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">List Locations</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <?= $this->DataTables->render('Locations') ?>
    </div>
</div>