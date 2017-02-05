<style type="text/css">
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }
</style>
<?php 
require_once("../Dao/Gambar_dao.php");
require_once("../Dao/Artikel_dao.php");
require_once("../Dao/User_dao.php");
require_once("../Dao/Relasi_Artikel_Gambar_dao.php");
require_once("../Dao/Relasi_User_Artikel_dao.php");
require_once("../Dao/Komentar_dao.php");
require_once("../Dao/Relasi_Artikel_Komentar_dao.php");
  
$ad = new ArtikelDao();
$gd = new GambarDao();
$ud = new UserDao();
$rag = new RelasiArtikelGambarDao();
$rua = new RelasiUserArtikelDao();
$kd = new KomentarDao();
$rak = new RelasiArtikelKomentarDao();

$ID = $_GET['ID'];
$row = $ad->read("baca",$ID);
$title = $row['Judul'];
$lokasi = $row['lokasi'];

$IDuser = $rua->read("","SELECT ID_User FROM relasi_user_artikel WHERE ID_Artikel='".$ID."'");
$username = $ud->read("","","","","SELECT username FROM user WHERE ID_User='".$IDuser."'");

$IDgambar = $rag->read("",$ID);

$gambar1 = $gd->read("gambar",$IDgambar);
$gambar2 = $gd->read("gambar",($IDgambar)+1);
$gambar3 = $gd->read("gambar",($IDgambar)+2);



$target = "../../libs/file/"."$lokasi"; //AWAS HARUS TELITI CUY KOMA,TITIK,KUTI,DLL.
$file = fopen($target,"r");
$data = fread($file,filesize($target));
?>

<div style="background-color: beige;
            border-radius: 6px;">
	<h1><?php echo $title; ?></h1>
  <p>Oleh:<?php echo $username; ?></p>
	<br>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="libs/images/<?php echo $gambar1;?>" alt="gambar1" width="100" height="345" style="height:500px;">
      </div>

      <div class="item">
        <img src="libs/images/<?php echo $gambar2;?>" alt="gambar2" width="100" height="345" style="height:500px;">
      </div>
    
      <div class="item">
        <img src="libs/images/<?php echo $gambar3;?>" alt="gambar3" width="100" height="345" style="height:500px;">
      </div>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <h4><?php echo $data; ?></h4>
</div>
<h3><a href="#" id="back">Back</a></h3>
<?php 

$iter2 = $rak->read("kriteria","SELECT COUNT(ID_Komentar) FROM relasi_artikel_komentar WHERE ID_Artikel='".$ID."'");


$rowRelasi = $rak->read("kriteria","SELECT ID_Komentar FROM relasi_artikel_komentar WHERE ID_Artikel='".$ID."' ORDER BY ID_Komentar DESC LIMIT 0,1");


for($i=0;$i<$iter2[0];$i++){
$row = $kd->read("kriteria","SELECT * FROM komentar WHERE ID_Komentar='".$rowRelasi['ID_Komentar']."'");
$IDKomentarTerbesar = $rowRelasi['ID_Komentar'];
?>


<!-- INI ADALAH KOMENTAR -->
<div class="row">
  <div class="col-sm-12">
   <div class="well" style="background-color: burlywood;
    height: 117px;">
     <h8 style="    padding: 15px;
    font-size: 22px;"><?php echo $row['Username']; ?></h8>
       <div id="teksKomentar" style="background-color: white; width: 100%;
    background-color: white;
    border-radius: 26px;">
         <p style="padding: 10px;"><?php echo $row['Komentar']; ?></p> 
       </div>
   </div>
  </div> 
</div>
<?php 
    
$rowRelasi = $rak->read("kriteria","SELECT ID_Komentar FROM relasi_artikel_komentar WHERE ID_Artikel='".$ID."' AND ID_Komentar <".$IDKomentarTerbesar." ORDER BY ID_Komentar DESC LIMIT 0,1");

}

?>

<center><h2>you need to sign up to make a comment</h2>
<a href="#" id="signnow"><h1>SIGN UP NOW</h1></a></center>
<script type="text/javascript">
  
  $(document).ready(function(){

    $("#back").click(function(){
       location.reload();
    });
    $("#signnow").click(function(){
         $("#main").load("application/View/signup.php");
    });

  });

</script>



