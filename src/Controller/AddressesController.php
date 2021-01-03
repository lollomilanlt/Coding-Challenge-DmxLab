<?php
// src/Controller/AddressesController.php
/*
        Controller inutile e non funzionante, mi dispiaceva cancellarlo
        Praticamente non esiste

*/


namespace App\Controller;

class AddressesController extends AppController
{
    public function index()
    {
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

    public function admindex()
    {

    }

    public function shareindex()
    {

        
    }
}