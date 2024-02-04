<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Contract> $contracts
 */
?>
<style>

td.actions {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    align-content: center;
    align-items: center;
    justify-content: flex-end;
}
td.actions > a:not(.approve){
    height: 30px;
}
img {
    height: 100%;
}
</style>
<div class="contracts index content">
    <h3 class="float-right"><?= __($client->firstname.' '.$client->lastname) ?></h3>
    <h2><?= __('Συμβόλαια') ?></h2>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('client_id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('file') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contracts as $contract): ?>
                <tr>
                    <td><?= $this->Number->format($contract->id) ?></td>
                    <td><?= $contract->hasValue('client') ? $this->Html->link($contract->client->email, ['controller' => 'Clients', 'action' => 'view', $contract->client->id]) : '' ?></td>
                    <td><?= h($contract->notification->name) ?></td>
                    <td><?= $this->Html->link(basename($contract->file), '/webroot/contracts/'.basename($contract->file),['download'=>basename($contract->file)])?></td>
                    <td><?= h($contract->created) ?></td>
                    <td class="actions">
                        <?= $this->Form->postLink($this->Html->image("delete.png", ['class'=>'action_icons',"alt" => "Delete"]), ['action' => 'delete', $contract->id], ['escape'=>false,'confirm' => __('Are you sure you want to delete # {0}?', $contract->id)]) ?>
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
