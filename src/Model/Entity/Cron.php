<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cron Entity
 *
 * @property int $id
 * @property int $notification_id
 * @property \Cake\I18n\DateTime $execute_date
 * @property \Cake\I18n\DateTime|null $created
 *
 * @property \App\Model\Entity\Notification $notification
 */
class Cron extends Entity
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
        'notification_id' => true,
        'execute_date' => true,
        'created' => true,
        'notification' => true,
    ];
}
