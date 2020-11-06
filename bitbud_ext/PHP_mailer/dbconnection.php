<?php

$servername ="localhost";
$username="root";
$password="";
try
{

		$conn = new PDO("mysql:host=$servername;dbname=Project",$username,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		/*echo "connection successfull";*/
		$name=$_POST['name'];
		$email=$_POST['email'];
		$select =$conn->prepare("SELECT * FROM project_1 where name=:name");
		$select_email=$conn->prepare("SELECT * FROM project_1 where email=:email");
   		$select->bindParam(':name',$name);
   		$select_email->bindParam(':email',$email);
   		
   		$select->execute();
   		$select_email->execute();
   		$count = $select->rowCount();
   		$count1=$select_email->rowCount();

   		if($count>0){
   		
		?><script type="text/javascript">
			what();
    function what(){
        var f=document.getElementById('we').innerHTML='This username already taken';
    };
			
		</script><?php		   		
   		}
   		elseif($count1>0){
   		?><script type="text/javascript">
			wha();
    function wha(){
        var f=document.getElementById('hel').innerHTML='This Email is already Exists';
    };
			
		</script><?php	
   		}

   			else{
				$name=$_POST['name'];
				$email=$_POST['email'];
				$password=$_POST['password'];
				$insert = $conn->prepare("INSERT INTO Project_1(name,email,password)VALUES(:name,:email,:password)");
				$insert->bindParam(':name',$name);
				$insert->bindParam(':email',$email);
				$insert->bindParam(':password',$password);
				$insert->execute();

				$otp = rand(100000,999999);
				$from="bhupendrabisht61049@gmail.com";
				$to=$_POST['email'];
				$subject = "OTP: Here";
				$name = $_POST['name'];
				$msg = "Welcome ".$name." Your one time password is ".$otp." Please dont share it to anyone to safe from fruad activities"; 
				$header = "FROM:".$from;
				$mailer = mail($to,$subject,$msg,$header);
				setcookie('otp',$otp, time() + 100,'/');

				if(isset($_POST['hello']))
{
				$otp = $_POST['otp'];
				if($_COOKIE['otp'] == $otp){
				header('location:success.php');
}			
				elseif(setcookie('otp',$otp, time() - 100,'/')){
				$_COOKIE['otp'] != $otp;
				?>
				<script type="text/javascript">
					var wel=document.getElementById('wel').innerHTML = 'Otp not matched';
				</script><?php
				}
			
				else{
				?>
				<script type="text/javascript">
					var wel=document.getElementById('wel').innerHTML = 'Otp not matched';
				</script><?php
}	
}

}


					}


catch(PDOException $e)
{
echo "connection failed".$e->getMessage();
}

$conn=null;

?>
