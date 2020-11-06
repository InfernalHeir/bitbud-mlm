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
                        <h2 class="breadcrumb__title">recover password.</h2>
                        <ul class="breadcrumb__list">
                            <li class="active__list-item"><a href="index.php">home</a></li>
                            <li>recover password</li>
                        </ul>
                    </div><!-- end breadcrumb-inner -->
                    <div class="text-outline">recover</div>
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
                        <h3 class="form__title">Reset Password!</h3>
                        <p class="form__desc reset__desc">
                            Enter your username of your account to reset password.
                            Then you will receive a link to email to reset the password.If
                            you have any issue about reset password.
                            <a href="contact.php">contact us</a>
                            <p><strong>Note:-</strong> This link would open on same device. don't use another device. This may be for security purposes.</p>
                        </p>
                    </div>
                    <!--Contact Form-->
                    
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 form-group">
                                <input class="form-control" type="text" id="username" placeholder="Enter Username"
                                       required="" autocomplete="off">
                            </div><!-- end col-lg-12 -->

                            <div class="col-lg-12 col-sm-12 col-xs-12 form-group">
                                <button class="theme-btn reset__btn" type="submit" onclick="reset()">Reset password</button>
                            </div><!-- end col-lg-12 -->

                            <div class="col-lg-6 col-sm-6 col-xs-12 account-assist">
                                <p class="account__desc">
                                    <a href="login.php">Login</a>
                                </p>
                            </div><!-- end col-lg-12 -->

                            <div class="col-lg-6 col-sm-6 col-xs-12 account-assist">
                                <p class="account__desc text-right">
                                    Not a member?<a href="sign-up.php"> Register</a>
                                </p>
                            </div><!-- end col-lg-12 -->
                            
                        </div><!-- end row -->
                    
                </div><!-- end contact-form -->
            </div><!-- end col-lg-7 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end form-shared -->

<script>
   function reset()
   {
       var username=$('#username').val();
       if(username==0)
       {
           $('body').topAlertjs({
                    type: 'error',
                    message: 'Invalid Details',
                    duration: 3
               
                 
               
          });
       }
       else
       {
           $.ajax({
            url:'password_recovery',
            type:'POST',
            data:{username:username},
            beforeSend:function()
            {
              $('.loader-container').show();  
            },
            success:function(data)
            {
                
                $('.loader-container').hide('fade',1000);
                if(data=="Link has been sent on your Registered Email Id!.")
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
               setTimeout(function(){window.location.href='https://bitbud.biz/bitbud_ext/recover.php'},3000)
            }
            })
       }
   }
</script>
    <?php include("headpart/footer.php");
	?>
	
	
</body>

</html>