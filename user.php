<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author praktikant
 */
class user {
    private $id = 0;
    private $email = '';
    private $firstName = '';
    private $lastName = '';
    private $username = '';
    private $password = '';
    
    public function __construct($email, $firstName, $lastName, $username) {
       $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->username = $username;
    }
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getId() {
        return $this->id;
    }
    public function setEmail($id) {
        $this->email = $email;
    }
    
    public function getEmail() {
        return $this->email;
    }
    public function setFirstName($id) {
        $this->firstName = $firstName;
    }
    
    public function getFirstName() {
        return $this->firstName;
    }
    public function setLastName($id) {
        $this->lastName = $lastName;
    }
    
    public function getLastName() {
        return $this->lastName;
    }
    public function setUsername($id) {
        $this->username = $username;
    }
    
    public function getUsername() {
        return $this->username;
    }
    public function setPassword($password) {
        $this->password = $password;
    }
    public function getPassword(){
        return $this->password;
    }
}
