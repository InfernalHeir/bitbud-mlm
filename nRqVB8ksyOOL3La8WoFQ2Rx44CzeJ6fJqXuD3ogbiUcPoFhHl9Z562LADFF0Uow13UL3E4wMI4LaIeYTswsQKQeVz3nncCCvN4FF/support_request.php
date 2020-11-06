<?php ini_set('display_errors',1);
session_start();
include '../dbconnection.php';
if(empty($_SESSION['admin_user']))
{
    header('location:login.php');
}
try
{
       
       $select_all=$conn->prepare("SELECT * FROM `support`");
       $select_all->execute();
       $directs=$select_all->fetchAll();
       
       if(isset($_GET['submit']))
       {
           $username=$_GET['user_id'];
           $check=$conn->prepare("SELECT * FROM `support` WHERE `user_id`='$username'");
           $check->execute();
           $directs=$check->fetchAll();
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
    <title>BitBud Limited Support Requests</title>
    
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
label {
    font-weight: 600 !important;
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

.widget { margin-top: 80px;}
    .widget-searchbox{position: relative; width: 100%;}
.form-inline .form-control {display: inline-block; vertical-align: middle; width: 100%;}
.widget-searchbox .search-btn {
    background: none;
    border: none;
    color: #fff;
    font-size: 14px;
    outline: medium none;
    position: absolute;
    right: 40px;
    top: 50%;
    cursor: pointer;
    transform: translateY(-50%);
}
.form-inline .form-control {
    display: inline-block;
    vertical-align: middle;
    width: 100%;
}
       .form-control {
    height: 50px;
    border-radius: 5px;
    font-size: 13px;
    color: white !important;
    border: 1px solid transparent;
    background: #283a5e !important;
}
svg
{
    display:none;
}
/*.form-control::-moz-placeholder{
    color:#fff !important;
    opacity:1
}
.form-control:-ms-input-placeholder{
    color:#fff !important;
}

.form-control::-webkit-input-placeholder{
    color:#fff !important;
}*/
i.fa.fa-search {
    font-size: 25px !important;
}
i.fas.fa-times-circle {
    position: absolute;
    top: 22%;
    right: 10px;
    font-size: 25px;
    color: white;
    cursor: pointer;
}
.form-control:focus {
    color: #fff !important;
    box-shadow: none !important;
    background-color: #fff;
    border-color: #283a5e70 !important;
    font-size: 20px;
}
input.form-control {
    border-radius: 0px !important;
}
div#exampleModalLong {
    padding: 0px !important;
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
            <h3>Support Requests</h3>
            <span class="ml-3 p-2">
            <div class="inner">
            <i class="fas fa-question-circle"></i>    
            </div>    
            </span>
            </div>
            
            
            <!--container_end-->
            </div>
            
          <?php
    if(empty($_GET['user_id']))
    {
        ?>
        <style>
        i.fas.fa-times-circle
        {
          display:none !important;  
        }
        </style>
        <?php
    }
    
    ?>  
            <div class="row mt-5">
                
            <div class="widget-search w-100">
           <form class="form-inline form" method="GET">
             <div class="widget-searchbox">
              
               <input type="text" placeholder="Username..."  class="form-control" name="user_id" autocomplete="off">
               
                <button type="submit" name="submit" class="search-btn"> <i class="fa fa-search"></i>
               </button>
               <i class="fas fa-times-circle" onclick='pwroff()'></i>
               <script>
                   function pwroff()
                   {
                       window.location.href='support_request.php';
                   }
               </script>
             </div>
           </form>
         </div>    
            </div>
            
            
            <div class="row mt-3">
                
           <table>

  <thead>
    <tr>
      <th scope="col">S.no</th>
      <th scope="col">Username</th>
      <th scope="col">Issue Type</th>
      <th scope="col">Processing Time</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
    
    if(isset($_GET['user_id']))
    {
        
        $s_no=1;
    foreach($directs as $dir)
    {
    ?>
    <tr>
    <td data-label="S.no"><?php echo $s_no++;   ?></td>
    <td data-label="Username"><?php echo $user_id=$dir['user_id'];   ?></td>
    
    <td data-label="Issue Type"><?php echo $dir['issue_type'];    ?></td>
    <td data-label="Processing Time"><?php echo $dir['processing_time'];    ?></td>
    
    <?php $str=rand(); 
$result = sha1($str); 
$_SESSION['result_token']=$result;
?>
    <td data-label="Status"><a href="https://bitbud.biz/bitbud_ext/login?username=<?php  echo $user_id ?>&cmd=<?php echo $result;  ?>" target="_blank"><button class='btn btn-info btn-sm' style="width:60px; height:auto !important;">Login</button></a>
    <button style="width:80px; height:auto !important;" class='
    <?php
    $status=$dir['status'];
    if($status=="PENDING")
    {
        echo "btn btn-danger btn-sm ml-1";
    }
    
    
    else
    {
    echo "btn btn-success btn-sm ml-1";    
    }
    
    
    ?>
    
    '><?php echo $dir['status'];   ?></button></td>
    
    <?php  
    $refer_id=$dir['tracking_id'];
    
    ?>
    <td data-label="Action"><button class="btn btn-dark btn-sm" style="width:60px; height:auto !important;" onclick="meta('<?php echo $refer_id;  ?>')">Check</button><button class="btn btn-success btn-sm ml-1" style="width:80px; height:auto !important;" onclick='solve("<?php echo $refer_id;  ?>")'>Solve?</button></td>
    </tr>
    <?php
    }
    }
    else
    {
    $s_no=1;
    foreach($directs as $dir)
    {
    ?>
    <tr>
    <td data-label="S.no"><?php echo $s_no++;   ?></td>
    <td data-label="Username"><?php echo $user_id=$dir['user_id'];   ?></td>
    
    <td data-label="Issue Type"><?php echo $dir['issue_type'];    ?></td>
    <td data-label="Processing Time"><?php echo $dir['processing_time'];    ?></td>
    
    <?php $str=rand(); 
$result = sha1($str); 
$_SESSION['result_token']=$result;
?>
    <td data-label="Status"><a href="https://bitbud.biz/bitbud_ext/login?username=<?php  echo $user_id ?>&cmd=<?php echo $result;  ?>" target="_blank"><button class='btn btn-info btn-sm' style="width:60px; height:auto !important;">Login</button></a>
    <button style="width:80px; height:auto !important;" class='
    <?php
    $status=$dir['status'];
    if($status=="PENDING")
    {
        echo "btn btn-danger btn-sm ml-1";
    }
    
    
    else
    {
    echo "btn btn-success btn-sm ml-1";    
    }
    
    
    ?>
    
    '><?php echo $dir['status'];   ?></button></td>
    
    <?php  
    $refer_id=$dir['tracking_id'];
    
    ?>
    <td data-label="Action"><button class="btn btn-dark btn-sm" style="width:60px; height:auto !important;" onclick="meta('<?php echo $refer_id;  ?>')">Check</button><button class="btn btn-success btn-sm ml-1" style="width:80px; height:auto !important;" onclick='solve("<?php echo $refer_id;  ?>")'>Solve?</button></td>
    </tr>
    <?php
    }
    }
    ?>
    
  </tbody>
</table>
       
     <script>
    function solve(token) 
    {
      if(confirm('are you sure?'))
      {
          $.ajax({
          url:'solve',
          type:'POST',
          data:{token:token},
          success:function(data)
          {
              $('body').topAlertjs({
              type: 'info',
               message: data,
                duration: 3
               
            });
           setTimeout(function(){window.location.href='support_request.php'},3000)
              
          }
          
          })
      }
      else
      {
          
      }
    }
     </script>
     

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle"></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <img src="" class="img-fluid mb-3" id="complaint" style="width:100% !important;">
       <div id="content"></div>
       <div class="mt-4"><h5 style="color:#283a5e !important">Send Reply Via Mail<i class="fa fa-reply-all ml-2"></i></h5>
       
      
       
       <div class="form-group">
       <label for="name">Subject&nbsp;<span style="color:red !important;">*</span></label>       
       <input type="text" placeholder="Subject" class="form-control" id="subject" style="border-radius:0px !important; background:white !important; color:#283a5e !important" autocomplete="off" onkeyup="func()">
       
       </div>
       
       <div class="form-group">
       <label for="name">Reply&nbsp;<span style="color:red !important;">*</span></label>       
       <textarea rows="5" placeholder="Add a reply via Email"class="form-control" style="border-radius:0px !important; height:auto !important; background:white !important; color:#283a5e !important" id="text" autocomplete="off" onkeyup="func()"></textarea>
       
       </div>
       
       
       </div>
       
       <div class="rowser mt-2 text-center w-100">
       <span id="error" style="color:red !important; margin-left:5px !important;"></span>
       
       <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin:auto;background:#fff;" width="114px" height="114px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
<defs>
  <filter id="ldio-sxh41wgslf-filter" x="-100%" y="-100%" width="300%" height="300%" color-interpolation-filters="sRGB">
    <feGaussianBlur in="SourceGraphic" stdDeviation="2.4000000000000004"></feGaussianBlur>
    <feComponentTransfer result="cutoff">
      <feFuncA type="linear" slope="10" intercept="-5"></feFuncA>
    </feComponentTransfer>
  </filter>
</defs>
<g filter="url(#ldio-sxh41wgslf-filter)"><g transform="translate(50 50)">
<g transform="rotate(153.366)">
  <circle cx="17" cy="0" r="8.28975" fill="#e15b64">
    <animate attributeName="r" keyTimes="0;0.5;1" values="3.5999999999999996;8.399999999999999;3.5999999999999996" dur="4s" repeatCount="indefinite" begin="-0.25s"></animate>
  </circle>
  <animateTransform attributeName="transform" type="rotate" keyTimes="0;1" values="0;360" dur="4s" repeatCount="indefinite" begin="0s"></animateTransform>
</g>
</g><g transform="translate(50 50)">
<g transform="rotate(315.731)">
  <circle cx="17" cy="0" r="4.0605" fill="#f47e60">
    <animate attributeName="r" keyTimes="0;0.5;1" values="3.5999999999999996;8.399999999999999;3.5999999999999996" dur="2s" repeatCount="indefinite" begin="-0.2s"></animate>
  </circle>
  <animateTransform attributeName="transform" type="rotate" keyTimes="0;1" values="0;360" dur="2s" repeatCount="indefinite" begin="-0.05s"></animateTransform>
</g>
</g><g transform="translate(50 50)">
<g transform="rotate(127.101)">
  <circle cx="17" cy="0" r="7.34935" fill="#f8b26a">
    <animate attributeName="r" keyTimes="0;0.5;1" values="3.5999999999999996;8.399999999999999;3.5999999999999996" dur="1.3333333333333333s" repeatCount="indefinite" begin="-0.15s"></animate>
  </circle>
  <animateTransform attributeName="transform" type="rotate" keyTimes="0;1" values="0;360" dur="1.3333333333333333s" repeatCount="indefinite" begin="-0.1s"></animateTransform>
</g>
</g><g transform="translate(50 50)">
<g transform="rotate(307.463)">
  <circle cx="17" cy="0" r="5.48099" fill="#abbd81">
    <animate attributeName="r" keyTimes="0;0.5;1" values="3.5999999999999996;8.399999999999999;3.5999999999999996" dur="1s" repeatCount="indefinite" begin="-0.1s"></animate>
  </circle>
  <animateTransform attributeName="transform" type="rotate" keyTimes="0;1" values="0;360" dur="1s" repeatCount="indefinite" begin="-0.15s"></animateTransform>
</g>
</g><g transform="translate(50 50)">
<g transform="rotate(136.828)">
  <circle cx="17" cy="0" r="5.44876" fill="#849b87">
    <animate attributeName="r" keyTimes="0;0.5;1" values="3.5999999999999996;8.399999999999999;3.5999999999999996" dur="0.8s" repeatCount="indefinite" begin="-0.05s"></animate>
  </circle>
  <animateTransform attributeName="transform" type="rotate" keyTimes="0;1" values="0;360" dur="0.8s" repeatCount="indefinite" begin="-0.2s"></animateTransform>
</g>
</g></g>
</svg>
       </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="send()">Send Message</button>
      </div>
    </div>
  </div>
</div>
            
            
            </div>
            
            
            <script>
            function func()
            {
                $('#error').hide();
            }
            function send()
            {
                
                var subject=$('#subject').val();
                var reply=$('#text').val();
                if(subject==0 || reply==0)
                {
                    $('#error').html('<p style="color:red !important; font-size: 16px !important;">All fields are required*</p>');
                }
                else
                {
                    $.ajax({
                    url:'sendmail',
                    type:'POST',
                    data:{subject:subject,reply:reply},
                    beforeSend:function()
                    {
                        $('svg').show();
                    },
                    success:function(data)
                    {
                        if(data="/*ok*/")
                        {
                            $('svg').hide();
                            $('#exampleModalLong').modal('toggle');
                            $('body').topAlertjs({
                            type: 'success',
                            message: 'All set! Reply has been sent!',
                            duration: 3
               
                            });
                            
                        }
                    }
                    })
                }
                
            }
            
            
            function meta(tracking_id)
            {
                $.ajax({
                url:'description',
                type:'POST',
                data:{tracking_id:tracking_id},
                dataType:'JSON',
                success:function(callback)
                {
                  var alerts=JSON.parse(JSON.stringify(callback))
                  var complaint_url=alerts.complaint_url;
                  var meta=alerts.meta;
                  var issue_type=alerts.issue_type;
                  
                  $('.modal-title').html(issue_type);
                  $('#complaint').attr('src','https://bitbud.biz/bitbud_dir/'+complaint_url);
                  $('#content').html('<h5>'+meta+'</h5>');
                  $('#exampleModalLong').modal();
                  
                }
                })
            }
            </script>
          
            
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