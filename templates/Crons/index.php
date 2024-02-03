<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Cron> $crons
 */
?>
<div class="crons index content">
    <?= $this->Html->link(__('New Cron'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Crons') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('notification_id') ?></th>
                    <th><?= $this->Paginator->sort('execute_date') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($crons as $cron): ?>
                <tr>
                    <td><?= $this->Number->format($cron->id) ?></td>
                    <td><?= $cron->hasValue('notification') ? $this->Html->link($cron->notification->file, ['controller' => 'Notifications', 'action' => 'view', $cron->notification->id]) : '' ?></td>
                    <td><?= h($cron->execute_date) ?></td>
                    <td><?= h($cron->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $cron->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cron->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cron->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cron->id)]) ?>
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
