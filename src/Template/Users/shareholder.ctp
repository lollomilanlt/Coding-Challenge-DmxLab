<!--

    View dashboard ShareHolder

-->


<h1> Ciao Socio! </h1>
<p><?= $this->Html->link('Log Out', ['controller' => 'Users','action' => 'logout']) ?></p>
<?=
//$this->Auth->_getUser();

//pr($this->Auth->user());


//retrieving user data
$username=$this->request->session()->read('Auth.User.username');
$name=$this->request->session()->read('Auth.User.name');
$surname=$this->request->session()->read('Auth.User.surname');
$email=$this->request->session()->read('Auth.User.email');
$birth=$this->request->session()->read('Auth.User.birthDate');


/*
    Nella view succede qualcosa di anomalo, prima del primo echo viene stampato quello che stamperà l'echo in questione...vabbè

*/

echo "Username = ".$username."<br>";
echo "Nome = ".$name."<br>";
echo "Cognome = ".$surname."<br>";
echo "Email = ".$email."<br>";
echo "Data di nascita = ".$birth."<br>";

?>


<h1>Courses</h1>
<div class="courses"><table>

    <tr>
        <th>Title</th>
        <th>Description</th>
        
        
    </tr>

   

    <?php foreach ($courses as $course): ?>
    <tr>
        <td>
            <?= $this->Html->link($course->name, ['controller' => 'Courses', 'action' => 'view', $course->description]) ?>
        </td>
       
        <td>
            <?= $course->description?>
            
        </td>

        
        
    </tr>
    
    <?php endforeach; ?>
    </table>
    </div>

