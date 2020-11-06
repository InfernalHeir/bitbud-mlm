<?php ini_set('display_errors',1);
session_start();
if(empty($_SESSION['user_id']))
{
    header('location:https://bitbud.biz/bitbud_ext/login.php');
}
include '../dbconnection.php';
extract($_POST);
try
{
    if(isset($_POST['amount']))
    {
        $amount=$_POST['amount'];
        $user_id=$_SESSION['user_id'];
        if(empty($amount))
        {
            echo "System error:: Invalid Amount";
        }
        else
        {
            if($amount<0.005)
            {
                echo "Minimum Withdrawal Amount is 0.005 BTC.";
            }
            else
            {
            $check_btc_address=$conn->prepare("SELECT `btc_wallet` FROM `btc` WHERE `user_id`='$user_id'");
            $check_btc_address->execute();
            $check_btc_address->fetchAll();
            if(empty($check_btc_address->rowCount()))
            {
                echo "System Error::No BTC Wallet Address Found!";
            }
            else
            {
                
                /*total_income*/
                $select_total_income=$conn->prepare("SELECT * FROM `income_status` WHERE `user_id`='$user_id'");
                $select_total_income->execute();
                $t=$select_total_income->fetchAll();
                foreach($t as $to)
                {
                    $total_income=$to['total_income'];
                    $convert_in_sathosi_total=$total_income*100000000;
                    $ini_withdrawal=$to['withdrawal'];
                    
                    $amount_also=$amount*100000000;
                    if($amount_also>$convert_in_sathosi_total)
                    {
                        echo "System Error::Insufficient Balance!";
                    }
                    else
                    {
                        
                    $now_withdrawal=$ini_withdrawal+$amount;
                    $remain_total_income=$total_income-$amount;
                    $user_id=$_SESSION['user_id'];
                    $update_withdrawals=$conn->prepare("UPDATE `income_status` SET `withdrawal`='$now_withdrawal',`total_income`='$remain_total_income' WHERE `user_id`='$user_id'");
                    if($update_withdrawals->execute())
                    {
                        
                        /*insert_on_withdrawal*/
                        date_default_timezone_set('America/New_York');
                        $currentTime = date( 'd-m-Y h:i:s A', time () );
                        $token=uniqid();
                        $insert_on_withdrawal=$conn->prepare("INSERT INTO `withdrawal_request`(`user_id`, `amount`, `token`,`processing_time`, `status`) VALUES ('$user_id','$amount','$token','$currentTime','PENDING')");
                        if($insert_on_withdrawal->execute())
                        {
                            /*mail_to_the_user*/
                            
                            $select_email_from=$conn->prepare("SELECT `email` FROM `user_registration` WHERE `user_id`='$user_id'");
                            $select_email_from->execute();
                            $all=$select_email_from->fetchAll();
                            foreach($all as $rr)
                            {
                                $email=$rr['email'];
                            }
                            include '../bitbud_ext/PHP_mailer/phpmailer/class.phpmailer.php';
                            include '../bitbud_ext/PHP_mailer/phpmailer/class.smtp.php';




                $mail = new PHPMailer;

                /*$mail->SMTPDebug = true;*/                               // Enable verbose debug output

                $mail->isSMTP();                                      // Set mailer to use SMTP
                ini_set('max_execution_time', 300);
                $mail->isSMTP();                                      // Set 
                Host: 'p3plcpnl1000.prod.phx3.secureserver.net';



                

                              
                $mail->SMTPSecure = 'ssl';                            // Enable 
                $mail->Port = 465;
                $mail->SMTPOptions = array(
                'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
                )
                );                                   // TCP port to connect to



		
     


                $mail->addAddress($email, 'BitBud Limited');  
            $mail->setFrom('support@bitbud.biz','BitBud Limited');
		
		

                //$mail->addAttachment($_FILES['file']['tmp_name'],$_FILES['file']['name']);    // Optional name
                $mail->isHTML(true);                                  // Set email format to HTML

                $mail->Subject = '#'.$token." Withdrawal Request";


                $mail->Body.="<br>";
                
                
                $mail->Body.="Your withdrawal request has been proceed successfully. your withdrawal transaction details are below mention."."<br>";
                
                $mail->Body.="<br>";
                
                
                $mail->Body.="Amount- ".$amount."<br>";
                $mail->Body.="Tracking ID- ".$token."<br>";
                $mail->Body.="Status- Processing"."<br>";
                
                 $mail->Body.="Your Account balance is".$remain_total_income.".<br>";
                
                $mail->Body.="<br>";
                $mail->Body.="Important: Do not Share this details to anyone. our staff member cannot ask for private details.";
                
                $mail->Body.="<br>";
                $mail->Body.="<br>";
                
                
                $mail->Body.="<a href='https://bitbud.biz'><img src='https://bitbud.biz/bitbud_ext/images/logo/logo1.png' style='width:200px; height:40px;'></a>"."<br>";

                $mail->Body.="<p style='font-size:14px;'>Registered office Address<br>Dept 906, 196 High road,"."<br>"."Woodgreen,London"."<br>"."United Kingdom, N22 8HH"."</p>"."<br>";
                $mail->Body.="<p style='font-size:14px;'>Support"."<br>"."support@bitbud.biz</p>";



 


                //$mail->ClearAllRecipients();

if($mail->send()) {
    echo "Woohoo! Your Withdrawal request has been processed successfully. It may take 24 hours to confirmation.";
} 

else {
	
	echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    
	
}
                            
                        }
                    }
                    
                    
                        
                        
                    }
                }
            /*total_income*/}
            
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