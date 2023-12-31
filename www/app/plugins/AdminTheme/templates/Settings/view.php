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
            <?= $this->Html->link(__('Edit Setting'), ['action' => 'edit', $setting->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Setting'), ['action' => 'delete', $setting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $setting->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Settings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Setting'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="settings view content">
            <h3><?= h($setting->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Site Name') ?></th>
                    <td><?= h($setting->site_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Site Description') ?></th>
                    <td><?= h($setting->site_description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Site Logo') ?></th>
                    <td><?= h($setting->site_logo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Theme Primary Color') ?></th>
                    <td><?= h($setting->theme_primary_color) ?></td>
                </tr>
                <tr>
                    <th><?= __('Theme Secondary Color') ?></th>
                    <td><?= h($setting->theme_secondary_color) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($setting->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
