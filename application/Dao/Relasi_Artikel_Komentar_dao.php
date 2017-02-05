<?php 
require_once("../../libs/database/Koneksi.php");

class RelasiArtikelKomentarDao{

   var $koneksi;

   function __construct(){
     $this->koneksi = new Koneksi();
     $this->koneksi->Connect();
   }

   function insert($option,$criteria=""){
     switch($option){
			case "kriteria" : $query = $criteria;
			                  $result = mysqli_query($this->koneksi->link,$query);
							  if($result){
								  return 0;
							  }
							  else{
								  return "err";
							  }
							  
							  break;
		}

   }

   function read($option,$criteria=""){
     switch($option){
			case "kriteria" : $query = $criteria;
			                  $result = mysqli_query($this->koneksi->link,$query);
							  $row = mysqli_fetch_array($result);
							  if($result){
								  return $row;
							  }
							  else{
								  return "err";
							  }
							  
							  break;
		}

   }

   function update(){

   }

   function delete(){

   }

}


?>