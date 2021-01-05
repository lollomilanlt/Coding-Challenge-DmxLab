<!-- File: src/Template/Users/login.ctp -->

<!--
    View login User
-->


<center><body class="container">
<div class="ow justify-content-center">
<?= $this->Flash->render() ?>
<?= $this->Form->create() ?>

    <fieldset>
        <legend align="center" ><?= __('Inserisci le tue credenziali') ?></legend>
        <div class="form-group col-md-4 col-md-offset-5 align-center "> 
        
         <br>   <?= $this->Form->input('email', array('label' => false, 'placeholder' => 'Email')) ?> 
        </div>
        <div class="form-group col-md-4 col-md-offset-5 align-center ">
        <?= $this->Form->input('password', (array('label' => false, 'placeholder' => 'Password'))) ?>
        </div>
    </fieldset>
    
<?= $this->Form->button(__('Entra'), ['class'=> 'btn btn-success']); ?>
<?= $this->Form->end() ?>
</div>




<div>

<?=
$this->Html->link(
    'Registrati se non hai un account',
    ['controller' => 'Users', 'action' => 'add',]
)
?>
</div>