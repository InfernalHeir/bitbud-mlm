<?php ini_set('display_errors',1);
ob_start();
session_start();
include '../dbconnection.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bitbud Limited Admin Panel</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://bitbud.biz/bitbud_ext/sticky-notification-confirmation-bar-alertjs/css/top-alertjs.css">
    <script src="https://bitbud.biz/bitbud_ext/sticky-notification-confirmation-bar-alertjs/js/top-alertjs.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<style type="text/css">
	.login-form {
		width: 340px;
    	margin: 50px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
        border-radius: 5px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
        margin-top: 30px;
    }
</style>
</head>
<body style="background-image: linear-gradient(to left, #8888e3, #008acd, #007f96, #006d57, #355727);">
    <div class="head text-center mt-50">
        <h1 style="color: #fff;margin-top: 50px;">ADMIN PANEL</h1>
    </div>
<div class="login-form">
    <form method="POST">
        <h2 class="text-center">Log in</h2>       
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Username" autocomplete="off" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required="required">
        </div>
        
        <div class="clearfix">
            <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
           
        </div>        
        
        
        <div class="form-group mt-5">
            <input type="submit" name="submit" class="btn btn-primary btn-block" value="Log in">
        </div>
        
    </form>
<?php
try
{
if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    if(empty($username) || empty($password))
    {
        echo "<script> $('body').topAlertjs({
                    type: 'error',
                    message: 'Invalid Credentials!',
                    duration: 3
               
                    });</script>";
    }
    else
    {
        /*round_check*/
        $query=$conn->prepare("SELECT `username`,`password` FROM `admin` WHERE `username`=:username and `password`=:password");
        $query->bindParam(':username',$username);
        $query->bindParam(':password',$password);
        $query->execute();
        $query->fetchAll();
        if($query->rowCount()==0)
        {
            echo "<script> $('body').topAlertjs({
                    type: 'error',
                    message: 'Invalid Username or Password please try again!.',
                    duration: 3
               
                    });</script>";
            echo "<script>setTimeout(function(){window.location.href='login.php'},3000)</script>";        
        }
        else
        {
            $_SESSION['admin_user']=$username;
            if(isset($_SESSION['admin_user']))
            {
               header('location:index.php'); 
            }
        }
    
    }
}
}
catch(PDOException $e)
{
    echo "Connection Failed ".$e->getMessage();
}
$conn=null;

?>
    
</div>

</body>


</html>                                		                            
     
     
     
     