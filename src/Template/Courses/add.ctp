<!-- File: src/Template/Articles/add.ctp -->

<h1>Add Course</h1>
<?php
    echo $this->Form->create($course);
    echo $this->Form->control('name');
    echo $this->Form->control('description', ['rows' => '3']);
    echo $this->Form->button(__('Save Course'));
    echo $this->Form->end();
?>