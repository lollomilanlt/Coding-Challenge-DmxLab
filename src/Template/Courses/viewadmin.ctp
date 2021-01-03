<!-- File: src/Template/Courses/viewadmin.ctp -->

<!--

    View return to Admin

-->

<h1><?= h($courses->name) ?></h1>
<p><?= h($courses->description) ?></p>
<p><?= //$this->Html->link('Go back to admin panel', 'controller'=> 'Courses','action' => 'index') 

$this->Html->link(
    'Torna alla dashboard admin',
    ['controller' => 'Courses', 'action' => 'index',]
);


?></p>