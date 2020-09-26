<?php
$this->assign('title', 'Workers');
?>
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"><?= __('Edit Worker') ?></h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
        </div>
    </div>
    <?= $this->Form->create($worker) ?>
    <div class="box-body">
        <?php
        echo $this->Form->control('name');
        echo $this->Form->control('phone_number', ['type' => 'number']);
        echo $this->Form->control('adhar_card', ['type' => 'number']);
        echo $this->Form->control('bank_name');
        echo $this->Form->control('account_holder_name');
        echo $this->Form->control('account_number');
        echo $this->Form->control('ifsc_code');
        echo $this->Form->control('date_of_birth', ['type' => 'text', 'datepicker' => true]);
        echo $this->Form->control('job_id', ['label' => 'Job Title', 'options' => $jobs]);
        echo $this->Form->control('start_date', ['type' => 'text', 'datepicker' => true]);
        echo $this->Form->control('experience');
        echo $this->Form->control('address', ['type' => 'textarea']);
        ?>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <?= $this->Form->button(__('Update')) ?>
    </div>
    <?= $this->Form->end() ?>
    <!-- /.box-footer-->
</div>
<!-- /.box -->