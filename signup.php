<?php
require_once('sqlConnection.php');//your db connection
$db=new sqlConnection();

$name = mysql_real_escape_string(htmlspecialchars(trim($_POST['name'])));  
$email = mysql_real_escape_string(htmlspecialchars(trim($_POST['email'])));
$user_pass  = mysql_real_escape_string(htmlspecialchars(trim($_POST['epass']))); // encrypt password
$pass=md5($user_pass);
$dtime=date('Y-m-d H:i:s');	
		
$sql="INSERT INTO users (name,email,epass,created_at)VALUES('$name','$email','$pass','$dtime')";
mysql_query($sql);	
$result['success']="true";
$result['value']   = "Registered successfully.";	
echo json_encode($result);	
?>