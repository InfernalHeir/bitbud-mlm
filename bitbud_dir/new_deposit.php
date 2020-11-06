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
       
       if(isset($_COOKIE['order_id']))
       {
           $order_id=$_COOKIE['order_id'];
           header("location:https://bitbud.biz/bitbud_dir/order_status.php?order_id=$order_id");
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
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BitBud Limited New Deposit</title>
    
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
            <h3 class="mt-2" style="font-size:20px;">New Deposit</h3>
            <span class="ml-3 p-2">
            <div class="inner">
            <i class="fa fa-piggy-bank"></i>    
            </div>    
            </span>
            </div>
            
            
            <!--container_end-->
            </div>
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
           
                
               <div class="flex-container">
  <div class="flex-item">
    <ul class="package">
      <li class="header">PLUS PLAN</li>
      <li class="gray">Minimum 0.0001 BTC</li>
      <li>6% Daily Profit</li>
      <li>50 Business Days</li>
      <li>100% Principal Included</li>
      <li>200% Net Profit</li>
      <li>300% Total Return</li>
      <li>Daily Status Reports</li>
      <li>24/7 Support</li>
      
      <li class="gray">
        <a href="planlookup.php?plan=PLUS"><button class="btn btn-dark btn btn-block" style="font-size:18px !important;">Checkout Now</button></a>
      </li>
    </ul>
  </div>
  <div class="flex-item">
    <ul class="package">
      <li class="header2">PREMIUM PLAN</li>
      <li class="gray">Minimum 0.01 BTC</li>
      <li>10% Daily Profit</li>
      <li>60 Business Days</li>
      <li>100% Principal Included</li>
      <li>500% Net Profit</li>
      <li>600% Total Return</li>
      <li>Daily Status Reports</li>
      <li>24/7 Support</li>
      <li class="gray">
         <a href="planlookup.php?plan=PREMIUM"><button class="btn btn-block" style="font-size:18px !important; background-color:#004e7c !important; color:white !important;">Checkout Now</button></a>
      </li>
    </ul>
  </div>
  
</div> 
                
                
                
            
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