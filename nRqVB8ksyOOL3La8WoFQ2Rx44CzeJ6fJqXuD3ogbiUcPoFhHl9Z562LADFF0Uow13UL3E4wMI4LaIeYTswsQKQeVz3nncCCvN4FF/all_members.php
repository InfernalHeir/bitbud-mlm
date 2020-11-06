<?php ini_set('display_errors',1);
session_start();
include '../dbconnection.php';
if(empty($_SESSION['admin_user']))
{
    header('location:login.php');
}
try
{
       
       $select_all=$conn->prepare("SELECT * FROM `user_registration`");
       $select_all->execute();
       $directs=$select_all->fetchAll();
       
       if(isset($_GET['submit']))
       {
           $username=$_GET['user_id'];
           $check=$conn->prepare("SELECT * FROM `user_registration` WHERE `user_id`='$username'");
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
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BitBud Limited All Members</title>
    
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
    font-size: inherit !important;
    
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
    border: none !important;
    font-size: 20px;
}
input.form-control {
    border-radius: 0px !important;
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
            <h3>All Members</h3>
            <span class="ml-3 p-2">
            <div class="inner">
            <i class="fas fa-users"></i>    
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
                       window.location.href='all_members.php';
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
      <th scope="col">Password</th>
      <th scope="col">Mobile No.</th>
      <th scope="col">Registration Date</th>
      <th scope="col">Action</th>
      <th scope="col">Status</th>
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
    <td data-label="Username"><?php echo $dir['user_id'];   ?></td>
    
    <td data-label="Password"><?php echo $dir['password'];    ?></td>
    
    <td data-label="Mobile No."><?php $mob=$dir['mobile_no']; if(empty($mob)){echo "NULL";} else{echo $dir['mobile_no'];}   ?></td>
    
    <td data-label="Registration Date"><?php echo $dir['registration_date'];   ?></td>
    <td data-label="Action"><button class='<?php $banning_status=$dir['banning_status']; if($banning_status=="Unbanned"){echo "btn btn-info btn-sm";}else{ echo "btn btn-dark btn-sm";}   ?>' style="width:110px; height:auto !important;" onclick='ban("<?php echo $user_id;  ?>")'><?php $banning_status=$dir['banning_status']; if($banning_status=="Unbanned"){echo "Banned Him";}else{ echo "Unbanned Him";}   ?></button></td>
    <td data-label="Status"><button style="width:110px; height:auto !important;" class='
    <?php
    $status=$dir['status'];
    if($status=="Unactivated")
    {
        echo "btn btn-danger btn-sm";
    }
    
    
    else
    {
    echo "btn btn-success btn-sm";    
    }
    
    
    ?>
    
    '><?php echo $dir['status'];   ?></button></td>
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
    
    <td data-label="Password"><?php echo $dir['password'];    ?></td>
    
    <td data-label="Mobile No."><?php $mob=$dir['mobile_no']; if(empty($mob)){echo "NULL";} else{echo $dir['mobile_no'];}   ?></td>
    
    <td data-label="Registration Date"><?php echo $dir['registration_date'];   ?></td>
    <td data-label="Action"><button class='<?php $banning_status=$dir['banning_status']; if($banning_status=="Unbanned"){echo "btn btn-info btn-sm";}else{ echo "btn btn-dark btn-sm";}   ?>' style="width:110px; height:auto !important;" onclick='ban("<?php echo $user_id;  ?>")'><?php $banning_status=$dir['banning_status']; if($banning_status=="Unbanned"){echo "Banned Him";}else{ echo "Unbanned Him";}   ?></button></td>
    <td data-label="Status"><button style="width:110px; height:auto !important;" class='
    <?php
    $status=$dir['status'];
    if($status=="Unactivated")
    {
        echo "btn btn-danger btn-sm";
    }
    
    
    else
    {
    echo "btn btn-success btn-sm";    
    }
    
    
    ?>
    
    '><?php echo $dir['status'];   ?></button></td>
    </tr>
    <?php
    }
    }
    ?>
    
  </tbody>
</table>
            
            
            </div>
            
            <script>
            function ban(user_id)
            {
                $.ajax({
                url:'banned',
                type:'POST',
                data:{user_id:user_id},
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
                    setTimeout(function(){window.location.href="all_members.php"},3000);
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