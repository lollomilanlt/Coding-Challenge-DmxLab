<?php
// src/Controller/UsersController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;


class UsersController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['add', 'logout']);
        
    }

    public function index()
    {
        $this->set('users', $this->Users->find('all'));
    }

    public function guest()
    {
        $this->set('users', $this->Users->find('all'));
    }

    public function shareholder()
    {
        $this->loadModel('Courses');
        $this->set('users', $this->Users->find('all'));
       /* $this->loadComponent('Paginator');
        $courses = $this->Courses->find('all');
        $this->set('courses', $courses);*/
        $this->loadComponent('Paginator');
        $courses = $this->Paginator->paginate($this->Courses->find());
        $this->set(compact('courses'));

    }

    public function invia()
    {
        $request_table = TableRegistry::get('requests');
        $requests = $request_table->newEntity();
        
       
        //$peopleTable = TableRegistry::get (Request);
        $status = 'new';
        $usrid=$this->request->session()->read('Auth.User.id');
        $requests->status=$status;
        $requests->users_id=$usrid;
       
       // $this->Request->query("INSERT INTO requests (users_id,status) values ('.$usrid.','.$status.')");
        //$query->execute();
        //$log=$this->request->session()->read('Auth.User.username');
        //error_log($log, 3, "C:/Users/Work/Desktop/my-errors.log");
        $request_table->save($requests);
        return $this->redirect([
            'controller' => 'Users',
            'action' => 'guest'
        ]);

    }

    public function view($id)
    {
        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }

    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->admin=0;
            $user->shareholder=0;
            $prova=date("Y");
            $user->accountYear=$prova;

            if ($this->Users->save($user)) {
                $this->Flash->success(__('Utente creato.'));
                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('Impossibile aggiungere utente.'));
        }
        $this->set('user', $user);
    }

    public function login()
    {
        

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();

            //$user2  = $this->Auth->user();

            /*$userAdmin = $this->Users->find('admin', array(
                'conditions' => array('User.admin' => $this->Auth->user('username'))
            ));*/

            /*$prova = $Users->find()->where(['username' => $this->Auth->user('username')])->first();*/

            /*$userShare = $this->User->find('shareholder', array(
                'conditions' => array('User.shareholder' => $this->Auth->user('username'))
            ));
            */
            
            //error_log($this->Auth->user('admin'), 3, "C:/Users/Work/Desktop/my-errors.log");
            if ($user) {

                $username = $this->request->data['username'];

                /*
                            WE DID IT!  :')
                */

                $query = $this->Users->find();
                $query->where(['username' => $username]);

                foreach ($query as $row) {
                    
                    $admin=$row->admin;
                    $share=$row->shareholder;
                   
                    
                }

                //$log = 'admin='.$admin.'shareholder='.$share.'id='.$indice;
                //error_log ($log, 3, "C:/Users/Work/Desktop/my-errors.log");
                   

                if(($admin==0)&&($share==0))
                {
                    $this->Flash->success(__('Accesso come user riuscito!'));
                    $this->Auth->setUser($user);
                    //return $this->redirect($this->Auth->redirectUrl());
                    return $this->redirect([
                        'controller' => 'Users',
                        'action' => 'guest'
                    ]);
                }

                else if(($admin==0)&&($share==1))
                {
                    $this->Flash->success(__('Accesso come share riuscito!'));
                    $this->Auth->setUser($user);
                    //return $this->redirect($this->Auth->redirectUrl());
                    return $this->redirect([
                        'controller' => 'Users',
                        'action' => 'shareholder'
                    ]);
                }

                else if($admin==1)
                {
                    $this->Flash->success(__('Accesso come admin riuscito!'));
                    $this->Auth->setUser($user);
                    //return $this->redirect($this->Auth->redirectUrl());
                    return $this->redirect([
                        'controller' => 'Courses',
                        'action' => 'index'
                    ]);
                }

                else $this->Flash->error(__('Utente non trovato'));
            }
            $this->Flash->error(__('Username o password errati'));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}