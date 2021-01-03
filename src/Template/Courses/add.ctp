<!-- File: src/Template/Articles/add.ctp -->

<!--

    View per l'aggiunta di un corso

-->


<h3>Aggiungi un corso</h3>
<?php
    echo $this->Form->create($course);
    echo $this->Form->control('name', array('label' => false, 'placeholder' => 'Nome'));
    echo $this->Form->control('description',array('label' => false, 'placeholder' => 'Descrizione','rows' => '3'));
    echo $this->Form->button(__('Save Course'),['class'=> 'btn btn-success']);
    echo $this->Form->end();
?>