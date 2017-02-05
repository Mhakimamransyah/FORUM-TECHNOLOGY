<?php 
     
  class Komentar{

      var $komentar;
      var $username;

      function setKomentar($komentar){
          
        $this->komentar = $komentar;

      }

      function setUsername($username){
    
        $this->username = $username;

      }

      function getKomentar(){

       return $this->komentar;

      }

      function getUsername(){

        return $this->username;

      }
  }




?>