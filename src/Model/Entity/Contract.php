<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Contract Entity
 *
 * @property int $id
 * @property int $client_id
 * @property string $file
 * @property \Cake\I18n\DateTime|null $created
 *
 * @property \App\Model\Entity\Client $client
 */
class Contract extends Entity
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
        'file' => true,
        'created' => true,
        'client' => true,
    ];
}
