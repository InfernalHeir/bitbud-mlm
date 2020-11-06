<?php ini_set('display_errors',1);
session_start();
include '../dbconnection.php';
extract($_POST);
if(empty($_SESSION['admin_user']))
{
    header('location:login.php');
}
try
{
    if(isset($_POST['subject']) && isset($_POST['reply']))
    {
        
        $subject=$_POST['subject'];
        $reply=$_POST['reply'];
        
        $email=$_SESSION['user_email'];
        $tracking_id=$_SESSION['track'];
        
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
           $mail->Subject = '#'.$tracking_id.' Ticket Open';

           
           
           $mail->Body.="<br>";
                
                
           $mail->Body.="Thanks for your patience. we really appreciate it. our team working hard regard issue. one reply came from support below mentioned-"."<br>";
                
           $mail->Body.="<br>";
                
                
            $mail->Body.="Subject- ".$subject."<br>";
            $mail->Body.="Reply- ".$reply."<br>";
            $mail->Body.="Status- Working<br>";
                
            $mail->Body.="<br>";
            $mail->Body.="For More Information please contact us immediately on support@bitbud.biz we will reply you within 24 hours. thankyou For visiting us.";
                
            $mail->Body.="<br>";
            $mail->Body.="<br>";
                
                
            $mail->Body.="<a href='https://bitbud.biz'><img src='https://bitbud.biz/bitbud_ext/images/logo/logo1.png' style='width:200px; height:40px;'></a>"."<br>";

             $mail->Body.="<p style='font-size:14px;'>Registered office Address<br>Dept 906, 196 High road,"."<br>"."Woodgreen,London"."<br>"."United Kingdom, N22 8HH"."</p>"."<br>";
            $mail->Body.="<p style='font-size:14px;'>Support"."<br>"."support@bitbud.biz</p>";
           
           
          


if($mail->send()) {
    
    echo "/*ok*/";
    unset($_SESSION['user_email']);
    unset($_SESSION['track']);
} 

else {
	echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;

}
        
    }
}
catch(PDOException $e)
{
    echo "Connection Failed ".$e->getMessage();
}
$conn=null;
?>