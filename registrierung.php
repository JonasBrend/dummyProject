<?php 
try {
    session_start();
    $pdo = new PDO('mysql:host=localhost;dbname=praktikant_01', 'praktikant', 'praktikant');
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html> 
<html> 
<head>
  <title>Registrierung</title>	
</head> 
<body>
 
<?php
$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll
 
if(isset($_GET['register'])) {
	$error = false;
        
	$email = $_POST['email'];
        $username = $_POST['username'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
  
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                
		echo 'Bitte eine gültige E-Mail-Adresse eingeben';
		$error = true;
	} 	
	if(strlen($password) == 0) {
		echo 'Bitte ein Passwort angeben<br>';
		$error = true;
	}
	if($password != $password2) {
		echo 'Die Passwörter müssen übereinstimmen<br>';
		$error = true;
	}
	
	//Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
	if(!$error) { 
		$statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
		$result = $statement->execute(array('email' => $email));
		$user = $statement->fetch();
		
		if($user !== false) {
			echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
			$error = true;
		}	
	}
	
	//Keine Fehler, wir können den Nutzer registrieren
	if(!$error) {
		$password_hash = password_hash($password, PASSWORD_DEFAULT);
                require_once('user.php');
                $user = new user($email, $firstName, $lastName, $username);
		require_once('userMapper.php');
                $userMapper= new userMapper();
		$userMapper->saveUser($user);
	} 
}
 
if($showFormular) {
?>
 
<form action="?register=1" method="post">
    <br>
Vorname:<br>
<input type="text" size="40" maxlength="250" name="firstName"><br><br>

Nachname:<br>
<input type="text" size="40" maxlength="250" name="lastName"><br><br>

Username:<br>
<input type="text" size="40" maxlength="250" name="username"><br><br>
    
E-Mail:<br>
<input type="email" size="40" maxlength="250" name="email"><br><br>
 
Dein Passwort:<br>
<input type="password" size="40"  maxlength="250" name="password"><br>
 
Password wiederholen:<br>
<input type="password" size="40" maxlength="250" name="password2"><br><br>
 
<input type="submit" value="Abschicken">
</form>
 
<?php
} //Ende von if($showFormular)
?>
 
</body>
</html>