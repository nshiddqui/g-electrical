<?php
$this->assign('title', 'Reports');
?>
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"><?= __('Add Report') ?></h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
        </div>
    </div>
    <?= $this->Form->create($report) ?>
    <div class="box-body">
        <?php
        echo $this->Form->control('worker_id', ['label' => 'Worker Name', 'options' => $workers]);
        echo $this->Form->control('location_id', ['label' => 'Location', 'options' => $locations]);
        echo $this->Form->control('start_time', ['type' => 'text', 'datetimepicker' => true]);
        echo $this->Form->control('end_time', ['type' => 'text', 'datetimepicker' => true]);
        echo $this->Form->control('notes');
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