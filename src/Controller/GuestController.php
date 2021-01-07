<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class GuestController extends AppController
{
    public function index()
    {
        $this->loadModel('Users');
        $this->paginate = [
            'contain' => ['Roles'],
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }


    public function guest()
    {
        $this->set('users', $this->Users->find('all'));
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
            'controller' => 'guest',
            'action' => 'index'
        ]);

    }
}
?>