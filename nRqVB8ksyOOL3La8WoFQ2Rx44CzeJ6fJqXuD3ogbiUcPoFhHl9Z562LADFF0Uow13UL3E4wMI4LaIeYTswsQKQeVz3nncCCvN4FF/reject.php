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
        
        $select_if_confirm=$conn->prepare("SELECT `admin_action` FROM `deposited_made` WHERE `code`='$code' and `admin_action`='Approved'");
        $select_if_confirm->execute();
        $select_if_confirm->fetchAll();
        if($select_if_confirm->rowCount()>0)
        {
            echo "# ".$code." Deposit Already Approved by You.";
        }
        else
        {
        
        $select_rejected=$conn->prepare("SELECT `admin_action` FROM `deposited_made` WHERE `code`='$code' and `admin_action`='Rejected'");
        $select_rejected->execute();
        $select_rejected->fetchAll();
        if($select_rejected->rowCount()>0)
        {
         echo "# ".$code." Deposit Already Rejected by You.";   
        }
        else
        {
        $update=$conn->prepare("UPDATE `deposited_made` SET `admin_action`='Rejected' WHERE `code`='$code'");
        if($update->execute())
        {
            
            $select_order=$conn->prepare("SELECT `user_id`,`transaction_id`,`code` FROM `deposited_made` WHERE `code`='$code'");
            $select_order->execute();
            $all_de=$select_order->fetchAll();
            
            foreach($all_de as $ee)
            {
                $user_id=$ee['user_id'];
                $order_id=$ee['order_id'];
                $transaction=$ee['transaction_id'];
            
            
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
           $mail->Subject = '#'.$order_id.' Rejected';

           
           
           $mail->Body.="<br>";
                
                
           $mail->Body.="We will inform you that your payments for".$order_id." is rejected by our system. below is the reasons of payments rejection-"."<br>";
                
           $mail->Body.="<br>";
                
            $mail->Body.="(1) When payment is got underpaid"."<br>";
            $mail->Body.="(2) Untrusted Wallets or network involvements."."<br>";
            $mail->Body.="(3) When Payment not received by our system.<br>";
            $mail->Body.="(4) When its effect on our rules and agreement.<br>";
            
            $mail->Body.="Transaction details is below mention-"."<br>";
                
            $mail->Body.="Charge ID- ".$charge_id."<br>";
            $mail->Body.="Transaction ID- <a href='https://www.blockchain.com/btc/tx/$transaction'>".$transaction."<br>";
            $mail->Body.="Status- Rejected<br>";
                
            $mail->Body.="<br>";
            $mail->Body.="For More Information please contact us immediately on support@bitbud.biz we will reply you within 24 hours. thankyou For visiting us.";
                
            $mail->Body.="<br>";
            $mail->Body.="<br>";
                
                
            $mail->Body.="<a href='https://bitbud.biz'><img src='https://bitbud.biz/bitbud_ext/images/logo/logo1.png' style='width:200px; height:40px;'></a>"."<br>";

             $mail->Body.="<p style='font-size:14px;'>Registered office Address<br>Dept 906, 196 High road,"."<br>"."Woodgreen,London"."<br>"."United Kingdom, N22 8HH"."</p>"."<br>";
            $mail->Body.="<p style='font-size:14px;'>Support"."<br>"."support@bitbud.biz</p>";
           
           
          


if($mail->send()) {
    
    echo "# ".$code." Deposit Rejected Successfully!";
    
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
catch(PDOException $e)
{
    echo "Connection Failed ".$e->getMessage();
}
$conn=null;
?>