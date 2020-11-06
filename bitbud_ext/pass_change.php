<?php ini_set('display_errors',1);
session_start();
if(empty($_SESSION['token']))
{
    header('location:https://bitbud.biz/');
}
include '../dbconnection.php';
extract($_POST);
try
{
    if(isset($_POST['newpassword']) && isset($_POST['confirmpassword']) && isset($_POST['username']))
    {
       $newpass=$_POST['newpassword'];
       $connpass=$_POST['confirmpassword'];
       $username=$_POST['username'];
       
       /*check_while*/
      if($newpass!=$connpass)
      {
          echo "Whoops! Password Not Matched!";
      }
      else
      {
          /*update_query*/
          $update_query=$conn->prepare("UPDATE `user_registration` SET `password`='$newpass' WHERE `user_id`='$username'");
          if($update_query->execute())
          {
              unset($_SESSION['token']);
              if(empty($_SESSION['token']))
              {
              echo "Password Changed Successfully!.";
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