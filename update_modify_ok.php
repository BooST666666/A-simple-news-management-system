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
$title = $_POST['title'];                              //获取新闻主题
$content = $_POST['content'];                          //获取新闻内容
$id = $_GET['id'];                                  //获取新闻id
$texttype=$_POST['texttype'];       //获取新闻内容信息
$catagory_id = $_GET['catagory_id'];

//应用mysqli_query()函数向MySQL数据库服务器发送修改新闻信息的SQL语句
if($texttype=='不修改'){
    if($catagory_id=='体育'){
        $sql = "update sport set title='$title',content='$content' where news_id ='$id' and catagory_id ='$catagory_id';";
        $result = mysqli_query($link,$sql);
        if($result){
            echo "<script>alert('新闻信息编辑成功！');window.location.href='update_news.php';</script>";
        }else{
            echo "<script>alert('新闻信息编辑失败！');window.location.href='update_news.php';</script>";
        }

    }
    if($catagory_id=='科技'){
        $sql = "update science set title='$title',content='$content' where news_id ='$id' and catagory_id ='$catagory_id';";
        $result = mysqli_query($link,$sql);
        if($result){
            echo "<script>alert('新闻信息编辑成功！');window.location.href='update_news.php';</script>";
        }else{
            echo "<script>alert('新闻信息编辑失败！');window.location.href='update_news.php';</script>";
        }
    
    }
    if($catagory_id=='经济'){
        $sql = "update economics set title='$title',content='$content' where news_id ='$id' and catagory_id ='$catagory_id';";
        $result = mysqli_query($link,$sql);
        if($result){
            echo "<script>alert('新闻信息编辑成功！');window.location.href='update_news.php';</script>";
        }else{
            echo "<script>alert('新闻信息编辑失败！');window.location.href='update_news.php';</script>";
        }
    
    }
    if($catagory_id=='音乐'){
        $sql = "update music set title='$title',content='$content' where news_id ='$id' and catagory_id ='$catagory_id';";
        $result = mysqli_query($link,$sql);
        if($result){
            echo "<script>alert('新闻信息编辑成功！');window.location.href='update_news.php';</script>";
        }else{
            echo "<script>alert('新闻信息编辑失败！');window.location.href='update_news.php';</script>";
        }
    
    }
    if($catagory_id=='动漫'){
        $sql = "update cartoon set title='$title',content='$content' where news_id ='$id' and catagory_id ='$catagory_id';";
        $result = mysqli_query($link,$sql);
        if($result){
            echo "<script>alert('新闻信息编辑成功！');window.location.href='update_news.php';</script>";
        }else{
            echo "<script>alert('新闻信息编辑失败！');window.location.href='update_news.php';</script>";
        }
    
    }

}
else if($texttype=='修改'){
    
//获取文件名
    $filename = $_FILES['myfile']['name'];
//获取文件临时路径
    $temp_name = $_FILES['myfile']['tmp_name'];
//获取文件的大小
    $file_size=$_FILES['myfile']['size'];
if($file_size>2*1024*1024) {
    echo "文件过大，不能上传大于2M的文件";
    exit();
}

    $file_type=$_FILES['myfile']['type'];
    echo $file_type;
if($file_type!="image/jpeg" && $file_type!='image/pjpeg') {
    echo "文件类型只能为jpg格式";
    exit();
}
if($catagory_id=='动漫'){
    $filename = $id.'_'.$filename;
    if (move_uploaded_file($temp_name, 'image/cartoon/'.$filename)){
		echo "<script>alert('文件上传成功！');window.history.go(-1);</script>";
        $file_name = 'image/cartoon/'.$filename;
        $sql = "update cartoon set title='$title',content='$content',picture='$file_name' where news_id ='$id' and catagory_id ='$catagory_id';";
        $result = mysqli_query($link,$sql);
        if($result){
            echo "<script>alert('新闻信息编辑成功！');window.location.href='update_news.php';</script>";
        }else{
            echo "<script>alert('新闻信息编辑失败！');window.location.href='update_news.php';</script>";
        }

    }

}
if($catagory_id=='音乐'){
    $filename = $id.'_'.$filename;
    if (move_uploaded_file($temp_name, 'image/music/'.$filename)){
		echo "<script>alert('文件上传成功！');window.history.go(-1);</script>";
        $file_name = 'image/music/'.$filename;
        $sql = "update music set title='$title',content='$content',picture='$file_name' where news_id ='$id' and catagory_id ='$catagory_id';";
        $result = mysqli_query($link,$sql);
        if($result){
            echo "<script>alert('新闻信息编辑成功！');window.location.href='update_news.php';</script>";
        }else{
            echo "<script>alert('新闻信息编辑失败！');window.location.href='update_news.php';</script>";
        }

    }


}
if($catagory_id=='经济'){
    $filename = $id.'_'.$filename;
    if (move_uploaded_file($temp_name, 'image/economics/'.$filename)){
		echo "<script>alert('文件上传成功！');window.history.go(-1);</script>";
        $file_name = 'image/economics/'.$filename;
        $sql = "update economics set title='$title',content='$content',picture='$file_name' where news_id ='$id' and catagory_id ='$catagory_id';";
        $result = mysqli_query($link,$sql);
        if($result){
            echo "<script>alert('新闻信息编辑成功！');window.location.href='update_news.php';</script>";
        }else{
            echo "<script>alert('新闻信息编辑失败！');window.location.href='update_news.php';</script>";
        }

    }


}
if($catagory_id=='体育'){
    $filename = $id.'_'.$filename;
    if (move_uploaded_file($temp_name, 'image/sport/'.$filename)){
		echo "<script>alert('文件上传成功！');window.history.go(-1);</script>";
        $file_name = 'image/sport/'.$filename;
        $sql = "update sport set title='$title',content='$content',picture='$file_name' where news_id ='$id' and catagory_id ='$catagory_id';";
        $result = mysqli_query($link,$sql);
        if($result){
            echo "<script>alert('新闻信息编辑成功！');window.location.href='update_news.php';</script>";
        }else{
            echo "<script>alert('新闻信息编辑失败！');window.location.href='update_news.php';</script>";
        }

    }


}

if($catagory_id=='科技'){
    $filename = $id.'_'.$filename;
    if (move_uploaded_file($temp_name, 'image/science/'.$filename)){
		echo "<script>alert('文件上传成功！');window.history.go(-1);</script>";
        $file_name = 'image/science/'.$filename;
        $sql = "update science set title='$title',content='$content',picture='$file_name' where news_id ='$id' and catagory_id ='$catagory_id';";
        $result = mysqli_query($link,$sql);
        if($result){
            echo "<script>alert('新闻信息编辑成功！');window.location.href='update_news.php';</script>";
        }else{
            echo "<script>alert('新闻信息编辑失败！');window.location.href='update_news.php';</script>";
        }

    }


}
    
}


?>