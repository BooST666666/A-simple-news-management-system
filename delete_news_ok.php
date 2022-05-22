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

$catagory_id = $_GET['catagory_id'];
if($catagory_id=='体育'){
    $review_delete="delete from review where news_id ='$id' and review_qu ='$catagory_id';";
    $sql = "delete from sport where news_id ='$id' and catagory_id ='$catagory_id';";
    $result = mysqli_query($link,$sql);
    $result1 = mysqli_query($link,$review_delete);
    if($result){
        if($result1){
            echo "<script>alert('新闻信息删除成功！');window.location.href='delete_news.php';</script>";
        }
        else{
            echo "<script>alert('新闻信息删除成功，但评论信息删除失败！请立即联系操作人员');window.location.href='delete_news.php';</script>";
        }
        
    }else{
        echo "<script>alert('新闻信息删除失败！');window.location.href='delete_news.php';</script>";
    }
    

}
if($catagory_id=='科技'){
    $review_delete="delete from review where news_id ='$id' and review_qu ='$catagory_id';";
    $sql = "delete from science where news_id ='$id' and catagory_id ='$catagory_id';";
    $result = mysqli_query($link,$sql);
    $result1 = mysqli_query($link,$review_delete);
    if($result){
        if($result1){
            echo "<script>alert('新闻信息删除成功！');window.location.href='delete_news.php';</script>";
        }
        else{
            echo "<script>alert('新闻信息删除成功，但评论信息删除失败！请立即联系操作人员');window.location.href='delete_news.php';</script>";
        }
        
    }else{
        echo "<script>alert('新闻信息删除失败！');window.location.href='delete_news.php';</script>";
    }
   
    

}
if($catagory_id=='音乐'){
    $review_delete="delete from review where news_id ='$id' and review_qu ='$catagory_id';";
    $sql = "delete from music where news_id ='$id' and catagory_id ='$catagory_id';";
    $result = mysqli_query($link,$sql);
    $result1 = mysqli_query($link,$review_delete);
    if($result){
        if($result1){
            echo "<script>alert('新闻信息删除成功！');window.location.href='delete_news.php';</script>";
        }
        else{
            echo "<script>alert('新闻信息删除成功，但评论信息删除失败！请立即联系操作人员');window.location.href='delete_news.php';</script>";
        }
        
    }else{
        echo "<script>alert('新闻信息删除失败！');window.location.href='delete_news.php';</script>";
    }
   
   

}
if($catagory_id=='经济'){
    $review_delete="delete from review where news_id ='$id' and review_qu ='$catagory_id';";
    $sql = "delete from economics where news_id ='$id' and catagory_id ='$catagory_id';";
    $result = mysqli_query($link,$sql);
    $result1 = mysqli_query($link,$review_delete);
    if($result){
        if($result1){
            echo "<script>alert('新闻信息删除成功！');window.location.href='delete_news.php';</script>";
        }
        else{
            echo "<script>alert('新闻信息删除成功，但评论信息删除失败！请立即联系操作人员');window.location.href='delete_news.php';</script>";
        }
        
    }else{
        echo "<script>alert('新闻信息删除失败！');window.location.href='delete_news.php';</script>";
    }
    

}
if($catagory_id=='动漫'){
    $review_delete="delete from review where news_id ='$id' and review_qu ='$catagory_id';";
    $sql = "delete from cartoon where news_id ='$id' and catagory_id ='$catagory_id';";
    $result = mysqli_query($link,$sql);
    $result1 = mysqli_query($link,$review_delete);
    if($result){
        if($result1){
            echo "<script>alert('新闻信息删除成功！');window.location.href='delete_news.php';</script>";
        }
        else{
            echo "<script>alert('新闻信息删除成功，但评论信息删除失败！请立即联系操作人员');window.location.href='delete_news.php';</script>";
        }
        
    }else{
        echo "<script>alert('新闻信息删除失败！');window.location.href='delete_news.php';</script>";
    }
   

}
?>