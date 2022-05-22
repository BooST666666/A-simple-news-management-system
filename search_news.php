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
                   
?>
<html>
<head>
<title>新闻信息管理</title>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
<link href="css/backstage.css" rel="stylesheet">
</head>
<body>
<script language="javascript">
function check(form){                    //验证表单信息是否为空
//若查询关键字为空，则弹出提示信息，并定位光标
	if(form1.keyword.value==""){
		alert("请输入查询关键字!");
		form1.keyword.focus();
		return false;
	} 
form1.submit();                           //若各控件不为空，则提交表单信息
}
</script>
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
		<div>
			<div class="blog_list_wrap">
				<div class="con_header"><div class="title"><span>您当前的位置：查询新闻信息</span></div></div>
				<div style="margin-top: 20px;margin-left: 120px;">
					<form name="form1" method="post" action="doSearch.php">
						查询关键字&nbsp;
						<input name="keyword" type="text" id="keyword" size="40">
						&nbsp;
						<input type="submit" name="Submit" value="搜索" class="btn_grey" onClick="return check(form)">
					</form>
				</div>
                <table class="table1">
                    <tr>
                        <th width="20%">新闻标题</th>
                        <th width="80%">新闻内容</th>
                       
                    </tr>
				</table>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>



<div class="f">
			<div class="width">
				<div class="f_word" >
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