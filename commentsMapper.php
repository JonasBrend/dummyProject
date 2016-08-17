<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of commentsMapper
 *
 * @author praktikant
 */
class commentsMapper {
    //put your code here

    
    public function saveComment(comments $comments){
        $pdo = new PDO('mysql:host=localhost;dbname=praktikant_01', 'praktikant', 'praktikant');
        $statement = $pdo->prepare(
            "INSERT INTO comments (text,userId) "
            . "VALUES (:text, :userId)"
        );
        $result = $statement->execute(
            array(
                'text' => $comments->getText(),
                'userId' => $comments->getUserId(),
                
            )
        );
        if($result) {		
			echo 'Kommentar abgesendet. ';
			$showFormular = false;
		} else {
			echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
		}
    }
    
    
    
    
}


