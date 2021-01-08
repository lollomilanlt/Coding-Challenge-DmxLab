<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class AdminController extends AppController
{

    public function index()
    {
        $this->loadModel('Courses');
        $this->loadComponent('Paginator');
        $this->loadModel('Requests');
        $courses = $this->Paginator->paginate($this->Courses->find());
        //$requests = $this->Paginator->paginate($this->Requests->find());
        $ciao = $this->Requests->find();
        //$this->set('albums', $list);
        $this->set('requests' ,$ciao);
        $this->set(compact('courses'));
        

    }


    public function add()
    {
        $this->loadModel('Courses');
        $course = $this->Courses->newEntity();

        if ($this->request->is('post')) {
            $course = $this->Courses->patchEntity($course, $this->request->getData());


            if ($this->Courses->save($course)) {
                $this->Flash->success(__('Your course has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your course.'));
        }
        $this->set('course', $course);



    }

    public function accept($id,$iduser)
        {
            //fare una query che dato l'id utente va in request e modifica il campo status da new a accepted e cambia il campo shareholder da utente con la pk
            /*$request = TableRegistry::get('Requests');
        
            $request = TableRegistry::get('Users');
            $query = $request->query();
            $query->update()
            ->set(['shareholder' => 1 ])
            ->where(['id' => $iduser])
            ->execute();*/

            error_log($iduser, 3, "C:/Users/Work/Desktop/my-errors.log");

            $requestTable = TableRegistry::get('Requests');
            $request = $requestTable->get($id);
            $request->status = 'accepted';
            $requestTable->save($request);
            
            $id=$iduser;

            $userTable = TableRegistry::get('Users');
            $user = $userTable->get($id);
            $user->shareholder = 1;
            $userTable->save($user);

            return $this->redirect([
                'controller' => 'Courses',
                'action' => 'index'
            ]);
        }       

    public function refuse($id,$iduser)
        {
            //fare una query che dato l'id utente va in request e modifica il campo status da new a accepted e cambia il campo shareholder da utente con la pk

            /*$request = TableRegistry::get('Requests');
            $query = $request->query();
            $query->update()
            ->set(['status' => 'refused'])
            ->where(['users_id' => $iduser])
            ->execute();
            */
            
            $requestTable = TableRegistry::get('Requests');
            $request = $requestTable->get($id);
            $request->status = 'refused';
            $requestTable->save($request);

            $id=$iduser;

            $userTable = TableRegistry::get('Users');
            $user = $userTable->get($id);
            $user->shareholder = 0;
            $userTable->save($user);


            /*
            Mettiamo caso la richiesta viene poi rifiutata facciamo in modo che al tizio venga tolto l'accesso ai corsi e lo stato di socio
            */
    
            return $this->redirect([
                'controller' => 'Admin',
                'action' => 'index'
            ]);

        }


    

    public function delete($name)
    {
        $this->loadModel('Courses');
        
        $this->request->allowMethod(['post', 'delete']);

        $course = $this->Courses->findByName($name)->firstOrFail();

        if ($this->Courses->delete($course)) {
            $this->Flash->success(__('The {0} article has been deleted.', $course->name));
            return $this->redirect(['action' => 'index']);
        }


    }


}
?>