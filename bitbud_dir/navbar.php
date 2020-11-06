<?php ini_set('display_errors',1);

include '../dbconnection.php';
try
{
        $user_id=$_SESSION['user_id'];
       $all_details=$conn->prepare("SELECT * FROM `user_registration` WHERE `user_id`='$user_id'");
       $all_details->execute();
       $fetchAll=$all_details->fetchAll();
    
}
catch(PDOException $e) 
{
    echo "Connection Failed ".$e->getMessage();
}
$conn=null;
?>

<link href="https://fonts.googleapis.com/css?family=Play&display=swap" rel="stylesheet">
<style>
body
{
    font-family: 'Play', sans-serif !important;
}
ul.navbar-nav {
    margin-left: auto !important;
} 
a.dropdown-item {
    cursor: pointer !important;
}
a.dropdown-item:hover {
    background-color: #004e7c45 !important;
    color: #004e7c !important;
}
.navbar-menu-wrapper.d-flex.align-items-center {
    box-shadow: none !important;
}
.dropdown-menu.dropdown-menu-right.navbar-dropdown.show {
    font-family: 'Play', sans-serif !important;
}
.navbar.default-layout .navbar-brand-wrapper {
  
    background: #fff !important;
   
}
p.mb-1.mt-3.font-weight-semibold {
    color: #283a5e !important;
}
p.mb-1.font-weight-semibold {
    color: #283a5e !important;
}
p.font-weight-light.text-muted.mb-0 {
    color: #283a5e !important;
    font-weight: 600 !important;
}
a.dropdown-item {
    color: #283a5e !important;
}
@media (max-width: 992px)
{
.dropdown-menu.dropdown-menu-right {
    right: 0 !important;
    left: auto !important; 
}
}
.navbar-toggler {
    
    line-height: 0 !important;
    
}

li.nav-item.dropdown.d-xl-inline-block.user-dropdown:hover {
    background-color: transparent !important;
}
.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
    font-family: 'Play', sans-serif !important;
    
}
.form-control {
    height: 45px !important;
    font-family: 'Play', sans-serif !important;
    border-color: #283a5e70 !important;
    font-size:14px !important;
}
.btn {
    min-width: auto !important;
    height: 45px !important;
    font-family: 'Play', sans-serif !important;
    font-size:12px !important;
}

.custom-file-label::after {
    color: #fff !important;
    content: "Browse";
    background-color: #283a5e !important;
    height: 45px !important;
    padding: 0.650rem 0.75rem !important;
    cursor:pointer;
} 
.custom-file-input:focus ~ .custom-file-label {
    border-color: #283a5e !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
}

label.custom-file-label {
    height: 45px !important;
}    
.form-control:focus {
    color: #495057;
    border-color: #283a5e70 !important;
    background-color: #fff;
    outline: 0;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border-color: #283a5e70 !important;
}
.form-control:disabled, .form-control[readonly] {
    background-color: #fff;
    opacity: 1;
    border-color: #283a5e70 !important;
}
</style>


<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row shadow bg-white">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
          <a class="navbar-brand brand-logo" href="index.php">
            <img src="https://bitbud.biz/bitbud_ext/images/logo/logo1.png" alt="logo" style="width:250px;" /> </a>
            
          <a class="navbar-brand brand-logo-mini" href="index.php">
            <img src="https://bitbud.biz/bitbud_dir/assets/images/small.png" alt="logo" /> </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
          <ul class="navbar-nav">
           
            
          
          
            <li class="nav-item dropdown d-xl-inline-block user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle" src='<?php foreach($fetchAll as $img){ echo $img['avatar'];}   ?>' alt="Profile image"> </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src='<?php foreach($fetchAll as $img){ echo $img['avatar'];}   ?>' alt="Profile image">
                  <p class="mb-1 mt-3"><?php foreach($fetchAll as $img){ echo "#".$img['user_id'];}   ?></p>
                  <p class="mb-1"><?php foreach($fetchAll as $img){ echo $img['fullname'];}   ?></p>
                  <p class="font-weight-light mb-0"><?php foreach($fetchAll as $img){ echo $img['email'];}   ?></p>
                </div>
                
                
                <a class="dropdown-item"><?php foreach($fetchAll as $img){ echo $img['status'];}   ?><i class="dropdown-item-icon ti-power-off"></i></a>
                <a class="dropdown-item">My Profile<i class="dropdown-item-icon ti-power-off"></i></a>
                <a class="dropdown-item">Logout<i class="dropdown-item-icon ti-power-off"></i></a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="ffcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      