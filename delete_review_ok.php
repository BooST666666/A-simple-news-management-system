<?php
include_once("functions/is_login.php");
session_start();
$server="localhost";
$db_user="root";// 用户名
$db_psw="root";// 登录密码
$link =mysqli_connect($server,$db_user,$db_psw)or die("Unable to connect to MySQL"); 
echo ""; // mysqli_connect连接数据库，地址，用户名，密码 
$selected = mysqli_select_db($link,"news") or die("Could not select examples"); // 寻找数据库
if(!is_login()){
	 echo "<script>alert('请您登录系统后，再访问该页面！'); window.location.href = 'index.php';</script>";
	return;
}
$id = $_GET['id']; 
$review_qu = $_GET['review_qu']; 
$state = $_GET['state'];
$user_name = $_GET['user_name'];
$publish_time = $_GET['publish_time'];
$content = $_GET['content'];
// echo $id;

// echo $review_qu;
// echo $state;
// echo $user_name;
// echo $publish_time;
// echo $content;
$sql = "delete from review where news_id ='$id' and review_qu ='$review_qu' and state ='$state' and user_name ='$user_name' and publish_time ='$publish_time' and content = '$content';";
     $result = mysqli_query($link,$sql);
   if($result){
        echo "<script>alert('该条评论删除成功！');window.location.href='delete_review.php';</script>";
    }else{
         echo "<script>alert('该条评论删除失败！');window.location.href='delete_review.php';</script>";
     }
?>