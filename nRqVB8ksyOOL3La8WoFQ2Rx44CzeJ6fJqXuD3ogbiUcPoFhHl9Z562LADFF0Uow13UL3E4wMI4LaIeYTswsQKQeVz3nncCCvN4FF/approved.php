<?php ini_set('display_errors',1);
session_start();
include '../dbconnection.php';
if(empty($_SESSION['admin_user']))
{
    header('location:login.php');
}
try
{
       
       $select_all=$conn->prepare("SELECT * FROM `deposited_made` WHERE `admin_action`='Approved'");
       $select_all->execute();
       $directs=$select_all->fetchAll();
       
       if(isset($_GET['submit']))
       {
           $code=$_GET['code'];
           $check=$conn->prepare("SELECT * FROM `deposited_made` WHERE `code`='$code' and `admin_action`='Approved'");
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
    <title>BitBud Limited Approved Deposits</title>
    
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
    font-size:14px;
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

@media screen and (max-width: 1200px) {
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
button.btn.btn-plus.btn-sm {
    background-color: #65275d !important;
    color: white;
}
button.btn.btn-premium.btn-sm {
    background-color: #273465 !important;
    color: white;
}
div#myModal {
    padding: 0px !important;
}
h5 {
    font-size: 15px !important;
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
.btnn2 {
    background-color: #1964b9;
    border: none;
    color: white;
    padding: 4px 8px;
    font-size: 14px;
    cursor: pointer !important;
}
a#mm2 {
    color: black !important;
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
            <h3>Approved Deposits</h3>
            <span class="ml-3 p-2">
            <div class="inner">
            <i class="fas fa-piggy-bank"></i>    
            </div>    
            </span>
            </div>
            
            
            <!--container_end-->
            </div>
            
          <?php
    if(empty($_GET['code']))
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
              
               <input type="text" placeholder="Code"  class="form-control" name="code" autocomplete="off">
               
                <button type="submit" name="submit" class="search-btn"> <i class="fa fa-search"></i>
               </button>
               <i class="fas fa-times-circle" onclick='pwroff()'></i>
               <script>
                   function pwroff()
                   {
                       window.location.href='approved.php';
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
      <th scope="col">Code</th>
      <th scope="col">Username</th>
      <th scope="col">Plan</th>
      
      <th scope="col">Value Paid</th>
      <th scope="col">Approval</th>
      <th scope="col">Coinbase Status</th>
      
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    
    if(isset($_GET['code']))
    {
        
        $s_no=1;
    foreach($directs as $dir)
    {
    ?>
    <tr>
    <td data-label="S.no"><?php echo $s_no++;   ?></td>
    <td data-label="Code"><p onclick='copyText(this)' style="text-decoration:underline; font-size:14px !important; margin-bottom:0px !important;"><?php echo $code=$dir['code'];   ?></p></td>
    <td data-label="Username"><?php echo $dir['user_id'];   ?></td>
    <td data-label="Plan"><?php echo $dir['plan'];   ?></td>
    
    <td data-label="Amount"><?php echo $dir['value_paid']." BTC";    ?></td>
    
    <td data-label="Approval"><?php echo $dir['admin_action'];    ?></td>
    <td data-label="Coinbase Status"><button style="width:100px; height:auto !important;" class='
    <?php
    $status=$dir['status'];
    if($status=="CONFIRMED")
    {
        echo "btn btn-success btn-sm";
    }
    
    ?>
    
    '><?php echo $dir['status'];   ?></button></td>
    
    
<td data-label="Admin Action">

<button class="btnn2" onclick='more("<?php echo $code; ?>")'><i class="far fa-eye"></i></button>

    
        
    </td>
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
    <td data-label="Code"><p onclick='copyText(this)' style="text-decoration:underline; font-size:14px !important; margin-bottom:0px !important;"><?php echo $code=$dir['code'];   ?></p></td>
    <td data-label="Username"><?php echo $dir['user_id'];   ?></td>
    <td data-label="Plan"><?php echo $dir['plan'];   ?></td>
    
    <td data-label="Amount"><?php echo $dir['value_paid']." BTC";    ?></td>
    
    <td data-label="Approval"><?php echo $dir['admin_action'];    ?></td>
    <td data-label="Coinbase Status"><button style="width:100px; height:auto !important;" class='
    <?php
    $status=$dir['status'];
    if($status=="CONFIRMED")
    {
        echo "btn btn-success btn-sm";
    }
    
    ?>
    
    '><?php echo $dir['status'];   ?></button></td>
    
    
<td data-label="Admin Action">

<button class="btnn2" onclick='more("<?php echo $code; ?>")'><i class="far fa-eye"></i></button>

    
        
    </td>
    </tr>
    <?php
    }
    }
    ?>
    
  </tbody>
</table>
            
    
    
    
            
            </div>
            
            <div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <span id="d1"></span>
        <span id="d2"></span>
        <span id="d3"><a href="" id="mm2" target="_blank"></a></span>
        <span id="d4"></span>
        <span id="d5"></span>
        <span id="d6"></span>
        <span id="d7"></span>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
            
            
            <script>
            
            function more(code)
            {
                $.ajax({
                url:'transaction',
                type:'POST',
                data:{code:code},
                dataType:'JSON',
                success:function(data)
                {
                    var all=JSON.parse(JSON.stringify(data))
                    var network=all.network;
                    var charge_id=all.charge_id;
                    var transaction=all.transaction;
                    var value=all.value;
                    var deposited_time=all.deposited_time;
                    var btc_addr=all.btc_addr;
                    
                    $('.modal-title').html("Transaction Details For #"+code);
                    $('#d1').html("<h5>Network- "+network+"</h5>");
                    $('#d2').html("<h5>Charge ID- "+charge_id+"</h5>");
                    $('#mm2').attr('href','https://www.blockchain.com/btc/tx/'+transaction);
                    
                    $('#mm2').html("<h5 style='text-decoration:underline;'> Transaction ID- "+transaction.substring(0, 30)+"</h5>");
                    $('#d5').html("<h5>Value- "+value+"</h5>");
                    $('#d6').html("<h5>Deposited Time- "+deposited_time+"</h5>");
                    $('#d7').html("<h5>BTC Address- "+btc_addr+"</h5>");
                    
                    $('#myModal').modal();
                    
                    
                }
                })
            }
            
          function copyText(element) {
  var range, selection, worked;

  if (document.body.createTextRange) {
    range = document.body.createTextRange();
    range.moveToElementText(element);
    range.select();
  } else if (window.getSelection) {
    selection = window.getSelection();        
    range = document.createRange();
    range.selectNodeContents(element);
    selection.removeAllRanges();
    selection.addRange(range);
  }
  
  try
  {
  document.execCommand('copy');
    $('body').topAlertjs({
                    type: 'success',
                    message: 'Code Copied Successfully!.',
                    duration: 2
               
                    });
  }
  catch (err) {
   $('body').topAlertjs({
                    type: 'error',
                    message: 'Something Wrong Went!.',
                    duration: 2
               
                    });
  }
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