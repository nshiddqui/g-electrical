<?php
$this->assign('title', 'Locations');
?>
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"><?= __('Add Location') ?></h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
        </div>
    </div>
    <?= $this->Form->create($location) ?>
    <div class="box-body">
        <?php
        echo $this->Form->control('address', ['type' => 'textarea']);
        echo $this->Form->control('pin_code');
        ?>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <?= $this->Form->button(__('Add')) ?>
    </div>
    <?= $this->Form->end() ?>
    <!-- /.box-footer-->
</div>
<!-- /.box -->