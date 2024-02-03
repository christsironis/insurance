<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Notification> $notifications
 */
?>
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
                    <th><?= $this->Paginator->sort('exp_date') ?></th>
                    <th><?= $this->Paginator->sort('completed') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($notifications as $notification): ?>
                <tr>
                    <td><?= $notification->hasValue('client') ? $this->Html->link($notification->client->email, ['controller' => 'Clients', 'action' => 'view', $notification->client->id]) : '' ?></td>
                    <!-- <td><?= $notification->sms ? 'Ναι' : 'Όχι' ?></td>
                    <td><?= $notification->email ? 'Ναι' : 'Όχι' ?></td> -->
                    <td><?= h($notification->exp_date) ?></td>
                    <td><?= h($notification->completed ? 'Ναί' : 'Όχι') ?></td>
                    <td><?= h($notification->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $notification->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $notification->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $notification->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notification->id)]) ?>
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
