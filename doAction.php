<?php
include_once("functions/is_login.php");
session_start();
$url = $_SERVER["HTTP_REFERER"];
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


$title = $_POST['title'];           //获取新闻标题信息
$content = $_POST['content'];
$texttype=$_POST['texttype'];       //获取新闻内容信息

$user_id = $_SESSION['user_id'];
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

//$createtime = time();             //获取系统当前时间
//应用mysqli_query()函数执行insert…into语句添加数据到数据库，并使用if语句判断是否添加成功
if($texttype=='体育'){
    $sql = "select count(*) from sport";
    $result = mysqli_query($link,$sql);
    $row = mysqli_fetch_all($result);// 统计数据量，进行递增
    $news_id = $row[0][0] + 1;
    $filename = $news_id.'_'.$filename;// 防止被图片被覆盖
    if (move_uploaded_file($temp_name, 'image/sport/'.$filename)){
		echo "<script>alert('文件上传成功！');window.history.go(-1);</script>";
        $file_name = 'image/sport/'.$filename;
        $catagory_id = '体育';
        $currentDate = date("Y-m-d H:i:s"); 
        $address = 'sport_content.php?news_id= ';
        $cha = "insert into sport values('$news_id','$user_id','$catagory_id','$title','$file_name','$content','$currentDate','$address')";
        $check = mysqli_query($link,$cha);
        if ($check ) {
            echo "<script>alert('新闻信息添加成功!'); window.location.href = 'add_news.php';</script>";
         } else {
             echo "<script>alert('新闻信息添加失败!'); window.location.href = 'add_news.php';</script>";
            }
    }else{
		echo "<script>alert('文件上传失败,错误码：404$error');</script>";
	}
    

}
if($texttype=='科技'){
    $sql = "select count(*) from science";
    $result = mysqli_query($link,$sql);
    $row = mysqli_fetch_all($result);// 统计数据量，进行递增
    $news_id = $row[0][0] + 1;
    $currentDate = date("Y-m-d H:i:s"); 
    $filename = $news_id.'_'.$filename;// 防止被图片被覆盖
    if (move_uploaded_file($temp_name, 'image/science/'.$filename)){
		echo "<script>alert('文件上传成功！');window.history.go(-1);</script>";
        $file_name = 'image/science/'.$filename;
        $catagory_id = '科技';
        
        $address = 'science_content.php?news_id= ';
        $cha = "insert into science values('$news_id','$user_id','$catagory_id','$title','$file_name','$content','$currentDate','$address')";
        $check = mysqli_query($link,$cha);
        if ($check) {
            echo "<script>alert('新闻信息添加成功!'); window.location.href = 'add_news.php';</script>";
         } else {
             echo "<script>alert('新闻信息添加失败!'); window.location.href = 'add_news.php';</script>";
            }
    }else{
		echo "<script>alert('文件上传失败,错误码：404$error');</script>";
	}
    

}
if($texttype=='经济'){
    $sql = "select count(*) from economics";
    $result = mysqli_query($link,$sql);
    $row = mysqli_fetch_all($result);// 统计数据量，进行递增
    $news_id = $row[0][0] + 1;
    $filename = $news_id.'_'.$filename;// 防止被图片被覆盖
    if (move_uploaded_file($temp_name, 'image/economics/'.$filename)){
		echo "<script>alert('文件上传成功！');window.history.go(-1);</script>";
        $file_name = 'image/economics/'.$filename;
        $catagory_id = '经济';
        $currentDate = date("Y-m-d H:i:s"); 
        $address = 'economics_content.php?news_id= ';
        $cha = "insert into economics values('$news_id','$user_id','$catagory_id','$title','$file_name','$content','$currentDate','$address')";
        $check = mysqli_query($link,$cha);
        if ($check ) {
            echo "<script>alert('新闻信息添加成功!'); window.location.href = 'add_news.php';</script>";
         } else {
             echo "<script>alert('新闻信息添加失败!'); window.location.href = 'add_news.php';</script>";
            }
    }else{
		echo "<script>alert('文件上传失败,错误码：404$error');</script>";
	}
    

}
if($texttype=='音乐'){
    $sql = "select count(*) from music";
    $result = mysqli_query($link,$sql);
    $row = mysqli_fetch_all($result);// 统计数据量，进行递增
    $news_id = $row[0][0] + 1;
    $filename = $news_id.'_'.$filename;// 防止被图片被覆盖
    if (move_uploaded_file($temp_name, 'image/music/'.$filename)){
		echo "<script>alert('文件上传成功！');window.history.go(-1);</script>";
        $file_name = 'image/music/'.$filename;
        $catagory_id = '音乐';
        $currentDate = date("Y-m-d H:i:s"); 
        $address = 'music_content.php?news_id= ';
        $cha = "insert into music values('$news_id','$user_id','$catagory_id','$title','$file_name','$content','$currentDate','$address')";
        $check = mysqli_query($link,$cha);
        if ($check ) {
            echo "<script>alert('新闻信息添加成功!'); window.location.href = 'add_news.php';</script>";
         } else {
             echo "<script>alert('新闻信息添加失败!'); window.location.href = 'add_news.php';</script>";
            }
    }else{
		echo "<script>alert('文件上传失败,错误码：404$error');</script>";
	}
    

}
if($texttype=='动漫'){
    $sql = "select count(*) from cartoon";
    $result = mysqli_query($link,$sql);
    $row = mysqli_fetch_all($result);// 统计数据量，进行递增
    $news_id = $row[0][0] + 1;
    $filename = $news_id.'_'.$filename;// 防止被图片被覆盖
    if (move_uploaded_file($temp_name, 'image/cartoon/'.$filename)){
		echo "<script>alert('文件上传成功！');window.history.go(-1);</script>";
        $file_name = 'image/cartoon/'.$filename;
        $catagory_id = '动漫';
        $currentDate = date("Y-m-d H:i:s"); 
        $address = 'cartoon_content.php?news_id= ';
        $cha = "insert into cartoon values('$news_id','$user_id','$catagory_id','$title','$file_name','$content','$currentDate','$address')";
        $check = mysqli_query($link,$cha);
        if ($check ) {
            echo "<script>alert('新闻信息添加成功!'); window.location.href = 'add_news.php';</script>";
         } else {
             echo "<script>alert('新闻信息添加失败!'); window.location.href = 'add_news.php';</script>";
            }
    }else{
		echo "<script>alert('文件上传失败,错误码：404$error');</script>";
	}
    

}

mysqli_close($link);
?>