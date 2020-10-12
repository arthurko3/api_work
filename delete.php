<?php 
	require_once("dbtools.inc.php");
	$link=create_connection();
	$Account = $_POST['account'];
	$sql="SELECT `Account` FROM `member` WHERE `Account`= '$_Account' ";
	$result=execute_sql($link,"member",$sql);
	
	if(mysqli_fetch_assoc($result)){
		$sql1="DELETE FROM member WHERE Account='$Account'";
		$result1=execute_sql($link,"member",$sql1);
		if($result1){
			echo '{
    			"Code": 0,
    			"Message": "刪除成功",
    			"Result": {"IsOK" : true}
    		  }';
		}
	}else{
		echo '{
    			"Code": 1,
    			"Message": "刪除失敗,查無此帳號",
    			"Result": {"IsOK" : false}
    		  }';
	}
	mysqli_close($link)
 ?>