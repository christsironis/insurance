<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CronsFixture
 */
class CronsFixture extends TestFixture
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
                'notification_id' => 1,
                'execute_date' => '2024-02-03 09:07:42',
                'created' => '2024-02-03 09:07:42',
            ],
        ];
        parent::init();
    }
}
