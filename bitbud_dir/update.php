<?php ini_set('display_errors',1);
session_start();
extract($_POST);
include '../dbconnection.php';
try
{
    if(isset($_FILES['file']))
    {
        $file=$_FILES['file'];
        
        /*acceptable_extension*/
        $type=$file['type'];
        if($type=='image/png' || $type=='image/jpg' || $type=='image/jpeg')
        {
            $filesize=$file['size'];
            if($filesize>1000000)
            {
                echo "Error While Filesize more than 1 MB.";
            }
            else
            {
                /*write_good_code_here*/
                $tmp_name=$file['tmp_name'];
                $current_name='avatar/'.$file['name'];
                $move=move_uploaded_file($tmp_name,$current_name);
                if($move)
                {
                    $_SESSION['url']=$current_name;
                    echo "Woohoo! File Upload successfully.";
                    
                }
                
            }
        }
        else
        {
            echo "Format not acceptable!";
            
        }
        
        
    }
    
    if(isset($_POST['email']) && isset($_POST['mobile_no']) && isset($_POST['name']))
    {
        $email=$_POST['email'];
        $mobile_no=$_POST['mobile_no'];
        $name=$_POST['name'];
        if(filter_var($email,FILTER_VALIDATE_EMAIL))
        {
        if(isset($_SESSION['url']))
        {
            $url=$_SESSION['url'];
            $user_id=$_SESSION['user_id'];
            $update_user=$conn->prepare("UPDATE `user_registration` SET `fullname`='$name',`email`='$email',`mobile_no`='$mobile_no',`avatar`='$url' WHERE `user_id`='$user_id'");
            if($update_user->execute())
            {
                $update_also=$conn->prepare("UPDATE `direct_team` SET `downline_mob`='$mobile_no' WHERE `downline_user_id`='$user_id'");
                $update_also->execute();
                
                $upate_when=$conn->prepare("UPDATE `direct_team` SET `referel_mob`='$mobile_no' WHERE `referel_user_id`='$user_id'");
                $upate_when->execute();
                
                echo "Profile Updated Successfully!";
            }
        }
        else
        {
            $update=$conn->prepare("UPDATE `user_registration` SET `fullname`='$name',`email`='$email',`mobile_no`='$mobile_no' WHERE `user_id`='$user_id'");
            if($update->execute())
            {
                $update_also=$conn->prepare("UPDATE `direct_team` SET `downline_mob`='$mobile_no' WHERE `downline_user_id`='$user_id'");
                $update_also->execute();
                
                $upate_when=$conn->prepare("UPDATE `direct_team` SET `referel_mob`='$mobile_no' WHERE `referel_user_id`='$user_id'");
                $upate_when->execute();
                
                echo "Profile Updated Successfully!";
            }
        }
        }
        else
        {
            echo "system occur::Invalid Email Address";
        }
        
    }
    if(isset($_POST['btc_wallet']))
    {
        $user_id=$_SESSION['user_id'];
        $btc_wallet=str_replace(' ','',$_POST['btc_wallet']);
        /*check_if_exist*/
        
        $check=$conn->prepare("SELECT `user_id` FROM `btc` WHERE `user_id`='$user_id'");
        $check->execute();
        $check->fetchAll();
        if($check->rowCount()==0)
        {
            /*insert*/
            $insert=$conn->prepare("INSERT INTO `btc`(`user_id`, `btc_wallet`, `status`) VALUES ('$user_id','$btc_wallet','Active')");
            if($insert->execute())
            {
                echo "BTC Wallet Address Added Successfully!";
            }
        }
        else
        {
            $update_btc=$conn->prepare("UPDATE `btc` SET `btc_wallet`='$btc_wallet' WHERE `user_id`='$user_id'");
            if($update_btc->execute())
            {
                echo "BTC Wallet Address Updated Successfully!";
            }
        }
        
    }
    
    if(isset($_POST['old_password']) || isset($_POST['new_password']))
    {
        $old_password=$_POST['old_password'];
        $new_password=$_POST['new_password'];
        $user_id=$_SESSION['user_id'];
        /*check_password*/
        $select_p=$conn->prepare("SELECT `password` FROM `user_registration` WHERE `user_id`='$user_id' and `password`='$old_password'");
        $select_p->execute();
        $select_p->fetchAll();
        if($select_p->rowCount()==0)
        {
            echo "System::error Password not exist";
        }
        else
        {
            /*update_policy*/
            $update=$conn->prepare("UPDATE `user_registration` SET `password`='$new_password' WHERE `user_id`='$user_id'");
            if($update->execute())
            {
                echo "Password Changed Successfully!";
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