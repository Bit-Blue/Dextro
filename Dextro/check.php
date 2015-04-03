<?php
	session_start();
	include('db.php');
	parse_str($_POST['login'], $set);
	$check=mysqli_fetch_row(mysqli_query($con,"select unique_id,uname,pwd,type from admin_sch where uname='".$set['login-uname']."' AND pwd='".md5($set['login-pwd'])."' AND type='".$set['login-utyp']."'"));
	//echo("select uname,name,type from admin_sch where uname='".$set['login-uname']."' AND pwd='".md5($set['login-uname'])."' AND type='".$set['login-utyp']."'");
	if($check){
		
		
                $cookie_name="Id";
                $cookie_value =$check[0];
                setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
        
		
		$arr['status']='suceed';
		$arr['type']=$check[3];
		$_SESSION['uname']=$check[1];
		$_SESSION['pwd']=$check[2];
		$_SESSION['type']=$check[3];
		echo json_encode($arr);
		exit;
		
		
		
		
		
	}
	else{
		$arr['status']='failed';
		session_destroy();
		echo json_encode($arr);
		exit;
	}
?>