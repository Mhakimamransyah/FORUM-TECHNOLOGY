<div style="background-color:white">
<h1>Keep Calm and Just Join Us</h1>
<form id="signUpForm">
	<p>USERNAME    :<input type="text" name="username" id="usernameSignUp" required autocomplete="off" value="Richard"></p>
	<p>EMAIL       :<input type="email" name="email" id="email" required autocomplete="off" value="rich@gmail.com"></p>
	<p>PASSWORD    :<input type="password" name="passwordSignUp" id="passwordSignUp" value="12345"></p>
	<p>RE-PASSWORD :<input type="password" name="repassword" id="repassword" value="12345"></p>
	<p>CONTACT     :<input type="number" name="contact" id="contact" required autocomplete="off" value="54321"></p>
	<input type="submit" name="">
	<input type="reset" name="">
</form>
</div>
<script type="text/javascript">
	$(document).ready(function(){
       $("#signUpForm").on('submit',function(e){ 
       	e.preventDefault();
        var username = $("#usernameSignUp").val();
        var email = $("#email").val();
        var password = $("#passwordSignUp").val();
        var repassword = $("#repassword").val();
        var contact = $("#contact").val();

        if(password != repassword){
           alert(password);
           alert("MASUKKAN PASSWORD YANG SAMA");
        }
        else{
        	$.ajax({
                      type : "post",
                      url  : "application/Controllers/Signup_Controller.php",
                     data  : {username : username,
                              email : email,
                              password : password,
                              contact : contact},
                             beforeSubmit : function(data){
          
                             },
                             success : function(data){
                             if(data == 1){
                                   alert("failed");
                             }
                            else{
                                   alert("YOU'RE SIGN UP");
                                   window.location.href="application/View/CredentialsPoint.php?username="+username;
                             }
                            },
                            error : function(data){
                            }
   })
        }


      });
	});
</script>