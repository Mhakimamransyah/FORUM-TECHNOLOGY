<?php 
require_once("../../libs/database/Koneksi.php");
require_once("../Models/User.php");

class UserDao{

  var $model;
  var $koneksi;

  function __construct(){
    	$this->model   = new User();
    	$this->koneksi = new Koneksi();
    	$this->koneksi->Connect(); 
  }

  function insert(){
    $query = "INSERT INTO user(username,email,password,contact) VALUES('".$this->model->getUsername()."','".$this->model->getEmail()."','".$this->model->getPassword()."','".$this->model->getContact()."')";
    $result = mysqli_query($this->koneksi->link,$query);
    if($result){
      return 0;
    }
    else{
    	return 1;
    }
  }

  function read($username="",$password="",$option="",$ID_User="",$criteria=""){
     
    if(isset($username) && isset($password) && empty($option) && empty($ID_User) && empty($criteria)){
        
       $query = "SELECT username,password FROM user WHERE username='".$username."' AND password='".$password."'";
       $result = mysqli_query($this->koneksi->link,$query);
       $row = mysqli_fetch_row($result);
       
       if($row){
          return 0;
       }
       else{
          return 1;
       }

    }
    else if(isset($option) && empty($ID_User) && empty($criteria)){
      
      $query = "SELECT ID_User FROM user WHERE username='".$option."'";
      $result = mysqli_query($this->koneksi->link,$query);
      $row = mysqli_fetch_row($result);
      if($row){
          return $row[0];
      } 
      else{
        return 1;
      }
           
    }
    else if(isset($ID_User) && empty($criteria)){
         
         $query = "SELECT username FROM user WHERE ID_User='".$ID_User."'";
         $result = mysqli_query($this->koneksi->link,$query);
         $row = mysqli_fetch_row($result);
         if($row){
             return $row[0];
         } 
         else{
            return "error";
         }  
    }
    else
    {
         $query = $criteria;
         $result = mysqli_query($this->koneksi->link,$query);
         $row = mysqli_fetch_array($result);
         if($row ){
            return $row[0];
         }
         else{
          return "error";
         }
    }



  }

  function update(){

  }

  function delete(){

  }



}
?>