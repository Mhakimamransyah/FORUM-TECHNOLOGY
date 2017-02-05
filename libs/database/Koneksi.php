<?php 

  class Koneksi{
    var $link;
	var $host;
	var $user;
	var $password;
	var $database;

    public function __construct(){
		$this->host="localhost";
		$this->user="root";
		$this->password="";
		$this->database="test case";
	}

	public function Connect(){
		$this->link = mysqli_connect($this->host,$this->user,$this->password);
		if(!$this->link){
			die("Connect Fail !");
		}
		else{
			if(!mysqli_select_db($this->link,$this->database)){
				die("Connect Fail !");
			}
		}
	}
	public function Disconnect(){
		@mysqli_close();
	}

  }

?>