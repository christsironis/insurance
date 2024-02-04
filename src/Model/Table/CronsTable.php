<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Crons Model
 *
 * @property \App\Model\Table\NotificationsTable&\Cake\ORM\Association\BelongsTo $Notifications
 *
 * @method \App\Model\Entity\Cron newEmptyEntity()
 * @method \App\Model\Entity\Cron newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Cron> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cron get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Cron findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Cron patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Cron> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cron|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Cron saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Cron>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Cron>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Cron>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Cron> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Cron>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Cron>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Cron>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Cron> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CronsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('crons');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Notifications', [
            'foreignKey' => 'notification_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('notification_id')
            ->notEmptyString('notification_id');

        $validator
            ->dateTime('execute_date')
            ->requirePresence('execute_date', 'create')
            ->notEmptyDateTime('execute_date');

        $validator
            ->integer('completed')
            ->notEmptyString('completed');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['notification_id'], 'Notifications'), ['errorField' => 'notification_id']);

        return $rules;
    }
}
