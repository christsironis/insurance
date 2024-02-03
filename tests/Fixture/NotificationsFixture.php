<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * NotificationsFixture
 */
class NotificationsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'client_id' => 1,
                'sms' => 1,
                'email' => 1,
                'file' => 'Lorem ipsum dolor sit amet',
                'exp_date' => '2024-02-02',
                'created' => '2024-02-02 19:04:00',
            ],
        ];
        parent::init();
    }
}
