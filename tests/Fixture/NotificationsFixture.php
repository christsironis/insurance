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
                'name' => 'Lorem ipsum dolor sit amet',
                'sms' => 1,
                'email' => 1,
                'file' => 'Lorem ipsum dolor sit amet',
                'completed' => 1,
                'exp_date' => '2024-02-03',
                'created' => '2024-02-03 20:57:13',
            ],
        ];
        parent::init();
    }
}
