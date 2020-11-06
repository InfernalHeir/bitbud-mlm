<?php ini_set('display_errors',1);
session_start();
include '../dbconnection.php';
extract($_POST);
try
{
    if(isset($_POST['username']) && isset($_POST['password']))
    {
        $username=$_POST['username'];
        $password=$_POST['password'];
        
        $select_password=$conn->prepare("SELECT `user_id`,`password` FROM `user_registration` WHERE `user_id`='$username' and `password`='$password'");
        $select_password->execute();
        $select_password->fetchAll();
        if($select_password->rowCount()==0)
        {
            echo "Username or Password are Incorrect!";
        }
        else
        {
            /*check_may_be_its_banned*/
        $select_banning=$conn->prepare("SELECT `banning_status` FROM `user_registration` WHERE `user_id`='$username' and `banning_status`='Unbanned'");
        $select_banning->execute();
        $select_banning->fetchAll();
        if($select_banning->rowCount()==0)
        {
            echo "Oops! we are sorry. you are temporary banned by admin!.";
        }
        else
        {
            $_SESSION['user_id']=$username;
            if(isset($_SESSION['user_id']))
            {
                echo "login_ok";
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