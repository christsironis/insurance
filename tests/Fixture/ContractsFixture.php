<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ContractsFixture
 */
class ContractsFixture extends TestFixture
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
                'notification_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'file' => 'Lorem ipsum dolor sit amet',
                'exp_date' => '2024-02-03',
                'created' => '2024-02-03 20:57:13',
            ],
        ];
        parent::init();
    }
}
