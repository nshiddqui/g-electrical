<?php

foreach ($results as $result) {
    $this->DataTables->prepareData([
        h($result->name),
        h($result->phone_number),
        h($result->adhar_card),
        h($result->bank_name),
        h($result->account_holder_name),
        h($result->account_number),
        h($result->ifsc_code),
        h($result->date_of_birth),
        !empty($result['job']) ? $result['job']->name : '',
        h($result->start_date),
        h($result->experience),
        h($result->address),
        $this->Form->postLink('<i class="fa fa-trash"></i>', ['action' => 'delete', $result->id], ['confirm' => __('Are you sure you want to delete # {0}?', $result->name), 'escape' => false, 'class' => 'btn btn-info']) . '&nbsp;' .
        $this->Html->link(__('<i class="fa fa-pencil"></i>'), ['action' => 'edit', $result->id], ['class' => 'btn btn-info', 'escape' => false])
    ]);
}
echo $this->DataTables->response();
