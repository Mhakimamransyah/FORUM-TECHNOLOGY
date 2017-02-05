<?php 
 
$username = $_GET['username'];
$access = false;

if(isset($username)){
  $access = true;
  echo "<input type='hidden' id='access' value='".$username."''>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>FORUM TECHNOLOGY</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/bootstrap.css">
  <link rel="stylesheet" href="../../css/jquery-ui.css">
  <script src="../../javascript/jquery.min.js"></script>
  <script src="../../javascript/bootstrap.min.js"></script> 
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 10000px}
    
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
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Dashboard</a></li>
        <li><a href="#">Age</a></li>
        <li><a href="#">Gender</a></li>
        <li><a href="#">Geo</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content" id="utama" style="background-color:white;">
    
    <div class="col-sm-2 sidenav hidden-xs">
      <h2>Logo</h2>
     <ul class="nav nav-pills nav-stacked">
        <li class="menu active" id="home"><a href="#section1">HOME</a></li>
        <li class="menu" id="aboutus"><a href="#section2">ABOUT US</a></li>
        <li class="menu" id="writeartikel"><a href="#section3" id="makeArticle">CREATE YOUR OWN ARTICLE</a></li>
        <li class="menu" id="manage"><a href="#section3" id="manageMyArticle">MANAGE MY ARTICLE</a></li>
        <li>
           <div class="panel-group">
              <div class="panel panel-default">
                 <div class="panel-heading">
                    <h4 class="panel-title" style="font-family: fantasy; color: darkblue;">
                       <a data-toggle="collapse" href="#collapse1">SETTING</a>
                   </h4>
                </div>
               <div id="collapse1" class="panel-collapse collapse">
               <div class="panel-body">
                 <a href="../../"><button>LOGOUT</button></a>
                 <button>MY SETTING</button>
               </div>
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
     
     <div class="row">
     	<div class="col-sm-12" >
     		<div class="well" style="background-color:darkorange;">
     			<h5 style="font-size: 28px;
                           font-family: fantasy;">Welcome <?php echo $username; ?>,Have a Nice Day</h5>
     		</div>
     	</div>
     </div>  
      
      <div id="main">
      </div>
  
  </div>
</div>
</body>
</html>

<script type="text/javascript">
 $(document).ready(function(){
    
    var user = $("#acces").val();
    $("#main").load("mainReview.php");
    
    $("#makeArticle").click(function(){
    	if($("#access").val()!=""){
            $("#main").load("Create_article.php");
    	}
        $('.menu').removeClass("active");
        $('#writeartikel').addClass("active");
    });

    $("#home").click(function(){
        $("#main").load("mainReview.php");
        $('.menu').removeClass("active");
        $('#home').addClass("active"); 
    });

    $("#manage").click(function(){
       var username = $("#access").val();
       $(".menu").removeClass("active");
       $("#manage").addClass("active");
       $("#main").load("ManageArticle.php?username="+username);
    });

    $("#aboutus").click(function(){
        $("#main").load("#");
        $('.menu').removeClass("active");
        $('#aboutus').addClass("active");
    });

 });  
</script>
