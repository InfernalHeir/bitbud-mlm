<?php ini_set('display_errors',1);
session_start();

unset($_SESSION['user_id']);
if(empty($_SESSION['user_id']))
{
    header('location:https://bitbud.biz/bitbud_ext/login.php');
}

/*this_can_be_used_for_sign_up*/

?>