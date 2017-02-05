<?php 
require_once("../Dao/Komentar_dao.php");
require_once("../Dao/Relasi_Artikel_Komentar_dao.php");

class KomentarController{

   var $kd;
   var $rak;

   function __construct(){
     $this->kd = new KomentarDao();
     $this->rak = new RelasiArtikelKomentarDao();
   }

   function Register(){
     
     $username =  $_POST['user'];
     $IDartikel = $_POST['id'];
     $komentar = $_POST['komentar'];   

     $this->kd->model->setKomentar($komentar);
     $this->kd->model->setUsername($username);
     
     $err =  $this->kd->insert("insert");

     $IDKomentar = $this->kd->read("kriteria","SELECT MAX(ID_Komentar) FROM komentar");

     $err = $this->rak->insert("kriteria","INSERT INTO relasi_artikel_komentar(ID_Komentar,ID_Artikel) VALUES('".$IDKomentar[0]."','".$IDartikel."')");

     echo $err;  
   
   }
}

$kc = new KomentarController();
$kc->Register();





?>