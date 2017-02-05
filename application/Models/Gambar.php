<?php 
class Gambar{
   
   var $gambar1;
   var $gambar2;
   var $gambar3;

   function setGambar1($img){
     $this->gambar1 = substr($img,12);
   }   

   function setGambar2($img){
   	$this->gambar2 = substr($img,12);
   }

   function setGambar3($img){
    $this->gambar3 = substr($img,12);
   }


   function getGambar1(){
     return $this->gambar1;	
   }
   function getGambar2(){
     return $this->gambar2;
   }
   function getGambar3(){
     return $this->gambar3;
   }

   }
?>