<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contract $contract
 * @var \Cake\Collection\CollectionInterface|string[] $clients
 */
?>
<div class="row">

    <div class="column ">
        <div class="contracts form content">
            <?= $this->Form->create($contract,[  'enctype'=>'multipart/form-data']) ?>
            <fieldset>
                <legend><?= __('Add Contract') ?></legend>
                <?php
                    echo $this->Form->input('client_id', ['value' => $client_id,'hidden']);
                    echo $this->Form->input('notification_id', ['value' => $notification_id,'hidden']);
                    echo $this->Form->control('file',['type'=>'file']);

                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
