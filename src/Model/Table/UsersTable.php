<?php
// src/Model/Table/UsersTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('username', 'A username is required')
            ->notEmpty('password', 'A password is required')
            ->notEmpty('name', 'A name is required')
            ->notEmpty('surname', 'A surname is required')
            ->notEmpty('email', 'An email is required')
            ->notEmpty('birthDate', 'A birth date is required');
            //->notEmpty('accountYear', 'An year for this account is required')
           // ->notEmpty('admin', 'Admin?')
           // ->notEmpty('shareholder', 'Shareholder?');
    }

}