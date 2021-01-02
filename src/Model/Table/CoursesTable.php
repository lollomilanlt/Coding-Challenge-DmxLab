<?php
// src/Model/Table/CoursesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class CoursesTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }
}