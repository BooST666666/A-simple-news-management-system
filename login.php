<?php
session_start();
$url = $_SERVER["HTTP_REFERER"];
$server="localhost";
$db_user="root";// 用户名
$db_psw="root";// 登录密码
$user_id=$_POST['Id'];
$passwd= $_POST['Passwd'];
$user=$_POST['usertype'];
// 接收信息
$link =mysqli_connect($server,$db_user,$db_psw)or die("Unable to connect to MySQL"); 
echo ""; // mysqli_connect连接数据库，地址，用户名，密码 

$selected = mysqli_select_db($link,"news") or die("Could not select examples"); // 寻找数据库
if($user=='管理员'){
	$result = mysqli_query($link,"select * from admin where admin_id='{$user_id}'"); // 通过sql语言寻找表，找出指定信息
	while ($row = mysqli_fetch_assoc($result)){ //重点！！ 从结果集中取得一行作为关联数组 fetch data in array format 
 	$rows[]=$row; // 结果存放在新数组
}
$a = $rows[0]['admin_id'];
$_SESSION['user_id']=$a;
$b = $rows[0]['apassword'];
$_SESSION['password']=$b;
$c = $rows[0]['admin'];
$_SESSION['name']=$c;

if($user_id!=$a&&$passwd!=$b){
	echo "<script>alert('账号或密码错误');window.history.back()</script>";
}else{
	 header('Refresh: 3; url=backstage.php');
 	echo "<script>alert('登录成功！！！页面将在3s后自动跳转到登录界面------You will be redirected in 3 seconds')</script>";
	 echo'user_id:'.$_SESSION['user_id'];
	 echo'passwd:'.$_SESSION['password'];
	 echo'name:'.$_SESSION['name'];
}
}else if($user=='普通用户'){
	$result = mysqli_query($link,"select * from users where user_id='{$user_id}'"); // 通过sql语言寻找表，找出指定信息
	while ($row = mysqli_fetch_assoc($result)){ //重点！！ 从结果集中取得一行作为关联数组 fetch data in array format 
 	$rows[]=$row; // 结果存放在新数组
}
$a = $rows[0]['user_id'];
$_SESSION['user_id']=$a;
$b = $rows[0]['password'];
$_SESSION['password']=$b;
$c = $rows[0]['name'];
$_SESSION['name']=$c;

if($user_id!=$a&&$passwd!=$b){
	echo "<script>alert('账号或密码错误');window.history.back()</script>";
}else{
	 header('Refresh: 3; url=index.php');
 	echo "<script>alert('登录成功！！！页面将在3s后自动跳转到登录界面------You will be redirected in 3 seconds')</script>";
	 echo'user_id:'.$_SESSION['user_id'];
	 echo'passwd:'.$_SESSION['password'];
	 echo'name:'.$_SESSION['name'];
}

}

// if($passwd==$rows[0]["password"]){
// 	if(!empty($user_id)){//不为空下 一部操作
// 		if(!empty($passwd)){
// 			$user = mysqli_fetch_array($result);
// 			$_SESSION['user_id'] = $user['user_id'];
// 			$_SESSION['name'] = $user['name'];
// 			echo $_SESSION['user_id'];
// 			// header('Refresh: 3; url=index.php');
// 			// echo "<script>alert('登录成功！！！页面将在3s后自动跳转到登录界面------You will be redirected in 3 seconds')</script>";
			
			
			
// 		}else{
// 			header('Refresh: 3; url=login.html');
// 			echo "<script>alert('密码不能为空！！！页面将在3s后自动跳转到登录界面------You will be redirected in 3 seconds')</script>";
			
			
// 		} 
		
		
// 	}else{
		
// 		header('Refresh: 3; url=login.html');
// 		echo "<script>alert('账号不能为空！！！页面将在3s后自动跳转到登录界面------You will be redirected in 3 seconds')</script>";
		
// 	}
	
	
// }else{
	
// 	header('Refresh: 3; url=login.html');
// 	echo "<script>alert('登录信息验证失败,页面将在3s后自动跳转到登录界面------You will be redirected in 3 seconds')</script>";
	
// }



?>