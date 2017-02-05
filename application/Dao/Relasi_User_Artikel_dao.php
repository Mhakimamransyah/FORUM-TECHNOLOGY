<?php 
 require_once("../Models/User.php");
 require_once("../Models/Artikel.php");
 require_once("../../libs/database/Koneksi.php");

 class RelasiUserArtikelDao{

  var $koneksi;
  var $modelArtikel;
  var $modelUser;

  function __construct(){
  	  $this->koneksi = new Koneksi();
  	  $this->modelArtikel = new Artikel();
  	  $this->modelUser = new User();
      $this->koneksi->Connect();
  }
  
  function insert($ID_User,$ID_Artikel){
      $query = "INSERT INTO relasi_user_artikel(ID_User,ID_Artikel) VALUES('".$ID_User."','".$ID_Artikel."')";
      $result = mysqli_query($this->koneksi->link,$query);
      if($result){
        return 0;
      }
      else{
        return 1;
      }
  }

  function read($ID_Artikel="",$criteria=""){
     
     if(isset($ID_Artikel) && empty($criteria)){
     $query = "SELECT ID_User FROM relasi_user_artikel WHERE ID_Artikel='".$ID_Artikel."'";
     $result = mysqli_query($this->koneksi->link,$query);
     $row = mysqli_fetch_array($result);
     if($result){
        
        return $row[0];
     }
     else{
      return "error";
     }
   }
   else if(isset($criteria) && empty($ID_Artikel)){
     $query = $criteria;
     $result = mysqli_query($this->koneksi->link,$query);
     $row = mysqli_fetch_array($result);
     if($result){
        
        return $row[0];
     }
     else{
      return "error";
     } 
   }


  }

  function update(){

  }

  function delete($option,$criteria=""){
    
   switch ($option) {
     case 'kriteria': $query = $criteria;
                      $result = mysqli_query($this->koneksi->link,$query);
                       if($result){
                              return 0;
                       }
                       else{
                              return "error delete";
                       }    
                       break;
     
     default:
       
       break;
   }

  }


}

?>