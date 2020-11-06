<?php ini_set('display_errors',1);
session_start();
if(empty($_SESSION['admin_user']))
{
    header('location:login.php');
}
include '../dbconnection.php';
extract($_POST);
try
{
    if(isset($_POST['code']))
    {
        $code=$_POST['code'];
        
        $select_if_already_confirmed=$conn->prepare("SELECT `admin_action` FROM `deposited_made` WHERE `code`='$code' and `admin_action`='Approved'");
        $select_if_already_confirmed->execute();
        $select_if_already_confirmed->fetchAll();
        if($select_if_already_confirmed->rowCount()>0)
        {
            echo "# ".$code." Deposit Already Approved By You!";
        }
        else
        {
            $if_already_rejected=$conn->prepare("SELECT `admin_action` FROM `deposited_made` WHERE `code`='$code' and `admin_action`='Rejected'");
            $if_already_rejected->execute();
            $if_already_rejected->fetchAll();
            if($if_already_rejected->rowCount()>0)
            {
                echo "# ".$code." Deposit Already Rejected By You!";
            }
            else
            {
                
                /*Now_updates*/
                
                $update=$conn->prepare("UPDATE `deposited_made` SET `admin_action`='Approved' WHERE `code`='$code'");
                if($update->execute())
                {
                    
                    $select=$conn->prepare("SELECT * FROM `deposited_made` WHERE `code`='$code' LIMIT 1");
                    $select->execute();
                    $now=$select->fetchAll();
                    
                    foreach($now as $ok)
                    {
                        $user_id=$ok['user_id'];
                        $plan=$ok['plan'];
                        $amount=$ok['value_paid'];
                        $order_id=$ee['order_id'];
                        $transaction=$ee['transaction_id'];
                    
                    
                    $update_activation=$conn->prepare("UPDATE `user_registration` SET `status`='Activated' WHERE `user_id`='$user_id'");
                    if($update_activation->execute())
                    {
                     
                    $udpate_direct=$conn->prepare("UPDATE `direct_team` SET `pack`='$plan',`amount`='$amount',`status`='Activated' WHERE `downline_user_id`='$user_id'");
                    if($udpate_direct->execute())
                    {
                    
                    /*now_all_things_ok_mail_now*/
                    
                    $select=$conn->prepare("SELECT `email` FROM `user_registration` WHERE `user_id`='$user_id'");
            $select->execute();
            $ok=$select->fetchAll();
            foreach($ok as $ii)
            {
                $email=$ii['email'];
            }
                    
                    
            include '../bitbud_ext/PHP_mailer/phpmailer/class.phpmailer.php';
             include '../bitbud_ext/PHP_mailer/phpmailer/class.smtp.php';

              $mail = new PHPMailer;



             $mail->isSMTP();    
             ini_set('max_execution_time', 300);
             $mail->isSMTP();                                      
             Host: 'p3plcpnl1000.prod.phx3.secureserver.net';



             PORT: 25;
             $mail->SMTPSecure = 'ssl';                            
             $mail->Port = 465;
             $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
            );                      
            
           $mail->addAddress($email, 'Bitbud.biz');  
           $mail->setFrom('support@bitbud.biz', 'Bitbud.biz');
	       $mail->isHTML(true);                                 
           $mail->Subject = '#'.$order_id.' Approved';

           
           
           $mail->Body.="<br>";
                
                
           $mail->Body.="We will inform you that your payments for".$order_id." is Approved by our system. Below is your transaction Details-"."<br>";
                
           $mail->Body.="<br>";
                
            
            $mail->Body.="Plan- ".$plan."<br>";
            $mail->Body.="Deposited Amount- ".$amount."<br>";
            $mail->Body.="Charge ID- ".$charge_id."<br>";
            $mail->Body.="Transaction ID- <a href='https://www.blockchain.com/btc/tx/$transaction'>".$transaction."<br>";
            $mail->Body.="Status- Approved<br>";
                
            $mail->Body.="<br><br>";
            $mail->Body.="Thankyou for your Deposit. Best regards from team BiTBuD";
                
            $mail->Body.="<br>";
            $mail->Body.="<br>";
                
                
            $mail->Body.="<a href='https://bitbud.biz'><img src='https://bitbud.biz/bitbud_ext/images/logo/logo1.png' style='width:200px; height:40px;'></a>"."<br>";

             $mail->Body.="<p style='font-size:14px;'>Registered office Address<br>Dept 906, 196 High road,"."<br>"."Woodgreen,London"."<br>"."United Kingdom, N22 8HH"."</p>"."<br>";
            
           
           
          


if($mail->send()) {
    
    echo "# ".$code." Deposit Approved Successfully!";
    
} 

else {
	echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;

}
            
        }
                    
                    
                    
                    
                        
                    }
                    
                    
                    }
                    
                }
                
                
            }
            
            
        }
        
        
    }
}
catch(PDOException $e)
{
    echo "Connection Failed ".$e->getMessage();
}
$conn=null;
?>