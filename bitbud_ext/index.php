<?php
session_start();
if(isset($_GET['sponser']))
{
    $sponser_id=$_GET['sponser'];
    setcookie('sponser',$sponser_id,time()+120*60,'/');
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
    START HERO AREA
================================= -->
<section class="hero-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="hero-content">
                    <h1 class="hero__title">secure and easy way to trade bitcoin.</h1>
                    <p class="hero__desc">Decentralized digital currency that enables instant payments <br>
                                               anyone in the global control the creation of additional.</p>
                    <div class="hero-btn">
                        <a href="https://bitbud.biz/bitbud_ext/sign-up.php" class="theme-btn">Sign up</a>
						<a href="https://bitbud.biz/bitbud_ext/login.php" class="theme-btn">Login</a>
                    </div>
                </div><!-- end hero-content -->
            </div><!-- end col-lg-7 -->
            <div class="col-lg-5">
                <div class="hero-img-box">
                    <img src="https://bitbud.biz/bitbud_ext/images/v2.png" alt="vector image" class="hero__img">
                </div><!-- end hero-img-box -->
            </div><!-- end col-lg-5 -->
        </div><!-- end row -->
    </div><!-- end container -->
 
</section><!-- end hero-area -->
<!-- ================================
    END HERO AREA
================================= -->

<section class="currency-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="rete-list bt_title wow  fadeIn  animated" data-wow-duration="1.0s" style="visibility: visible; animation-duration: 1s; animation-name: fadeIn;">
                            <div class="content">
                                <div class="con">
								<i class="flaticon-017-cryptocurrency-2 funfact__icon"></i>
                                    <h2><span>TOTAL DEPOSIT</span></h2>
                                    <div class="st_data">11645776</div>
                                </div>
                            </div>
                        </div>
                        <div class="rete-list bt_title wow  fadeIn  animated" data-wow-duration="1.3s" style="visibility: visible; animation-duration: 1.3s; animation-name: fadeIn;">
                            <div class="content">
                                <div class="con">
								<i class="flaticon-014-bitcoin-13 funfact__icon"></i>
                                    <h2><span>TOTAL MEMBER</span></h2>
                                    <div class="st_data">116</div>
                                </div>
                            </div>
                        </div>
                        <div class="rete-list bt_title wow  fadeIn  animated" data-wow-duration="1.6s" style="visibility: visible; animation-duration: 1.6s; animation-name: fadeIn;">
                            <div class="content">
                                <div class="con">
								<i class="flaticon-001-bitcoin-20 funfact__icon"></i>
                                    <h2><span>TOTAL WITHDRAWAL</span></h2>
                                    <div class="st_data">1146476</div>
                                </div>
                            </div>
                        </div>
                        <div class="rete-list bt_title wow  fadeIn  animated" data-wow-duration="1.9s" style="visibility: visible; animation-duration: 1.9s; animation-name: fadeIn;">
                            <div class="content">
                                <div class="con">
                                    <i class="flaticon-032-bitcoin-3 funfact__icon"></i>
								    <h2><span>DAYS ONLINE </span></h2>
                                    <div class="st_data">8</div>
                                </div>
                            </div>
                        </div>
                        <div class="rete-list hidden-md   wow  fadeIn  animated" data-wow-duration="2.1s" style="visibility: visible; animation-duration: 2.1s; animation-name: fadeIn;">
                            <div class="content">
                                <div class="con">
								<i class="flaticon-034-consulting funfact__icon"></i>
                                    <h2><span>TOTAL ACCOUNTS</span></h2>
                                    <div class="st_data">76</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- ================================
       START FEATURE AREA
================================= ->
 
<!-- ================================
       START ABOUT AREA
================================= -->
<section class="about-area">
    <div class="container">
	<h2 class="sec__head text-center">ABOUT US</h2>
        <div class="row">
            <div class="col-lg-6">
                <div class="about-item">
                    <div class="sec-heading">
                        <h2 class="sec__title">ABOUT BIT BUD LIMITED.</h2>
                        <p class="sec__desc sec__desc2">
                            Investing makes money grow,to keep the income flow.
                        </p>
                        <p class="sec__desc">
                            we have introduced a digital investment platform which is open to all across the world. We have designed a crypto investment module that offers investment opportunity in the fast growing crypto market.
                        </p>
                        <p class="sec__desc">
						We are now providing you with all the desired results.
                        </p>
						<p class="sec__desc">we will make sure your risks are minimized with potential good profit and daily profit return.</p>
                    </div><!-- end sec-heading -->
                    <a href="https://bitbud.biz/bitbud_ext/about.php" class="theme-btn readmore__btn">read more</a>
                </div><!-- end about-item -->
            </div><!-- end col-lg-6 -->
            <div class="col-lg-5 ml-auto">
                <div class="about-img-box">
                    <img src="https://bitbud.biz/bitbud_ext/images/about-img.jpg" alt="about-us" class="about-img">
                    <img src="https://bitbud.biz/bitbud_ext/images/about-img2.jpg" alt="about-us" class="about-img">
                    <a class="mfp-iframe video-play-btn" href="https://www.youtube.com/watch?v=GmOzih6I1zs" title="Play Video">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <span class="heboo-text">BITCON</span>
                </div><!-- end about-img-box -->
            </div><!-- end col-lg-5 -->
        </div><!-- end row -->
		
        <div class="row" style="padding-top: 30px;">
            <div class="col-lg-12">
                <div class="divider">
                    <span class="divider__circle"></span>
                </div><!-- end divider -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end about-area -->
<!-- ================================
       END ABOUT AREA
================================= -->
<style>
    .follow:hover {
    margin-top: -.25rem;
    </style>
<!-- ================================
       START PACKAGE AREA
================================= -->

<section class="pricing py-5">
  <div class="container">
      <div class="invest">
         <h1>OUR INVESTMENT OFFERS</h1>
		 <h5>Our Investment Plans For Partners.</h5>
	  </div>
    <div class="row">
      <!-- Free Tier -->
      <div class="col-lg-4">
        <div class="follow">
		  <h1 class="card-price text-center reff">10%</h1>
          <h3 class="reff1"> REFERRAL COMMSSION<h3>
        </div>
      </div>
      <!-- Plus Tier -->
      <div class="col-lg-4">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">
            <h6 class="card-price text-center">PLUS<span class="period">/PLAN</span></h6>
            <hr>
            <ul class="fa-ul">
              <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>6% Daily Profit</strong></li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>50 Business Days</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>100% Principal Included</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>200% Net Profit</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>300% Total Return</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>BTC 0.0001 Min Investment</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Daily Status Reports</li>
			  <li><span class="fa-li"><i class="fas fa-check"></i></span>24/7 Support</li>
            </ul>
            <a href="https://bitbud.biz/bitbud_ext/sign-up" class="btn btn-block btn-danger text-uppercase">JOIN US</a>
          </div>
        </div>
      </div>
      <!-- Pro Tier -->
      <div class="col-lg-4">
        <div class="card">
          <div class="card-body">
            <h6 class="card-price text-center">PREMIUM<span class="period">/PLAN</span></h6>
            <hr>
            <ul class="fa-ul">
              <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>10% Daily Profit</strong></li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>60 Business Days</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>100% Principal Included</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>500% Net Profit</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>600% Total return</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>BTC 0.01 Min Investment</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Daily Status Reports</li>
			  <li><span class="fa-li"><i class="fas fa-check"></i></span>24/7 Support</li>
            </ul>
            <a href="https://bitbud.biz/bitbud_ext/sign-up" class="btn btn-block btn-danger">JOIN US</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================================
       end PACKAGE AREA
================================= -->
     
<!-- ================================
     START DOCS AREA
================================= -->
<div class="container-fluid docs">
  <div class="container">
        <h2 class="sec__doc">Our Certification</h2>
     <div class="row" style="padding: 50px 0px 50px 0px;">
	    <div class="col-lg-6 col-md-6 col-sm-12 text-center">
		   <img src="https://bitbud.biz/bitbud_ext/images/logo/docs.jpeg" alt="bit" />
		   <div class="verifybtn">
		   <a href="https://bitbud.biz/bitbud_ext/images/logo/docs.jpeg" download>Download</a>
		   <a href="" class="view_details" data-toggle="modal" data-target="#myModal" style="padding: 10px 38px 10px 38px;">View</a>
            <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">UK Registered Company #12207199</h6>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              
            </div>
            <div class="modal-body">
              <p style="text-align:center"><img src="https://bitbud.biz/bitbud_ext/images/logo/docs.jpeg" alt="" /></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
		     
		   </div>
		</div>
	    <div class="col-lg-6 col-md-6 col-sm-12">
		   <div class="verifybtn1">
			<h2>Bit Bud Limited.</h2>
			<h5>The bitbud.biz is a crypto trading and mining company incorporated in United Kingdom. We have been in the business of financial advisory for over a decade in which time we have assisted quite a number of blue chip organizations</h5>
		    <br><h5>The bitbud.biz is a crypto trading and mining company incorporated in United Kingdom. We have been in the business of financial advisory for over a decade in which time we have assisted quite a number of blue chip organizations</h5>
		    <br><h5>bitbud.biz is a fully certified and licensed company. Our license number is:</h5>
			<h3>#12320927</h3>
		    <a href="https://beta.companieshouse.gov.uk/company/12320927" class="btn btn-block btn-danger">Verify</a>
		   </div>	
		</div>
	 </div>
  </div>
</div>

<!-- ================================
     END DOCS  AREA
================================= -->

<!-- ================================
       START HOWITWORKS AREA
================================= -->
<section class="howitworks-area text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
               <div class="sec-heading">
                   <h2 class="sec__title" style="color: #000;">Why Choose Us.</h2>
               </div><!-- end sec-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row hiw-content">
            <div class="col-lg-4">
                <div class="hiw-item">
                   <div class="flaticon__icon">
                       <span class="flaticon-014-bitcoin-13"></span>
                   </div>
                    <h3 class="hiw__title"><a href="service.html">SAFE AND SECURE</a></h3>
                    <p class="hiw__desc">
                        The use of web security allows providing reliable protection of funds on the accounts of clients.
                    </p>
                </div><!-- end hiw-item -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4">
                <div class="hiw-item">
                    <div class="flaticon__icon">
                        <span class="flaticon-031-bitcoin-4"></span>
                    </div>
                    <h3 class="hiw__title"><a href="service.html">ADVANTAGEOUS
                    PLANS</a></h3>
                    <p class="hiw__desc">
                        Our tariff plans allow people with different financial wealth to take part in the project.
                    </p>
                </div><!-- end hiw-item -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4">
                <div class="hiw-item">
                    <div class="flaticon__icon">
                        <span class="flaticon-001-bitcoin-20"></span>
                    </div>
                    <h3 class="hiw__title"><a href="service.html">PAYMENT OPTIONS</a></h3>
                    <p class="hiw__desc">
                       In our platform payment option we only provide bitcoin service. 
                    </p>
                </div><!-- end hiw-item -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4">
                <div class="hiw-item">
                    <div class="flaticon__icon">
                        <span class="flaticon-002-bitcoin-19"></span>
                    </div>
                    <h3 class="hiw__title"><a href="service.html">LICENSED & CERTIFIED</a></h3>
                    <p class="hiw__desc">
                        bitbud.biz is a fully certified and licensed company. Our license number is: #12320927

                    </p>
                </div><!-- end hiw-item -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4">
                <div class="hiw-item">
                    <div class="flaticon__icon">
                        <span class="flaticon-004-saving"></span>
                    </div>
                    <h3 class="hiw__title"><a href="service.html">10% REFERRAL COMMISSION</a></h3>
                    <p class="hiw__desc">
                         A referral fee is a type of commission paid to the coordinator in a transaction.
                    </p>
                </div><!-- end hiw-item -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4">
                <div class="hiw-item">
                    <div class="flaticon__icon">
                        <span class="flaticon-029-bitcoin-6"></span>
                    </div>
                    <h3 class="hiw__title"><a href="service.html">24/7 CUSTOMER SUPPORT</a></h3>
                    <p class="hiw__desc">
                        Our service is available 24/7 and the experts are eager to consult you at any time.
                    </p>
                </div><!-- end hiw-item -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
       </div><!-- end container -->
</section><!-- end howitworks-area -->
<!-- ================================
       END HOWITWORKS AREA
================================= -->


      
<!-- ================================
     START CALCULATOR AREA
================================= -->
 
	
        <div class="payment" style="background: rgb(2,0,36);
background: linear-gradient(0deg, rgba(34,193,195,1) 0%, rgba(253,187,45,1) 100%);">
            <div class="container">
                <h2 class="pt-5 text-center" style="color: crimson;">ONLINE CALCULATOR</h2>
                <div class="row d-flex reorder-xs">
        
                    
                    <div class="col-xl-5 col-lg-5 col-md-6 d-flex align-items-center offset-xl-1 offset-lg-1 mt-5">
					   
						<div class="hdRight fadeInRight wow">
						<div class="mainNavRight">
                        <div class="row justify-content-center text-center">
                            <div class="col-xl-12 col-lg-12">
                                <div class="section-title">
                                    <h2>We Accepted<br /><span>Payment Method</span></h2>
                                    <p>Put your investing ideas into action with full range of investments.
                                        Enjoy real benefits and rewards on your accrue investing.</p>
                                </div>
                            </div>
                    
                            <div class="col-xl-12 col-lg-12">
                                <div class="part-accept" style="margin: 15px; ">
                                    <div class="single-accept">
                                        <img src="https://bitbud.biz/bitbud_ext/images/logo/bitcoin_PNG12.png" alt="" style="width: 100%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
                    </div>
                     
                     <div class="col-xl-5 co-lg-5 col-md-6">
					
					<div class="hdLeft fadeInLeft wow">
					<div class="mainNavLeft">
                        <div class="part-form" style="background-color: #fff; padding: 15px; border-radius: 4px; margin: 40px 10px 40px 10px;">
                            <h3>Calculate Your Profit</h3>
                            <form class="payment-form">
                                
                                <div class="form-group">
                                    <label for="plan">Choose Plan :</label>
                                <select name="plan" class="form-control" id="plan" onchange="val()">
                                        <option>--Select Plan--</option>
                                       <option>Plus Plan</option>
                                       <option>Premium Plan</option>
                                      </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="InputAmount">Benefits :</label>
                                    <input type="text" class="form-control" id="beni" placeholder="Plan Benefits" onclick='alr()' readonly>
                                </div>
                                
                                
                                <div class="form-group">
                                    <label for="InputAmount">Enter Amount : ( In BTC )</label>
                                    <input type="number" class="form-control" id="amount" placeholder="Min-BTC0.001">
                                    <span style="color:red" id="error"></span>
                                </div>
                                
                                   
                                <div class="form-group">
                                    <label for="InputTprofit">Total Profit :</label>
                                    <input type="text" class="form-control" id="InputTprofit" placeholder="Total Profit" readonly>
                                </div>
                                
                                <script>
                                function alr()
                                {
                                    $("body").overhang({
                                type: "info",
                                duration: 3,
                                message: 'Benifits Already Set.'
                            });  
                                }
                                
                                function val()
                                {
                                    var plans=$('#plan').val();
                                    
                                    if(plans=="Plus Plan")
                                    {
                                        $('#beni').val('6% Daily For 50 days.');
                                        $('#amount').on('keyup',function(){
                                            var amount=$('#amount').val();
                            
                                            if(amount<0.001 || amount==0)
                                            {
                                                $('#error').show();
                                                $('#error').html('Min-BTC0.001 For Plus Plan');
                                                
                                            
                                                $('#InputTprofit').val('Error');    
                                            }
                                            else
                                            {
                                                
                                                $('#error').hide();
                                                var profit=amount*50*6/100;
                                                $('#InputTprofit').val('BTC- ' +profit);
                                            }
                                        });
                                        
                                    }
                                    if(plans=="Premium Plan")
                                    {
                                        $('#beni').val('10% Daily For 60 days.');
                                        $('#amount').on('keyup',function(){
                                            var amount=$('#amount').val();
                            
                                            if(amount<0.01 || amount==0)
                                            {
                                                $('#error').show();
                                                $('#error').html('Minimum BTC0.01 For Premium Plan');
                                                
                                            
                                                $('#InputTprofit').val('Error');    
                                            }
                                            else
                                            {
                                                
                                                $('#error').hide();
                                                var profit=amount*60*10/100;
                                                $('#InputTprofit').val('BTC- ' +profit);
                                            }
                                        });
                                        
                                    }
                                   if(plans=="Advanced Plan")
                                    {
                                        $('#beni').val('10% Daily For 100 days.');
                                        $('#amount').on('keyup',function(){
                                            var amount=$('#amount').val();
                            
                                            if(amount<10001 || amount==0)
                                            {
                                                $('#error').show();
                                                $('#error').html('Minimum $10001 For Advanced Plan');
                                                
                                            
                                                $('#InputTprofit').val('Error');    
                                            }
                                            else
                                            {
                                                
                                                $('#error').hide();
                                                var profit=amount*100*10/100;
                                                $('#InputTprofit').val('$ ' +profit);
                                            }
                                        });
                                    }
                                    if(plans=="VIP Plan")
                                    {
                                        $('#beni').val('500% After 50 days.');
                                        $('#amount').on('keyup',function(){
                                            var amount=$('#amount').val();
                            
                                            if(amount<10 || amount==0)
                                            {
                                                $('#error').show();
                                                $('#error').html('Minimum $10 For VIP Plan');
                                                
                                            
                                                $('#InputTprofit').val('Error');    
                                            }
                                            else
                                            {
                                                
                                                $('#error').hide();
                                                var profit=amount*500/100;
                                                $('#InputTprofit').val('$ ' +profit);
                                            }
                                        });
                                        
                                    }
                                    if(plans=="--Select Plan--")
                                    {
                                        $('#beni').val('Plan Benifits');
                                        $('#InputTprofit').val('Select a Plan');
                                        
                                        
                                    }
                                }
                                    
                                </script>
                                
                                
                            </form>
                        </div>
                    </div>
                    </div>
                    </div>

                     
                     
                     
                </div>
            </div>
        </div>
        </div>
      


<!-- ================================
     END CALCULATOR AREA
================================= -->
 
<!-- ================================
       START footer AREA
================================= -->
    <?php include("headpart/footer.php");
	?>
	
<!-- ================================
       end footer AREA
================================= -->


<!-- ================================
     START COOKIE CONSENT AREA
================================= -->


	<script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js" data-cfasync="false"></script>
        <script>
            window.cookieconsent.initialise({
             "palette": {
             "popup": {
             "background": "#283a5e"
            },
             "button": {
             "background": "#ffffff"
            }
            },
             "theme": "classic",
             "content": {
             "href": "https://bitbud.biz/bitbud_ext/terms"
            }
            });
        </script>

 <!-- ================================
     END COOKIE CONSENT AREA
================================= -->

</body>

</html>