<?php 

class User{

   var $username;
   var $password;
   var $email;
   var $contact;

   function setUsername($username){
     $this->username = $username;
   }
   function setPassword($password){
     $this->password = $password;
   }
   function setEmail($email){
     $this->email = $email;
   }
   function setContact($contact){
     $this->contact = $contact;
   }

   function getUsername(){
   	return $this->username;
   }
   function getPassword(){
   	return $this->password;
   }
   function getEmail(){
   	return $this->email;
   }
   function getContact(){
   	return $this->contact;
   }	
}



?>