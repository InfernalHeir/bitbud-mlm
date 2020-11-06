<?php ini_set('display_errors',1);
session_start();
include '../dbconnection.php';
extract($_POST);
try
{
    if(isset($_POST['user_id']))
    {
       $username=$_POST['user_id'];
       
       /*check_banned*/
       $check_banning_status=$conn->prepare("SELECT `banning_status` FROM `user_registration` WHERE `user_id`='$username' and `banning_status`='Unbanned'");
       $check_banning_status->execute();
       $check_banning_status->fetchAll();
       if($check_banning_status->rowCount()>0)
       {
           /*do_banned*/
           $change=$conn->prepare("UPDATE `user_registration` SET `banning_status`='Banned' WHERE `user_id`='$username'");
           if($change->execute())
           {
               echo "$username Banned By you Successfully!.";
           }
       }
       else
       {
           $change=$conn->prepare("UPDATE `user_registration` SET `banning_status`='Unbanned' WHERE `user_id`='$username'");
           if($change->execute())
           {
               echo "$username Unbanned By you Successfully!.";
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
