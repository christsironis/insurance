<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cron $cron
 * @var \Cake\Collection\CollectionInterface|string[] $notifications
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Crons'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="crons form content">
            <?= $this->Form->create($cron) ?>
            <fieldset>
                <legend><?= __('Add Cron') ?></legend>
                <?php
                    echo $this->Form->control('notification_id', ['options' => $notifications]);
                    echo $this->Form->control('execute_date');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
