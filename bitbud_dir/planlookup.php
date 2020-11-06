<?php ini_set('display_errors',1);
session_start();
include '../dbconnection.php';
if(empty($_SESSION['user_id']))
{
    header('location:https://bitbud.biz/bitbud_ext/login.php');
}
try
{
       $user_id=$_SESSION['user_id'];
       $select_all=$conn->prepare("SELECT * FROM `user_registration` WHERE `user_id`='$user_id'");
       $select_all->execute();
       $all=$select_all->fetchAll();
       
       $btc_wallet=$conn->prepare("SELECT `btc_wallet` FROM `btc` WHERE `user_id`='$user_id'");
       $btc_wallet->execute();
       $btc=$btc_wallet->fetchAll();
       
       
       
    
}
catch(PDOException $e)
{
    echo "Connection Failed ".$e->getMessage();
}
$conn=null;
?>

<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BitBud Limited Plan Overview</title>
    
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/iconfonts/ionicons/css/ionicons.css">
    <link rel="stylesheet" href="assets/vendors/iconfonts/typicons/src/font/typicons.css">
    <link rel="stylesheet" href="assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.addons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/shared/style.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/demo_1/style.css">
    <!-- End Layout styles -->
    <link rel="icon" href="https://bitbud.biz/bitbud_ext/images/favicon.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.16/clipboard.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://bitbud.biz/bitbud_ext/sticky-notification-confirmation-bar-alertjs/css/top-alertjs.css">
    
    
  </head>
  <style>
    h3
    {
        color:#283a5e !important;
    }
    span.ml-3.p-2 {
    background: #283a5e;
    width: 40px;
    text-align: center;
    border-radius: 10px;
    color: white;
    height:40px;
}
.flex-container {
    display: flex;
    padding-top: 1.5em;
    padding-bottom: 1.5em;
}

.flex-item {
  flex: 1;
  width: 0;
}

.flex-item:not(:last-child) {
  margin-right: 1em;
}

.package {
  border: 1px solid #eee;
  list-style-type: none;
  margin: 0;
  padding: 0;
  transition: 0.25s;
}

.package:hover {
  box-shadow: 0 8px 12px 0 rgba(0, 0, 0, 0.2);
  transform: scale(1.025);
}

.package .header {
    background-color: #283a5e;
    color: #fff;
    font-size: 1.5em;
}
.package .highlight {
  background-color: #29b6f6;
}

.package li {
  background-color: #fff;
  border-bottom: 1px solid #eee;
  padding: 1.2em;
  text-align: center;
}

.package .gray {
  background-color: #eee;
  font-size: 1.25em;
}

button {
  background-color: #29b6f6;
  border: none;
  border-radius: .15em;
  color: #fff;
  cursor: pointer;
  padding: .75em 1.5em;
  font-size: 1em;
}

@media only screen and (max-width: 700px) {
  button {
    padding: .75em;
  }
}

@media only screen and (max-width: 600px) {
  .flex-container {
    flex-wrap: wrap;
  }

  .flex-item {
    flex: 0 0 100%;
    margin-bottom: 1em;
    width: 100%;
  }

  .package:hover {
    box-shadow: none;
    transform: none;
  }

  button {
    padding: .75em 1.5em;
  }
}
.package .header2 {
    background-color: #004e7c;
    color: #fff;
    font-size: 1.5em;
}
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}

.col-lg-2.col-md-6.col-sm-6.col-12 {
    margin-bottom: 4%;
}
.buttonload {
  background-color: #4CAF50; /* Green background */
  border: none; /* Remove borders */
  color: white; /* White text */
  padding: 12px 24px; /* Some padding */
  font-size: 16px; /* Set a font-size */
}

/* Add a right margin to each icon */
#load{
  margin-left: -12px;
  margin-right: 8px;
}

  </style>
  <body onload="stop()">
     
    <!-- start per-loader -->
<div class="loader-container">
    <div class="lds-ripple">
        <div></div>
        <div></div>
    </div>
</div>  
     <script>
function stop()
{
    $('.loader-container').hide('fade',2000);
}
</script> 
    <?php
    if($_GET['plan']=="PLUS")
    {
        ?>
        <style>
        .card .card-header {
    background: #283a5e !important;
    color: white;
    font-size: 20px;
}
.custom-card {
    padding: 10%;
    background: #283a5e !important;
    color: white !important;
    height: 125px;
    text-align:center;
}
        </style>
        <?php
    }
    else
    {
        ?>
        <style>
        .card .card-header {
    background: #004e7c !important;
    color: white;
    font-size: 20px;
}
.custom-card {
    padding: 10%;
    background: #004e7c !important;
    color: white !important;
    height: 125px;
    
}
        </style>
        <?php
    }
    
    
    ?>

      
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      
      <?php  include 'navbar.php';  ?>
      
      
      <div class="container-fluid page-body-wrapper">
          
     <?php  include 'sidebar.php';   ?>      
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            
            <div class="container-fluid mt-5">
            <div class="row">
            <h3 class="mt-2" style="font-size:20px;">Plan Overview</h3>
            <span class="ml-3 p-2">
            <div class="inner">
            <i class="fas fa-at"></i>    
            </div>    
            </span>
            </div>
            
            
            <!--container_end-->
            </div>
    
                
             <div class="row mt-5">
                 
            
            <div class="card w-100">
  <div class="card-header">
    <?php echo $_GET['plan']." PLAN";   ?>
  </div>
  <div class="card-body">
    <h5 class="card-title">Fill the Form Below:</h5>
    
    <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
    <div class="form-group">
    <input type="text" id="plan" class="form-control" placholder="Plan" value='<?php echo $_GET['plan']." PLAN";  ?>' id="plan" onclick="pl()" readonly>
    </div>    
    </div>
    <script>
    function pl()
    {
         $('body').topAlertjs({
                    type: 'error',
                    message: 'Plan Already Set!',
                    duration: 3
               
                    });
    }
    </script>
    <div class="col-lg-3 col-md-3 col-sm-6 col-12">
    <div class="form-group">
    <input type="number" class="form-control" placeholder="Amount" id="amount" autocomplete="off" onkeypress='validate()'>
    <span id="error"></span>
    <script>
     function validate()
     {
         var plan="<?php echo $_GET['plan']; ?>";
         var amount=$('#amount').val();
     }
    </script>
    </div>    
    </div>
    
    <div class="col-lg-3 col-md-3 col-sm-6 col-12">
    <button class="btn btn-primary btn btn-block" onclick="proceed()">Proceed</button>    
    </div>
    
    </div>
    
    <div class="row mt-3" style="display:none;" id="card_row">
    <div class="col-lg-2 col-md-6 col-sm-6 col-12">
    <div class="custom-card">
    <h5 class="text-white mt-3">Amount</h5>
    <p class="text-white" style="font-size:15px !important;" id="dep"></p>
    </div>    
    </div>
    
    <div class="col-lg-2 col-md-6 col-sm-6 col-12">
    <div class="custom-card">
    <h5 class="text-white mt-3">Total Profit</h5>
    <p class="text-white" style="font-size:15px !important;" id="profit"></p>
    </div>    
    </div>
    
    <div class="col-lg-2 col-md-6 col-sm-6 col-12">
    <div class="custom-card">
    <h5 class="text-white mt-3">Percentage</h5>
    <p class="text-white" style="font-size:15px !important;">
    <?php
    $plan=$_GET['plan'];
    if($plan=="PLUS")
    {
        echo "6% Daily Profit";
    }
    elseif($plan=="PREMIUM")
    {
        echo "10% Daily Profit";
    }
    ?>
    </p>
    </div>    
    </div>
    
    
    <div class="col-lg-2 col-md-6 col-sm-6 col-12">
    <div class="custom-card">
    <h5 class="text-white mt-3">For</h5>
    <p class="text-white" style="font-size:15px !important;">
    <?php
    $plan=$_GET['plan'];
    if($plan=="PLUS")
    {
        echo "50 Days";
    }
    elseif($plan=="PREMIUM")
    {
        echo "60 Days";
    }
    ?>
    </p>
    </div>    
    </div>
    
    
    <div class="col-lg-2 col-md-6 col-sm-6 col-12">
    <div class="custom-card">
    <h5 class="text-white mt-3">Principal</h5>
    <p class="text-white" style="font-size:15px !important;">100%</p>
    </div>    
    </div>
    
    <div class="col-lg-2 col-md-6 col-sm-6 col-12">
    <div class="custom-card">
    <h5 class="text-white mt-3">Total Return</h5>
    <p class="text-white" style="font-size:15px !important;">
    <?php
    $plan=$_GET['plan'];
    if($plan=="PLUS")
    {
        echo "300%";
    }
    elseif($plan=="PREMIUM")
    {
        echo "600%";
    }
    ?>
    </p>
    </div>    
    </div>
    <!--row_end-->
    
    <!-- Invoicing -->
    
    <div class="w-100 text-center">
    
    <button type="submit" class="buttonload text-center"  onclick="pay()" id="pay">Pay Now</button>
    
     
    </div>

    <script>
        
        function pay()
        {
        var user_id="<?php echo $user_id;   ?>";
        
        
        $.ajax({
        url:'postfields',
        type:'POST',
        data:{user_id:user_id},
        dataType:'JSON',
        beforeSend:function()
        {
        $('#pay').html('<i class="fa fa-spinner fa-spin" id="load"></i>Processing');
        $('#pay').attr('disabled',true)
        },
        success:function(callback)
        {
          
           var alert=jQuery.parseJSON(JSON.stringify(callback));
           var order_id=alert.order_id;
           var hosted_url=alert.hosted_url;
           var success=alert.success;
           if(success=="ok")
           {
             setTimeout(function(){window.open(hosted_url,"_blank", 'mywindow','location=1,status=1,scrollbars=1, resizable=1, directories=1, toolbar=1, titlebar=1')},1000);
              
              setTimeout(function(){window.location.href='https://bitbud.biz/bitbud_dir/order_status?order_id='+order_id},2000);
           }
           else
           {
               $('body').topAlertjs({
                    type: 'error',
                    message: 'Something Wrong Went',
                    duration: 3
               
                    });
           }
          
          
        }
        
        })
        }
       </script>
    </div>
    
  </div>
</div>
                 
             </div>   
                
            <script>
            function proceed()
            {
                var plan=$('#plan').val();
                var amount=$('#amount').val();
                if(plan==0 || amount==0)
                {
                    $('body').topAlertjs({
                    type: 'error',
                    message: 'Invalid Amount!',
                    duration: 3
               
                    });
                }
                else
                {
                    $.ajax({
                    url:'checker',
                    type:'POST',
                    data:{plan:plan,amount:amount},
                    dataType:'JSON',
                    beforeSend:function()
                    {
                    $('.loader-container').show();   
                    },
                    success:function(callback)
                    {
                        
                        
                        var alert = jQuery.parseJSON(JSON.stringify(callback));
                        var error=alert.error;
                        
                        var p_amount=alert.amount;
                        var profit=alert.btc_value;
                        $('.loader-container').hide();
                        
                        if(error=="ok")
                        {
                            $('#dep').html(p_amount+' BTC');
                            $('#profit').html(profit+' BTC');
                            $('#card_row').show('fade',2000);
                            
                        }
                        else
                        {
                            $('#card_row').hide();
                            $('body').topAlertjs({
                    type: 'error',
                    message: error,
                    duration: 3
               
                    });
                        }
                    }
                    
                    })
                }
                
            }
            </script>
            <!--row_end-->
            
            </div>
            
         
         
        
          
         <?php include 'footer.php';   ?> 
          
          <!-- partial -->
        </div>
        
        
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="assets/js/shared/off-canvas.js"></script>
    <script src="assets/js/shared/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="assets/js/demo_1/dashboard.js"></script>
    <script src="https://bitbud.biz/bitbud_ext/sticky-notification-confirmation-bar-alertjs/js/top-alertjs.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- End custom js for this page-->
  </body>
</html>

