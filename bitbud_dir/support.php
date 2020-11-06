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
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BitBud Limited Help Support</title>
    
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
     @media only screen and (min-width:200px) and (max-width:479px){
       #full button{
            width: 100%;
      }
    }
    
    textarea.form-control {
    height: auto !important;
}
  </style>
  <body onload="stop()">
     

    
    <!-- start per-loader -->
<div class="loader-container" id="load">
    <div class="lds-ripple">
        <div></div>
        <div></div>
    </div>
</div>  
     <script>
function stop()
{
    $('#load').hide('fade',2000);
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
            <h3 class="mt-2">Help Support </h3>
            <span class="ml-3 p-2">
            <div class="inner">
            <i class="fa fa-question-circle"></i>    
            </div>    
            </span>
            </div>
            
            
            <!--container_end-->
            </div>
            


                    <div class="row mt-5">
                             <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                <input type="text" class="form-control form-control-lg mb-2" placeholder="Name" id="name" autocomplete="off">  </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                <input type="text" class="form-control form-control-lg mb-2" placeholder="Email" id="email" autocomplete="off">  </div>
                            </div>
                             
                        </div>
                        
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                <select class="form-control form-control-lg" id="options">
                                    <option>--Select Issue Type--</option>
                                    <option>Payment Issue</option>
                                    <option>Income not Reflected</option>
                                    <option>Bugs Reports</option>
                                    <option>Banner Issue</option>
                                    <option>Account Issue</option>
                                    <option>Others</option>
                                </select>    
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <form method="post">    
                            <div class="form-group">
                            <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input form-control" id="customFile" name="file">
                            <label class="custom-file-label" for="customFile"><p class="mt-2">Reference Screenshot Optional</p></label>
                            </div>
                            <div class="progress" style="display:none;">
                            <div class="progress-bar bg-success progress-bar-striped"></div>
                            </div>
                            <span id="error"></span>
                            
                            </div>
                            
                            </form>
                            </div>
                        </div>
            
            <script>
        $('#customFile').on('change',function(){
        var formData = new FormData();
        formData.append('file', $('#customFile')[0].files[0]);

        $.ajax({
        url : 'reference_screenshot',
        type : 'POST',
        data : formData,
        processData: false,  // tell jQuery not to process the data
        contentType: false,// tell jQuery not to set contentType
        beforeSend:function()
        {
          $('.progress').show('fade,2000');
          $(".progress-bar").width('0%');  
        },
        
        xhr: function() {
        var xhr = new window.XMLHttpRequest();
        xhr.upload.addEventListener("progress", function(evt) {
            if (evt.lengthComputable) {
                var percentComplete = Math.round((evt.loaded / evt.total) * 100);
                $(".progress-bar").width(percentComplete + '%');
                $(".progress-bar").html(percentComplete +' %');
            }
       }, false);
       return xhr;
    },
        
        success : function(log) {
        $('.progress').hide();
        if(log=="file uploaded successfully!.")
        {
         
         $('#error').html('<p class="text-success"><i class="fas fa-check-circle text-success"></i> '+log+'</p>');
         
        }
        else
        {
            $('#error').html('<p class="text-danger"><i class="far fa-times-circle text-danger"></i> '+log+'</p>');
        }
        
        
       }
});
          
      })     
         </script>
            
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group" style="height: auto !important;">
                                    <textarea class="form-control" placeholder="Describe Your Issue" rows="7" id="textarea" autocomplete="off"></textarea>
                                </div>
                            </div>
                        </div>
            
            
            <div id="full">
            <button type="button" class="btn btn-dark" onclick="support()">Request</button>
            </div>
            
           
            </div>
            
            
            <div class="row m-4">
                <h6><strong> Note:-
                </strong> Every day, we receive numerous spam images. This means that if you send an image with an unfamiliar details, it is more than likely and your account can be block.</h6>
            </div>
            
            
          
          
          
          
          
          
          
          
          
          
          <script>
          function support()
          {
            var name=$('#name').val();
            var email=$('#email').val();
            var meta=$('#textarea').val();
            var issue_type=$('#options').val();
            if(name==0 || email==0 || meta==0 || issue_type==0)
            {
                $('body').topAlertjs({
                    type: 'error',
                    message: 'Invalid Details!',
                    duration: 3
               
                    });
            }
            else
            {
                $.ajax({
                url:'reference_screenshot',
                type:'POST',
                data:{name:name,email:email,meta:meta,issue_type:issue_type},
                beforeSend:function()
                {
                     $('.loader-container').show();
                },
                success:function(data)
                {
                    $('.loader-container').hide('fade',1000);
                    $('body').topAlertjs({
                    type: 'success',
                    message: data,
                    duration: 3
               
                    });
                    setTimeout(function(){window.location.href='support.php'},3000)
                    
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