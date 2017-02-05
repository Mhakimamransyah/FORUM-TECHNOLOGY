<?php 
require_once("../Dao/User_dao.php");
 
 class LoginController{

   var $daoUser;

   function __construct(){
   	  $this->daoUser = new UserDao();
   }

   function ValidateLogin(){    
      echo $this->daoUser->read($_POST['username'],$_POST['password']);
   }

 }

 $lc = new LoginController();
 $lc->ValidateLogin();



?>