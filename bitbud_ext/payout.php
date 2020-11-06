<?php ini_set('display_errors',1);
include '../dbconnection.php';
$select_payout=$conn->prepare("SELECT * FROM `show_transaction` order by `id` DESC");
$select_payout->execute();
$all=$select_payout->fetchAll();



?>
 
 
 <!DOCTYPE html>
<html lang="zxx">


<?php include("headpart/head.php");
?>
<body>
  
<?php include("headpart/header.php");
?> 
  
<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content">
                    <div class="breadcrumb-inner">
                        <h2 class="breadcrumb__title">Payout.</h2>
                        <ul class="breadcrumb__list">
                            <li class="active__list-item"><a href="index.php">home</a></li>
                           
                            <li>Payout.</li>
                        </ul>
                    </div><!-- end breadcrumb-inner -->
                    <div class="text-outline">PAYOUT.</div>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end hero-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->
<style>
.transaction {
  background: #3B2039;
  position: relative;
  overflow: hidden;
  padding: 114px 0 105px;
  z-index: 2; }
  .transaction:after {
    background: url(../img/banner-bg.png) bottom no-repeat;
    background-size: 100%;
    position: absolute;
    content: '';
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    z-index: -1; }
  .transaction .section-title {
    margin-bottom: 57px; }
    
    .transaction .section-title p {
      color: #fff; }
  .transaction .transaction-area .nav-tabs {
    border-bottom: none;
    display: -webkit-inline-box;
    display: -ms-inline-flexbox;
    display: inline-flex;
    position: relative;
    left: 50%;
    margin-left: -156px;
    margin-bottom: 40px;
    height: 50px;
    border-radius: 6px; }
    .transaction .transaction-area .nav-tabs .nav-item .nav-link {
      display: inline-block;
      color: #fff;
      background: transparent;
      font-weight: 600;
      font-size: 16px;
      padding: 14px 0;
      text-align: center;
      width: 140px;
      border-color: #fff;
      border-radius: 6px 6px 6px 6px;
      -webkit-transition: all 0.3s ease-in;
      -moz-transition: all 0.3s ease-in;
      -o-transition: all 0.3s ease-in;
      transition: all 0.3s ease-in; }
      .transaction .transaction-area .nav-tabs .nav-item .nav-link:hover, .transaction .transaction-area .nav-tabs .nav-item .nav-link.active {
        background: #fff;
        color: #91039f; }
    .transaction .transaction-area .nav-tabs .nav-item:last-child .nav-link {
      border-radius: 0 6px 6px 0; }
  .transaction .transaction-area .tab-content .table {
    -webkit-box-shadow: 0px 0px 250px 0px rgba(69, 81, 100, 0.1);
    box-shadow: 0px 0px 250px 0px rgba(69, 81, 100, 0.1);
    position: relative;
    border-radius: 10px;
    overflow: hidden; }
    .transaction .transaction-area .tab-content .table:after {
      position: absolute;
      content: '';
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background: #fff;
      opacity: .1;
      z-index: -1; }
    .transaction .transaction-area .tab-content .table thead {
      position: relative; }
      .transaction .transaction-area .tab-content .table thead:after {
        position: absolute;
        content: '';
        left: 0;
        top: 0;
        width: 100%;
        height: 80px;
        background: #fff;
        opacity: .03; }
      .transaction .transaction-area .tab-content .table thead th {
        border: none;
        padding: 23px 15px;
        font-size: 20px;
        font-weight: 500;
        color: #fff; }
        .transaction .transaction-area .tab-content .table thead th:first-child {
          padding-left: 38px; }
      .transaction .transaction-area .tab-content .table thead td {
        padding: 15px 0; }
    .transaction .transaction-area .tab-content .table tbody tr:first-child th {
      padding-top: 33px; }
    .transaction .transaction-area .tab-content .table tbody tr:first-child td {
      padding-top: 47px; }
    .transaction .transaction-area .tab-content .table tbody tr:last-child th {
      padding-bottom: 30px; }
    .transaction .transaction-area .tab-content .table tbody tr th {
      border-top: none;
      padding-left: 40px; }
      .transaction .transaction-area .tab-content .table tbody tr th .user-img {
        width: 50px;
        height: 50px;
        border-radius: 50px;
        overflow: hidden;
        margin-right: 20px; }
        .transaction .transaction-area .tab-content .table tbody tr th .user-img img {
          width: 100%; }
      .transaction .transaction-area .tab-content .table tbody tr th span {
        font-size: 16px;
        color: #fff;
        padding-top: 15px;
        font-weight: 500; }
    .transaction .transaction-area .tab-content .table tbody tr td {
      padding: 28px 15px;
      border-top: none;
      color: #fff;
      font-size: 16px; }
      .transaction .transaction-area .tab-content .table tbody tr td:last-child {
        padding-right: 40px; }

</style>


<!--  affiliated  end  -->				  

<style>
    .ctn-bannerRight m{
    color: #fff;
    width: 170px;
    text-align: center;
    display: inline-block;
    border: 1px solid #fff;
    padding: 13px 0;
    border-radius: 72px;
    position: relative;
    font-weight: 500;
    background:  orange;
    margin-right: 16px;
    margin-top: 20px;
    }
     .ctn-bannerRight m:hover{
          background: #fff;
           border: 1px solid yellow;
          color: orange;
     }
    
</style>
																				


        <!-- transaction begin-->
        <div class="transaction">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="section-title text-center">
                            <h2>Latest<span> Transaction</span></h2>
                            <p>Put your investing ideas into action with full range of investments.
                                Enjoy real benefits and rewards on your accrue investing.</p>
                        </div>
                    </div>
                </div>
                                <div class="ctn-bannerRight zoomIn wow" style="padding-bottom: 30px; text-align: center;">
									 <m>PAYOUT</m>
										
									</div>
                <div class="row">
                      
                    <div class="col-xl-12 col-lg-12">
                        <div class="transaction-area">
                           
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="deposit" role="tabpanel" aria-labelledby="home-tab">
        
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Username</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Currency</th>
                                                <th scope="col">Transection-Id</th>
                                                <th scope="col">Verify</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>  
                                        <tr>
                                        <?php
                                        foreach($all as $value)
                                        {
                                            ?>
                                    <td><?php echo $value['user_id'];  ?></td>
                                    <td><?php echo $value['transaction_date'];  ?></td>
                                    <td><?php echo $value['btc_amount']." BTC";  ?></td>
                                    <td><?php echo "BTC";  ?></td>
                                    <td>
                                    <?php $transaction=$value['transaction_id'];  ?>    
                                     <a href="https://www.blockchain.com/btc/tx/<?php echo $transaction;  ?>" target='_blank'>   
                                    <?php 
                                    echo substr($transaction,0,20);  ?></a></td>
                                    
                                    
                                    <td><a href='https://www.blockchain.com/btc/tx/<?php echo $transaction;  ?>' target='_blank'><button class="btn btn-danger">Verify</button></a></td>
                                            <?php
                                        }
                                        ?>
                                        </tr>
                                                
                                        </tbody>
                                    </table>
        
                                </div>
                               
                                <!--<button class="btn btn-danger float-right" ><a href="" style="color: #fff;">More...</a></button>-->
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- transaction end -->



<?php include("headpart/footer.php");
?>
    
</body>



</html>