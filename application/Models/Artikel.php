<?php 

 class Artikel{
 	var $judul;
	var $Lokasi;
	var $artikel;
	var $ID_kategori;

	function setJudul($judul){
      $this->judul = $judul;
	}
     
    function setID_kategori($id_kategori){
      $this->ID_kategori = $id_kategori;
    }

    function setArtikel($artikel){
      $this->artikel = $artikel;
      $file = fopen("../../libs/file/".$this->judul.".txt",'w');
      if($file){
        fputs($file,$this->artikel);
        $this->setLokasi("$this->judul.txt");    
      }
      else{
      	echo "gagal menulis artikel";
      }
    }

    function setLokasi($Lokasi)
	{
      $this->Lokasi = $Lokasi;
	}

    function getJudul(){
    	return $this->judul;
    }
    function getLokasi(){
    	return $this->Lokasi;
    }
    function getID_kategori(){
         return $this->ID_kategori;
    }
 }


?>