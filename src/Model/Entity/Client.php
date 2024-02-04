<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Client Entity
 *
 * @property int $id
 * @property string|null $firstname
 * @property string|null $lastname
 * @property string $email
 * @property string|null $phone
 * @property string|null $afm
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Contract[] $contracts
 * @property \App\Model\Entity\Notification[] $notifications
 */
class Client extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'firstname' => true,
        'lastname' => true,
        'email' => true,
        'phone' => true,
        'afm' => true,
        'created' => true,
        'modified' => true,
        'contracts' => true,
        'notifications' => true,
    ];
}
