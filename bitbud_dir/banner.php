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
    <title>BitBud Limited Edit Profie</title>
    
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
            <h3>Banners & Links</h3>
            <span class="ml-3 p-2">
            <div class="inner">
            <i class="fas fa-edit"></i>    
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
                    type: 'error',
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
     @media only screen and (min-width:200px) and (max-width:479px){
       #full button{
            width: 100%;
      }
    }
    img#banner {
    height: auto !important;
    max-width: 100% !important;
}
             </style>       
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 col-12 social links">    
                    <a href="whatsapp://send?text=https://bitbud.biz?sponser=<?php foreach($all as $sponser){echo $sponser['user_id'];}?>" data-action="share/whatsapp/share" ><i class="fab fa-whatsapp" id="fab"></i></a>
                    <a href="fb-messenger://share/?link=https://bitbud.biz?sponser=<?php foreach($all as $sponser){echo $sponser['user_id'];}?>" class="ml-1"><i class="fab fa-facebook-messenger"></i></a>
                    <a href="tg://msg?text=https://bitbud.biz?sponser=<?php foreach($all as $sponser){echo $sponser['user_id'];}?>"class="ml-1"><i class="fab fa-telegram-plane"></i></a>
                    <a href="https://www.instagram.com/?url=https://bitbud.biz?sponser=<?php foreach($all as $sponser){echo $sponser['user_id'];}?>" rel="noopener" class="ml-1"><i class="fab fa-instagram"></i></a>
                    
                    </div>
                    
                  <div class="mt-4">
                
              <h4 class="mt-2 w-100">Orginal Size 1200x50 px</h4>
                     <a href="https://bitbud.biz?sponser_id=<?php echo $_SESSION['user_id'];  ?>" target="_blank"><img src="https://bitbud.biz/bitbud_dir/assets/images/ezgif.com-optimize1200150.gif" width="100%" id="banner"></a>
                      
                      <textarea id="textarea1" rows=6 class="form-control mt-3 link" data-clipboard-action="copy" data-clipboard-target="#textarea1" style="height:auto !important;" readonly><a href="https://bitbud.biz?sponser_id=<?php echo $_SESSION['user_id'];  ?>"><img src="https://bitbud.biz/bitbud_dir/assets/images/ezgif.com-optimize1200150.gif" width="100%" height="100%" id="banner"></a></textarea>  
            </div> 
            
            
            
            
          
            
           
            
            
            
            </div>
            
            <div class="mt-2">
                
              <h4 class="mt-2 w-100">Orginal Size 728x90 px</h4>
                     <a href="https://bitbud.biz?sponser_id=<?php echo $_SESSION['user_id'];  ?>" target="_blank"><img src="https://bitbud.biz/bitbud_dir/assets/images/ezgif.com-optimize728.gif" width="100%" id="banner"></a>
                      
                      <textarea id="textarea2" rows=6 class="form-control mt-3 link" data-clipboard-action="copy" data-clipboard-target="#textarea2" style="height:auto !important;" readonly><a href="https://bitbud.biz?sponser_id=<?php echo $_SESSION['user_id'];  ?>"><img src="https://bitbud.biz/bitbud_dir/assets/images/ezgif.com-optimize728.gif" width="100%" height="100%" id="banner"></a></textarea>  
            </div>
            
            
            <div class="mt-2">
                
              <h4 class="mt-2 w-100">Orginal Size 300x250 px</h4>
                     <a href="https://bitbud.biz?sponser_id=<?php echo $_SESSION['user_id'];  ?>" target="_blank"><img src="https://bitbud.biz/bitbud_dir/assets/images/third300250-min.gif" id="banner" class="img-fluid"></a>
                      
                      <textarea id="textarea3" rows=6 class="form-control mt-3 link" data-clipboard-action="copy" data-clipboard-target="#textarea3" style="height:auto !important;" readonly><a href="https://bitbud.biz?sponser_id=<?php echo $_SESSION['user_id'];  ?>"><img src="https://bitbud.biz/bitbud_dir/assets/images/third300250-min.gif" width="100%" height="100%" id="banner"></a></textarea>  
            </div>
            
            
             <div class="mt-2">
                
              <h4 class="mt-2 w-100">Orginal Size 200x200 px</h4>
                     <a href="https://bitbud.biz?sponser_id=<?php echo $_SESSION['user_id'];  ?>" target="_blank"><img src="https://bitbud.biz/bitbud_dir/assets/images/ezgif.com-optimize200200.gif" id="banner" class="img-fluid"></a>
                      
                      <textarea id="textarea3" rows=6 class="form-control mt-3 link" data-clipboard-action="copy" data-clipboard-target="#textarea3" style="height:auto !important;" readonly><a href="https://bitbud.biz?sponser_id=<?php echo $_SESSION['user_id'];  ?>"><img src="https://bitbud.biz/bitbud_dir/assets/images/ezgif.com-optimize200200.gif" width="100%" height="100%" id="banner"></a></textarea>  
            </div>
            
            
            </div>
            
            
          
            
           
            
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