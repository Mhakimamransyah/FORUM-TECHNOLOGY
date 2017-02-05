<?php 
require_once("../Dao/User_dao.php");

class SignUpController{

  var $daoUser;
  
  function __construct(){
  	 $this->daoUser = new UserDao();
  }
  
  function RegisterUser(){
  	$this->daoUser->model->setUsername($_POST['username']);
  	$this->daoUser->model->setPassword($_POST['password']);
  	$this->daoUser->model->setEmail($_POST['email']);
  	$this->daoUser->model->setContact($_POST['contact']);
  	echo $this->daoUser->insert();
  }
}

$sc = new SignUpController();
$sc->RegisterUser();

?>