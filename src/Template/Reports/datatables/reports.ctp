<?php

foreach ($results as $result) {
    $this->DataTables->prepareData([
        h($result['user']->client_name),
        h($result['worker']->name),
        h($result['location']->address),
        h($result->start_time),
        h($result->end_time),
        $this->Form->postLink('<i class="fa fa-trash"></i>', ['action' => 'delete', $result->id], ['confirm' => __('Are you sure you want to delete # {0}?', $result->client_name), 'escape' => false, 'class' => 'btn btn-info']) . '&nbsp;' .
        $this->Html->link(__('<i class="fa fa-pencil"></i>'), ['action' => 'edit', $result->id], ['class' => 'btn btn-info', 'escape' => false])
    ]);
}
echo $this->DataTables->response();
