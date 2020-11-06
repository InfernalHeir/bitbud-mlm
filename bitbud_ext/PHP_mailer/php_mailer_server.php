<?php
		
		
		
		// fist mail start
		
require 'PHPMailerAutoload.php';
include 'phpmailer/class.phpmailer.php';
include 'phpmailer/class.smtp.php';



	 


if(isset($_POST['submit']))
{


$mail = new PHPMailer;

/*$mail->SMTPDebug = true;*/                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
ini_set('max_execution_time', 300);
$mail->isSMTP();                                      // Set mailer to use SMTP
Host: 'p3plcpnl1000.prod.phx3.secureserver.net';



PORT: 25;

                              // Enable SMTP authentication
//$mail->Username = 'bhupendrabisht61049@gmail.com';                 // SMTP username
//$mail->Password = '8130270175';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;
$mail->SMTPOptions = array(
'ssl' => array(
'verify_peer' => false,
'verify_peer_name' => false,
'allow_self_signed' => true
)
);                                   // TCP port to connect to



		
     


$mail->addAddress('yournmail@123.com', 'your company');  
$mail->setFrom('yournmail@123.com', 'your company');
		
		

//$mail->addAttachment($_FILES['file']['tmp_name'],$_FILES['file']['name']);    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'subject';
/*$body=file_get_contents('html.php');
$mail->MsgHTML($body);*/




$otp=rand(100000,999999);
$mail->Body="your one time password is ".$otp;






//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
$mail->send();
//if you want to add second mail please clear first recipients then add second address
//$mail->ClearAllRecipients();

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} 

else {
	
	setcookie("otp",$otp,time()+60*60,"/");
	$user_otp=$_POST['otp'];
	if($otp==$user_otp)
	{
		echo "OTP has been Matched";
	}
	else
	{
		echo " Otp Not Matched please Try Again";
	}

    
	
}
}
?>