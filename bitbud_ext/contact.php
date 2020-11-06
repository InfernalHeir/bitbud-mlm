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
                        <h2 class="breadcrumb__title">contact us.</h2>
                        <ul class="breadcrumb__list">
                            <li class="active__list-item"><a href="index.php">home</a></li>
                            <li>contact</li>
                        </ul>
                    </div><!-- end breadcrumb-inner -->
                    <div class="text-outline">contact us</div>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end hero-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!-- ================================
       START GOOGLE MAP
================================= -->
<div class="gmaps">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="map-address-box">
                    <ul class="map-address">
                        <li>
                            <i class="fa fa-map-marker-alt"></i>
                            <h5 class="map__title">our address.</h5>
                            <p class="map__desc">
                                Dept 906, 196 High Road, Wood Green, London, United Kingdom, N22 8HH.
                            </p>
                        </li>
                    </ul>
                </div><!-- end map-address-box -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 col-sm-6">
                <div class="map-address-box">
                    <ul class="map-address">
                        <li>
                            <i class="fa fa-phone"></i>
                            <h5 class="map__title">call us.</h5>
                            <p class="map__desc">LOCAL: Coming Soon</p>
                            <p class="map__desc">UK: Coming Soon</p>
                        </li>
                    </ul>
                </div><!-- end map-address-box -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 col-sm-6">
                <div class="map-address-box">
                    <ul class="map-address">
                        <li>
                            <i class="fa fa-envelope"></i>
                            <h5 class="map__title">email address.</h5>
                            <p class="map__desc"><a href="mailto:bitbudlimited@gmail.com">bitbudlimited@gmail.com</a></p>
                            <p class="map__desc"><a href="mailto:support@bitbud.biz">support@bitbud.biz</a></p>
                        </li>
                    </ul>
                </div><!-- end map-address-box -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
</div>
<!-- ================================
       END GOOGLE MAP
================================= -->

<!-- ================================
       START CONTACT AREA
================================= -->
<section class="contact-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="sec-heading">
                    <h2 class="sec__title">Feel Free to Write Us a Message.</h2>
                    <p class="sec__desc">
					   Try to list the main questions you as a consumer would have. If, at any point, you cannot quickly and easily find the answers to your questions, then you know to make improvements.
                    </p>
                    <!--<ul class="sec__list">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                    </ul>-->
                </div><!-- end sec-heading -->
            </div><!-- end col-lg-5 -->
            <div class="col-lg-7">
                <div class="contact-form-action">
                    <!--Contact Form-->
                   
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 form-group">
                                <input class="form-control" type="text" id="name" placeholder="Your Name" required="" autocomplete="off">
                            </div><!-- end col-lg-12 -->

                            <div class="col-lg-6 col-sm-6 form-group">
                                <input class="form-control" type="email" id="email" placeholder="Email Address"
                                       required="" autocomplete="off">
                            </div><!-- end col-lg-12 -->

                            <div class="col-lg-6 col-sm-6 form-group">
                                <input class="form-control" type="text" id="phone" placeholder="Phone Number" required="" autocomplete="off">
                            </div><!-- end col-lg-12 -->

                            <div class="col-lg-6 col-sm-6 form-group">
                                <input class="form-control" type="text" id="subject" placeholder="Subject" required="" autocomplete="off">
                            </div><!-- end col-lg-12 -->

                            <div class="col-lg-12 col-sm-12 form-group">
                                <textarea class="message-control form-control" id="message" placeholder="Write Message Here" autocomplete="off"></textarea>
                            </div><!-- end col-lg-12 -->

                            <div class="col-lg-12 col-sm-12 col-xs-12 form-group">
                                <button class="theme-btn" type="submit" onclick="contact_us()">Send Message</button>
                            </div><!-- end col-lg-12 -->
                        </div><!-- end row -->
                   
                </div><!-- end contact-form-action -->
            </div><!-- end col-lg-7 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end contact-area -->
<!-- ================================
       START CONTACT AREA
================================= -->

    <script>
    function contact_us()
    {
        var name=$('#name').val();
        var email=$('#email').val();
        var phone=$('#phone').val();
        var subject=$('#subject').val();
        var message=$('#message').val();
        
        if(name==0 || email==0 || phone==0 || subject==0 || message==0)
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
            url:'mail',
            type:'POST',
            data:{name:name,email:email,phone:phone,subject:subject,message:message},
            beforeSend:function()
            {
              $('.loader-container').show();  
            },
            success:function(data)
            {
                $('.loader-container').hide('fade',1000);
                    $('body').topAlertjs({
                    type: 'success',
                    message: data,
                    duration: 3
               
                    });
                    setTimeout(function(){window.location.href='https://bitbud.biz/bitbud_ext/contact.php'},3000)
            }
            })
        }
    }
        
    </script>
<!-- ================================
         START FOOTER AREA
================================= -->
	<?php include("headpart/footer.php");
	?>
	
<!-- ================================
         END FOOTER AREA
================================= -->
</body>

</html>