<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Notification> $notifications
 */
?>

<style>

td.actions {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    align-content: center;
    justify-content: flex-end;
    align-items: center;
}
td.actions > a:not(.approve){
    height: 30px;
}
img {
    height: 100%;
}
</style>
<div class="notifications index content">
    <?= $this->Html->link(__('New Notification'), ['action' => 'add',$client->id], ['class' => 'button float-right']) ?>
    <h2><?= __('Ειδοποιητήρια') ?></h2>
    <h3 class="float-right"><?= __($client->firstname.' '.$client->lastname) ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('client_id') ?></th>
                    <!-- <th><?= $this->Paginator->sort('sms') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th> -->
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('exp_date') ?></th>
                    <th><?= $this->Paginator->sort('completed') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($notifications as $notification): ?>
                <tr>
                    <td><?= $notification->hasValue('client') ? $this->Html->link($notification->client->email, ['controller' => 'Clients', 'action' => 'view', $notification->client->id]) : '' ?></td>
                    <!-- <td><?= $notification->sms ? 'Ναι' : 'Όχι' ?></td>
                    <td><?= $notification->email ? 'Ναι' : 'Όχι' ?></td> -->
                    <td><?= h($notification->name) ?></td>
                    <td><?= h($notification->exp_date) ?></td>
                    <td><?= h($notification->completed ? 'Ναι' : 'Όχι') ?></td>
                    <td><?= h($notification->created) ?></td>
                    <td class="actions">
                        <?php if(!$notification->completed) echo $this->Html->image("check.png", ['class'=>'action_icons',"alt" => "Νέο Συμβόλαιο","title" => "Νέο Συμβόλαιο",'url' => ['controller'=>'Contracts','action' => 'add', $client->id, $notification->id ]]) ?>
                        <?= $this->Html->image("info.png", ['class'=>'action_icons',"title" => "Προβολή","alt" => "info",'url' => ['action' => 'view', $notification->id]]) ?>
                        <?= $this->Html->image("edit.png", ['class'=>'action_icons',"title" => "Επεξεργασία","alt" => "Edit",'url' => ['action' => 'edit', $notification->id]]) ?>
                        <?= $this->Form->postLink($this->Html->image("delete.png", ["title" => "Διαγραφή",'class'=>'action_icons',"alt" => "Delete"]), ['action' => 'delete', $notification->id], ['escape'=>false,'confirm' => __('Are you sure you want to delete # {0}?', $notification->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
