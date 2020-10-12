<?php
	require_once("dbtools.inc.php");
	$link=create_connection();
	$Account = $_GET['account'];
	$Password = $_GET['password'];
	$sql = "SELECT Account, Password FROM member WHERE Account ='$Account' and Password = '$Password'";
	$result = execute_sql($link, "member", $sql);
	if(mysqli_num_rows($result) == 1){
		header(':', true, 200);
		echo '{
    			"Code": 0,
    			"Message": "",
    			"Result": {"IsOK" : true}
    		  }';
    	
	}else{
		header(':', true, 404);
		echo '{
    			"Code": 2,
    			"Message": "Login Failed",
    			"Result": null
			  }';
	}
	mysqli_close($link);
?>