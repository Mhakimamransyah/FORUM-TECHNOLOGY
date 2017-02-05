<center><h3>MY Article</h3></center>
<br>
<div class="row">
<div class="col-sm-12">
<?php 
 require_once("../Dao/User_dao.php");
 require_once("../Dao/Relasi_User_Artikel_dao.php");
 require_once("../Dao/Artikel_dao.php");

 $username = $_GET['username'];
 $ud = new UserDao();
 $rua = new RelasiUserArtikelDao();
 $ad = new ArtikelDao();

 $userID =  $ud->read("","","","","SELECT ID_User FROM user WHERE username='".$username."'");
 

 $ID = "";
 $iter = $rua->read("","SELECT COUNT(ID_Artikel) FROM `relasi_user_artikel` WHERE ID_User = '".$userID."'");
 
 for($i=0;$i<$iter;$i++){
  
  $IDartikel = $rua->read("","SELECT ID_Artikel FROM `relasi_user_artikel` WHERE ID_User = '".$userID."' AND ID_Artikel > '".$ID."' LIMIT 0,1");
  $ID = $IDartikel;
  $judul = $ad->read("kriteria","","SELECT Judul FROM artikel WHERE ID_Artikel='".$IDartikel."'"); 
?>

<div class="well"><p id="location"><?php echo $judul[0]; ?></p><a href="#" location="<?php echo $IDartikel; ?>" class="edit">EDIT</a>&nbsp;<a href="#" id="delete" location2="<?php echo $IDartikel; ?>" class="delete">DELETE</a></div>

<?php 

}

?>

</div>
</div>

<script type="text/javascript">
	
	$(document).ready(function(){

       $("a.edit").click(function(){
       	     var ID = $(this).attr("location"); 
       	     $("#main").load("Edit.php?idartikel="+ID);
       });

       $("a.delete").click(function(){
           var ID = $(this).attr("location2");
           var r = confirm("Are you sure want to delete this article");
           if(r == true){
                          $.ajax({
                                    type : "post",
                                    url  : "../Controllers/Delete_Controller.php?",
                                    data : {ID : ID},
                                   beforeSubmit : function(data){
                                     //tampilkan pesan di sini
                                   },
                                   success : function(data){
                                       if(data == "0"){
                                               alert("Article deleted");  
                                               location.reload();     
                                        }
                                        else{
                                               alert("Failed Deleted "+data);
                                       }
                                   },
                                  error : function(data){
                                   }
                                })
               
                }

           });
       });

</script>