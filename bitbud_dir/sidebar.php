<style>
.sidebar {
   
    
    background: #283a5e !important;
    
}    
.sidebar > .nav > .nav-item:not(.nav-profile) > .nav-link:before {
    
    display: none !important;
}
span.menu-title { 
    font-size: 15px !important;
    font-family: 'Play', sans-serif !important;

}


.sidebar > .nav:not(.sub-menu) > .nav-item:hover:not(.nav-profile):not(.hover-open) > .nav-link:not([aria-expanded="true"]) {
    background: #283a5e63 !important;
    border: none !important;
    
}
li.nav-item:hover {
    background: #004e7c !important;
}
.sidebar > .nav .nav-item:not(.hover-open) .collapse .sub-menu .nav-item .nav-link:before, .sidebar > .nav .nav-item:not(.hover-open) .collapsing .sub-menu .nav-item .nav-link:before {
    content: "";
    position: absolute;
    top: 0px;
    left: 40px !important;
    display: block;
    height: 100%;
    width: 2px;
    background: #b8cad4 !important;
}
.sidebar > .nav .nav-item:not(.hover-open) .collapse .sub-menu .nav-item .nav-link, .sidebar > .nav .nav-item:not(.hover-open) .collapsing .sub-menu .nav-item .nav-link {
    padding: 10px 0px 10px 70px !important;
    
}
.content-wrapper {
    background: #fff !important;
    font-family: 'Play', sans-serif !important;
    
}
.sidebar > .nav .nav-item .nav-link {
    
    padding: 15px 30px 15px 35px !important;
    
}
a:hover {
    color: #0056b3;
    text-decoration: none !important;
}
.loader-container{width:100%;height:100%;position:fixed;background-color:#fff;top:0;left:0;z-index:9999}
.loader-container .lds-ripple{position:relative;width:64px;height:64px;top:50%;left:50%;-webkit-transform:translate(-50%,-50%);-moz-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);-o-transform:translate(-50%,-50%);transform:translate(-50%,-50%)}
.loader-container .lds-ripple div{position:absolute;border:4px solid #004e7c;opacity:1;border-radius:50%;animation:lds-ripple 1s cubic-bezier(0,0.2,0.8,1) infinite}
.loader-container .lds-ripple div:nth-child(2){animation-delay:-0.5s}@keyframes lds-ripple{0%{top:28px;left:28px;width:0;height:0;opacity:1}100%{top:-1px;left:-1px;width:58px;height:58px;opacity:0}}

</style>
        
        
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav mt-5 pt-3">
        
            <li class="nav-item">
              <a class="nav-link" href="index.php">
                <i class="fa fa-user-circle mr-3"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="fa fa-edit mr-3"></i>
                <span class="menu-title">Manage Profile</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="edit_profile.php">Edit Profile</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="addbtc.php">Add BTC Wallet</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="change_password.php">Change Password</a>
                  </li>
                </ul>
              </div>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic2">
                <i class="fa fa-piggy-bank mr-3"></i>
                <span class="menu-title">Deposits</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic2">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="new_deposit.php">New Deposit</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="mydeposit.php">My Deposit</a>
                  </li>
                  
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="direct_team.php">
                <i class="fas fa-users mr-3"></i>
                <span class="menu-title">Direct Team</span>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic3" aria-expanded="false" aria-controls="ui-basic3">
                <i class="fas fa-file-invoice mr-3"></i>
                <span class="menu-title">Income Statements</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic3">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="referal_income.php">Referral Income</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="daliy_roi.php">Daily ROI</a>
                  </li>
                  
                </ul>
              </div>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic4" aria-expanded="false" aria-controls="ui-basic4">
                <i class="fas fa-university mr-3"></i>
                <span class="menu-title">Withdrawals</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic4">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="withdrawal.php">Make Withdrawal</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="withdrawal_history.php">Withdrawal History</a>
                  </li>
                  
                </ul>
              </div>
            </li>
            
            
                <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic5" aria-expanded="false" aria-controls="ui-basic5">
                <i class="far fa-question-circle mr-3"></i>
                <span class="menu-title">Help</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic5">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="support.php">Help Support</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="support_history.php">Support History</a>
                  </li>
                  
                </ul>
              </div>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="banner.php">
                <i class="fas fa-external-link-alt mr-3"></i>
                <span class="menu-title">Banners & Links</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">
                <i class="fas fa-sign-out-alt mr-3"></i>
                <span class="menu-title">Logout</span>
              </a>
            </li>
            
            
                
              
          </ul>
        </nav>