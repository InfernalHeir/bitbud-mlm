<?php ini_set('display_errors',1);
session_start();
include '../dbconnection.php';
if(empty($_SESSION['admin_user']))
{
    header('location:login.php');
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
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BitBud Limited Change Credentials</title>
    
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
            <h3>Change Credentials</h3>
            <span class="ml-3 p-2">
            <div class="inner">
            <i class="fas fa-key"></i>    
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
            <input type="text" class="form-control" placeholder="Change Admin Username" autocomplete="off" id="admin_username">    
            </div>    
            </div>
            
            
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="form-group">
            <input type="text" class="form-control" id="oldpassword" placeholder="Old password" autocomplete="off">    
            </div>    
            </div>
            
            </div>
            
            
            <div class="row">
                
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="form-group">
            <input type="text" class="form-control" id="new_password" placeholder="New password" autocomplete="off">    
            </div>    
            </div>
       
            
            
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="form-group">
              <input id="password-field" type="password" class="form-control" placeholder="Confirm password" value='' autocomplete="off">
              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
             </div>
            </div>
            
            
            
            </div>
            
            
            <div id="full">
               <button class="btn btn-danger" onclick="edit()">Change Credentials</button>
            </div>
            
              
            <h2 class="mt-5 mb-2">Self service password reset authorisation</h2>
            <h5>Disclaimer</h5>
            <p class="mb-5">This is Fully Authorisation By us you can reset your password every day to prevent fraud activity. if any issue kindly contact with software agency immediately. please note do not share your credentials to anyone software agency will not responsible for this. recommend is that make a strong password which is not guessable by anyone.</p>
            
            </div>
          <!-- content-wrapper ends -->
          
          
          
          <!-- partial:partials/_footer.html -->
         
         <script>
         $(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
         
         </script> 
         
         <script>
        function edit()
        {
            var admin_username=$('#admin_username').val();
            var old_password=$('#oldpassword').val();
            var new_password=$('#new_password').val();
            var con_password=$('#password-field').val();
        
            if(admin_username==0 || old_password==0 || new_password==0 || con_password==0)
            {
                $('body').topAlertjs({
                    type: 'error',
                    message: 'Invalid Credentials',
                    duration: 3
               
                    });
            }
            else if(new_password!=con_password)
            {
                $('body').topAlertjs({
                    type: 'error',
                    message: 'Password not matched!.',
                    duration: 3
               
                    });
                
            }
            else
            {
                $.ajax({
                url:'update',
                type:'POST',
                data:{admin_username:admin_username,old_password:old_password,new_password:new_password},
                beforeSend:function()
                {
                 $('.loader-container').show();   
                },
                success:function(data)
                {
                    $('.loader-container').hide('fade',1000);
                    if(data=="Credentials Updated Successfully!.")
                    {
                        $('body').topAlertjs({
                    type: 'success',
                    message: data,
                    duration: 3
               
                    });
                    setTimeout(function(){window.location.href='change-credentials.php'},3000);
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
          
          
        </div>
     
        
        
      </div>
     
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