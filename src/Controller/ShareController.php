<?php
namespace App\Controller;

use App\Controller\AppController;

class ShareController extends AppController
{
    public function index()
    {
        $this->loadModel('Courses');
        $this->loadModel('Users');
        $this->set('users', $this->Users->find('all'));
       /* $this->loadComponent('Paginator');
        $courses = $this->Courses->find('all');
        $this->set('courses', $courses);*/
        $this->loadComponent('Paginator');
        $courses = $this->Paginator->paginate($this->Courses->find());
        $this->set(compact('courses'));
    }


}
?>