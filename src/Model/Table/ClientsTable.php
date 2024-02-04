<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Clients Model
 *
 * @property \App\Model\Table\ContractsTable&\Cake\ORM\Association\HasMany $Contracts
 * @property \App\Model\Table\NotificationsTable&\Cake\ORM\Association\HasMany $Notifications
 *
 * @method \App\Model\Entity\Client newEmptyEntity()
 * @method \App\Model\Entity\Client newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Client> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Client get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Client findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Client patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Client> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Client|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Client saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Client>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Client>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Client>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Client> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Client>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Client>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Client>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Client> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ClientsTable extends Table
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

        $this->setTable('clients');
        $this->setDisplayField('email');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Contracts', [
            'foreignKey' => 'client_id',
            'dependent'=>true
        ]);
        $this->hasMany('Notifications', [
            'foreignKey' => 'client_id',
            'dependent'=>true
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
            ->scalar('firstname')
            ->maxLength('firstname', 255)
            ->allowEmptyString('firstname');

        $validator
            ->scalar('lastname')
            ->maxLength('lastname', 255)
            ->allowEmptyString('lastname');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 255)
            ->allowEmptyString('phone');

        $validator
            ->scalar('afm')
            ->maxLength('afm', 255)
            ->allowEmptyString('afm');

        return $validator;
    }
}
