<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Report Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $start_time
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $end_time
 * @property int $worker_id
 * @property int $location_id
 * @property string|null $notes
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Worker $worker
 * @property \App\Model\Entity\Location $location
 */
class Report extends Entity {

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'start_time' => true,
        'user_id' => true,
        'end_time' => true,
        'worker_id' => true,
        'location_id' => true,
        'notes' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'worker' => true,
        'location' => true,
    ];

}
