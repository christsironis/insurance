<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cron $cron
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Cron'), ['action' => 'edit', $cron->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Cron'), ['action' => 'delete', $cron->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cron->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Crons'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Cron'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="crons view content">
            <h3><?= h($cron->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Notification') ?></th>
                    <td><?= $cron->hasValue('notification') ? $this->Html->link($cron->notification->file, ['controller' => 'Notifications', 'action' => 'view', $cron->notification->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($cron->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Execute Date') ?></th>
                    <td><?= h($cron->execute_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($cron->created) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
