<?php ini_set('display_errors',1);
session_start();
if(empty($_SESSION['token']) || empty($_GET['username']) || empty($_GET['token']))
{
    header('location:https://bitbud.biz/');
}

    
    

?>


<!DOCTYPE html>
<html lang="en">

   <?php include("headpart/head.php");
	?>

<body>
    <?php include("headpart/header.php");
	?>
<!-- ================================
         END HEADER AREA
================================= -->

<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content">
                    <div class="breadcrumb-inner">
                        <h2 class="breadcrumb__title">Change password.</h2>
                        <ul class="breadcrumb__list">
                            <li class="active__list-item"><a href="index.php">home</a></li>
                            <li>Change password.</li>
                        </ul>
                    </div><!-- end breadcrumb-inner -->
                    <div class="text-outline">Change.</div>
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
<section class="form-shared reset-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="contact-form-action">
                    <div class="form-heading">
                        <h3 class="form__title">Change password!</h3>
                        <p class="form__desc reset__desc">
                           Change here your password.
                          
                        </p>
                    </div>
                    <!--Contact Form-->
                    
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 form-group">
                                <input class="form-control" type="password" id="new-password" placeholder="Enter New password"
                                       required="" autocomplete="off">
                            </div><!-- end col-lg-12 -->
                            <div class="col-lg-12 col-sm-12 form-group">
                                <input class="form-control" type="password" id="confirm-password" placeholder="Confirm Password "
                                       required="" autocomplete="off">
                            </div><!-- end col-lg-12 -->

                            <div class="col-lg-12 col-sm-12 col-xs-12 form-group">
                                <button class="theme-btn reset__btn" type="submit" onclick="reset_password()">Submit</button>
                            </div><!-- end col-lg-12 -->

                        </div><!-- end row -->
                    
                <script>
                function reset_password()
                {
                    var newpassword=$('#new-password').val();
                    var confirmpassword=$('#confirm-password').val();
                    var username="<?php echo $_GET['username'];   ?>";
                    
                    if(newpassword==0 || confirmpassword==0)
                    {
                         $('body').topAlertjs({
                    type: 'error',
                    message: 'Invalid Password',
                    duration: 3
               
                 
               
                    });
                    }
                    else
                    {
                        $.ajax({
                        url:'pass_change',
                        type:'POST',
                        data:{newpassword:newpassword,confirmpassword:confirmpassword,username:username},
                        beforeSend:function()
            {
              $('.loader-container').show();  
            },
            success:function(data)
            {
                $('.loader-container').hide('fade',1000);
                if(data=="Password Changed Successfully!.")
                {
                
                    $('body').topAlertjs({
                    type: 'success',
                    message: data,
                    duration: 3
               
                    });
                }
                else
                {
                    $('body').topAlertjs({
                    type: 'error',
                    message: data,
                    duration: 3
               
                    });
                }
               setTimeout(function(){window.location.href='https://bitbud.biz'},3000)
            }
                        
                        })
                    }
                }
                </script>    
                </div><!-- end contact-form -->
            </div><!-- end col-lg-7 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end form-shared -->

    <?php include("headpart/footer.php");
	?>
	
	
</body>

</html>