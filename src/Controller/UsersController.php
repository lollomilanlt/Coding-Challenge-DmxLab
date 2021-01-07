<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['logout','login','install']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */

    //var $components = array('Auth', 'Acl');  

    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles'],
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    

    public function login()
    {
        //verifichiamo se l'utente è già loggato, se lo è lo manda alla sua pagina
       $logged=$this->Auth->user();
        

        if($logged)
        {
            
            //utente già loggato
            return $this->redirect([
                'controller' => 'Users',
                'action' => 'index'
            ]);

        }

        else if ($this->request->is('post')) {
            
            $user = $this->Auth->identify();
            
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect([
                    'controller' => 'Users',
                    'action' => 'index'
                ]);
            }
            
            print_r($user);
            $this->Flash->error('le credenziali sono incorrette.');
        }
    }
    
    


    public function logout()
{
    //verifichiamo se l'utente è già sloggato

    $slogged=$this->Auth->user();
        

        if($slogged == NULL)
        {
            $this->Flash->success('Sei già sloggato.');
            //utente già sloggato
            return $this->redirect([
                'controller' => 'Users',
                'action' => 'login'
            ]);

        }

        else
        {
             $this->Flash->success('Sei stato sloggato.');
             return $this->redirect($this->Auth->logout());
        }
}

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles'],
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->accountYear=date('Y');
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    function install(){     
      
        $role=$this->Users->Roles;

        $role->id = 1; // Admin
        $this->Acl->allow($role->id,'controllers'); 
        
        $role->id = 2; // Socio 
        $this->Acl->deny($role->id,'controllers');
        $this->Acl->deny($role->id,'controllers/Users');
        $this->Acl->allow($role->id,'controllers/Users/index');

        $role->id = 3; // Guest
        $this->Acl->deny($role->id,'controllers');
        $this->Acl->deny($role->id,'controllers/Users');
        $this->Acl->allow($role->id,'controllers/Users/index');
    
    }

}
