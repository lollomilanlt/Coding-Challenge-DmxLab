<?php
// src/Model/Table/RequestsTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class RequestsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }
}