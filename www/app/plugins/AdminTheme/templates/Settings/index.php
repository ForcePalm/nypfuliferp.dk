<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\Cake\Datasource\EntityInterface> $settings
 */
?>
<div class="settings index content">
    <?php if(empty($settings)){ ?>
    <?= $this->Html->link(__('New Setting'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <?php } ?>
    <h3><?= __('Site instillinger') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('Side navn') ?></th>
                    <th><?= $this->Paginator->sort('Side beskrivelse') ?></th>
                    <th><?= $this->Paginator->sort('Side logo') ?></th>
                    <th class="actions"><?= __('Handlinger') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($settings as $setting): ?>
                <tr>
                    <td><?= h($setting->site_name) ?></td>
                    <td><?= h($setting->site_description) ?></td>
                    <td><img src="../img/uploads/Settings/<?= $setting->site_logo?>" alt="logo"></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $setting->id]) ?>                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Første')) ?>
            <?= $this->Paginator->prev('< ' . __('Forrige')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Næste') . ' >') ?>
            <?= $this->Paginator->last(__('Sidste') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Side {{page}} af {{pages}}, viser {{current}} resultat(er) ud af {{count}}')) ?></p>
    </div>
</div>
