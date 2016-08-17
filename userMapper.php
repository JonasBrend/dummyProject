<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of userMapper
 *
 * @author praktikant
 */
class userMapper {
    
    public function saveUser(user $user){
        $pdo = new PDO('mysql:host=localhost;dbname=praktikant_01', 'praktikant', 'praktikant');
        $statement = $pdo->prepare(
            "INSERT INTO user (email, password, username, firstName, lastName) "
            . "VALUES (:email, :password, :username, :firstName, :lastName)"
        );
        $result = $statement->execute(
            array(
                'email' => $user->getEmail(),
                'password' => $user->getPassword(),
                'username' => $user->getUsername(),
                'firstName' => $user->getFirstName(),
                'lastName' =>$user->getLastName()
            )
        );
        if($result) {		
			echo 'Du wurdest erfolgreich registriert. <a href="login.php">Zum Login</a>';
			$showFormular = false;
		} else {
			echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
		}
    }
    public function loadUser(){
        
    }
    
    public function findById($userId){
        
    }
    
}
