<?php ini_set('display_errors',1);
session_start();
if(empty($_SESSION['admin_user']))
{
    header("location:login.php");
}
include '../dbconnection.php';
extract($_POST);
$order_id='';
$charge_id='';
$created_at='';
$expire_at='';
$btc_addr='';

try
{
if(isset($_POST['code']))
{
    $code=$_POST['code'];
    $select_all=$conn->prepare("SELECT * FROM `deposit` WHERE `code`='$code'");
    $select_all->execute();
    $all=$select_all->fetchAll();
    
    foreach($all as $a)
    {
       $order_id=$a['order_id'];
       $charge_id=$a['charge_id'];
       $created_at=$a['created_at'];
       $expire_at=$a['expires_at'];
       $btc_addr=$a['btc_address'];
       
       
    }
    

    
}
$callback=array('order_id'=>$order_id,'charge_id'=>$charge_id,'created_at'=>$created_at,'expire_at'=>$expire_at,'btc_addr'=>$btc_addr);
echo json_encode($callback);
}
catch(PDOException $e)
{
    echo "Connection Failed ".$e>getMessage();
}
$conn=null;
?>