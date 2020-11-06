<?php ini_set('display_errors',1);

include '../dbconnection.php';
try
{
        
    
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
@media(max-width:375px)
{
    h3 {
    font-size: 18px !important;
    margin-top: 2% !important;
}
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
                <img class="img-xs rounded-circle" src='assets/images/man.png' alt="Profile image"> </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center" style="background: #283a5e; padding: 5px 0px 5px 15px !important;">
                  <h4 class="text-left" style="color: #fff;">Admin</h4>
                  <h6 class="text-left" style="color: #fff;">online</h6>
                  
                </div>
                
                
                <a href="change-credentials.php" class="dropdown-item"><i class="fa fa-user" style="font-size: 12px;"></i>Change Password</a>
                <a href="logout.php" class="dropdown-item"><i class="fas fa-sign-out-alt" style="font-size: 12px;"></i>Logout</a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      