<?php
$server="localhost";
$db_user="root";// 用户名
$db_psw="root";// 登录密码
$user_id=$_POST['Id'];
$passwd= $_POST['Passwd'];
$againpasswd=$_POST['againPasswd'];
$name = $_POST['Name'];
// 接收信息
$link =mysqli_connect($server,$db_user,$db_psw)or die("Unable to connect to MySQL"); 
echo ""; // mysqli_connect连接数据库，地址，用户名，密码 
$selected = mysqli_select_db($link,"news") or die("Could not select examples"); // 寻找数据库

/*$sql = "insert into 表名 values('$id','$passwd','$name')"; //  该处为测试模块,试试有没有将数据插入表中 
$ok = mysqli_query($link,$sql); 
if($ok){
	
	echo "success";
}
else{
	
	echo "error";
	
}
*/

if($passwd!=$againpasswd){
	header('Refresh: 3; url=register.html');
	echo "<script>alert('输入的密码和确认密码不相等！将返回重新注册！！！页面将在3s后自动跳转到注册界面------You will be redirected in 3 seconds')</script>";
}else{
	$result = mysqli_query($link,"select * from users where user_id='{$user_id}';"); // 通过sql语言寻找表，找出数据库有没有相同记录
	if(mysqli_num_rows($result)>0){
		header('Refresh: 3; url=register.html');
		echo "<script>alert('该账号已经被注册，将返回重新注册！！！页面将在3s后自动跳转到注册界面------You will be redirected in 3 seconds')</script>";
	}else{
		while ($row = mysqli_fetch_assoc($result)){ //重点！！ 从结果集中取得一行作为关联数组 fetch data in array format
		$rows[]=$row; // 结果存放在新数组
			
			
		}	
		if($user_id == ""){
		header('Refresh: 3; url=register.html');
		echo "<script>alert('注册账号不能为空，将返回重新注册！！！页面将在3s后自动跳转到注册界面------You will be redirected in 3 seconds')</script>";
			}else{
		 		if($passwd == ""){
		  			header('Refresh: 3; url=register.html');
		  	        echo "<script>alert('注册密码不能为空，将返回重新注册！！！页面将在3s后自动跳转到注册界面------You will be redirected in 3 seconds')</script>";
				
					
					
		 		}else{
		  			if($name == ""){
		  				header('Refresh: 3; url=register.html');
		  	            echo "<script>alert('用户名不能为空，将返回重新注册！！！页面将在3s后自动跳转到注册界面------You will be redirected in 3 seconds')</script>";
				
						
		  			}else{
		  				$sql = "insert into users values('$user_id','$passwd','$name')";
						
		  				$ok = mysqli_query($link,$sql); //检查是否插入成功
		  				if($ok){
		  					echo "success";
							header('Refresh: 3; url=login.html');
							echo "<script>alert('注册成功！！！页面将在3s后自动跳转到登录界面------You will be redirected in 3 seconds')</script>";
		  					}else{
		  					header('Refresh: 3; url=register.html');
		  					echo "<script>alert('注册不符合规则！！！页面将在3s后自动跳转到注册界面------You will be redirected in 3 seconds')</script>";
		  					}
		                 
		  			}
					
		  		}
				
				
		  	}
			
			
			
		 
	}
	

	
}




?>