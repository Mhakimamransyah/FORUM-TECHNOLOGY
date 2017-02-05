<?php 
require_once("../Dao/Artikel_dao.php");
require_once("../Dao/Gambar_dao.php");
require_once("../Dao/Relasi_Artikel_Gambar_dao.php");
require_once("../Dao/Relasi_User_Artikel_dao.php");
require_once("../Dao/User_dao.php");




class DeleteController{
   
   var $ad;
   var $gd;
   var $rag;
   var $rua;
   var $ud;

   var $id;

   function __construct(){
     $this->ad  = new ArtikelDao();
     $this->gd  = new GambarDao();
     $this->rag = new RelasiArtikelGambarDao();
     $this->rua = new RelasiUserArtikelDao();
    }
    
    function setID($id){
      $this->id  = $id;
    }

    function RegisterDelete(){
      $row = $this->ad->read("kriteria","","SELECT Judul FROM artikel WHERE ID_Artikel='".$this->id."'");
      
      $err = $this->ad->delete("kriteria","DELETE FROM artikel WHERE ID_Artikel='".$this->id."'");
      $err = $this->rua->delete("kriteria","DELETE FROM relasi_user_artikel WHERE ID_Artikel='".$this->id."'");
      
      $gambar1 = $this->rag->read("","","SELECT ID_Gambar FROM relasi_artikel_gambar WHERE ID_Artikel='".$this->id."' LIMIT 0,1");
      $gambar2 = $this->rag->read("","","SELECT ID_Gambar+1 FROM relasi_artikel_gambar WHERE ID_Artikel='".$this->id."' LIMIT 0,1");
      $gambar3 = $this->rag->read("","","SELECT ID_Gambar+2 FROM relasi_artikel_gambar WHERE ID_Artikel='".$this->id."' LIMIT 0,1");
    
      $err = $this->rag->delete("kriteria","DELETE FROM relasi_artikel_gambar WHERE ID_Artikel='".$this->id."'");
      $err = $this->gd->delete("kriteria","DELETE FROM gambar WHERE ID_Gambar='".$gambar1[0]."' OR ID_Gambar='".$gambar2[0]."' OR ID_Gambar='".$gambar3[0]."'");


      
      if($err == 0){
         $judul = $row[0];
         unlink("../../libs/file/".$judul.".txt");
         echo 0;   

      }
      else{
      	echo 1;
      }
    }







}

$dc = new DeleteController();
$dc->setID($_POST['ID']);
$dc->RegisterDelete();


?>