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
        $select_if_already=$conn->prepare("SELECT * FROM `support` WHERE `status`='SOLVED' and `tracking_id`='$token'");
        $select_if_already->execute();
        $uid=$select_if_already->fetchAll();
        if($select_if_already->rowCount()>0)
        {
            echo "#".$token." Already Solved!";
        }
        else
        {
            /*update*/
            $update=$conn->prepare("UPDATE `support` SET `status`='SOLVED' WHERE `tracking_id`='$token'");
            if($update->execute())
            {
                
            $select_if_already=$conn->prepare("SELECT * FROM `support` WHERE `status`='SOLVED' and `tracking_id`='$token'");
        $select_if_already->execute();
        $uid=$select_if_already->fetchAll();    
             foreach($uid as $er)
             {
                 
                 
                 $user_id=$er['user_id'];
                 $issue_type=$er['issue_type'];
                 $select_email=$conn->prepare("SELECT `email` FROM `user_registration` WHERE `user_id`='$user_id'");
                 $select_email->execute();
                 $em=$select_email->fetchAll();
             
                 foreach($em as $gmail)
                 {
                     $email=$gmail['email'];
                     
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
           $mail->Subject = '#'.$tracking_id.' Ticket Solved';

           
           
           $mail->Body.="<br>";
                
                
           $mail->Body.="we will inform you that Your issue has been solved by our team. we are working hard to serve better environment of our App.Thanks for your patience.-"."<br>";
                
           $mail->Body.="<br>";
                
                
            $mail->Body.="Issue type- ".$issue_type."<br>";
            $mail->Body.="Status- Solved<br>";
                
            $mail->Body.="<br>";
            $mail->Body.="For More Information please contact us immediately on support@bitbud.biz we will reply you within 24 hours. thankyou For visiting us.";
                
            $mail->Body.="<br>";
            $mail->Body.="<br>";
                
                
            $mail->Body.="<a href='https://bitbud.biz'><img src='https://bitbud.biz/bitbud_ext/images/logo/logo1.png' style='width:200px; height:40px;'></a>"."<br>";

             $mail->Body.="<p style='font-size:14px;'>Registered office Address<br>Dept 906, 196 High road,"."<br>"."Woodgreen,London"."<br>"."United Kingdom, N22 8HH"."</p>"."<br>";
            $mail->Body.="<p style='font-size:14px;'>Support"."<br>"."support@bitbud.biz</p>";
           
           
          


if($mail->send()) {
    
    echo "#".$token." Solved Sucessfully";
    
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