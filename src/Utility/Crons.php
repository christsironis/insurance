<?php 
namespace App\Utility;

use Cake\ORM\TableRegistry;
use Cake\Mailer\Mailer;

class Crons
{
    public function sendEmail( $client_id, $file, $type ){
        // 2 types notification or contract
        // settings must have
        // notification_email or contract_email
        // notification_subject or contract_subject
        // email_sender
        // email_name
        
        $tableClients = TableRegistry::getTableLocator()->get('Clients');
        $client = $tableClients->get($client_id);

        $tableSettings = TableRegistry::getTableLocator()->get('Settings');
        $subject = $tableSettings->find()->where(['code'=>$type.'_subject'])->first()->value;
        $email_sender = $tableSettings->find()->where(['code'=>'email_sender'])->first()->value;
        $email_name = $tableSettings->find()->where(['code'=>'email_name'])->first()->value;
        $text = $tableSettings->find()->where(['code'=>$type.'_email'])->first()->value;
        $text = str_replace('{{name}}',$client->firstname.' '.$client->lastname,$text);

        $mailer = new Mailer('default');
        $mailer->setFrom([$email_sender => $email_name])
            ->setTo($client->email)
            ->setSubject($subject)
            ->setAttachments([
                basename($file) => [
                    'file' => $file
                ]
            ])
            ->deliver($text);
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
