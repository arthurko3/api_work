<?php 
	require_once("dbtools.inc.php");
	$link = create_connection();
	$Account = $_POST['account'];
	$Password = $_POST['password'];

	$sql="SELECT `Account` FROM `member` WHERE `Account`= '$Account' ";
	$result=execute_sql($link,"member",$sql);

	if(mysqli_fetch_assoc($result)){
		echo '{
    		"Code": 0,
    		"Message": "註冊失敗，帳號重複",
    		"Result":{"IsOK" : false}
			}';
	}else{
		$sql1 = "INSERT INTO member(Account,Password) VALUES('$Account','$Password')";
		$result1 = execute_sql($link, "member", $sql1);
		if($result1){
			echo '{
    		"Code": 1,
    		"Message": "註冊成功",
    		"Result":{"IsOK" : true}
			}';
		}else{
			echo '{
    		"Code": 2,
    		"Message": "註冊失敗",
    		"Result":{"IsOK" : false}
			}';
		}
	}
	mysqli_close($link);
 ?>