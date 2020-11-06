<?php ini_set('display_errors',1);
session_start();
include '../dbconnection.php';
extract($_POST);
try
{
    if(isset($_POST['sponser_id']))
    {
        $sponser_id=$_POST['sponser_id'];
        $chek_this=$conn->prepare("SELECT `fullname` FROM `user_registration` WHERE `user_id`='$sponser_id'");
         $chek_this->execute();
         $full= $chek_this->fetchAll();
         if( $chek_this->rowCount()==0)
         {
             echo "No Sponser Found";
         }
         else
         {
             foreach($full as $fullname)
             {
                 echo $fullname['fullname'];
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



