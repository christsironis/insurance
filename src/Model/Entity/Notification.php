<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Notification Entity
 *
 * @property int $id
 * @property int $client_id
 * @property string|null $name
 * @property int $sms
 * @property int $email
 * @property string $file
 * @property int $completed
 * @property \Cake\I18n\Date|null $exp_date
 * @property \Cake\I18n\DateTime|null $created
 *
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\Cron[] $crons
 */
class Notification extends Entity
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
        'client_id' => true,
        'name' => true,
        'sms' => true,
        'email' => true,
        'file' => true,
        'completed' => true,
        'exp_date' => true,
        'created' => true,
        'client' => true,
        'crons' => true,
    ];
}
