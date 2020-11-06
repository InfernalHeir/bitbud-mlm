<?php ini_set('display_errors',1);
session_start();
include '../dbconnection.php';
if(empty($_SESSION['admin_user']))
{
    header('location:login.php');
}
try
{
      $all_members=$conn->prepare("SELECT * FROM `user_registration`");
      $all_members->execute();
      $all=$all_members->fetchAll();
      
      $active=$conn->prepare("SELECT * FROM `user_registration` WHERE `status`='Activated'");
      $active->execute();
      $ac=$active->fetchAll();
      
      $check_deposit=$conn->prepare("SELECT SUM(value_paid) FROM `deposited_made` WHERE `status`='CONFIRMED' and `admin_action`='Approved'");
      $check_deposit->execute();
      $deposits=$check_deposit->fetchAll();
      
      $check_pending=$conn->prepare("SELECT `status` FROM `deposit` WHERE `status`='PENDING'");
      $check_pending->execute();
      $mm=$check_pending->fetchAll();
      
      $select_withdrawal_request=$conn->prepare("SELECT `status` FROM `withdrawal_request` WHERE `status`='PENDING'");
      $select_withdrawal_request->execute();
      $select_withdrawal_request->fetchAll();
      $with=$select_withdrawal_request->rowCount();
      
      
      $select_support_request=$conn->prepare("SELECT `status` FROM `support` WHERE `status`='PENDING'");
      $select_support_request->execute();
      $select_support_request->fetchAll();
      $supports_request=$select_support_request->rowCount();
      
      $select_con=$conn->prepare("SELECT SUM(amount) FROM `withdrawal_request` WHERE `status`='CONFIRM'");
      $select_con->execute();
      $ok=$select_con->fetchAll();
      
      
      $daily_roi=$conn->prepare("SELECT SUM(daily_roi) FROM `distributed_roi`");
       $daily_roi->execute();
       $roi=$daily_roi->fetchAll();
       
           foreach($roi as $income)
           {
               $roi_inc=$income['SUM(daily_roi)'];
               if($roi_inc==NULL)
               {
                   $roi_income=0;
               }
               else
               {
                   $roi_incom=$income['SUM(daily_roi)'];
                   $value=$roi_incom*100000000;
                   function convertTo($value) {
    $BTC = $value / 100000000 ;
    return $BTC;
}
function format($value) {
    $value = sprintf('%.8f', $value);
    $value = rtrim($value, '0');
    return $value;
}
$roi_income=format(convertTo($value));

               }
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
    <title>BitBud Limited Dashboard</title>
    
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
  </style>
  <body>
      
      
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
            <h3>Admin Dashboard</h3>
            <span class="ml-3 p-2">
            <div class="inner">
            <i class="fa fa-home"></i>    
            </div>    
            </span>
            </div>
            
            
            <!--container_end-->
            </div>
            
           <style>
    i.fab.fa-facebook-messenger {
    padding: 7px;
    font-size: 28px;
    width: 40px;
    height: 40px;
    text-align: center;
    text-decoration: none;
    border-radius: 50%;
    background: #0084FF !important;
    color: #fff !important;
    cursor: pointer;
}
i.fab.fa-telegram-plane {
    padding: 6px;
    font-size: 28px;
    width: 40px;
    height: 40px;
    text-align: center;
    text-decoration: none;
    border-radius: 50%;
    background: #0088CC !important;
    color: #fff !important;
    cursor: pointer;
}
i.fab.fa-instagram {
    padding: 6px;
    font-size: 28px;
    width: 40px;
    height: 40px;
    text-align: center;
    text-decoration: none;
    border-radius: 50%;
    background: rgb(225,48,108)!important;
    color: #fff !important;
    cursor: pointer;
}
@media(max-width:990px)
{
    .col-lg-3.col-md-12.col-sm-12.col-12.social.links {
    margin-top: 3% !important;
    text-align: center !important;
}
.col-lg-3.col-md-12.col-sm-12.col-12.tmt {
    margin-top: 2% !important;
    text-align: center !important;
}
}
#fab {
    padding: 6px;
    font-size: 28px;
    width: 40px;
    height: 40px;
    text-align: center;
    text-decoration: none;
    border-radius: 50%;
    background: #128C7E !important;
    color: #fff !important;
    cursor: pointer;
}
.card.backgroud {
    background-image: linear-gradient(45deg,#004e7c , #00ffb8);
    
}
.card.backgroud2 {
    background-image: linear-gradient(45deg,#004e7c, #f71700);
   
}
.card-head.text-white {
    padding:6%;
    font-size: 16px !important; 
}
span.pok {
    position: absolute;
    right: 25px;
    font-size: 12px;
}
.col-lg-3.col-md-6.col-sm-6.col-12.cardpos {
    margin-bottom: 2% !important;
}
.card.backgroud3 {
    background-image: linear-gradient(45deg,#004e7c , #197bc2);
   
}
.card.backgroud4 {
    background-image: linear-gradient(45deg,#004e7c, #d60bb0);
    
}
.card.backgroud5 {
    background-image: linear-gradient(45deg,#004e7c, #1a3642);
    
}

.card.backgroud6 {
    background-image: linear-gradient(45deg,#004e7c, #027173);
   
}
.card.backgroud7 {
    background-image: linear-gradient(45deg,#004e7c , #283a5e);
    
}  
h1.text-white {
    font-size: 15px !important;
}
             </style> 
            
            <div class="row mt-5">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 cardpos">
                
            <div class="card backgroud">
            <div class="card-head text-white">All Partners
            <span class="pok"><i class="fas fa-users fa-2x"></i></span>
            </div>
            
            <div class="card-body">
            <h1 class="text-white"><?php echo count($all)." Members";  ?></h1>
            </div>    
            </div>
            </div>
            
            
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 cardpos">
                
            <div class="card backgroud2">
            <div class="card-head text-white">Activated Partners
            <span class="pok"><i class="fas fa-check-circle fa-2x"></i></span>
            </div>
            
            <div class="card-body">
            <h1 class="text-white"><?php echo count($ac)." Members";  ?></h1>
            </div>    
            </div>
            </div>
            
            
            
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 cardpos">
                
            <div class="card backgroud3">
            <div class="card-head text-white">Total Deposits
            <span class="pok"><i class="fas fa-piggy-bank fa-2x"></i></span>
            </div>
            
            <div class="card-body">
            <h1 class="text-white"><?php  foreach($deposits as $de){
            $deposit_m=$de['SUM(value_paid)'];
            if(empty($deposit_m))
            {
            echo 0.00." BTC";
            }
            else
            {
            
            echo $deposit_m." BTC";
            }}?></h1>
            </div>    
            </div>
            </div>
            
            
            
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 cardpos">
                
            <div class="card backgroud4">
            <div class="card-head text-white">Confirm Withdrawals
            <span class="pok"><i class="fas fa-clipboard-check fa-2x"></i></span>
            </div>
            
            <div class="card-body">
            <h1 class="text-white"><?php
            
            foreach($ok as $with_con)
            {
                
            $btc_con= $with_con['SUM(amount)'];
            if($btc_con==NULL)
            {
                echo "0 BTC";
            }
            else
            {
                echo $btc_con." BTC";
            }
            }
            
            ?></h1>
            </div>    
            </div>
            </div>
            
            <!--row_end-->
            </div>
            
            
            <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 cardpos">
                
            <div class="card backgroud5">
            <div class="card-head text-white">Distributed Daliy ROI
            <span class="pok"><i class="fas fa-chart-area fa-2x"></i></span>
            </div>
            
            <div class="card-body">
            <h1 class="text-white"><?php echo $roi_income." BTC";  ?></h1>
            </div>    
            </div>
            </div>
            
            
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 cardpos">
                
            <div class="card backgroud6">
            <div class="card-head text-white">Pending Transactions
            <span class="pok"><i class="fas fa-undo fa-2x"></i></span>
            </div>
            
            <div class="card-body">
            <h1 class="text-white"><?php echo count($mm); ?> Transactions</h1>
            </div>    
            </div>
            </div>
            
            
            
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 cardpos">
                
            <div class="card backgroud7">
            <div class="card-head text-white">Withdrawal Requests
            <span class="pok"><i class="fas fa-university fa-2x"></i></span>
            </div>
            
            <div class="card-body">
            <h1 class="text-white"><?php echo $with." Requests"  ?></h1>
            </div>    
            </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 cardpos">
                
            <div class="card backgroud7">
            <div class="card-head text-white">Support Request
            <span class="pok"><i class="fas fa-history fa-2x"></i></span>
            </div>
            
            <div class="card-body">
            <h1 class="text-white"><?php echo $supports_request." Requests"  ?></h1>
            </div>    
            </div>
            </div>
            
            
            
            
            <!--row_end-->
            </div>
            
            
            
            </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          
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