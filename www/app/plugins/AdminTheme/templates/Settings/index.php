<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\Cake\Datasource\EntityInterface> $settings
 */
?>
<div class="settings index content">
    <?= $this->Html->link(__('New Setting'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Settings') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('site_name') ?></th>
                    <th><?= $this->Paginator->sort('site_description') ?></th>
                    <th><?= $this->Paginator->sort('site_logo') ?></th>
                    <th><?= $this->Paginator->sort('theme_primary_color') ?></th>
                    <th><?= $this->Paginator->sort('theme_secondary_color') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($settings as $setting): ?>
                <tr>
                    <td><?= $this->Number->format($setting->id) ?></td>
                    <td><?= h($setting->site_name) ?></td>
                    <td><?= h($setting->site_description) ?></td>
                    <td><?= h($setting->site_logo) ?></td>
                    <td><?= h($setting->theme_primary_color) ?></td>
                    <td><?= h($setting->theme_secondary_color) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $setting->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $setting->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $setting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $setting->id)]) ?>
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