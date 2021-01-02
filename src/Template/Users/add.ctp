<!-- src/Template/Users/add.ctp -->

<div class="users form">
<?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?= $this->Form->control('username') ?>
        <?= $this->Form->control('password') ?>
        <?= $this->Form->control('name') ?>
        <?= $this->Form->control('surname') ?>
        <?= $this->Form->control('email') ?>
        <?= $this->Form->control('birthDate') ?>
       
   </fieldset>
<?= $this->Form->button(__('Submit')); ?>
<?= $this->Form->end() ?>
</div>