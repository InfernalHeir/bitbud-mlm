<?php ini_set('display_errors',1);
session_start();
extract($_POST);
include '../dbconnection.php';
try
{
   if(isset($_POST['admin_username']) && isset($_POST['old_password']) && isset($_POST['new_password']))
   {
       $admin_username=$_POST['admin_username'];
       $old_password=$_POST['old_password'];
       $new_password=$_POST['new_password'];
       
       $old_password_checking=$conn->prepare("SELECT `password` FROM `admin` WHERE `password`='$old_password'");
       $old_password_checking->execute();
       $old_password_checking->fetchAll();
       if($old_password_checking->rowCount()==0)
       {
           echo "System Error::Wrong Password!.";
       }
       else
       {
           /*update_credentials*/
           $update_credentials=$conn->prepare("UPDATE `admin` SET `username`='$admin_username',`password`='$new_password'");
           if($update_credentials->execute())
           {
               echo "Credentials Updated Successfully!.";
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