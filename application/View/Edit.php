<?php 

require_once("../Dao/Relasi_Artikel_Gambar_dao.php");
require_once("../Dao/Artikel_dao.php");
require_once("../Dao/Gambar_dao.php");

class Mac{

   var $ad;
   var $rag;
   var $gd;

   var $data;
   var $IdArtikel;
   var $fileArtikel;
   var $judul;
   var $kategori;  
   var $Gambar1;
   var $Gambar2;
   var $Gambar3;
   
   function __construct(){
     $this->ad = new ArtikelDao();
     $this->rag = new RelasiArtikelGambarDao();
     $this->gd = new GambarDao();
    }

   function setIdArtikel($id){
       $this->IdArtikel = $id;
       
   }

   function setJudul(){
      $row = $this->ad->read("kriteria","","SELECT * FROM artikel WHERE ID_Artikel='".$this->IdArtikel."'");
      $this->judul = $row['Judul'];
   }

   function setGambar(){
      $row = $this->rag->read("","","SELECT ID_Gambar FROM relasi_artikel_gambar WHERE ID_Artikel='".$this->IdArtikel."'");
      $idgbr1 = $row[0];
      $row = $this->rag->read("","","SELECT ID_Gambar FROM relasi_artikel_gambar WHERE ID_Gambar='".$idgbr1."'+1");
      $idgbr2 = $row[0];
      $row = $this->rag->read("","","SELECT ID_Gambar FROM relasi_artikel_gambar WHERE ID_Gambar='".$idgbr1."'+2");
      $idgbr3 = $row[0];
      
      $this->Gambar1 = $this->gd->read("gambar",$idgbr1);
      $this->Gambar2 = $this->gd->read("gambar",$idgbr2);
      $this->Gambar3 = $this->gd->read("gambar",$idgbr3);
    
   }

   function setKategori(){
     $row = $this->ad->read("kriteria","","SELECT ID_Kategori FROM artikel WHERE ID_Artikel='".$this->IdArtikel."'");
     $this->kategori = $row[0];
   }

   function setFileArtikel(){
     $row = $this->ad->read("kriteria","","SELECT lokasi FROM artikel WHERE ID_Artikel='".$this->IdArtikel."'");
     $this->fileArtikel = $row[0];
   }

   function setData(){

        $this->data = array("Judul"=>$this->judul,"File"=>$this->fileArtikel,"Kategori"=>$this->kategori,"Gambar1"=>$this->Gambar1,"Gambar2"=>$this->Gambar2,"Gambar3"=>$this->Gambar3,"ID_Artikel"=>$this->IdArtikel);
        return $this->data;
   }
   


}

$mac = new Mac();
$mac->setIdArtikel($_GET['idartikel']);
$mac->setGambar();
$mac->setJudul();
$mac->setKategori();
$mac->setFileArtikel();
$dataString = $mac->setData();
?>

<form id="updateArtikel">
    <input type="hidden" id="idartikel" value="<?php echo $dataString['ID_Artikel'];?>">
	<p>JUDUL   : <input type="" id="judul" value="<?php echo $dataString['Judul']; ?>" required></p>
    <input type="hidden" id="juduLama" value="<?php echo $dataString['Judul']; ?>">
    <?php 
     $opt1="";
     $opt2="";
     $opt3="";
     $opt4="";

     switch ($dataString['Kategori']) {
          	case '1': $opt1="selected";
 
           		break;
          	case '2': $opt2="selected";

          	    break;
          	case '3': $opt3="selected";

          	    break;

          	case '4': $opt4="selected";

          	    break;
          	
          	default:
          		# code...
          		break;
          }     
   


    ?>
	<p>KATEGORI: <select id="kategori">
		          <option value="1" <?php echo $opt1; ?>>Smartphone</option>
                  <option value="2" <?php echo $opt2; ?>>Computer</option>
                  <option value="3" <?php echo $opt3; ?>>Hardware</option>
                  <option value="4" <?php echo $opt4; ?>>Software</option>
	            </select>
	</p>
	<p>
	<br>
	  <p>
	    <img src="../../libs/images/<?php echo $dataString['Gambar1']; ?>" id="image1" alt="<>" style="width:100px;height:100px;">
        <img src="../../libs/images/<?php echo $dataString['Gambar2']; ?>" id="image2" style="width:100px;height:100px;">
        <img src="../../libs/images/<?php echo $dataString['Gambar3']; ?>" id="image3" style="width:100px;height:100px;">
	  </p>
	  <p>
	    <?php 
 	         $file = fopen("../../libs/file/".$dataString['File'], "r");
 	         $artikel = fread($file,filesize("../../libs/file/".$dataString['File']));
 	    ?>
		<textarea cols="90" rows="30" name="textarticle" id="textarticle"><?php echo $artikel; ?></textarea>
	</p>
	<p><input type="submit" name="" value="update">
	   <input type="button" name="" value="cancel"></p>
</form>

<script type="text/javascript">
	

   $("#updateArtikel").on('submit',function(e){
      e.preventDefault();

      var judul = $("#judul").val();
      var kategori = $("#kategori").val();
      var artikel = $("#textarticle").val();
      var id = $("#idartikel").val();
      var judulama = $("#juduLama").val();
      
      $.ajax({
         
         type : "post",
         url  : "../Controllers/Edit_Controller.php",
         data : {judul : judul,
                 kategori : kategori,
                 artikel : artikel,
                 ID_artikel : id,
                 judulama : judulama},

        success: function(data){
           
           if(data == 0){
               
             alert("article updated");
             location.reload();
           }
           else{

             alert("error cuy "+ data);

           }

        }
      });
   
      
   });
</script> 