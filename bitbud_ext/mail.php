<?php ini_set('display_errors',1);
session_start();
extract($_POST);
include 'PHP_mailer/phpmailer/class.phpmailer.php';
include 'PHP_mailer/phpmailer/class.smtp.php';

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['subject']) && isset($_POST['message']))
{
    
              
              $name=$_POST['name'];
              $email=$_POST['email'];
              $phone=$_POST['phone'];
              $subject=$_POST['subject'];
              $message=$_POST['message'];

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
            
           $mail->addAddress('support@bitbud.biz', 'Bitbud.biz');  
           $mail->setFrom($email, 'Bitbud.biz');
	       $mail->isHTML(true);                                 
           $mail->Subject = $subject;

         
           $mail->Body.="The Customer Query generated by system. below is the details of customer issue-"."<br>";
                
           $mail->Body.="<br>";
           $mail->Body.="Contacted Person Name- ".$name."<br>";    
           $mail->Body.="Contacted Person Email- ".$email."<br>";
            $mail->Body.="Contacted Person Mobile- ".$phone."<br>";
            $mail->Body.="Subject- ".$subject."<br>";
            $mail->Body.="Message- ".$message."<br>";
            
                
            $mail->Body.="<br>";
            
                
                
            $mail->Body.="<a href='https://bitbud.biz'><img src='https://bitbud.biz/bitbud_ext/images/logo/logo1.png' style='width:200px; height:40px;'></a>"."<br>";

           
           
          


         if($mail->send()) {
    
            $mail->ClearAllRecipients( );
           $mail->addAddress($email, 'Bitbud.biz');  
           $mail->setFrom('support@bitbud.biz', 'Bitbud.biz');
	       $mail->isHTML(true);                                 
           $mail->Subject = $subject;

           
           $mail->Body="Dear ".$name."<br>";
           $mail->Body.="<br>";
                
                
           $mail->Body.="Thanks for being awesome! -"."<br>";
           $mail->Body.="We have received your message and would like to thank you for writing to us. If your inquiry is urgent, please use the telephone number listed below to talk to one of our staff members. Otherwise, we will reply by email as soon as possible."."<br>";
                
           $mail->Body.="<br>";
                
                
            $mail->Body.="Talk to you soon,"."<br>";
            
                
            $mail->Body.="<br>";
            $mail->Body.="For More Information please contact us immediately on support@bitbud.biz we will reply you within 24 hours. thankyou For visiting us.";
                
            $mail->Body.="<br>";
            $mail->Body.="<br>";
                
                
            $mail->Body.="<a href='https://bitbud.biz'><img src='https://bitbud.biz/bitbud_ext/images/logo/logo1.png' style='width:200px; height:40px;'></a>"."<br>";

             $mail->Body.="<p style='font-size:14px;'>Registered office Address<br>Dept 906, 196 High road,"."<br>"."Woodgreen,London"."<br>"."United Kingdom, N22 8HH"."</p>"."<br>";
            $mail->Body.="<p style='font-size:14px;'>Support"."<br>"."support@bitbud.biz</p>";
    
    if($mail->send())
    {
         echo "Thank You for contacting us. We will shortly notify you.";
    }
   
    
} 

else {
	echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;

}
    
    
}


?>