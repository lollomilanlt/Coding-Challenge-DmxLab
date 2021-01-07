<!--
    View dashboard Guest
-->


<h1> Ciao Utente! </h1>

<p><?= $this->Html->link('Log Out', ['controller' => 'Users','action' => 'logout']) ?></p>
<h6> Ecco i tuoi dati: </h6><br>
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


//ciaon




?>

<br><br><h4> Invia la richiesta per diventare socio </h4>
<p><?= $this->Html->link('Invia', ['controller' => 'Guest','action' => 'invia']) ?></p>