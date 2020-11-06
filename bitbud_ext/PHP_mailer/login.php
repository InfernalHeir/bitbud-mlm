<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Form</title>
	<meta name="google-signin-client_id" content="301209014507-1qk17tncmfckfa9sk5lss38vkp4he2qh.apps.googleusercontent.com">
	<!-- Latest compiled and minified CSS -->
	<!-- links -->
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="sign.css">
	<!-- scripts -->
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
</head>

<body><div id="fb-root"></div>

<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.3&appId=301900900710153&autoLogAppEvents=1"></script><script type="text/javascript" src="fb.js"></script>

	<div class="container-fluid big">	
<div class="container create">
	<div class="row">
		
		<div class="col-lg-8 col-md-4 col-12">
			
			<h1>Create Account</h1>

<form method="post">
  <div class="form-group">
    <label for="name">Username:</label>
    <input type="text" class="form-control w-50" id="name" name="name">
    <span id="we"></span>

  </div>

  <div class="form-group">
    <label for="email">Email:</label>
    <input type="text" class="form-control w-50" id="email" name="email">
    <span id="hel"></span>		
    
   	
  </div>

  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control w-50" id="pwd" name="password">
  </div>

  <div class="form-group">
    <label for="pwd">Confirm Password:</label>
    <input type="password" class="form-control w-50" id="pwd">
  </div>
  <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox">I have read and agree to the <a href="#" style="color:white; text-decoration: none; cursor: pointer;">terms of use</a> and <a href="#" style="color:white; text-decoration: none; cursor: pointer;">Privacy Policy</a>
    </label>
  </div>
  <input type="submit" class="btn btn-primary" name="submit" value="Get Otp"><span id="at" style="padding:10px 10px; display:none; background-color: green;">Otp sent Successfully</span>
<?php
  if(isset($mailer)){
		?>
		<script type="text/javascript">
		var x = document.getElementById('at');
		x.style.display="inline-block";
		</script>
<?php
}
?>  
<div class="ftp">
<div class="form-group">
    <label for="otp">Verify Otp</label>
    <input type="text" class="form-control w-50" id="otp" name="otp">
  </div>
  <input type="submit" class="btn btn-success" name="hello" value="Verify Otp"><span id="wel"></span>
  <?php

if(isset($_POST['submit']))
{
include 'dbconnection.php';
}
?>
</div>
	
</form>
		</div>
		<script type="text/javascript">
	$(document).ready(function(){
		$('.btn btn-primary').click(function(){
			$('.ftp').show(2000);
		});
	});
</script>
		<div class="col-lg-4 col-md-4 col-12 c2">
			<span class="ml-3">Or Sign up with Social Media
				</span><br>	<br>	<br>	
				<div id="my-signin2"></div>
    <script>
    function onSuccess(googleUser) {
      console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
    }
    function onFailure(error) {
      console.log(error);
    }
    function renderButton() {
      gapi.signin2.render('my-signin2', {
        'scope': 'profile email',
        'width': 240,
        'height': 50,
        'longtitle': true,
        'theme': 'dark',
        'onsuccess': onSuccess,
        'onfailure': onFailure
      });
    }
  </script>

	  

			
			<div class="fb-login-button f" data-width="240" data-size="large" data-button-type="continue_with" data-auto-logout-link="false" data-use-continue-as="false"></div><br><br>
			<div style="text-align: center; width:250px;">	
			<span><a style="font-size: 20px; cursor: pointer;" class="text-center" data-toggle="modal" data-target="#exampleModal">Forget Password?</span><br>

			
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    	<div class="modal-content">
      	<div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Password Recovery</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
        </button>
      	</div>
      	<div class="modal-body">
       	<form method="post">
		<div class="form-group">
    	<label for="email">Email:</label>			
    	<input type="text" class="form-control w-75" id="name" name="forget_email" placeholder="Enter Your Registerd Email">
  		</div><br>				
  		</div>
  		<span id="msg" style="display: none;">THE PASSWORD RECOVERY LINK HAS BEEN SENT TO YOU REGISTERED EMAIL ADDRESS</span>
      	<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Need Help?</button>
        <input type="submit" name="okk" value="SEND MAIL" class="btn btn-primary">
      </div>
    </div>
  </div>
</div>	
			
			<span><a href="aclogin.php" style="font-size: 20px; color:white; text-decoration: none; cursor: pointer;">Already have Account?</a></span>
			</div>
		</div>
		
	</div>
</div>
</div>



</body>
</html>