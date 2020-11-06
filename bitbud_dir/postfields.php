<?php ini_set('display_errors',1);
session_start();
if(empty($_SESSION['user_id']))
{
    header('location:https://bitbud.biz/bitbud_ext/login.php');
}
include '../dbconnection.php';
$hosted_url='';
$order_id='';
$success='';
extract($_POST);
try
{
    if(isset($_POST['user_id']))
    {
        $user_id=$_POST['user_id'];
        
           $order_id=rand(10000000,99999999);
           $ch = curl_init();
           $plan=$_SESSION['plan'];
           $amount=$_SESSION['amount'];
           $data=array(
           'name'=>$plan,
            'description'=>'Pay for #'.$order_id,
            'pricing_type'=>'fixed_price',
             'local_price'=>array('amount'=>$amount,'currency'=>'BTC'),
            'logo_url'=>'https://bitbud.biz/bitbud_ext/images/logo/logo1.png',
                   'redirect_url'=>"https://bitbud.biz/bitbud_dir/thankyou.php?order_id=$order_id",
                   'cancel_url'=>"https://bitbud.biz/bitbud_dir/fail.php?order_id=$order_id",
                   'metadata'=>array('Username'=>$user_id),
                    );
           $data_string = json_encode($data);
                
          curl_setopt($ch, CURLOPT_URL,"https://api.commerce.coinbase.com/charges");
          curl_setopt($ch, CURLOPT_POST, 1);
          curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);

                    
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          $header=array(
                            'Content-Type: application/json',
                            'X-CC-Api-Key:76037cfc-7a80-4971-834c-985c36266eb8',
                            'X-CC-Version: 2018-03-22'
            ); 
         curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
         $response= curl_exec($ch);
         $data=json_decode($response);
                
         $host=$data->data;
         $address=$host->addresses;
         
         /*usefull_variables*/
         
         $hosted_url=$host->hosted_url;
         $btc_address=$address->bitcoin;
         $code=$host->code;
         $created_at=$host->created_at;
         $expires_at=$host->expires_at;
         $charge_id=$host->id;
        
        /*check_if_already_exists*/
        
        $check=$conn->prepare("SELECT `user_id` FROM `deposit` WHERE `user_id`='$user_id' and `plan`='$plan' and `status`='PENDING'");
        $check->execute();
        $check->fetchAll();
        if($check->rowCount()==0)
        {
        
        /*insert_first_time*/    
        $insert=$conn->prepare("INSERT INTO `deposit`(`user_id`, `order_id`, `plan`, `amount`, `hosted_url`, `created_at`,`expires_at`, `charge_id`, `btc_address`, `code`, `status`) VALUES ('$user_id','$order_id','$plan','$amount','$hosted_url','$created_at','$expires_at','$charge_id','$btc_address','$code','PENDING')");
        if($insert->execute())
        {
            setcookie('order_id',$order_id,time()+10800,'/');
            $success= "ok";
            
        }
            
        }
        else
        {
            /*update_this*/
            
            $update=$conn->prepare("UPDATE `deposit` SET `order_id`='$order_id',amount='$amount',`hosted_url`='$hosted_url',`created_at`='$created_at',`expires_at`='$expires_at',`charge_id`='$charge_id',`btc_address`='$btc_address',`code`='$code' WHERE `user_id`='$user_id' and `plan`='$plan' and `status`='PENDING'");
            if($update->execute())
            {
                setcookie('order_id',$order_id,time()+10800,'/');
                $success= "ok";
                
            }
        }
        $callback=array('order_id'=>$order_id,'hosted_url'=>$hosted_url,'success'=>$success);
        echo json_encode($callback);
    }
}
catch(PDOException $e)
{
    echo "Connection Failed ".$e->getMessage();
}


?>