<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Notification $notification
 * @var \Cake\Collection\CollectionInterface|string[] $clients
 */
?>
<div class="row">

    <div class="column">
        <div class="notifications form content">
            <?= $this->Form->create($notification,[  'enctype'=>'multipart/form-data']) ?>
            <fieldset>
                <legend><?= __('Add Notification') ?></legend>
                <?php
                    echo $this->Form->input('client_id', ['value' => $id,'hidden']);
                    // echo $this->Form->control('sms',['type'=>'checkbox']);
                    // echo $this->Form->control('email',['type'=>'checkbox']);
                    echo $this->Form->control('file',['type'=>'file']);
                    echo $this->Form->control('exp_date', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
