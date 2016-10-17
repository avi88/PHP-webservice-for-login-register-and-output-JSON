<?php
require_once('sqlConnection.php');
$db=new sqlConnection();


$email = mysql_real_escape_string(htmlspecialchars(trim($_POST['email'])));
$user_pass  = mysql_real_escape_string(htmlspecialchars(trim($_POST['epass']))); // encrypt password
$pass=md5($user_pass);

if($email!='' && $pass!=''){
$login = "select * from users where email='$email' and password='$pass'";		   
$log = mysql_query($login);                                        
$logged = mysql_num_rows($log); 
    if($logged>0){
	    $result['success']="true";
	    $result['value']   = "Successfully logged";
    }
	else{
	$result['success']="false";
	$result['value']   = "Error";
	}
	    }else{
	    $result['success']="false";
	    $result['value']   = "Fill credentials";   
	    }
echo json_encode($result);
?>