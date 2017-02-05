<?php 
require_once("../Dao/Kategori_dao.php");
require_once("../Dao/Artikel_dao.php");
require_once("../Dao/Gambar_dao.php");
require_once("../Dao/Relasi_Artikel_Gambar_dao.php");


class FormController{
    
    var $daoKategori;
    var $daoArtikel;
    var $daoGambar;
    var $daoArtikelGambar;

    var $error;

    function __construct(){
      $this->daoKategori = new KategoriDao();
      $this->daoArtikel = new  ArtikelDao();
      $this->daoGambar = new GambarDao();
      $this->daoArtikelGambar = new RelasiArtikelGambarDao();
    }


    function RegisterArtikel(){
    	$this->daoArtikel->model->setJudul($_POST['judul']);
    	$this->daoArtikel->model->setArtikel($_POST['artikel']);
    	$this->daoArtikel->model->setID_kategori($_POST['kategori']);
        $this->daoArtikel->insert();
    }  
    
    
    function RegisterGambar(){
      $this->daoGambar->model->setGambar1($_POST['image1']);
      $this->daoGambar->model->setGambar2($_POST['image2']);
      $this->daoGambar->model->setGambar3($_POST['image3']);
      $this->daoGambar->insert();
    }

    function RegisterRelasiArtikelGambar(){
       echo $this->daoArtikelGambar->insert($this->daoArtikel->read("max"),$this->daoGambar->read("max1"));
       echo $this->daoArtikelGambar->insert($this->daoArtikel->read("max"),$this->daoGambar->read("max2"));
       echo $this->daoArtikelGambar->insert($this->daoArtikel->read("max"),$this->daoGambar->read("max3"));
    }


   
   

  }


$fc = new FormController();
$fc->RegisterArtikel();
$fc->RegisterGambar();
$fc->RegisterRelasiArtikelGambar();


?>
