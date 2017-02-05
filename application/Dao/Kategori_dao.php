<?php 
require_once("../Models/Kategori.php");
require_once("../../libs/database/Koneksi.php");

class KategoriDao{

    var $model;
    var $koneksi;
    var $tempID;

    function __construct(){
    	$this->model = new Kategori();
        $this->koneksi = new Koneksi();
        $this->koneksi->Connect();
    }

    function insert(){
        
	}

	function update(){

	}

	function read($kategori){
      $query = "SELECT ID_Kategori FROM kategori WHERE Kategori='".$kategori."'";
	  $result = mysqli_query($this->koneksi->link,$query);
	  $row = mysqli_fetch_assoc($result);
	  return $row;
	}

	function delete(){

	}

}




?>