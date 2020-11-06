<?php ini_set('display_errors',1);
session_start();
include '../dbconnection.php';
if(empty($_SESSION['admin_user']))
{
    header('location:login.php');
}
try
{
       
       $select_all=$conn->prepare("SELECT * FROM `withdrawal_request`");
       $select_all->execute();
       $directs=$select_all->fetchAll();
       
       if(isset($_GET['submit']))
       {
           $username=$_GET['user_id'];
           $check=$conn->prepare("SELECT * FROM `withdrawal_request` WHERE `user_id`='$username'");
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
    <title>BitBud Limited Withdrawal Requests</title>
    
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
.btnn {
    background-color: #19b97b;
    border: none;
    color: white;
    padding: 4px 8px;
    font-size: 14px;
    cursor: pointer !important;
}
button.btnn1 {
    background: red;
    border: none;
    color: white;
    padding: 4px 8px;
    font-size: 14px;
    cursor: pointer !important;
}
.form-control::-moz-placeholder{
    color:#fff !important;
    opacity:1
}
.form-control:-ms-input-placeholder{
    color:#fff !important;
}

.form-control::-webkit-input-placeholder{
    color:#fff !important;
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
            <h3>Withdrawal Requests</h3>
            <span class="ml-3 p-2">
            <div class="inner">
            <i class="fas fa-university"></i>    
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
                       window.location.href='withdrawal_request.php';
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
      <th scope="col">Withdrawal Amount</th>
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
    
    <td data-label="Withdrawal Amount"><?php echo $dir['amount']." BTC";    ?></td>
    <td data-label="Processing Time"><?php echo $dir['processing_time'];    ?></td>
    
    <?php $str=rand(); 
$result = sha1($str); 
$_SESSION['result_token']=$result;
?>
    <td data-label="Status"><a href="https://bitbud.biz/bitbud_ext/login?username=<?php  echo $user_id ?>&cmd=<?php echo $result;  ?>" target="_blank"><button class='btn btn-info btn-sm' style="width:60px; height:auto !important;">Login</button></a>
    <button style="width:90px; height:auto !important;" class='
    <?php
    $status=$dir['status'];
    if($status=="PENDING")
    {
        echo "btn btn-danger btn-sm ml-1";
    }
    elseif($status=="CANCELED")
    {
        echo "btn btn-dark btn-sm ml-1";
    }
    
    else
    {
    echo "btn btn-success btn-sm ml-1";    
    }
    
    
    ?>
    
    '><?php echo $dir['status'];   ?></button></td>
    
    <?php  
    $token=$dir['token'];
    
    ?>
    <td data-label="Action"><button class="btnn" onclick='accept("<?php echo $token; ?>")'><i class="fas fa-check-circle"></i></button>
<button class="btnn1" onclick='reject("<?php echo $token; ?>")'><i class="fas fa-window-close"></i></button></td>
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
    
    <td data-label="Withdrawal Amount"><?php echo $dir['amount']." BTC";    ?></td>
    <td data-label="Processing Time"><?php echo $dir['processing_time'];    ?></td>
    
    <?php $str=rand(); 
$result = sha1($str); 
$_SESSION['result_token']=$result;
?>
    <td data-label="Status"><a href="https://bitbud.biz/bitbud_ext/login?username=<?php  echo $user_id ?>&cmd=<?php echo $result;  ?>" target="_blank"><button class='btn btn-info btn-sm' style="width:60px; height:auto !important;">Login</button></a>
    <button style="width:90px; height:auto !important;" class='
    <?php
    $status=$dir['status'];
    if($status=="PENDING")
    {
        echo "btn btn-danger btn-sm ml-1";
    }
    elseif($status=="CANCELED")
    {
        echo "btn btn-dark btn-sm ml-1";
    }
    
    else
    {
    echo "btn btn-success btn-sm ml-1";    
    }
    
    
    ?>
    
    '><?php echo $dir['status'];   ?></button></td>
    
    <?php  
    $token=$dir['token'];
    
    ?>
    <td data-label="Action"><button class="btnn" onclick='accept("<?php echo $token; ?>")'><i class="fas fa-check-circle"></i></button>
<button class="btnn1" onclick='reject("<?php echo $token; ?>")'><i class="fas fa-window-close"></i></button></td>
    </tr>
    <?php
    }
    }
    ?>
    
  </tbody>
</table>
       
     <script>
    function accept(token) 
    {
      if(confirm('are you sure? Because this is irrecoverable transaction!'))
      {
          $.ajax({
          url:'withdrawal_confimation',
          type:'POST',
          data:{token:token},
          success:function(data)
          {
              $('body').topAlertjs({
              type: 'success',
               message: data,
                duration: 3
               
            });
           setTimeout(function(){window.location.href='withdrawal_request.php'},3000);
              
          }
          
          })
      }
      else
      {
          
      }
    }
    
    function reject(token) 
    {
      if(confirm('are you sure? This is a irrecoverable transaction!'))
      {
          $.ajax({
          url:'withdrawal_rejection',
          type:'POST',
          data:{token:token},
          success:function(data)
          {
              $('body').topAlertjs({
              type: 'info',
               message: data,
                duration: 3
               
            });
           
         setTimeout(function(){window.location.href='withdrawal_request.php'},3000);
              
          }
          
          })
      }
      else
      {
          
      }
    }
     </script>
     

            
        
          
            
            </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         
         
         
         
          
          
          
          <!-- partial -->
        </div>
        <?php include 'footer.php';   ?>
        
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