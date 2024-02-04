<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Notification $notification
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Notification'), ['action' => 'edit', $notification->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Notification'), ['action' => 'delete', $notification->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notification->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Notifications'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Notification'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="notifications view content">
            <h3><?= h($notification->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Client') ?></th>
                    <td><?= $notification->hasValue('client') ? $this->Html->link($notification->client->email, ['controller' => 'Clients', 'action' => 'view', $notification->client->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('File') ?></th>
                    <td><?= $this->Html->link(basename($notification->file), '/webroot/notifications/'.basename($notification->file),['download'=>basename($notification->file)])?></td>
                </tr>
                <!-- <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($notification->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sms') ?></th>
                    <td><?= $this->Number->format($notification->sms) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= $this->Number->format($notification->email) ?></td>
                </tr> -->
                <tr>
                    <th><?= __('Exp Date') ?></th>
                    <td><?= h($notification->exp_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ολοκληρώθηκε') ?></th>
                    <td><?= h($notification->completed ? 'Ναί' : 'Όχι') ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($notification->created) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Crons') ?></h4>
                <?php if (!empty($notification->crons)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Execute Date') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Ειδοποιήθηκε') ?></th>
                        </tr>
                        <?php foreach ($notification->crons as $crons) : ?>
                        <tr>
                            <td><?= h($crons->execute_date) ?></td>
                            <td><?= h($crons->created) ?></td>
                            <td><?= h($crons->completed ? 'Ναί' : 'Όχι') ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
