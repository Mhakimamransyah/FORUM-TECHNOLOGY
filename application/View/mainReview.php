<?php 
   require_once("../Dao/Gambar_dao.php");
  require_once("../Dao/Artikel_dao.php");
  require_once("../Dao/User_dao.php");
  require_once("../Dao/Relasi_Artikel_Gambar_dao.php");
  require_once("../Dao/Relasi_User_Artikel_dao.php");
  
  $ad = new ArtikelDao();
  $gd = new GambarDao();
  $ud = new UserDao();
  $rag = new RelasiArtikelGambarDao();
  $rua = new RelasiUserArtikelDao();

 



?>
     <div id="mainReview">
     
     <!-- //SMARTPHONE HEADER-->
    <div class="row">
    <div class="col-sm-12">
    <div class="well" style="background-color: white;
    background-image: url(../../images/apple_microsoft_android.jpg);
    background-size: 486px;
    background-position-x: 358px;
    background-position-y: -82px;
    background-repeat: no-repeat;">
    
    <h4 style="font-family: fantasy;
    font-size: 38px;
    font-style: italic;
    color: darkcyan;"><a href="#" id="smartphoneArticle">SMARTPHONE</a></h4>
    </div>
    </div>
<?php
       $iter = $ad->read("count1");
       if($iter > 8){
          $iter = 8;
       }
      
       $ID   = "";
       $x = 0; //id element
       $smartphone = array();//menampung judul untuk readartikel

       for($i=0;$i<$iter;$i++){ 

       $row  = $ad->read("1",$ID);
       $judul = $row['Judul'];
       $ID = $row['ID_Artikel'];
       
       $ID_gambar = $rag->read($ID);
       $gambar = $gd->read("",$ID_gambar);
      
       array_push($smartphone,$ID);

       $ID_user = $rua->read($ID);
       $username = $ud->read("","","",$ID_user);
 ?>

    <!-- //SMARTPHONE CONTENT 1 -->
        <div class="col-sm-3">
          <div class="well">
            <a href="#" id="articleSmartphone<?php echo $x;?>">
            <img src="../../libs/images/<?php echo $gambar;?>" style="width:100%;">
            <p style="font-size:25px; font-style:bold;"><?php echo $judul?></p></a>
            <p style="font-size:15px;">Oleh:<?php echo $username; ?></p>
          </div>
        </div>
<?php  $x++; } ?>
      
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="well" style="background-image: url(../../images/software.jpg);
    background-size: 486px;
    background-position-x: 358px;
    background-position-y: -82px;
    background-repeat: no-repeat;
    background-repeat-x: initial;">
          <h4 style="font-family: fantasy;
    font-size: 40px;
    font-style: italic;"><a href="#" style="color:black;" id="softwareArticle">SOFTWARE</h4></a>
          </div>
        </div>
<?php
       $iter = $ad->read("count4");
       if($iter > 8){
          $iter = 4;
       }
      
       $ID   = "";
       $q = 0;
       $software = array();


       for($i=0;$i<$iter;$i++){ 

       $row  = $ad->read("4",$ID);
       $judul = $row['Judul'];
       $ID = $row['ID_Artikel'];
       
       $ID_gambar = $rag->read($ID);
       $gambar = $gd->read("",$ID_gambar);
      
        array_push($software,$ID);


       $ID_user = $rua->read($ID);
       $username = $ud->read("","","",$ID_user);
 ?>

        <div class="col-sm-3">
          <div class="well">
           <a href="#" id="articleSoftware<?php echo $q;?>">
            <img src="../../libs/images/<?php echo $gambar;?>" style="width:100%;">
            <p style="font-size:25px; font-style:bold;"><?php echo $judul?></p></a>
            <p style="font-size:15px;">Oleh:<?php echo $username; ?></p>
          </div>
        </div>
<?php 
$q++;
}

?>
    </div>
      
       
       <div class="row">
        <div class="col-sm-12">
          <div class="well" style="background-image: url(../../images/hardware.jpg);
    background-size: 486px;
    background-position-x: 358px;
    background-position-y: -82px;
    background-repeat: no-repeat;
    background-repeat-x: initial;">
          <h4 style="font-family: fantasy;
    font-size: 40px;
    font-style: italic;
    color:white;"><a href="#" style="color:black;" id="hardwareArticle">HARDWARE</a></h4>
          </div>
        </div>
<?php 
       $iter = $ad->read("count3");
       if($iter > 8){
          $iter = 4;
       }
      
       $ID   = "";
       $v = 0; //ID Element
       $hardware = array();


       for($i=0;$i<$iter;$i++){ 

       $row  = $ad->read("3",$ID);
       $judul = $row['Judul'];
       $ID = $row['ID_Artikel'];
       
       $ID_gambar = $rag->read($ID);
       $gambar = $gd->read("",$ID_gambar);
        
         array_push($hardware, $ID);

       $ID_user = $rua->read($ID);
       $username = $ud->read("","","",$ID_user);

?>

        <div class="col-sm-3">
          <div class="well">
          <a href="#" id="articleHardware<?php echo $v;?>">
           <img src="../../libs/images/<?php echo $gambar;?>" style="width:100%;">
            <p style="font-size:25px; font-style:bold;"><?php echo $judul?></a></p>
            <p style="font-size:15px;">Oleh:<?php echo $username; ?></p> 
          </div>
        </div>
<?php 
   $v++;
  }
?>
      </div>

<script type="text/javascript">
  $(document).ready(function(){
     
    var username = $("#usr").val();

     $("#smartphoneArticle").click(function(){
         $("#main").load("ListArticleCredentialsPoint.php?categori=1");
     });
     $("#softwareArticle").click(function(){
         $("#main").load("ListArticleCredentialsPoint.php?categori=4");
     });
     $("#hardwareArticle").click(function(){
         $("#main").load("ListArticleCredentialsPoint.php?categori=3");
     });
     
     //SMARTPHONE
     var sizeArray = <?php echo count($smartphone);?>;
     var arr = <?php echo json_encode($smartphone);?>;
    

     for(let i=0;i<sizeArray;i++){
         $("#articleSmartphone"+i).click(function(){
        
          $("#main").load("ReadArticleCredentialsPoint.php?ID="+arr[i]+"&username="+username);
       });  
     }


     //SOFTWARE
     var sizeArraySoftware = <?php echo count($software);?>;
     var arrSoftware = <?php echo json_encode($software);?>;
     for(let i=0;i<sizeArraySoftware;i++){
         $("#articleSoftware"+i).click(function(){
          
          $("#main").load("ReadArticleCredentialsPoint.php?ID="+arrSoftware[i]);
       });  
     }

     //HARDWARE
     var sizeArrayHardware = <?php echo count($hardware);?>;
     var arrHardware = <?php echo json_encode($hardware);?>;
     for(let i=0;i<sizeArrayHardware;i++){
         $("#articleHardware"+i).click(function(){
          $("#main").load("ReadArticleCredentialsPoint.php?ID="+arrHardware[i]);
       });  
     }

 });



</script>