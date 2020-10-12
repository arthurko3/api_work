<?php 
	require_once("dbtools.inc.php");
	$link=create_connection();
	$Account = $_POST['account'];
	$Password = $_POST['password'];
	$sql="SELECT `Account` FROM `member` WHERE `Account`= '$Account' ";
	$result=execute_sql($link,"member",$sql);
	
	if(mysqli_fetch_assoc($result)){
		$sql1="UPDATE member SET Password='$Password' WHERE Account ='$Account'";
		$result1=execute_sql($link,"member",$sql1);
		if($result1){
			echo '{
    			"Code": 0,
    			"Message": "更新成功",
    			"Result": {"IsOK" : true}
    		  }';
		}
	}else{
		echo '{
    			"Code": 1,
    			"Message": "更新失敗,查無此帳號",
    			"Result": {"IsOK" : false}
    		  }';
	}
	mysqli_close($link)
 ?>
