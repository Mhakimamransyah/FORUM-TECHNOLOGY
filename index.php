<!DOCTYPE html>
<html lang="en">
<head>
  <title>FORUM TECHNOLOGY</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <script src="javascript/jquery.min.js"></script>
  <script src="javascript/bootstrap.min.js"></script> 
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 2000px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: silver;
      height: 100%;
    }
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 600px) {
      .row.content {height: auto;}
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content" id="utama" style="background-color: white;">
    
    <div class="col-sm-2 sidenav hidden-xs">
      <h2>Logo</h2>
      <ul class="nav nav-pills nav-stacked">
        <li class="active menu" id="home"><a href="#section1">HOME</a></li>
        <li class="menu" id="aboutus"><a href="#section2">ABOUT US</a></li>
        <li>
           <div class="panel-group">
              <div class="panel panel-default">
                 <div class="panel-heading">
                    <h4 class="panel-title" style="font-family: fantasy;color: darkblue;">
                       <a data-toggle="collapse" href="#collapse1">MAKE YOUR OWN ARTICLE</a>
                   </h4>
                </div>
               <div id="collapse1" class="panel-collapse collapse">
               <div class="panel-body">
                 <form id="loginForm">
                    <p>USERNAME <input type="text" name="username" id="username" required autocomplete="off"></p>
                    <p>PASSWORD <input type="password" name="password" id="password" required autocomplete="off"></p>
                    <input type="submit" name="" value="LOGIN">
                 </form>
               </div>
               <div class="panel-footer"><span class="glyphicon glyphicon-log-in"></span>&nbsp;<a href="#" id="signup">NOT ACCOUNT YET</a></div>
            </div>
          </div>
        </div>
     </li>
      </ul><br>
    </div>
    
    <br>
    
      <div class="col-sm-10" id="mainBOARD">
       <div class="well" style="background-color: darkorange;">
        <h4 style="font-size: 96px;
    font-family: fantasy;
    font-style: italic;">FORUM TECHNOLOGY</h4>
        <p style="font-family: fantasy;
    font-size: 25px;
    text-decoration: underline;
    color: brown;">We Discuss , not Provoke</p>
      </div>
      
      <div id="main">
      </div>
  
  </div>
  </div>
</div>
</body>
</html>

<script type="text/javascript">
 $(document).ready(function(){
    
    $("#main").load("application/View/home.php");


    $("#home").click(function(){
        $("#main").load("application/View/home.php");
        $('.menu').removeClass("active");
        $('#home').addClass("active"); 
    });

    $("#aboutus").click(function(){
        $("#main").load("application/View/aboutus.php");
        $('.menu').removeClass("active");
        $('#aboutus').addClass("active");
    });

    $("#signup").click(function(){
         $("#main").load("application/View/signup.php");
    });

     $("#loginForm").on('submit',function(e){ 
        e.preventDefault();   
        
        $.ajax({
             
            type : "post",
            url :  "application/Controllers/Login_Controller.php",
            data : $('#loginForm').serialize(),
             beforeSubmit : function(data){
                   
             },
            success : function(data)
            {
                if(data == "1"){
                       
                       alert("gagal "+data);
                }
                else{
                    var username = $("#username").val();
                    alert("sukses");
                    window.location.href="application/View/CredentialsPoint.php?username="+username;
                }
        },
        error : function(data){
        }

        });


    });

 });  
</script>
