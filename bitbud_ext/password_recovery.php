<?php ini_set('display_errors',1);
session_start();
include '../dbconnection.php';
include 'PHP_mailer/phpmailer/class.phpmailer.php';
include 'PHP_mailer/phpmailer/class.smtp.php';
extract($_POST);
try
{
    if(isset($_POST['username']))
    {
        $username=$_POST['username'];
        if(empty($username))
        {
            echo "System error::Invalid Details";
        }
        else
        {
            /*check_this_username*/
            $username=$_POST['username'];
            $check=$conn->prepare("SELECT * FROM `user_registration` WHERE `user_id`='$username'");
            $check->execute();
            $fetch_email=$check->fetchAll();
            if($check->rowCount()==0)
            {
                echo "System error::Given username not exist.";
            }
            else
            {
                /*fire_the_mail_over_here*/
                
                
                $mail = new PHPMailer;



             $mail->isSMTP();    
             ini_set('max_execution_time', 300);
             $mail->isSMTP();                                      
             Host: 'mail.bitbud.biz';



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
            
           foreach($fetch_email as $email_an)
           {
               $email=$email_an['email'];
           }
           $mail->addAddress($email, 'Bitbud.biz');  
           $mail->setFrom('support@bitbud.biz', 'Bitbud.biz');
	       $mail->isHTML(true);                                 
           $mail->Subject = "Reset Password link";

         
           $mail->Body.="Your one time reset password link is below. do not share it to anyone to avoid  fraud activities. our staff member cannot demand for it or any type of security pin."."<br>";
           
           $mail->Body.="<strong>Please Note:-</strong> This link will be expire within 20 minutes and will be open on same device which he/she generate password recovery link."."<br>";
                
           $mail->Body.="<br>";
           $str = rand(); 
           
           $token = hash("sha256", $str);
           $_SESSION['token']=$token;
           $link="https://bitbud.biz/bitbud_ext/change-password?username=$username&token=$token";
           $mail->Body.="reset link- ".$link."<br>";    
           
            
                
           $mail->Body.="For More Information please contact us immediately on support@bitbud.biz we will reply you within 24 hours. thankyou For visiting us.";
                
            $mail->Body.="<br>";
            $mail->Body.="<br>";
                
                
            $mail->Body.="<a href='https://bitbud.biz'><img src='https://bitbud.biz/bitbud_ext/images/logo/logo1.png' style='width:200px; height:40px;'></a>"."<br>";

             $mail->Body.="<p style='font-size:14px;'>Registered office Address<br>Dept 906, 196 High road,"."<br>"."Woodgreen,London"."<br>"."United Kingdom, N22 8HH"."</p>"."<br>";
            $mail->Body.="<p style='font-size:14px;'>Support"."<br>"."support@bitbud.biz</p>";
                
            if($mail->send())
            {
                echo "Link has been sent on your Registered Email Id!.";
            }
            else
            {
                	echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
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