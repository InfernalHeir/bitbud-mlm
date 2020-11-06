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
    if(isset($_POST['token']))
    {
        $token=$_POST['token'];
        $check=$conn->prepare("SELECT `status` FROM `withdrawal_request` WHERE `token`='$token' and `status`='CANCELED'");
        $check->execute();
        $check->fetchAll();
        if($check->rowCount()>0)
        {
            echo "#$token Already Canceled!";
        }
        else
        {
            
            $check_if=$conn->prepare("SELECT `status` FROM `withdrawal_request` WHERE `token`='$token' and `status`='CONFIRM'");
        $check_if->execute();
        $check_if->fetchAll();
        if($check_if->rowCount()>0)
        {
            echo "#$token Already Confirmed!";
        }
        else
        {
            $update=$conn->prepare("UPDATE `withdrawal_request` SET `status`='CONFIRM' WHERE `token`='$token'");
            if($update->execute())
            {
                /*mail_to_the_user*/
            $select_all=$conn->prepare("SELECT * FROM `withdrawal_request` WHERE `token`='$token'");
            $select_all->execute();
            $all=$select_all->fetchAll();
            foreach($all as $now)
            {
                $user_id=$now['user_id'];
            }
            
            $select_email=$conn->prepare("SELECT `email` FROM `user_registration` WHERE `user_id`='$user_id'");
                            $select_email->execute();
                            $em=$select_email->fetchAll();
                            foreach($em as $me)
                            {
                                $email=$me['email'];
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
           $mail->Subject = '#'.$token.' Withdrawal Confirmed';

           
           
           $mail->Body.="<br>";
                
                
           $mail->Body.="We will inform you that your withdrawal request has been Confirmed by our system. Thankyou for your patience."."<br>";
                
            $mail->Body.="<br>";
            $mail->Body.="<br>";
            
            $mail->Body.="For More Information please contact us immediately on support@bitbud.biz we will reply you within 24 hours. thankyou For visiting us.";
                
            $mail->Body.="<br>";
            $mail->Body.="<br>";
                
                
            $mail->Body.="<a href='https://bitbud.biz'><img src='https://bitbud.biz/bitbud_ext/images/logo/logo1.png' style='width:200px; height:40px;'></a>"."<br>";

             $mail->Body.="<p style='font-size:14px;'>Registered office Address<br>Dept 906, 196 High road,"."<br>"."Woodgreen,London"."<br>"."United Kingdom, N22 8HH"."</p>"."<br>";
            $mail->Body.="<p style='font-size:14px;'>Support"."<br>"."support@bitbud.biz</p>";
           
           
          


if($mail->send()) {
    
    echo "#$token Confirmed Successfully!.";
    
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
catch(PDOException $e)
{
    echo "Connection Failed ".$e->getMessage();
}
$conn=null;

?>