<?php

foreach ($results as $result) {
    $this->DataTables->prepareData([
        h($result->client_name),
        h($result->email),
        $result->status ? 'Active' : 'Inactive',
        $this->Form->postLink('<i class="fa fa-dot-circle-o"></i>', ['action' => 'active', $result->id, ($result->status == '1' ? '0' : '1')], ['confirm' => __('Are you sure you want to ' . ($result->status == '1' ? 'Deactivate' : 'Activate') . ' # {0}?', $result->client_name), 'escape' => false, 'class' => 'btn btn-info']) . '&nbsp;' .
        $this->Form->postLink('<i class="fa fa-trash"></i>', ['action' => 'delete', $result->id], ['confirm' => __('Are you sure you want to delete # {0}?', $result->client_name), 'escape' => false, 'class' => 'btn btn-info']) . '&nbsp;' .
        $this->Html->link(__('<i class="fa fa-pencil"></i>'), ['action' => 'edit', $result->id], ['class' => 'btn btn-info', 'escape' => false])
    ]);
}
echo $this->DataTables->response();
