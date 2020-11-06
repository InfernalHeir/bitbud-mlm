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
       
       $partner_details=$conn->prepare("SELECT `referel_id` FROM `user_registration` WHERE `user_id`='$user_id'");
       $partner_details->execute();
       $ff=$partner_details->fetchAll();
       
       if($partner_details->rowCount()>0)
       {
           foreach($ff as $e)
           {
               $upline_referel=$e['referel_id'];
           }
           
           $select_upline=$conn->prepare("SELECT * FROM `user_registration` WHERE `user_id`='$upline_referel'");
           $select_upline->execute();
           $partner=$select_upline->fetchAll();
       }
       
       
       
       /*make_daily_roi*/
       
       $select_approved_plan=$conn->prepare("SELECT `plan` FROM `deposited_made` WHERE `user_id`='$user_id' and `admin_action`='Approved'");
       $select_approved_plan->execute();
       $plans=$select_approved_plan->fetchAll();
       foreach($plans as $pl)
       {
           $plan=$pl['plan'];
           
       }
       
       if($plan=="PLUS PLAN")
       {
           $ss=$conn->prepare("SELECT * FROM `deposited_made` WHERE `user_id`='$user_id' and `admin_action`='Approved' and `status`='CONFIRMED' and `plan`='PLUS PLAN'");
           $ss->execute();
           $plans_overview=$ss->fetchAll();
           foreach($plans_overview as $pl_over)
           {
               $deposited_time=$pl_over['deposited_time'];
               $plan=$pl_over['plan'];
               $amount=$pl_over['value_paid'];
               $commision=$amount*6/100;
           
           
           date_default_timezone_set('America/New_York');
           $currentTime = date( 'd-m-Y h:i:s A', time () );
           
           for ($x = 1; $x <= 50; $x++) {
            $increment_days="+$x day";
            
            
            $date = date('d-m-Y h:i:s A', strtotime($increment_days, strtotime("$deposited_time")));
            
        
            $str_to_time=strtotime($date);
            
            $today=strtotime($currentTime);
            
            if($today>$str_to_time)
            {
                
                $select_date_from_db=$conn->prepare("SELECT `processing_time` FROM `distributed_roi` WHERE `user_id`='$user_id' and `plan`='$plan' and `processing_time`='$date'");
                $select_date_from_db->execute();
                $select_date_from_db->fetchAll();
                if($select_date_from_db->rowCount()==0)
                {
                    $insert_on_data=$conn->prepare("INSERT INTO `distributed_roi`(`user_id`, `plan`, `amount`, `daily_roi`, `processing_time`, `percentage`, `status`) VALUES ('$user_id','$plan','$amount','$commision','$date','6','RECEIVED')");
                    $insert_on_data->execute();
                    
                }
            }
            
            
               
           }
           
           
           
           }
       }
       /*plus_plan_close*/
       
       
       
       if($plan=="PREMIUM PLAN")
       {
           $ss=$conn->prepare("SELECT * FROM `deposited_made` WHERE `user_id`='$user_id' and `admin_action`='Approved' and `plan`='PREMIUM PLAN'");
           $ss->execute();
           $plans_overview=$ss->fetchAll();
           foreach($plans_overview as $pl_over)
           {
               $deposited_time=$pl_over['deposited_time'];
               $plan=$pl_over['plan'];
               $amount=$pl_over['value_paid'];
               $commision=$amount*10/100;
           
           
           date_default_timezone_set('America/New_York');
           $currentTime = date( 'd-m-Y h:i:s A', time () );
           
           for ($x = 1; $x <= 60; $x++) {
            $increment_days="+$x day";
            
            
            $date = date('d-m-Y h:i:s A', strtotime($increment_days, strtotime("$deposited_time")));
            
        
            $str_to_time=strtotime($date);
            
            $today=strtotime($currentTime);
            
            if($today>$str_to_time)
            {
                $date_of_distribution=date( 'd-m-Y', time () );
                $select_date_from_db=$conn->prepare("SELECT `processing_time` FROM `distributed_roi` WHERE `user_id`='$user_id' and `plan`='$plan' and `processing_time`='$date'");
                $select_date_from_db->execute();
                $select_date_from_db->fetchAll();
                if($select_date_from_db->rowCount()==0)
                {
                    $insert_on_data=$conn->prepare("INSERT INTO `distributed_roi`(`user_id`, `plan`, `amount`, `daily_roi`, `processing_time`, `percentage`, `status`) VALUES ('$user_id','$plan','$amount','$commision','$date','10','RECEIVED')");
                    $insert_on_data->execute();
                    
                }
            }
            
            
               
           }
           
           
           
           }
       }
       /*premium_plan_closed*/
       
       /*roi_close*/
       
       
       /*make_income*/
       
       
       $user_id=$_SESSION['user_id'];
       $select_user_id=$conn->prepare("SELECT `user_id` FROM `income_status` WHERE `user_id`='$user_id'");
       $select_user_id->execute();
       $select_user_id->fetchAll();
       if(empty($select_user_id->rowCount()))
       {
           
           if(empty($user_id))
           {
               /*nothing_to_do*/
           }
           else
           {
               $insert=$conn->prepare("INSERT INTO `income_status`(`user_id`, `direct_income`, `roi_income`, `refund`, `withdrawal`, `total_income`) VALUES ('$user_id',0,0,0,0,0)");
               $insert->execute();
           }
       }
       else
       {
           /*update*/
           
           $user_id=$_SESSION['user_id'];
       $daily_roi=$conn->prepare("SELECT SUM(daily_roi) FROM `distributed_roi` WHERE `user_id`='$user_id'");
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
      
       
       $referl=$conn->prepare("SELECT SUM(amount) FROM `direct_team` WHERE 	`referel_user_id`='$user_id' and `status`='Activated'");
       $referl->execute();
       $directs=$referl->fetchAll();
      
     
           foreach($directs as $di)
           {
               $ref=$di['SUM(amount)'];
               if($ref==NULL)
               {
                   $referral_income=0;
               }
               else
               {
                   $referral_inc=$di['SUM(amount)'];
                   $value=$referral_inc*100000000;
                   function convertToBTC($value) {
    $BTC = $value / 100000000;
    return $BTC;
}
function formatB($value) {
    $value = sprintf('%.8f', $value);
    $value = rtrim($value, '0');
    return $value;
}
$referral_income=formatB(convertToBTC($value));
                   
               }
           } 
       
           
           
           $update=$conn->prepare("UPDATE `income_status` SET `direct_income`='$referral_income',`roi_income`='$roi_income' WHERE `user_id`='$user_id'");
           $update->execute();
       }
       
       $select_from_all=$conn->prepare("SELECT * FROM `income_status` WHERE `user_id`='$user_id'");
       $select_from_all->execute();
       $all_income=$select_from_all->fetchAll();
       
       foreach($all_income as $all_in)
       {
         $direct_income=$all_in['direct_income'];
         $roi_income=$all_in['roi_income'];
         $refund=$all_in['refund'];
         $withdrawal=$all_in['withdrawal'];
         
         $total=$direct_income+$roi_income+$refund-$withdrawal;
         $value=$total*100000000;
         
         
         function convertToBTCFromSatoshi($value) {
    $BTC = $value / 100000000 ;
    return $BTC;
}
function formatBTC($value) {
    $value = sprintf('%.8f', $value);
    $value = rtrim($value, '0');
    return $value;
}

$total_income= formatBTC(convertToBTCFromSatoshi($value));

         
         $user_id=$_SESSION['user_id'];
         $update_total_income=$conn->prepare("UPDATE `income_status` SET `total_income`='$total_income' WHERE `user_id`='$user_id'");
         $update_total_income->execute();
       }
       
       $total_dep=$conn->prepare("SELECT SUM(value_paid) FROM `deposited_made` WHERE `user_id`='$user_id' and `admin_action`='Approved'");
       $total_dep->execute();
       $all_deposit=$total_dep->fetchAll();
       if(empty($total_dep->rowCount()))
       {
           $total_deposit=0;
       }
       else
       {
       foreach($all_deposit as $dep)
       {
        $total_dep=$dep['SUM(value_paid)'];
        $value=$total_dep*100000000;
        $total_deposit=formatBTC(convertToBTCFromSatoshi($value));
       }
       }
       $user_id=$_SESSION['user_id'];
       $select_paid=$conn->prepare("SELECT `status` FROM `direct_team` WHERE `referel_user_id`='$user_id' and `status`='Approved'");
       $select_paid->execute();
       $select_paid->fetchAll();
       if(empty($select_paid->rowCount()))
       {
           $paid_partner=0;
       }
       else
       {
           $paid_partner=$select_paid->rowCount();
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
.alert-primary {
    color: #fff !important;
    background-color: #2196f3 !important;
    border-color: transparent;
}
button.btn.btn-default.btn-sm {
    background: white;
}
@media(max-width:500px)
{
    p{
        font-size:12px !important;
    }
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
            <?php
            if(isset($_COOKIE['order_id']))
            {
                $order_id=$_COOKIE['order_id'];
                ?>
                <div class="row">
            <div class="alert alert-primary w-100 mt-1" role="alert"><p style="margin-bottom:0px !important; font-size: 20px;
    color: white !important;">Track your Order for #<?php echo $_COOKIE['order_id'];  ?>
            <a href='<?php echo "https://bitbud.biz/bitbud_dir/order_status?order_id=$order_id"  ?>' class="float-right ml-auto"><button class="btn btn-default btn-sm" style="height : 35px !important;">Check order</button></p></a>
            </div>    
            </div>
                <?php
            }
            
            ?>
            
            
            <div class="container-fluid mt-5">
            <div class="row">
            <h3>Dashboard</h3>
            <span class="ml-3 p-2">
            <div class="inner">
            <i class="fa fa-home"></i>    
            </div>    
            </span>
            </div>
            
            
            <!--container_end-->
            </div>
            
            
            <h4 class="mt-3">Referral Link</h4>
            <div class="row mt-3 mb-3">
            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                     
                    <input id="bar" class="form-control" readonly value="https://bitbud.biz?sponser=<?php foreach($all as $sponser){echo $sponser['user_id'];}?>">
                    </div>
                    
                    
                    <div class="col-lg-3 col-md-12 col-sm-12 col-12 tmt">
                        <button data-clipboard-action="copy" data-clipboard-target="#bar" class="btn btn-danger btn-fw btn">Copy</button><a href='banners.php'><button class="btn btn-dark ml-2">Banners</button></a>
                            <script type="text/javascript">
    var clipboard = new Clipboard('.btn');


    clipboard.on('success', function(e) {
        e.clearSelection();
        

                    $('body').topAlertjs({
                    type: 'success',
                    message: 'Woohoo! Copy To Clipboard successfully',
                    duration: 3
               
                    });
   
  


        
        
    });


    clipboard.on('error', function(e) {
      $('body').topAlertjs({
                    type: 'success',
                    message: 'Oops! Something wrong went!',
                    duration: 3
               
                    });
    });
</script>
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
    font-size: 18px !important; 
}
span.pok {
    position: absolute;
    right: 25px;
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
h1.text-white {
    font-size: 15px !important;
}
.card.backgroud6 {
    background-image: linear-gradient(45deg,#004e7c, #027173);
   
}
.card.backgroud7 {
    background-image: linear-gradient(45deg,#004e7c , #283a5e);
    
}  
             </style>       
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 col-12 social links">    
                    <a href="whatsapp://send?text=https://bitbud.biz?sponser=<?php foreach($all as $sponser){echo $sponser['user_id'];}?>" data-action="share/whatsapp/share" ><i class="fab fa-whatsapp" id="fab"></i></a>
                    <a href="fb-messenger://share/?link=https://bitbud.biz?sponser=<?php foreach($all as $sponser){echo $sponser['user_id'];}?>" class="ml-1"><i class="fab fa-facebook-messenger"></i></a>
                    <a href="tg://msg?text=https://bitbud.biz?sponser=<?php foreach($all as $sponser){echo $sponser['user_id'];}?>"class="ml-1"><i class="fab fa-telegram-plane"></i></a>
                    <a href="https://www.instagram.com/?url=https://bitbud.biz?sponser=<?php foreach($all as $sponser){echo $sponser['user_id'];}?>" rel="noopener" class="ml-1"><i class="fab fa-instagram"></i></a>
                    
                    </div>
            </div>
            
            
            <div class="row mt-5">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 cardpos">
                
            <div class="card backgroud">
            <div class="card-head text-white">Total Income
            <span class="pok"><i class="fas fa-chart-bar fa-2x"></i></span>
            </div>
            
            <div class="card-body">
            <h1 class="text-white"><?php echo $total_income." BTC";  ?></h1>
            </div>    
            </div>
            </div>
            
            
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 cardpos">
                
            <div class="card backgroud2">
            <div class="card-head text-white">Total Deposit
            <span class="pok"><i class="fa fa-piggy-bank fa-2x"></i></span>
            </div>
            
            <div class="card-body">
            <h1 class="text-white"><?php echo $total_deposit." BTC";  ?></h1>
            </div>    
            </div>
            </div>
            
            
            
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 cardpos">
                
            <div class="card backgroud3">
            <div class="card-head text-white">Referral Income
            <span class="pok"><i class="fas fa-users fa-2x"></i></span>
            </div>
            
            <div class="card-body">
            <h1 class="text-white"><?php echo $direct_income." BTC";  ?></h1>
            </div>    
            </div>
            </div>
            
            
            
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 cardpos">
                
            <div class="card backgroud4">
            <div class="card-head text-white">Daily ROI
            <span class="pok"><i class="fas fa-chart-area fa-2x"></i></span>
            </div>
            
            <div class="card-body">
            <h1 class="text-white"><?php echo $roi_income." BTC";  ?></h1>
            </div>    
            </div>
            </div>
            
            <!--row_end-->
            </div>
            
            
            <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 cardpos">
                
            <div class="card backgroud5">
            <div class="card-head text-white">Paid Referral
            <span class="pok"><i class="fas fa-check-double fa-2x"></i></span>
            </div>
            
            <div class="card-body">
            <h1 class="text-white"><?php echo $paid_partner." Partners";  ?></h1>
            </div>    
            </div>
            </div>
            
            
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 cardpos">
                
            <div class="card backgroud6">
            <div class="card-head text-white">Refund
            <span class="pok"><i class="fas fa-undo fa-2x"></i></span>
            </div>
            
            <div class="card-body">
            <h1 class="text-white"><?php echo $refund." BTC";  ?></h1>
            </div>    
            </div>
            </div>
            
            
            
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 cardpos">
                
            <div class="card backgroud7">
            <div class="card-head text-white">Withdrawals
            <span class="pok"><i class="fas fa-university fa-2x"></i></span>
            </div>
            
            <div class="card-body">
            <h1 class="text-white"><?php echo $withdrawal." BTC";  ?></h1>
            </div>    
            </div>
            </div>
            
            
            
            
            
            <!--row_end-->
            </div>
            
            <div class="row mt-2">
            
            <div class="card w-100">
  <div class="card-header bg-primary">
    <h3 class="text-white">Upline Details</h3>
  </div>
  <div class="card-body">
     <?php
     if(empty(count($partner)))
     {
         ?>
         <h4 class="card-title">You are Root user. you dont have any Referral.</h4>
         <?php
     }
     else
     {
         ?>
         <h4 class="card-title">Username:-<?php foreach($partner as $par){ echo $par['user_id'];}  ?></h4>
         <h4 class="card-title">Full Name:-<?php foreach($partner as $par){ echo $par['fullname'];}  ?></h4>
         <h4 class="card-title">Email:-<?php foreach($partner as $par){ echo $par['email'];}  ?></h4>
         <h4 class="card-title">Mobile No:-<?php foreach($partner as $par){ echo $par['mobile_no'];}  ?></h4>
         <?php
     }
     
     ?>
    
    
    
  </div>
</div>    
                
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