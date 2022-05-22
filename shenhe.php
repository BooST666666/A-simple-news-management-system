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
if($state=='已审核'){
    echo "<script>alert('该审核评论已设置成功！暂无法修改');window.location.href='review_shenhe.php';</script>";
    
}
else if($state=='未审核'){
    $sql = "update review set state='已审核' where news_id ='$id' and review_qu ='$review_qu';";
        $result = mysqli_query($link,$sql);
        if($result){
            echo "<script>alert('该审核评论已更新成功！');window.location.href='review_shenhe.php';</script>";
        }else{
            echo "<script>alert('该审核评论更新失败！正在返回');window.location.href='review_shenhe.php';</script>";
        }

}  

?>