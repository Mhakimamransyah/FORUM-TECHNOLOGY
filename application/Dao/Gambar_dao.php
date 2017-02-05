<?php 
require_once("../Models/Gambar.php");
require_once("../../libs/database/Koneksi.php");

class GambarDao{

 var $koneksi;
 var $model;

 function __construct(){
    $this->koneksi = new Koneksi();
    $this->model = new Gambar();
    $this->koneksi->Connect();
 }

 function insert(){
    $query1 = "INSERT INTO gambar(gambar) VALUES('".$this->model->getGambar1()."')";
    $query2 = "INSERT INTO gambar(gambar) VALUES('".$this->model->getGambar2()."')";
    $query3 = "INSERT INTO gambar(gambar) VALUES('".$this->model->getGambar3()."')";

    $result1 = mysqli_query($this->koneksi->link,$query1);
    $result2 = mysqli_query($this->koneksi->link,$query2);
    $result3 = mysqli_query($this->koneksi->link,$query3);

    if($result1 && $result2 && $result3){
       echo 0;
    }
    else{
    	echo 1;
    }

 }

 function read($option="",$ID_Gambar=""){
    switch ($option) {
    	case 'max1':
    		            $query = "SELECT MAX(ID_Gambar)-2 FROM gambar";
                        $result = mysqli_query($this->koneksi->link,$query);
                        $row = mysqli_fetch_array($result);
                        return $row[0];
    		break;
    	case 'max2': 
                        $query = "SELECT MAX(ID_Gambar)-1 FROM gambar";
                        $result = mysqli_query($this->koneksi->link,$query);
                        $row = mysqli_fetch_array($result);
                        return $row[0];
    	    break;
    	case 'max3': 	
                        $query = "SELECT MAX(ID_Gambar) FROM gambar";
                        $result = mysqli_query($this->koneksi->link,$query);
                        $row = mysqli_fetch_array($result);
                        return $row[0];
            break;

     case 'gambar' :
                        $query = "SELECT gambar FROM gambar WHERE ID_Gambar='".$ID_Gambar."'";
                        $result = mysqli_query($this->koneksi->link,$query);
                        $row = mysqli_fetch_array($result);
                        return $row[0];      

           break;
    	default:
    		# code...
    		break;
    }

    if(isset($ID_Gambar)){
        $query = "SELECT gambar FROM gambar WHERE ID_Gambar='".$ID_Gambar."'";
        $result = mysqli_query($this->koneksi->link,$query);
        $row = mysqli_fetch_array($result);
        if($result){
              return $row[0];
            }
        else{
             return "errorgambar";
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
            # code...
            break;
    }

 }

}



?>