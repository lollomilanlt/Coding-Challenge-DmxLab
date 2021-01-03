<!-- src/Template/Users/add.ctp -->

<!--

    View register User

-->

<center><div class="users form">
<?= $this->Form->create($user) ?>
    <fieldset>
    <div class="form-group col-md-4 col-md-offset-5 align-center "> 
        <legend  align="center" ><?= __('Registrati') ?></legend>

        
        
        <br><br><?= $this->Form->control('username', array('label' => false, 'placeholder' => 'Username')) ?>
        <?= $this->Form->control('password', array('label' => false, 'placeholder' => 'Password')) ?>
        <?= $this->Form->control('name', array('label' => false, 'placeholder' => 'Nome')) ?>
        <?= $this->Form->control('surname', array('label' => false, 'placeholder' => 'Cognome')) ?>
        <?= $this->Form->control('email', array('label' => false, 'placeholder' => 'E-Mail')) ?>
         <?= $this->Form->control('birthDate', array('label' => false, 'placeholder' => 'Data di nascita', 'dateFormat' => 'MDY', 'minYear' => date('Y') - 70, 'maxYear' => date('Y'))); ?>
       
       
   </fieldset>
<?= $this->Form->button(__('OK!'), array('class'=> 'btn btn-success')); ?>
<?= $this->Form->end() ?>
</div>