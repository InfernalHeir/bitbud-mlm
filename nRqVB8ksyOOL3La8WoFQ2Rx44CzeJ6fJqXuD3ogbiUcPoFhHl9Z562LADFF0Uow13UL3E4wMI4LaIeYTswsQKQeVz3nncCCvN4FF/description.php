<?php ini_set('display_errors',1);
session_start();
include '../dbconnection.php';
extract($_POST);
$image_url='';
$meta='';
$issue_type='';
try
{
    if(isset($_POST['tracking_id']))
    {
        $tracking_id=$_POST['tracking_id'];
        $select_tracking=$conn->prepare("SELECT * FROM `support` WHERE `tracking_id`='$tracking_id'");
        $select_tracking->execute();
        $track=$select_tracking->fetchAll();
        foreach($track as $value)
        {
            $image_url=$value['complaint_image'];
            $meta=$value['meta'];
            $issue_type=$value['issue_type'];
            
            $email=$value['email'];
            $_SESSION['user_email']=$email;
            $_SESSION['track']=$tracking_id;
            
           
        }
        
    $callback=array('complaint_url'=>$image_url,'meta'=>$meta,'issue_type'=>$issue_type); 
    echo json_encode($callback);    
    }
    
    
}
catch(PDOException $e)
{
    echo "Connection Failed ".$e->getMessage();
}
$conn=null;
?>