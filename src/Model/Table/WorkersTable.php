<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Workers Model
 *
 * @property \App\Model\Table\JobsTable&\Cake\ORM\Association\BelongsTo $Jobs
 * @property \App\Model\Table\PaymentsTable&\Cake\ORM\Association\HasMany $Payments
 * @property \App\Model\Table\ReportsTable&\Cake\ORM\Association\HasMany $Reports
 *
 * @method \App\Model\Entity\Worker get($primaryKey, $options = [])
 * @method \App\Model\Entity\Worker newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Worker[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Worker|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Worker saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Worker patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Worker[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Worker findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class WorkersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('workers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Jobs', [
            'foreignKey' => 'job_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Payments', [
            'foreignKey' => 'worker_id',
        ]);
        $this->hasMany('Reports', [
            'foreignKey' => 'worker_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('phone_number')
            ->maxLength('phone_number', 20)
            ->requirePresence('phone_number', 'create')
            ->notEmptyString('phone_number');

        $validator
            ->scalar('adhar_card')
            ->maxLength('adhar_card', 12)
            ->requirePresence('adhar_card', 'create')
            ->notEmptyString('adhar_card');

        $validator
            ->scalar('address')
            ->maxLength('address', 255)
            ->requirePresence('address', 'create')
            ->notEmptyString('address');

        $validator
            ->date('date_of_birth')
            ->requirePresence('date_of_birth', 'create')
            ->notEmptyDate('date_of_birth');

        $validator
            ->date('start_date')
            ->requirePresence('start_date', 'create')
            ->notEmptyDate('start_date');

        $validator
            ->integer('experience')
            ->requirePresence('experience', 'create')
            ->notEmptyString('experience');

        $validator
            ->scalar('account_number')
            ->maxLength('account_number', 20)
            ->requirePresence('account_number', 'create')
            ->notEmptyString('account_number');

        $validator
            ->scalar('account_holder_name')
            ->maxLength('account_holder_name', 100)
            ->requirePresence('account_holder_name', 'create')
            ->notEmptyString('account_holder_name');

        $validator
            ->scalar('ifsc_code')
            ->maxLength('ifsc_code', 10)
            ->requirePresence('ifsc_code', 'create')
            ->notEmptyString('ifsc_code');

        $validator
            ->scalar('bank_name')
            ->maxLength('bank_name', 50)
            ->requirePresence('bank_name', 'create')
            ->notEmptyString('bank_name');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['job_id'], 'Jobs'));

        return $rules;
    }
}
