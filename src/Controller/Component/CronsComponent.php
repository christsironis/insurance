<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

class CronsComponent extends Component
{
    public function sendEmail($client_id,$file){

        $tableClients = TableRegistry::getTableLocator()->get('Clients');
        $client = $tableClients->get($client_id);
        $tableSettings = TableRegistry::getTableLocator()->get('Settings');
        $text = $tableSettings->find()->where(['code'=>'email'])->first()->value;

        $text = str_replace('{{name}}',$client->firstname.' '.$client->lastname,$text);
        

    }

    public function createCrons( $notification_id, $dates ){
        $tableCrons = TableRegistry::getTableLocator()->get('Crons');

        foreach( $dates as $date ){
            $cron = $tableCrons->newEmptyEntity();

            $data = [
                'notification_id'=>$notification_id,
                'execute_date'=>$date
            ];

            $cron = $tableCrons->patchEntity($cron, $data);

            $tableCrons->save($cron);
        }

    }

    public function deleteCrons( $notification_id ){

        $tableCrons = TableRegistry::getTableLocator()->get('Crons');

        $tableCrons->deleteAll(['notification_id'=>$notification_id,'completed'=>0]);
    }

    public function generateDates($start_date, $end_date, $gap_days, $start_time = '09:00:00') {
        $dates = array();
        $current_date = strtotime($start_date);
    
        while ($current_date <= strtotime($end_date)) {

            $dates[] = date('Y-m-d '.$start_time, $current_date);
            $current_date = strtotime("+$gap_days days", $current_date);
        }

        if (end($dates) != date('Y-m-d '.$start_time, strtotime($end_date))) {
            $dates[] = date('Y-m-d '.$start_time, strtotime($end_date));
        }
    
        return $dates;
    }

}