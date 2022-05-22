<?php
    include_once("functions/is_login.php");
    session_start();
?>
<?php
	$url = $_SERVER["HTTP_REFERER"]; 
    header("Content-type:text/html;charset=utf-8");
    $server="localhost";
    $db_user="root";// 用户名
    $db_psw="root";// 登录密码
    $link =mysqli_connect($server,$db_user,$db_psw)or die("Unable to connect to MySQL"); 
    echo ""; // mysqli_connect连接数据库，地址，用户名，密码 
    $selected = mysqli_select_db($link,"news") or die("Could not select examples"); // 寻找数据库
	$news_id = substr($url,-1);
	$user_id = $_SESSION['user_id'];
	$user_name = $_SESSION['name']; 
	if($user_id ==""){ 
	echo"<script>alert('评论失败，待原因：未登入账号！');window.history.back();</script>";
	 }
	 else{
	 	$review=$_POST['info'];	
         //echo '<script>alert('.$review.');</script>';
	 	ini_set('date.timezone','Asia/Shanghai');
	    $currentDate = date("Y-m-d H:i:s"); 
	 	$ip = $_SERVER["REMOTE_ADDR"];
	 	$state = "未审核"; 
	 	$review_qu = "动漫";
	 	$sql = "insert into review values('$review_qu','$user_id','$user_name','$news_id','$review','$currentDate','$state','$ip')"; 
	 	mysqli_query($link,$sql); 
	 	echo"<script>alert('评论成功，待审核！');window.history.back();</script>";
	 }
?>