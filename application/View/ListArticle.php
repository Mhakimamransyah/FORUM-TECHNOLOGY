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

  $categori=$_GET['categori'];
  $headTittle = "";
  $bgLocation = "";

  switch ($categori) {
  	case '1':
  		 $headTittle = "SMARTPHONE";
  		break;
    case '2':
    	# code...
    	break;
    case '3':
    	 $headTittle = "HARDWARE";
    	break;
    case '4':
    	 $headTittle = "SOFTWARE";
    	break;
  	
  	default:
  		# code...
  		break;
  }
?>


<div class="row">
    <div class="col-sm-12">
    <div class="well" style="background-color: azure;
    background-size: 486px;
    background-position-x: 358px;
    background-position-y: -82px;
    background-repeat: no-repeat;">
    
    <h4 style="font-family: fantasy;
    font-size: 38px;
    font-style: italic;
    color: black;">ALL <?php echo $headTittle; ?> ARTICLE</h4>
    <h3>what's new?</h3>
    </div>
    </div>
    </div>
<?php
       $iter = $ad->read("count".$categori);

      
       $row   = $ad->read("kriteria","","SELECT * FROM artikel WHERE ID_Kategori ='".$categori."' ORDER BY ID_Artikel DESC LIMIT 0,1");
       
       $ID = $row['ID_Artikel'];
             
       $x = 0; //id element
       $Judul = array();//menampung judul untuk readartikel
       $arr = array();


       for($i=0;$i<$iter;$i++){ 
        
         $judul = $row['Judul'];
         $ID = $row['ID_Artikel'];
         
         $ID_gambar = $rag->read($ID);
         $gambar = $gd->read("",$ID_gambar);
      
      
         $ID_user = $rua->read($ID);
         $username = $ud->read("","","",$ID_user);

         array_push($arr,$ID);
        ?>
         
         <div class="col-sm-3" style="width:400px; height:300px;">
          <div class="well">
            <a href="#" id="article<?php echo $x; ?>">
            <img src="libs/images/<?php echo $gambar;?>" style="width:300px;height:200px;">
            <p style="font-size:20px; font-style:bold;"><?php echo $judul?></a></p>
            <p style="font-size:15px;">Oleh:<?php echo $username; ?></p>
          </div>
        </div>
      


        <?php 

       $row  = $ad->read("kriteria","","SELECT ID_Artikel,  Judul FROM artikel WHERE ID_Artikel < '".$ID."' AND ID_Kategori='".$categori."' ORDER BY ID_Artikel DESC LIMIT 0,1");
       $x++;
    }
?>


<script type="text/javascript">
   
   $(document).ready(function(){
      
     var sizeArray = <?php echo count($arr);?>;
     var arrData = <?php echo json_encode($arr);?>;

     for(let i=0;i<sizeArray;i++){
         $("#article"+i).click(function(){
          $("#main").load("application/View/ReadArticle.php?ID="+arrData[i]);
       });  
     }  
      

   });

</script>

