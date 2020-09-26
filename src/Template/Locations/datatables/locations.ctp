<?php

foreach ($results as $result) {
    $this->DataTables->prepareData([
        h($result->address),
        h($result->pin_code),
        $this->Form->postLink('<i class="fa fa-trash"></i>', ['action' => 'delete', $result->id], ['confirm' => __('Are you sure you want to delete # {0}?', $result->name), 'escape' => false, 'class' => 'btn btn-info']) . '&nbsp;' .
        $this->Html->link(__('<i class="fa fa-pencil"></i>'), ['action' => 'edit', $result->id], ['class' => 'btn btn-info', 'escape' => false])
    ]);
}
echo $this->DataTables->response();
