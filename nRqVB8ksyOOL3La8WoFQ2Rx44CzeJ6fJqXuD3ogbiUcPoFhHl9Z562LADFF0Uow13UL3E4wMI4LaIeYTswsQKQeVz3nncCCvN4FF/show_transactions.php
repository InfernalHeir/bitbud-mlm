<?php ini_set('display_errors',1);
session_start();
include '../dbconnection.php';
if(empty($_SESSION['admin_user']))
{
    header('location:https://bitbud.biz/bitbud_ext/login.php');
}
try
{
       if(isset($_GET['reference']))
       {
           $refernce=$_GET['reference'];
           $info=$conn->prepare("SELECT * FROM `show_transaction` WHERE `refernce_id`='$refernce'");
           $info->execute();
           $ref=$info->fetchAll();
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
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BitBud Limited Show Transactions</title>
    
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
            <h3>Show Transactions</h3>
            <span class="ml-3 p-2">
            <div class="inner">
            <i class="fas fa-random"></i>    
            </div>    
            </span>
            </div>
            
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
     @media only screen and (min-width:200px) and (max-width:479px){
       #full button{
            width: 100%;
      }
    }
    .field-icon {
  float: right;
  margin-right: 20px;
  margin-top: -30px;
  position: relative;
  z-index: 2;
}

.container{
  padding-top:50px;
  margin: auto;
}

             </style>       
               
            
            <div class="row mt-5">
                
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" autocomplete="off" id="username" value="<?php if(isset($_GET['reference'])){foreach( $ref as $refer){ echo $refer['user_id'];}}    ?>">    
            </div>    
            </div>
            
            
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="form-group">
            <input type="text" class="form-control" id="btc_amount" placeholder="BTC Amount" autocomplete="off" value="<?php if(isset($_GET['reference'])){foreach( $ref as $refer){ echo $refer['btc_amount'];}}    ?>">    
            </div>    
            </div>
            
            </div>
            
            
            <div class="row">
                
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="form-group">
            <input type="text" class="form-control" id="transaction_id" placeholder="Transaction Id" autocomplete="off" value="<?php if(isset($_GET['reference'])){foreach( $ref as $refer){ echo $refer['transaction_id'];}}    ?>">    
            </div>    
            </div>
          
            
            
            </div>
            
            
            <div id="full">
               <button class="btn btn-danger" onclick="show_transaction()">Show Transactions</button>
            </div>
            
              
            <h2 class="mt-5 mb-2">Disclaimer</h2>
            
            <h5 class="mb-5">You can add your payment manually by setting up username and transaction id. Click Below-</h5>
            
            <div class="row mt-2">
            <a href="https://bitbud.biz/bitbud_ext/payout.php" target="_blank"><img src="assets/images/bitbud_amount.png" class="img-fluid" style="cursor:pointer;"></a>    
            </div>
            </div>
          <!-- content-wrapper ends -->
          
          
          
          <!-- partial:partials/_footer.html -->
         
         
         <script>
        function show_transaction()
        {
            var username=$('#username').val();
            var btc_amount=$('#btc_amount').val();
            var transaction_id=$('#transaction_id').val();
            <?php
            if($_GET['reference'])
            {
                ?>
                var reference_id="<?php echo $_GET['reference']; ?>";
                <?php
            }
            else
            {
            ?>    
            var reference_id="<?php echo uniqid();    ?>";
            <?php
            }
            ?>
            if(username==0 || btc_amount==0 || transaction_id==0)
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
                url:'show',
                type:'POST',
                data:{username:username,btc_amount:btc_amount,transaction_id:transaction_id,reference_id:reference_id},
                beforeSend:function()
                {
                 $('.loader-container').show();   
                },
                success:function(data)
                {
                    $('.loader-container').hide('fade',1000);
                    if(data=="Transaction is live.")
                    {
                        $('body').topAlertjs({
                    type: 'success',
                    message: data,
                    duration: 3
               
                    });
                   setTimeout(function(){window.location.href='show_transactions.php'},3000);
                    }
                    else if(data=="Transaction updated.")
                    {
                        $('body').topAlertjs({
                    type: 'info',
                    message: data,
                    duration: 3
               
                    });
                   setTimeout(function(){window.location.href='edit_transactions.php'},3000);
                    }
                    else
                    {
                       $('body').topAlertjs({
                    type: 'error',
                    message: data,
                    duration: 3
               
                    });
                    setTimeout(function(){window.location.href='show_transactions.php'},3000);  
                    }
                    
                    
                }
                
                    
                })
            }
            
        }
         </script>
          
         <?php include 'footer.php';   ?> 
          
          <!-- partial -->
        </div>
        <script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html("<p class='mt-2'>"+fileName+"</p>");
});
</script>
        
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