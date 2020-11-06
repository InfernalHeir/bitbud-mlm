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
                        <h2 class="breadcrumb__title">PLAN.</h2>
                        <ul class="breadcrumb__list">
                            <li class="active__list-item"><a href="index.php">home</a></li>
                           
                            <li>PLAN</li>
                        </ul>
                    </div><!-- end breadcrumb-inner -->
                    <div class="text-outline">INVESTMENT</div>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end hero-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->
    
<!-- ================================
       START PLAN AREA
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
		  <h1 class="card-price text-center reff">10%</h1>
          <h3 class="reff1"> REFERRAL COMMSSION<h3>
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
            <a href="#" class="btn btn-block btn-danger text-uppercase">JOIN US</a>
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
            <a href="#" class="btn btn-block btn-danger">JOIN US</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--  ============================
           END PLAN AREA
   ============================-->

     
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
       START CHART AREA
================================= -->
<section class="chart-area">
    <div class="container">
        <div class="row chart-wrapper">
            <div class="col-lg-6">
                <div class="chart-item">
                    <div class="sec-heading">
                        <p class="sec__meta">discover bitcon</p>
                        <h2 class="sec__title">Bitcoin Distribution.</h2>
                        <p class="sec__desc">
                            The bitcoin network is a peer-to-peer payment network that operates on a cryptographic protocol. Users send and receive bitcoins, the units of currency, by broadcasting digitally signed messages to the network using bitcoin cryptocurrency wallet software.The project was released in 2009 as open source software.
                        </p>
                        <a href="#" class="theme-btn">Become a Member</a>
                    </div><!-- end sec-heading -->
                </div><!-- end chart-item -->
            </div><!-- end col-lg-6 -->
            <div class="col-lg-6">
                <canvas id="result-chart" height="180"></canvas>
                <div class="line-legend">
                    <ul class="chart-legend">
                        <li><span class="legend__one"></span>business</li>
                        <li><span class="legend__two"></span>others</li>
                    </ul>
                </div><!-- end line-legend -->
            </div><!-- end col-lg-6 -->
        </div><!-- end row -->
        <div class="row chart-wrapper chart-wrapper2">
            <div class="col-lg-5">
                <canvas id="doughutChart"></canvas>
                <div class="line-legend">
                    <ul class="chart-legend">
                        <li><span class="legend__one"></span>bitcoin</li>
                        <li><span class="legend__two"></span>litecoin</li>
                        <li><span class="legend__three"></span>ripple</li>
                    </ul>
                </div><!-- end line-legend -->
            </div><!-- end col-lg-6 -->
            <div class="col-lg-6 ml-auto">
                <div class="chart-item">
                    <div class="sec-heading">
                       
                        <p class="sec__meta">our growth</p>
                        <h2 class="sec__title">Building an Ecosystem for Blockchain.</h2>
                        <ul class="sec__list">
                            <li><i class="fa fa-check check-one"></i>
                                Sign through an iterative mind mapping ideas.
                            </li>
                            <li><i class="fa fa-check check-two"></i>
                                Instant and secure transactions.
                            </li>
                            <li><i class="fa fa-check check-three"></i>
                                Decentralized, instant and secure payments.
                            </li>
                        </ul>
                        <a href="#" class="theme-btn">read more </a>
                    </div><!-- end sec-heading -->
                </div><!-- end chart-item -->
            </div><!-- end col-lg-6 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end chart-area -->
<!-- ================================
       START CHART AREA
================================= -->
   
   
   <?php include("headpart/footer.php");
	?>
	
</body>

</html>