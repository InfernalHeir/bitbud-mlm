<?php
session_start();
include '../dbconnection.php';
extract($_POST);
try
{
    if(isset($_POST['sponser_id']) && isset($_POST['username']) || isset($_POST['mobile_no']) && isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['country']) && isset($_POST['password']) && isset($_POST['con_pass']))
    {
    $user_id=$_POST['username'];
    
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $fullname=$first_name." ".$last_name;
    $email=$_POST['email'];
    $country=$_POST['country'];
    $password=$_POST['password'];
    $con_pass=$_POST['con_pass'];
    
    $mobile_no=$_POST['mobile_no'];
    if(empty($mobile_no))
    {
        $mobile_no=NULL;
    }
    else
    {
        $mobile_no=$_POST['mobile_no'];
    }
    
    if($user_id=='0' || $first_name=='0' || $last_name=='0' || $email=='0' || $country=="-Select Country-" || $password=='0')
    {
    echo "Whoops! Invalid Details!";

    }
    elseif(strlen($password)<8)
    {
        echo "Whoops! Password must be minimum 8 Characters.";
    }
    
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo("$email is not a valid email address");
    } 
    elseif($password!=$con_pass)
    {
        echo "Whoops! Password Not Matched.";
    }
    else
    {
    $check_if_user_id=$conn->prepare("SELECT `user_id` FROM `user_registration` WHERE `user_id`='$user_id'");
    $check_if_user_id->execute();
    $check_if_user_id->fetchAll();
    if($check_if_user_id->rowCount()>0)
    {
    echo "Whoops! This Username is Already Taken!";
    }
    else
    {
        $_SESSION['user_id']=$user_id;
        $_SESSION['password']=$password;
    
    
        $actual=str_replace(' ','',$_POST['sponser_id']);
        $check_referel_code=$conn->prepare("SELECT `user_id` FROM `user_registration` WHERE `user_id`='$actual'");
        $check_referel_code->execute();
        $check_referel_code->fetchAll();
        $row=$check_referel_code->rowCount();
        
        if($check_referel_code->rowCount()>0 || empty($actual))
    {
        date_default_timezone_set('America/New_York');
        $currentTime = date( 'd-m-Y h:i:s A', time () );
        $insert_on_user_registration=$conn->prepare("INSERT INTO `user_registration`(`user_id`,`fullname`,`email`, `password`, `referel_id`, `mobile_no`, `country`, `avatar`, `registration_date`, `banning_status`,`status`) VALUES ('$user_id','$fullname','$email','$password','$actual','$mobile_no','$country','https://bitbud.biz/bitbud_dir/assets/images/man.png','$currentTime','Unbanned','Unactivated')");
        $insert_on_user_registration->execute();
        
        $actual=str_replace(' ','',$_POST['sponser_id']);
        $checking_refer_for_direct=$conn->prepare("SELECT `id`,`user_id`,`email`,`mobile_no` from `user_registration` where `user_id`='$actual'");
        $checking_refer_for_direct->execute();
        $maybe_dater=$checking_refer_for_direct->fetchAll();
        foreach($maybe_dater as $dater)
        {
            
            $mobo_upline=$dater['mobile_no'];
            $user_id_upline=$dater['user_id'];
            $parent_id=$dater['id'];
            
        
        
        $select_on_direct_team=$conn->prepare("SELECT * from `user_registration` where `referel_id`='$actual'");
        $select_on_direct_team->execute();
        $direct_info=$select_on_direct_team->fetchAll();
        foreach($direct_info as $directory)
        {
            $direct_user_id=$directory['user_id'];
            $direct_mob=str_replace(' ','',$directory['mobile_no']);
            $direct_country=$directory['country'];
            $direct_reg_date=$directory['registration_date'];
            $direct_status=$directory['status'];
            
            
            $rows=$conn->prepare("SELECT `downline_user_id` FROM `direct_team` WHERE `downline_user_id`='$direct_user_id'");
            $rows->execute();
            $rows->fetchAll();
            if($rows->rowCount()==0)
            {
            $insert_on_direct_team=$conn->prepare("INSERT INTO `direct_team`(`parent_id`, `referel_code`, `referel_user_id`, `referel_mob`, `pack`,`amount`,`downline_mob`, `downline_user_id`, `direct_country`, `reg_date`, `status`) VALUES ('$parent_id','$user_id_upline','$user_id_upline','$mobo_upline','Unactivated',0,'$direct_mob','$direct_user_id','$direct_country','$direct_reg_date','$direct_status')");
            $insert_on_direct_team->execute();
        
            
            
            
        }    
        }
        
        
    }
    if(isset($_SESSION['user_id']) && isset($_SESSION['password']))
            {
                
                
                
                include 'PHP_mailer/phpmailer/class.phpmailer.php';
                include 'PHP_mailer/phpmailer/class.smtp.php';




                $mail = new PHPMailer;

                /*$mail->SMTPDebug = true;*/                               // Enable verbose debug output

                $mail->isSMTP();                                      // Set mailer to use SMTP
                ini_set('max_execution_time', 300);
                $mail->isSMTP();                                      // Set 
                Host: 'p3plcpnl1000.prod.phx3.secureserver.net';



                PORT: 25;

                              
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
            $mail->setFrom('bitbudlimited@gmail.com','BitBud Limited');
		
		

                //$mail->addAttachment($_FILES['file']['tmp_name'],$_FILES['file']['name']);    // Optional name
                $mail->isHTML(true);                                  // Set email format to HTML

                $mail->Subject = 'Woohoo! Registration Completed!';


                $mail->Body="Welcome Dear ".$first_name." ".$last_name."<br>";
                $mail->Body.="<br>";
                
                
                $mail->Body.="Registration Completed! Thank You for Showing your interest with us . we are best approach investment multiplier which gives you highly return within one month. your credentials are below mention."."<br>";
                
                $mail->Body.="<br>";
                
                
                $mail->Body.="Username- ".$_SESSION['user_id']."<br>";
                $mail->Body.="Password- ".$_SESSION['password']."<br>";
                
                $mail->Body.="<br>";
                $mail->Body.="Important: Do not provide your login and password to anyone!. For More Information please contact us immediately we will reply you within 24 hours. thankyou For Joining us.";
                
                $mail->Body.="<br>";
                $mail->Body.="<br>";
                
                
                $mail->Body.="<a href='https://bitbud.biz'><img src='https://bitbud.biz/bitbud_ext/images/logo/logo1.png' style='width:200px; height:40px;'></a>"."<br>";

                $mail->Body.="<p style='font-size:14px;'>Registered office Address<br>Dept 906, 196 High road,"."<br>"."Woodgreen,London"."<br>"."United Kingdom, N22 8HH"."</p>"."<br>";
                $mail->Body.="<p style='font-size:14px;'>Support"."<br>"."support@bitbud.biz</p>";



 


                //$mail->ClearAllRecipients();

if($mail->send()) {
    echo "Successfully Registration";
} 

else {
	
	echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    
	
}

                
                
                
            }
    
        
    }
    
    else
    {
        /*write_error_over_here*/
        echo 'Whoops! Referral Code Not Found!';

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