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
$title = $_GET['title'];//使用get方法接收欲编辑的新闻id
$catagory_id = $_GET['catagory_id'];
// echo $id;
// echo $catagory_id;
// echo $title;
// $content = $_GET['content'];                                  
$sql = "(select * from sport where title = '$title'  and news_id ='$id' and catagory_id = '$catagory_id')
union
(select * from science where title = '$title'  and news_id ='$id' and catagory_id = '$catagory_id')
union
(select * from music where title = '$title'  and news_id ='$id'and catagory_id = '$catagory_id')
union
(select * from economics where title = '$title'  and news_id ='$id'and catagory_id = '$catagory_id')
union
(select * from cartoon where title = '$title' and news_id ='$id' and catagory_id = '$catagory_id')";       //从数据库中查找新闻id对应的新闻信息
$result = mysqli_query($link,$sql);                  //检索新闻id对应的新闻信息
while($rows = mysqli_fetch_array($result)){
    $title = $rows['title'];
    $content = $rows['content'];

}
   
		// if (!$result) { // 检查sql问题，输出其问题错误所在
		//  printf("Error: %s\n", mysqli_error($link));
	  	// exit();
		//    }
?>
<html>
<head>

<title>新闻信息管理</title>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
<link href="css/backstage.css" rel="stylesheet">
</head>
<body>
<div class="bgimg">
<a href="login_out.php" title="退出"><img src="image/logout-box-r-line.png" ></a>
</div>
<div class="content">
	<div class="con_left">
		<div class="con_left1">
			<div class="con_header"><div class="title"><span>新闻管理</span></div></div>
			<div class="">
				<ul><li><a href="add_news.php">添加新闻信息</a></li></ul><hr/>
				<ul><li><a href="search_news.php">查询新闻信息</a></li></ul><hr/>
				<ul><li><a href="update_news.php">编辑新闻信息</a></li></ul><hr/>
				<ul><li><a href="delete_news.php">删除新闻信息</a></li></ul><hr/>
                <ul><li><a href="review_shenhe.php">评论审核</a></li></ul><hr/>
                <ul><li><a href="delete_review.php">删除评论</a></li></ul><hr/>
			</div>
		</div>
	</div>
	<div class="con_right">
        <div class="">
            <div class="">
                <div class="con_header"><div class="title"><span>您当前的位置：编辑新闻信息</span></div></div>
                <div style="margin-top:100px;margin-left: 100px;">
                    <form name="form1" method="post" enctype="multipart/form-data" action="update_modify_ok.php?id=<?php echo $id;?>&&catagory_id=<?php echo $catagory_id;?>">
                        <table width="550" height="212" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                            <tr>
                                <td width="87" align="center">新闻题目：</td>
                                <td width="433" height="31"><input name="title" type="text" id="txt_title" size="40"  value ="<?php echo $title;?>" required>
                                

                                *</td>
                            </tr>
                            <tr>
                                <td height="124" align="center">新闻内容：</td>
                                <td><textarea name="content" cols="50" required rows="8" style="resize: none;"><?php echo $content;?></textarea>*</td>
                            </tr>
                            <tr>
                                <td width="87" align="center" >新闻配图：</td>
                                <td>
                                <input style="margin-top:4px ;" type="file" name="myfile">
                                </td>
                                
                            </tr>
                            <tr>
                                <td width="187" align="center" style="font-size:10px ;">新闻配图是否做修改：</td>
                                <td>
                                    <select name="texttype" >
                                    <option value="不修改">不修改</option>
                                    <option value="修改">修改</option>
                                </select>
                                *
                                </td>
                                
                            </tr>
                            <tr>
                                <td height="40" colspan="2" align="center">
                                <input name="Submit" type="submit" class="btn_grey" value="修改" >
                                    &nbsp; <input type="reset" name="Submit2" value="重置"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<div class="f" style="height: 150px;">
			<div class="width">
				<div class="f_word">
					<img src="./image/QQ.jpg">
					<p>
						
						@ Code by &nbsp;&nbsp;&nbsp;&nbsp;<label style=" font-size: 2em;font-weight: 500;">BooST</label>
						<?php
						//  echo'user_id:'.$_SESSION['user_id'];
						//  echo'passwd:'.$_SESSION['password'];
						//  echo'name:'.$_SESSION['name'];   test
						?>
					</p>
				</div>
			
		       
            </div>
		</div>
</body>
</html>