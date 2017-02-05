<?php 
require_once("../Dao/Relasi_User_Artikel_dao.php");
require_once("../Dao/User_dao.php");
require_once("../Dao/Artikel_dao.php");

class RelasiUserArtikel{

  var $daoArtikelUser;
  var $daoUser;
  var $daoArtikel;


  function __construct(){
  	 $this->daoArtikelUser = new RelasiUserArtikelDao();
     $this->daoUser = new UserDao();
     $this->daoArtikel = new ArtikelDao();
  }

  function RegisterUserArtikel(){
     
  	   $ID_user =  $this->daoUser->read('','',$_POST['usernamex']);
       $ID_artikel = $this->daoArtikel->read("max");
       echo $this->daoArtikelUser->insert($ID_user,$ID_artikel); 
  }

}

$rua = new RelasiUserArtikel();
$rua->RegisterUserArtikel();




?>