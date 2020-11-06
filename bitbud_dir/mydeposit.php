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
       
       $select_btc=$conn->prepare("SELECT * FROM `deposited_made` where `user_id`='$user_id'");
    $select_btc->execute();
    $directs=$select_btc->fetchAll();
    
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
    <title>BitBud Limited Support History</title>
    
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
td
{
    font-size:13px;
}
table {
  border: 1px solid #ccc;
  border-collapse: collapse;
  margin: 0;
  padding: 0;
  width: 100%;
  table-layout: fixed;
}

table caption {
  font-size: 1.5em;
  margin: .5em 0 .75em;
}

table tr {
  background-color: #f8f8f8;
  border: 1px solid #ddd;
  padding: .35em;
}

table th,
table td {
  padding: .625em;
  text-align: center;
}

 table th {
    font-size: .85em;
    letter-spacing: .1em;
    
    background: #283a5e !important;
    color: white !important;
    padding: 2% !important;
    border: 0.5px solid white;
}
td {
    border: 1px solid #ddd !important;
    padding-top: 1% !important;
    padding-bottom: 1% !important;
    
}
@media screen and (max-width: 900px) {
  table {
    border: 0;
  }
 

  table caption {
    font-size: 1.3em;
  }
  
  table thead {
    border: none;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }
  
  table tr {
    border-bottom: 3px solid #ddd;
    display: block;
    margin-bottom: .625em;
  }
  
  table td {
    border-bottom: 1px solid #ddd;
    display: block;
    font-size: .8em;
    text-align: right;
  }
  
  table td::before {
    /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
    content: attr(data-label);
    float: left;
    font-weight: bold;
    
  }
  
  table td:last-child {
    border-bottom: 0;
  }
}

button.btn.btn-secondary.btn-sm {
    background: #5080ea;
    color: white;
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
            <h3>My Deposit</h3>
            <span class="ml-3 p-2">
            <div class="inner">
            <i class="fas fa-money-check"></i>    
            </div>    
            </span>
            </div>
            
            
            <!--container_end-->
            </div>
            
            
            
            
            <div class="row mt-5">
                
           <table>

  <thead>
    <tr>
      <th scope="col">S.no</th>
      <th scope="col">Plan</th>
      <th scope="col">Paid Amount</th>
      <th scope="col">Transaction ID</th>
      <th scope="col">Deposited Time</th>
      <th scope="col">Status</th>
      <th scope="col">Admin Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $s_no=1;
    foreach($directs as $dir)
    {
    ?>
    <tr>
    <td data-label="S.no"><?php echo $s_no++;   ?></td>
    <td data-label="Plan"><?php echo $dir['plan'];   ?></td>
    
    <td data-label="Paid Amount"><?php echo $dir['value_paid']." BTC";    ?></td>
    <?php $transaction_id=$dir['transaction_id']; ?>
    <td data-label="Transaction ID"><a href='<?php echo "https://www.blockchain.com/btc/tx/".$dir['transaction_id'];?>' style="color: #283a5e !important;" target="_blank"><?php echo substr($transaction_id,0,20); ?></a></td>
    <td data-label="Deposited Time"><?php echo $dir['deposited_time'];    ?></td>
    <td data-label="Status"><button style="width:90px; height:auto !important;" class='<?php $status=$dir['status'];
    if($status=="CONFIRMED")
    {
        echo "btn btn-info btn-sm";
    }
    else
    {
        echo "btn btn-secondary btn-sm";
    }
    ?>'><?php echo $status; ?></button></td>
    
    <td data-label="Admin Action"><button style="width:90px; height:auto !important;" class='
    <?php
    $admin_action=$dir['admin_action'];
    if($admin_action=="Unapproved")
    {
        echo "btn btn-danger btn-sm";
    }
    
    elseif($admin_action=="Rejected")
    {
        echo "btn btn-dark btn-sm";
    }
    else
    {
    echo "btn btn-success btn-sm";    
    }
    
    
    ?>
    
    '><?php echo $dir['admin_action'];   ?></button></td>
    </tr>
    <?php
    }
    ?>
    
  </tbody>
</table>
            
            
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