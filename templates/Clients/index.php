<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Client> $clients
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
<div class="clients index content">
    <?= $this->Html->link(__('Νεος Πελατης'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Πελάτες') ?></h3>
    <?= $this->Form->text('search', ['id'=>'search','type' => 'autocomplete','placeholder'=>'Αναζήτηση...', 'value'=> $search,'class'=>'filter']) ?>
    <div id="limit">
        <input type="text" value="<?= $limit ?>" />
        <span > εγγραφές </span>
    </div>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('firstname','Όνομα') ?></th>
                    <th><?= $this->Paginator->sort('lastname','Επίθετο') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('phone','Κινητό') ?></th>
                    <th><?= $this->Paginator->sort('afm','ΑΦΜ') ?></th>
                    <th class="actions"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clients as $client): ?>
                <tr>
                    <td><?= h($client->firstname) ?></td>
                    <td><?= h($client->lastname) ?></td>
                    <td><?= h($client->email) ?></td>
                    <td><?= h($client->phone) ?></td>
                    <td><?= h($client->afm) ?></td>
                    <td class="actions">
                        <?= $this->Html->image("notification.png", ['class'=>'action_icons',"alt" => "notification",'url' => ['controller'=>'Notifications','action' => 'index', $client->id]]) ?>
                        <?= $this->Html->image("contract.png", ['class'=>'action_icons',"alt" => "info",'url' => ['controller'=>'Contracts','action' => 'index', $client->id]]) ?>
                        <?= $this->Html->image("info.png", ['class'=>'action_icons',"alt" => "info",'url' => ['action' => 'view', $client->id]]) ?>
                        <?= $this->Html->image("edit.png", ['class'=>'action_icons',"alt" => "Edit",'url' => ['action' => 'edit', $client->id]]) ?>
                        <?= $this->Form->postLink($this->Html->image("delete.png", ['class'=>'action_icons',"alt" => "Delete"]), ['action' => 'delete', $client->id], ['escape'=>false,'confirm' => __('Are you sure you want to delete # {0}?', $client->id)]) ?>
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
