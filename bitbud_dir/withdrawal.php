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
    <title>BitBud Limited Make Withdrawal</title>
    
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
  /* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance:textfield;
}
  
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
     @media only screen and (min-width:200px) and (max-width:479px){
       #full button{
            width: 100%;
      }
    }
    
    textarea.form-control {
    height: auto !important;
}
.card-text
{
    font-size:14px !important;
}
p.card-text {
    margin-bottom: 8px !important;
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
            <h3 class="mt-2" style="font-size:20px;">Make Withdrawal</h3>
            <span class="ml-3 p-2">
            <div class="inner">
            <i class="fas fa-university"></i>    
            </div>    
            </span>
            </div>
            
            
            <!--container_end-->
            </div>
            
            
            
                    
                    


                        <div class="row mt-5">
                             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                <input type="number" class="form-control form-control-lg" placeholder="Amount to be Withdrawal" id="amount" autocomplete="off" onkeyup="validate()"> 
                                <span id="error" style="color:red; font-size:14px !important;"></span>
                                </div>
                            
                            </div>
                            
                           
                        </div>
                        
                        
            
            
            <div id="full">
            <button type="button" id="make_request" class="btn btn-dark" onclick="withdrawal()" disabled>Make Request</button>
            </div>
             <script>
                             function validate()
                             {
                                 var amount=$('#amount').val();
                                 
                                 if(amount<0.005)
                                 {
                                     $('#error').html("0.005 BTC Minimum Withdrawal");
                                     $('#error').show();
                                     $('#make_request').prop('disabled',true);
                                 }
                                 else
                                 {
                                     $('#error').hide();
                                     $("#make_request").removeAttr("disabled");
                                    
                                 }
                             }
                            </script> 
            
            
            <div class="card mt-3">
            <div class="card-header bg-primary text-white">
            <h4 style="color:white !important;">Terms & Conditions</h4></div>
            <div class="card-body">
            <h5 class="card-title">Please Note below points:-</h5>
    <p class="card-text">(1) Minimum 0.005 Withdrawal Amount</p>
    <p class="card-text">(2) Add your BTC Wallet address before it. if updated ignored this.</p>
    <p class="card-text">(3) Any wrong details may subject to fund of losing. it will be considered as loss.</p>
    <p class="card-text">(4) All Payments are monitered by admin. if any issue please contact us immediately on <a href="mailto:support@bitbud.biz">support@bitbud.biz</a> or you can drop also request on support center we will notify you as soon as possible.</p>
    
    

    
  </div>
</div>
            
            
            
            
            </div>
            
            
          <script>
          function withdrawal()
          {
            var amount=$('#amount').val();
            if(amount==0)
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
                url:'withdrawal_time',
                type:'POST',
                data:{amount:amount},
                beforeSend:function()
                {
                     $('.loader-container').show();
                },
                success:function(data)
                {
                    $('.loader-container').hide('fade',1000);
                    if(data=="Woohoo! Your Withdrawal request has been processed successfully. It may take 24 hours to confirmation.")
                    {
                    $('body').topAlertjs({
                    type: 'success',
                    message: data,
                    duration: 3
               
                    });
                    setTimeout(function(){window.location.href='withdrawal.php'},3000)
                    }
                    else
                    {
                      $('body').topAlertjs({
                    type: 'error',
                    message: data,
                    duration: 3
               
                    });
                        
                    }
                }
                })
            }
          }
            </script>
         
        
          
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