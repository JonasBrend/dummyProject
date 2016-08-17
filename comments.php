<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of comments
 *
 * @author praktikant
 */
class comments {
    //put your code here
    private $text="";
    private $userId='';    
    
    public function __construct($text, $userId) {
        $this->text = $text;
        $this->userId = $userId;
    }
    public function setText($text){
        $this->text = $text;
    }
    
    public function getText(){
        return $this->text;   
    }
    
    public function setUserId($userId){
        $this->userId = $userId;
    }
    
    public function getUserId(){
        return $this->userId;
    }
}