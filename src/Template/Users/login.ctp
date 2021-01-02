<!-- File: src/Template/Users/login.ctp -->

<div class="users form">
<?= $this->Flash->render() ?>
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your username and password') ?></legend>
        <?= $this->Form->input('username') ?>
        <?= $this->Form->input('password') ?>
    </fieldset>
<?= $this->Form->button(__('Login')); ?>
<?= $this->Form->end() ?>
</div>
<div class="register user">
<?=
$this->Html->link(
    'Registrati se non hai un account',
    ['controller' => 'Users', 'action' => 'add',]
);
?>
</div>