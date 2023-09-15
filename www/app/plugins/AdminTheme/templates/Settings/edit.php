<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $setting
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $setting->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $setting->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Settings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="settings form content">
            <?= $this->Form->create($setting, [
                'type' => 'file',
            ]) ?>
            <fieldset>
                <legend><?= __('Edit Setting') ?></legend>
                <?php
                    echo $this->Form->control('site_name', ['label' => 'Hjemmeside Navn']);
                    echo $this->Form->control('site_description', ['label' => 'Hjemmeside beskrivelse', 'type' => 'textarea']);
                    echo $this->Form->control('site_logo', ['label' => 'Logo', 'type' => 'file', 'required' => false]);
                    echo $this->Form->control('theme_primary_color');
                    echo $this->Form->control('theme_secondary_color');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
