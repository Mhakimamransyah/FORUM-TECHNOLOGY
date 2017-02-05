<?php
 require_once("../Models/Gambar.php");
 require_once("../Models/Artikel.php");
 require_once("../../libs/database/Koneksi.php");

 class RelasiArtikelGambarDao{

    var $modelArtikel;
    var $modelGambar;
    var $koneksi;
 
  	function __construct(){
       $this->modelArtikel = new Artikel();
       $this->modelGambar = new Gambar();
       $this->koneksi = new Koneksi();
       $this->koneksi->Connect();
 	}

 	function insert($ID_artikel,$ID_gambar){

 		$query = "INSERT INTO relasi_artikel_gambar(ID_Artikel,ID_Gambar) VALUES('".$ID_artikel."','".$ID_gambar."')";
 		$result = mysqli_query($this->koneksi->link,$query);
 		if($result){
            echo 0;
 		}
 		else{
 			echo 1;
 		}
 	
 	}

 	function read($ID_artikel='',$ID='',$criteria=''){
       
       if(isset($ID_artikel) && empty($ID) && empty($criteria)){
           $query = "SELECT ID_Gambar FROM relasi_artikel_gambar WHERE ID_Artikel='".$ID_artikel."' LIMIT 0,1";
           $result = mysqli_query($this->koneksi->link,$query);
           $row = mysqli_fetch_array($result);
           if($result){
              return $row[0];
            }
          else{
             return "errorIDgambar";
          }
 	    }
      else if(isset($ID) && empty($ID_Artikel) && empty($criteria))
      {

           $query = "SELECT ID_Gambar FROM relasi_artikel_gambar WHERE ID_Artikel='".$ID."'";
           $result = mysqli_query($this->koneksi->link,$query);
           $row = mysqli_fetch_array($result);
            if($result){
              return $row[0];
            }
           else{
             return "errorIDgambar";

           }
     }
     else{
            $query = $criteria;
            $result = mysqli_query($this->koneksi->link,$query);
            $row = mysqli_fetch_array($result);
             if($result){
               return $row;
             }
            else{
              return "errorIDgambar";
            } 
     }
}

  function delete($option,$criteria=""){
    switch ($option) {
      case 'kriteria':$query = $criteria;
                      $result = mysqli_query($this->koneksi->link,$query);
                      if($result){
                              return 0;
                       }
                       else{
                              return "error delete";
                       }
                      break;
      
      default:
        # code...
        break;
    }
  }
}

?>