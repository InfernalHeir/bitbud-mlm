<?php ini_set('display_errors',1);
session_start();
if(empty($_SESSION['admin_user']))
{
    header('location:login.php');
}
include '../dbconnection.php';
extract($_POST);
$charge_id='';
$network='';
$transaction='';
$value='';
$btc_address='';
$deposited_time='';

try
{
    if(isset($_POST['code']))
    {
        $code=$_POST['code'];
        $select=$conn->prepare("SELECT * FROM `deposited_made` WHERE `code`='$code'");
        $select->execute();
        $all=$select->fetchAll();
        foreach($all as $e)
        {
           $charge_id=$e['charge_id'];
           $network=$e['network'];
           $transaction=$e['transaction_id'];
           $value=$e['value_paid'];
           $btc_address=$e['address'];
           $deposited_time=$e['deposited_time'];
           
           
        }
        
        $callback=array('charge_id'=>$charge_id,'network'=>$network,'transaction'=>$transaction,'value'=>$value,'btc_addr'=>$btc_address,'deposited_time'=>$deposited_time);
        echo json_encode($callback);
    }
}
catch(PDOException $e)
{
    echo "Connection Failed ".$e->getMessage();
}
$conn=null;
?>