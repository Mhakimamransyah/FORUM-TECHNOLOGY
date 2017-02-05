<?php 

require_once("../Dao/Artikel_dao.php");

class EditController{

  var $ad;
  var $article;
  var $judul;
  var $kategori;
  var $lokasi;


  function __construct(){
     $this->ad = new ArtikelDao();
  }

  function setArticle($article){
      $this->article = $article;
  }
  function setJudul($judul){
     $this->judul = $judul;
  }
  function setKategori($kategori){
  	 $this->kategori = $kategori;
  }

  function setLokasi($lokasi){
  	$this->lokasi = $lokasi;
  }

  function RegisterUpdateArtikel(){
    $file = fopen("../../libs/file/".$this->judul.".txt",'w');
      if($file){
        fputs($file,$this->article);
        $this->setLokasi("$this->judul.txt");    
      }
      else{
      	echo "gagal menulis artikel";
      }

      if($_POST['judulama'].".txt" != $this->judul.".txt"){
             unlink("../../libs/file/".$_POST['judulama'].".txt");
      }

    fclose($file);
    echo $this->ad->update("byKriteria","UPDATE artikel SET Judul='".$this->judul."',lokasi='".$this->judul.".txt',ID_Kategori='".$this->kategori."' WHERE ID_Artikel = '".$_POST['ID_artikel']."'");
  }
}

$ec = new EditController();
$ec->setArticle($_POST['artikel']);
$ec->setJudul($_POST['judul']);
$ec->setKategori($_POST['kategori']);
$ec->RegisterUpdateArtikel();


?>