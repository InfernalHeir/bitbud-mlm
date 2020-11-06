<?php ini_set('display_errors',1);
session_start();
if(empty($_SESSION['user_id']))
{
    header('location:https://bitbud.biz/bitbud_ext/login.php');
}
include '../dbconnection.php';
extract($_POST);
$btc_value='';
$plan='';
$amount='';
$error='';


try
{
    if(isset($_POST['plan']) && isset($_POST['amount']))
    {
        $plan=$_POST['plan'];
        $amount=$_POST['amount'];
        $user_id=$_SESSION['user_id']; 
        
        if(empty($plan) || empty($amount))
        {
          $error="System Error::Invalid token";    
        }
        else
        {
            
        /*check_plan*/
        if($plan=="PLUS PLAN")
        {
            if($amount<0.000001)
            {
            $error="System Error::Minimum Investment for PLUS PLAN is 0.001 BTC";
            }
            else
            {
                $btc_value=$amount*300/100;
                $_SESSION['plan']=$plan;
                $_SESSION['amount']=$amount;
                if(isset($_SESSION['plan']) && isset($_SESSION['amount']))
                {
                    $error="ok";
                }
                
                
                
            /*else_end*/}
        }
        
        elseif($plan=="PREMIUM PLAN")
        {
          
            if($amount<0.1)
            {
            $error="System Error::Minimum Investment for PREMIUM PLAN is 0.1 BTC";
            }
            else
            {
                $btc_value=$amount*600/100;
                $_SESSION['plan']=$plan;
                $_SESSION['amount']=$amount;
                if(isset($_SESSION['plan']) && isset($_SESSION['amount']))
                {
                $error="ok";
                }
       
                
                    
                    
                    
                    
                }
            }
            
        }
        
        /*make_array_over_here*/
        $callback=array('plan'=>$plan,'amount'=>$amount,'btc_value'=>$btc_value,'error'=>$error);
        echo json_encode($callback);
        }
        
    
        
        
        
}
catch(PDOException $e)
{
    echo "Connection Failed ".$e->getMessage();
}
$conn=null;
?>