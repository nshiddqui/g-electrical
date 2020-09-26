<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Worker Entity
 *
 * @property int $id
 * @property string $name
 * @property string $phone_number
 * @property string $adhar_card
 * @property string $address
 * @property \Cake\I18n\FrozenDate $date_of_birth
 * @property int $job_id
 * @property \Cake\I18n\FrozenDate $start_date
 * @property int $experience
 * @property string $account_number
 * @property string $account_holder_name
 * @property string $ifsc_code
 * @property string $bank_name
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Job $job
 * @property \App\Model\Entity\Payment[] $payments
 * @property \App\Model\Entity\Report[] $reports
 */
class Worker extends Entity
{
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
        'name' => true,
        'phone_number' => true,
        'adhar_card' => true,
        'address' => true,
        'date_of_birth' => true,
        'job_id' => true,
        'start_date' => true,
        'experience' => true,
        'account_number' => true,
        'account_holder_name' => true,
        'ifsc_code' => true,
        'bank_name' => true,
        'created' => true,
        'modified' => true,
        'job' => true,
        'payments' => true,
        'reports' => true,
    ];
}
