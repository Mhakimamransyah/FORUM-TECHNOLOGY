<div style="background-color:azure; padding:10px;">
<center><h1>WRITE YOU'RE ARTICLE</h1></center>
<form id="articleForm">
  <p>JUDUL      :<input type="text" name="judul" id="judul" value="judul"required autocomplete="off"></p>
  <p>KATEGORI   :<select id="kategori">
              <option value="1">Smartphone</option>
              <option value="2">Computer</option>
              <option value="3">Hardware</option>
              <option value="4">Software</option>
            </select></p>
  <img src="" style="width:100px; height:100px;" id="gambar1"> <input type="file" name="inputimg1" class="inputWrapper" id="inputGambar1">
  <img src="" style="width:100px; height:100px;" id="gambar2"> <input type="file" name="inputimg2" class="inputWrapper" id="inputGambar2">
  <img src="" style="width:100px; height:100px;" id="gambar3"> <input type="file" name="inputimg3" class="inputWrapper" id="inputGambar3">
  <p><textarea cols="90" rows="30" name="textarticle" id="textarticle"></textarea></p>
  <p><input type="submit"  name="submit" id="submit" value="upload"> 
          <input type="reset" name="" value="Reset"></p>
</form>
</div>

<script type="text/javascript">
  $("#inputGambar1").change(function(){
      var oFReader = new FileReader();
      oFReader.readAsDataURL(document.getElementById("inputGambar1").files[0]);
      oFReader.onload = function (oFREvent){
         if($('#gambar1').attr('src') == ""){
             document.getElementById("gambar1").src = oFREvent.target.result;
        }
        }
   });
 $("#inputGambar2").change(function(){
      var oFReader = new FileReader();
      oFReader.readAsDataURL(document.getElementById("inputGambar2").files[0]);
      oFReader.onload = function (oFREvent){
         if($('#gambar2').attr('src') == ""){
             document.getElementById("gambar2").src = oFREvent.target.result;
        }
        } 
   });
   $("#inputGambar3").change(function(){
       var oFReader = new FileReader();
      oFReader.readAsDataURL(document.getElementById("inputGambar3").files[0]);
      oFReader.onload = function (oFREvent){
         if($('#gambar3').attr('src') == ""){
             document.getElementById("gambar3").src = oFREvent.target.result;
        }
        }
   });
   
   
   $("#articleForm").on('submit',function(e){
     e.preventDefault();
     var judul = $("#judul").val();
     var kategori = $("#kategori").val();
     var artikel = $("#textarticle").val();
     
     var img1 = $("#inputGambar1").val();
     var img2 = $("#inputGambar2").val();
     var img3 = $("#inputGambar3").val();
  
     $.ajax({
       type : "post",
       url  : "../Controllers/Form_Controller.php",
       data  : {judul   : judul,
                kategori: kategori,
                artikel : artikel,
                image1  : img1,
                image2  : img2,
                image3  : img3},
       beforeSubmit : function(data){
          
       },
       success : function(data){
         if(data == 1){
            alert("FAILED POSTED ARTIKEL");
         }
         else{
            
  //upload gambar to specified folder
  var input1 = document.getElementById("inputGambar1");
  file1 = input1.files[0];
  if(file1 != undefined){
    formData1= new FormData();
    if(!!file1.type.match(/image.*/)){
      formData1.append("image", file1);
      $.ajax({
        url: "../Controllers/Upload_to_Specified_Folder.php",
        type: "POST",
        data: formData1,
        processData: false,
        contentType: false,
        success: function(data){
            // alert('success');
        }
      });
    }else{
      alert('Not a valid image1!');
    }
  }else{
    alert('Input something in image 1!');
  }

  var input2 = document.getElementById("inputGambar2");
  file2 = input2.files[0];
  if(file2 != undefined){
    formData2= new FormData();
    if(!!file2.type.match(/image.*/)){
      formData2.append("image", file2);
      $.ajax({
        url: "../Controllers/Upload_to_Specified_Folder.php",
        type: "POST",
        data: formData2,
        processData: false,
        contentType: false,
        success: function(data){
            // alert('success');
        }
      });
    }else{
      alert('Not a valid image2!');
    }
  }else{
    alert('Input something image 2!');
  }

  var input3 = document.getElementById("inputGambar3");
  file3 = input3.files[0];
  if(file3 != undefined){
    formData3= new FormData();
    if(!!file3.type.match(/image.*/)){
      formData3.append("image", file3);
      $.ajax({
        url: "../Controllers/Upload_to_Specified_Folder.php",
        type: "POST",
        data: formData3,
        processData: false,
        contentType: false,
        success: function(data){
            // alert('success');
        }
      });
    }else{
      alert('Not a valid  image3!');
    }
  }else{
    alert('Input something image3!');
  }

     //UPLOAD DATA TO RELASI TABEL
            var username = $("#access").val();
            $.ajax({
              type : "post",
              url  : "../Controllers/Relasi_User_Artikel.php",
              data : {usernamex:username},
              beforeSubmit : function(data){

              },
              success : function(data){
                  if(data == 1){
                    alert("Article Failed Posted  "+data);
                  }
                  else{
                     alert("ARTIKEL POSTED ");
                     location.reload();
                  }
              }
            });
         }
        },
        error : function(data){
        }
   })
   
  
  })
</script>