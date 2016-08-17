<?php 

session_start();

$pdo = new PDO('mysql:host=localhost;dbname=praktikant_01', 'praktikant', 'praktikant');
 
if(isset($_GET['login'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$statement = $pdo->prepare("SELECT * FROM user WHERE email = :email");
	$result = $statement->execute(array('email' => $email));
	$user = $statement->fetch();
		
	//Überprüfung des Passworts
	if ($user !== false && password_verify($password, $user['password'])) {
		$_SESSION['userid'] = $user['id'];
                $login = TRUE;
                
                $_SESSION['login'] = 1;

		header("Location: index.php");



	} else {
		$errorMessage = "E-Mail oder Passwort war ungültig<br>";
                 $_SESSION['login'] = 0;
                include 'form.htm';
                session_abort();
	}
} else {
     $_SESSION['login'] = 0;
     session_abort();
    include 'form.htm';
}
?>
