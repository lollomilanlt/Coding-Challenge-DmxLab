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
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    public function initialize()
    {
    parent::initialize();
    $this->Auth->allow(['logout']);


    
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
            'contain' => [],
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
            $user->role='guest';
            $user->accountYear=date('Y');
           
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Utente Salvato.'));

                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('Impossibile aggiungere utente, riprova.'));
        }
        $this->set(compact('user'));
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
                $this->Flash->success(__('Utente aggiornato'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Impossibile modificare utente, riprova.'));
        }
        $this->set(compact('user'));
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
            $this->Flash->success(__('Utente cancellato.'));
        } else {
            $this->Flash->error(__('Utente impossibile da cancellare.'));
        }

        return $this->redirect(['action' => 'index']);
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

/*public $components = array('Acl');

public function azione() {
    $aro = $this->Acl->Aro;

    // Here's all of our group info in an array we can iterate through
    $groups = array(
        0 => array(
            'alias' => 'admins'
        ),
        1 => array(
            'alias' => 'guests'
        ),
        2 => array(
            'alias' => 'shareholders'
        ),
    );

    // Iterate and create ARO groups
    foreach ($groups as $data) {
        // Remember to call create() when saving in loops...
        $aro->create();

        // Save data
        $aro->save($data);
    }

}*/
}