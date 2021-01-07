<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property \Cake\I18n\FrozenDate $birthDate
 * @property int $accountYear
 * @property string $username
 * @property string $password
 * @property int $role_id
 *
 * @property \Acl\Model\Entity\Aco[] $aco
 */
class User extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'surname' => true,
        'email' => true,
        'birthDate' => true,
        'accountYear' => true,
        'username' => true,
        'password' => true,
        'role_id' => true,
        'aco' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];

    
    protected function _setPassword($value)
    {
        if (strlen($value)) {
            $hasher = new DefaultPasswordHasher();

            return $hasher->hash($value);
        }
    }

    
    public function parentNode()
    {
	    if (!$this->id) {
		    return null;
	    }
	    if (isset($this->role_id)) {
		    $roleid = $this->role_id;
	    } else {
		    $Users = TableRegistry::get('Users');
		    $user = $Users->find('all', ['fields' => ['role_id']])->where(['id' => $this->id])->first();
		    $roleid = $user->role_id;
	    }
	    if (!$roleid) {
		    return null;
	    }
	    return ['Roles' => ['id' => $roleid]];
    }
}
