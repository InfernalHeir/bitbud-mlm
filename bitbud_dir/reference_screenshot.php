<?php ini_set('display_errors',1);
session_start();
extract($_POST);
include '../dbconnection.php';
try
{
    if(isset($_FILES['file']))
    {
        $file=$_FILES['file'];
        $file_extension=$file['type'];
        if($file_extension=="image/jpg" || $file_extension=="image/png" || $file_extension=="image/jpeg" || $file_extension=="image/pdf" || $file_extension=="image/doc")
        {
            /*check_fie_sizer_also*/
            $filesize=$file['size'];
            if($filesize>2097152)
            {
                echo "filesize more than 2mb.";
            }
            else
            {
                $tmp_name=$file['tmp_name'];
                $current_name='complaint_screenshots/'.$file['name'];
                $move_it=move_uploaded_file($tmp_name,$current_name);
                if($move_it)
                {
                    $_SESSION['complaint_image']=$current_name;
                    if(isset($_SESSION['complaint_image']))
                    {
                        echo "file uploaded successfully!.";
                    }
                    else
                    {
                        echo "Something wrong went!.";
                    }
                }
            }
        }
        else
        {
            echo "accepted format png,jpg,jpeg,doc and pdf.";
        }
    }
    
    /*other_details_over_here*/
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['meta']) && isset($_POST['issue_type']))
    {
        if(isset($_SESSION['complaint_image']))
        {
           $complaint_image_url=$_SESSION['complaint_image'];
        
        }
        else
        {
           $complaint_image_url="https://bitbud.biz/bitbud_dir/assets/images/complaint.png";
        }
            /*insert_on_our_database*/
            $name=$_POST['name'];
            $email=$_POST['email'];
            $mta=$_POST['meta'];
            $meta=str_replace( array( '\'', '"', ',' , ';', '<', '>' ), ' ', $mta); 
            $issue_type=$_POST['issue_type'];
            
            date_default_timezone_set('America/New_York');
            $currentTime = date( 'd-m-Y h:i:s A', time () );
            $user_id=$_SESSION['user_id'];
       
            $tracking = uniqid();
            
            
            $insert_on_support=$conn->prepare("INSERT INTO `support`(`user_id`, `name`, `email`, `complaint_image`, `issue_type`, `meta`, `tracking_id`,`processing_time`,`status`) VALUES ('$user_id','$name','$email','$complaint_image_url','$issue_type','$meta','$tracking','$currentTime','PENDING')");
            if($insert_on_support->execute())
            {
              
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
           $mail->Subject = '#'.$tracking.' Complaint Submitted';

           
           $mail->Body="Dear ".$name."<br>";
           $mail->Body.="<br>";
                
                
           $mail->Body.="Your Complaint submitted to our end. it will take 24 hours to resolve your issue. thank you for your patience. your complaint details are mention below-"."<br>";
                
           $mail->Body.="<br>";
                
                
            $mail->Body.="Complaint type- ".$issue_type."<br>";
            $mail->Body.="Tracking Id- ".$tracking."<br>";
            $mail->Body.="Status- Pending<br>";
                
            $mail->Body.="<br>";
            $mail->Body.="For More Information please contact us immediately on support@bitbud.biz we will reply you within 24 hours. thankyou For visiting us.";
                
            $mail->Body.="<br>";
            $mail->Body.="<br>";
                
                
            $mail->Body.="<a href='https://bitbud.biz'><img src='https://bitbud.biz/bitbud_ext/images/logo/logo1.png' style='width:200px; height:40px;'></a>"."<br>";

             $mail->Body.="<p style='font-size:14px;'>Registered office Address<br>Dept 906, 196 High road,"."<br>"."Woodgreen,London"."<br>"."United Kingdom, N22 8HH"."</p>"."<br>";
            $mail->Body.="<p style='font-size:14px;'>Support"."<br>"."support@bitbud.biz</p>";
           
           
          


if($mail->send()) {
    
    echo "Your request submitted successfully. this may be take 24 hours to resolve issue.";
    unset($_SESSION['complaint_image']);
} 

else {
	echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;

}

              
              
              
              
              
                
            /*insert_if_end*/
            
        }
    }
    
}
catch(PDOException $e)
{
    echo "Connection Failed ".$e->getMessage();
}
$conn=null;

?>