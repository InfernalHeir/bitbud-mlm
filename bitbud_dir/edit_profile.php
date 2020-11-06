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
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
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
            <h3>Edit Profile</h3>
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
                
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="form-group">
            <input type="text" class="form-control" placeholder="username" value='<?php foreach($all as $email){echo $email['user_id'];}  ?>' onclick="read()" autocomplete="off" readonly>    
            </div>    
            </div>
            <script>
            function read()
            {
                $('body').topAlertjs({
                    type: 'error',
                    message: 'You cannot change your username!',
                    duration: 3
               
                    });
            }
            </script>
            
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="form-group">
            <input type="email" class="form-control" id="email" placeholder="email" value='<?php foreach($all as $email){echo $email['email'];}  ?>' autocomplete="off" required>    
            </div>    
            </div>
            
            </div>
            
            
            <div class="row">
                
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="form-group">
            <input type="text" class="form-control" id="name" placeholder="name" autocomplete="off" value='<?php foreach($all as $email){echo $email['fullname'];}  ?>'>    
            </div>    
            </div>
            
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="form-group">
            <input type="text" class="form-control" id="mobile_no" placeholder="phone" value='<?php foreach($all as $email){echo $email['mobile_no'];}  ?>' autocomplete="off">    
            </div>    
            </div>
            
            </div>
            
            
            <div class="row">
                
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <form method="post">    
            <div class="form-group">
            <div class="custom-file mb-3">
            <input type="file" class="custom-file-input form-control" id="customFile" name="filename">
            <label class="custom-file-label" for="customFile"><p class="mt-2">Choose file</p></label>
            </div>    
            </div>
            </form>
            </div>
            
            
            
            </div>
            
            
            <div id="full">
               <button class="btn btn-success" onclick="edit()">Edit Profile</button>
            </div>
            
            
            </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         
         <script>
        $('#customFile').on('change',function(){
        var formData = new FormData();
        formData.append('file', $('#customFile')[0].files[0]);

        $.ajax({
        url : 'update',
        type : 'POST',
        data : formData,
        processData: false,  // tell jQuery not to process the data
        contentType: false,// tell jQuery not to set contentType
        beforeSend:function()
        {
          $('.loader-container').show();  
        },
        success : function(log) {
        $('.loader-container').hide('fade',1000);    
        if(log=="Woohoo! File Upload successfully.")
        {
            $('body').topAlertjs({
                    type: 'success',
                    message: log,
                    duration: 3
               
                    }); 
        }
        else
        {
       $('body').topAlertjs({
                    type: 'error',
                    message: log,
                    duration: 3
               
                    });
        }   
       }
});
          
      })     
         </script> 
         
         <script>
        function edit()
        {
            var email=$('#email').val();
            var mobile_no=$('#mobile_no').val();
            var name=$('#name').val();
            if(email==0 || mobile_no==0 || name==0)
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
                url:'update',
                type:'POST',
                data:{email:email,mobile_no:mobile_no,name:name},
                beforeSend:function()
                {
                 $('.loader-container').show();   
                },
                success:function(data)
                {
                    $('.loader-container').hide('fade',1000);
                    if(data=="Profile Updated Successfully!")
                    {
                        $('body').topAlertjs({
                    type: 'success',
                    message: data,
                    duration: 3
               
                    });
                    setTimeout(function(){window.location.href='edit_profile.php'},3000);
                    }
                    else
                    {
                       $('body').topAlertjs({
                    type: 'error',
                    message: data,
                    duration: 3
               
                    });
                    setTimeout(function(){window.location.href='edit_profile.php'},3000);    
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