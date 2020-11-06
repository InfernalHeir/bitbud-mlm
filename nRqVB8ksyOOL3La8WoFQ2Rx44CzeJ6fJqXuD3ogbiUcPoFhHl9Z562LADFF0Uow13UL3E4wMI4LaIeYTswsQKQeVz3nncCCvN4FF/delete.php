<?php ini_set('display_errors',1);
session_start();
include '../dbconnection.php';
extract($_POST);
try
{
    if(isset($_POST['reference_id']))
    {
        $reference_id=$_POST['reference_id'];
        $delete=$conn->prepare("DELETE FROM `show_transaction` WHERE `refernce_id`='$reference_id'");
        if($delete->execute())
        {
            echo "Transaction Deleted Successfully!.";
        }
        
    }
}
catch(PDOException $e)
{
    echo "Connection Failed ".$e->getMessage();
}
$conn=null;
?>