<?php ini_set('display_errors',1);
session_start();
include '../dbconnection.php';
if(isset($_SESSION['user_id']))
{
    header('location:https://bitbud.biz/bitbud_dir/index.php');
}
try
{
if(isset($_SESSION['result_token']) && isset($_GET['username']) && isset($_GET['cmd']))
{
    $username=$_GET['username'];
    $select_password=$conn->prepare("SELECT `password` FROM `user_registration` WHERE `user_id`='$username'");
    $select_password->execute();
    $pass=$select_password->fetchAll();
    
    
}
}
catch(PDOException $e)
{
    echo "Connection Failed ".$e->getMessage();
}
$conn=null;
?>


<!DOCTYPE html>
<html lang="en">

    <?php include("headpart/head.php");
	?>

<body>
  
    <?php include("headpart/header.php");
	?>
  
<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content">
                    <div class="breadcrumb-inner">
                        <h2 class="breadcrumb__title">Login.</h2>
                        <ul class="breadcrumb__list">
                            <li class="active__list-item"><a href="index.html">home</a></li>
                            
                            <li>Login</li>
                        </ul>
                    </div><!-- end breadcrumb-inner -->
                    <div class="text-outline">Login</div>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end hero-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!-- ================================
       START FORM AREA
================================= -->
<section class="form-shared">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-shared-content">
                    <div class="login-box">
                       <h3>If You Are New to Bitcoin.</h3>
                        <p>
                           A common problem when users attempt to login is mis-typing their password. This is all too easy to do as the password field is of course masked.
                           </p>
                           <p>
                            A useful feature is to allow users to see the password they have entered by providing a show password checkbox. 
                        </p>
                        <p>
                            This checkbox should of course be unchecked by default.
                        </p>
                        <a href="sign-up.php" class="theme-btn">register now</a>
                    </div>
                </div><!-- end form-shared-content-->
            </div><!-- end col-lg-6 -->
            <div class="col-lg-6">
                <div class="contact-form-action">
                    <div class="form-heading text-center">
                        <h3 class="form__title">Login to your account!</h3>
                        
                    </div>
                    <!--Contact Form-->
                    
                        <div class="row">
                           
                            <div class="col-lg-12 col-sm-12 col-xs-12 account-assist text-center">
                               
                            </div><!-- end col-lg-12 -->

                            <div class="col-lg-12 col-sm-12 form-group">
                                <input class="form-control" type="text" id="username" placeholder="Username" required="" autocomplete="off" value='<?php if(isset($_SESSION['result_token']) && isset($_GET['username']) && isset($_GET['cmd'])){echo $_GET['username'];}?>'>
                            </div><!-- end col-lg-12 -->
                            
                            <div class="col-lg-12 col-sm-12 form-group">
                                <input class="form-control" type="password" id="password" placeholder="Password" required="" autocomplete="off" value='<?php if(isset($_SESSION['result_token']) && isset($_GET['username']) && isset($_GET['cmd'])){foreach($pass as $password){echo $password['password']; }}?>'>
                            </div><!-- end col-lg-12 -->

                            <div class="col-lg-12 col-sm-12 col-xs-12 form-condition">
                                <input type="checkbox" id="chb1"><!--
                                <div class="custom-checkbox">
                                    <input type="checkbox" id="chb1"/>-->
                                    <label for="chb1">Remember Me</label>
                                    <a href="recover.php" class="pass__desc float-right"> Forgot your password?</a>
                                </div>
                            </div><!-- end col-lg-12 -->

                            <div class="col-lg-12 col-sm-12 col-xs-12 form-group">
                                <button class="theme-btn login-btn" type="submit" onclick="login()">Login</button>
                            </div><!-- end col-lg-12 -->

                            <div class="col-lg-12 col-sm-12 col-xs-12 account-assist">
                                <p class="account__desc">Not a member?<a href="sign-up.php"> Sign Up</a></p>
                            </div><!-- end col-lg-12 -->
                        </div><!-- end row -->
                 
                </div><!-- end contact-form -->
            </div><!-- end col-lg-7 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end form-shared -->
<!-- ================================
       START FORM AREA
================================= -->

<!-- ================================
         END FOOTER AREA
================================= -->

    <script>
    function login()
    {
        var username=$('#username').val();
        var password=$('#password').val();
        if(username==0 || password==0)
        {
            $('body').topAlertjs({
            type: 'error',
            message: 'Invalid Details',
            close: true,
            duration: 3
               
        });
        }
        else
        {
            $.ajax({
            url:'login_checks',
            type:'POST',
            data:{username:username,password:password},
            beforeSend:function()
            {
                $('.loader-container').show();
            },
            success:function(data)
            {
                if(data=="login_ok")
                {
                    window.location.href='https://bitbud.biz/bitbud_dir/index.php';
                }
                else
                {
                    /*errors*/
                    $('.loader-container').hide();
                    $('body').topAlertjs({
                    type: 'error',
                    message: data,
                    close: true,
                    duration: 4
               
                    });   
                    
                }
            }
            })
        }
        
    }
    </script>    


    <?php include("headpart/footer.php");
	?>
	
</body>

</html>