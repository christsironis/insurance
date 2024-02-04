<?php
namespace App\Command;

use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\ORM\TableRegistry;
use App\Utility\Crons;

class CronsCommand extends Command
{
    public function execute(Arguments $args, ConsoleIo $io): int
    {
        $tableCrons = TableRegistry::getTableLocator()->get('Crons');
        $crons = $tableCrons->find('all',['contain'=>['Notifications']])->where(['Crons.completed'=>0,'execute_date <= NOW()'])->all();
        $cronUtility = new Crons();

        foreach($crons as $cron){

            $cronUtility->sendEmail($cron->notification->client_id,$cron->notification->file,'notification');

            // complete cron
            $cron = $tableCrons->patchEntity($cron, ['completed'=>1]);
            $tableCrons->save($cron);
        }
        $io->out("crons: ".count($crons));

        return static::CODE_SUCCESS;
    }
}