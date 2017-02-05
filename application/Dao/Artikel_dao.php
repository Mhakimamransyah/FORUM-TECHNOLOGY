<?php 

 require_once("../Models/Artikel.php");
 require_once("../../libs/database/Koneksi.php");

class ArtikelDao{
	
	var $model;
	var $koneksi;

	function __construct(){
		$this->model = new Artikel();
		$this->koneksi = new Koneksi();
		$this->koneksi->Connect();
	}

	function insert(){
         $query = "INSERT INTO artikel(Judul,lokasi,ID_Kategori) VALUES('".$this->model->getJudul()."',
                                                                        '".$this->model->getLokasi()."',
                                                                        '".$this->model->getID_kategori()."')";
         $result = mysqli_query($this->koneksi->link,$query);
         if($result){
            return 0;
         }
         else{
         	return 1;
         }
	}
	
	function read($option,$IDartikel='',$criteria=''){
		switch ($option) {
			case 'max': $query = "SELECT MAX(ID_Artikel) FROM artikel";
                        $result = mysqli_query($this->koneksi->link,$query);
                        $row = mysqli_fetch_array($result);
                        return $row[0];
			            break;
		 
		 case 'count1':  $query = "SELECT COUNT(ID_Artikel) FROM artikel WHERE ID_Kategori='1'";
			             $result = mysqli_query($this->koneksi->link,$query);
			             if($result){
                            $row = mysqli_fetch_array($result);
			                return $row[0];
			             }
			             else{
			             	return "error";
			             }
			             break;

		  case 'count4':  $query = "SELECT COUNT(ID_Artikel) FROM artikel WHERE ID_Kategori='4'";
			             $result = mysqli_query($this->koneksi->link,$query);
			             if($result){
                            $row = mysqli_fetch_array($result);
			                return $row[0];
			             }
			             else{
			             	return "error";
			             }
			             break;

			case 'count3':  $query = "SELECT COUNT(ID_Artikel) FROM artikel WHERE ID_Kategori='3'";
			             $result = mysqli_query($this->koneksi->link,$query);
			             if($result){
                            $row = mysqli_fetch_array($result);
			                return $row[0];
			             }
			             else{
			             	return "error";
			             }
			             break;
			
			case '1':   $query = "SELECT ID_Artikel,  Judul FROM artikel WHERE ID_Artikel!='".$IDartikel."' AND ID_Artikel > '".$IDartikel."' AND ID_Kategori='1' LIMIT 0,1";
				        $result = mysqli_query($this->koneksi->link,$query);
				        $row    = mysqli_fetch_assoc($result);
				        return $row;
				        break;
            
            case '4':   $query = "SELECT ID_Artikel,Judul FROM artikel WHERE ID_Artikel!='".$IDartikel."' AND ID_Artikel > '".$IDartikel."' AND ID_Kategori='4' LIMIT 0,1";
				        $result = mysqli_query($this->koneksi->link,$query);
				        $row    = mysqli_fetch_assoc($result);
				        return $row;
				        break;

		    case '3':   $query = "SELECT ID_Artikel,Judul FROM artikel WHERE ID_Artikel!='".$IDartikel."' AND ID_Artikel > '".$IDartikel."' AND ID_Kategori='3' LIMIT 0,1";
				        $result = mysqli_query($this->koneksi->link,$query);
				        $row    = mysqli_fetch_assoc($result);
				        return $row;
				        break;
		    
		 case 'baca':   $query = "SELECT Judul,lokasi FROM artikel WHERE ID_Artikel='".$IDartikel."'";
                        $result = mysqli_query($this->koneksi->link,$query);
				        if($result){
				           $row    = mysqli_fetch_array($result);
                           return $row;
                        }
                        else{
                        	return "error";
                        }
		                break;
  case 'kriteria'   :  $result = mysqli_query($this->koneksi->link,$criteria); 
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
	
	function update($option,$criteria=""){
		switch ($option) {
			
     case 'byKriteria':      $query = $criteria;  
			                 $result = mysqli_query($this->koneksi->link,$query);
				             if($result){
				                 return 0;
                             }
                             else{
                        	    return "error update";
                             }    
				             break;
			
			default:
				# code...
				break;
		}
	}
	
	function delete($option,$criteria=""){
		switch ($option) {
		case 'kriteria':   $query = $criteria;
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