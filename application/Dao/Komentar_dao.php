<?php 
require_once("../Models/Komentar.php");
require_once("../../libs/database/Koneksi.php");


class KomentarDao{
  
  var $model;
  var $koneksi;

  function __construct(){
  	  $this->model = new Komentar();
  	  $this->koneksi = new Koneksi();
  	  $this->koneksi->Connect();
  }

  function insert($option,$criteria=""){
		 
		 switch($option){
			   case 'insert' :  $query = "INSERT INTO komentar(Komentar,Username) VALUES('".$this->model->getKomentar()."','".$this->model->getUsername()."')";

			                      $result = mysqli_query($this->koneksi->link,$query);
								  if($result){
									   return 0; // sukses insert komentar
								  }
								  else{
									  return 1;
								  }
			                      break;
		  }
   }

   function read($option,$criteria=""){
		  switch($option)
		  {
			  case 'kriteria' :   $query = $criteria;
			                      $result = mysqli_query($this->koneksi->link,$query);
								  $row = mysqli_fetch_array($result);
								  if($result){
									   return $row; // ambil komentar dan tampilkan
								  }
								  else{
									  return "error komentar";
								  }
			  
			  
			                      break;
		  }
	 }
	 
	 function update(){}
	 
	 function delete(){}
  }




?>