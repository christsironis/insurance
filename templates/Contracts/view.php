<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contract $contract
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Contract'), ['action' => 'edit', $contract->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Contract'), ['action' => 'delete', $contract->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contract->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Contracts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Contract'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="contracts view content">
            <h3><?= h($contract->notification->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Client') ?></th>
                    <td><?= $contract->hasValue('client') ? $this->Html->link($contract->client->email, ['controller' => 'Clients', 'action' => 'view', $contract->client->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('File') ?></th>
                    <td><?= $this->Html->link(basename($contract->file), '/webroot/contracts/'.basename($contract->file),['download'=>basename($contract->file)])?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($contract->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($contract->created) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
