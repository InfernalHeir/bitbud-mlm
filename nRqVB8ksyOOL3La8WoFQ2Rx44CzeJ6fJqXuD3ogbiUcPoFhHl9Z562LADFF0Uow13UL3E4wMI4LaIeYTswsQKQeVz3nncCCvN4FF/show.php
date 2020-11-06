<?php ini_set('display_errors',1);
session_start();
include '../dbconnection.php';
extract($_POST);
try
{
    if(isset($_POST['username']) || isset($_POST['btc_amount']) || isset($_POST['transaction_id']) || isset($_POST['reference_id']))
    {
        $username=$_POST['username'];
        $btc_amount=$_POST['btc_amount'];
        $transaction_id=$_POST['transaction_id'];
         $reference_id=$_POST['reference_id'];
        if(empty($username) || empty($btc_amount) || empty($transaction_id))
        {
            echo "System Error:: Invalid Fields";
        }
        else
        {
            /*check_username*/
            $select=$conn->prepare("SELECT `user_id` FROM `user_registration` WHERE `user_id`='$username'");
            $select->execute();
            $select->fetchAll();
            if($select->rowCount()==0)
            {
                echo "System Error:: No Username Found.";
            }
            else
            {
                /*select_if_already*/
                $select_reference=$conn->prepare("SELECT `refernce_id` FROM `show_transaction` WHERE `refernce_id`='$reference_id'");
                $select_reference->execute();
                $select_reference->fetchAll();
                if($select_reference->rowCount()==0)
                {
                    /*insert_on_database*/
                    date_default_timezone_set('America/New_York');
                    $currentTime = date( 'd-m-Y h:i:s A', time () );
                    
                    $insert_on_this=$conn->prepare("INSERT INTO `show_transaction`(`user_id`, `btc_amount`, `transaction_id`, `transaction_date`, `refernce_id`, `status`) VALUES ('$username','$btc_amount','$transaction_id','$currentTime','$reference_id','CONFIRM')");
                    if($insert_on_this->execute())
                    {
                        echo "Transaction is live.";
                    }
                }
                else
                {
                    /*Update_from_show_transaction*/
                    
                    $update=$conn->prepare("UPDATE `show_transaction` SET `user_id`='$username',`btc_amount`='$btc_amount',`transaction_id`='$transaction_id' WHERE `refernce_id`='$reference_id'");
                    if($update->execute())
                    {
                       echo "Transaction updated.";
                    }
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