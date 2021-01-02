<!-- File: src/Template/Courses/view.ctp -->

<h1><?= h($courses->name) ?></h1>
<p><?= h($courses->description) ?></p>
<p><?= 

$this->Html->link(
    'Torna alla dashboard socio',
    ['controller' => 'Users', 'action' => 'shareholder',]
);


?></p>