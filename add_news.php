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
function check(form){
	if(form.txt_title.value==""){
		alert("请输入新闻标题!");form.txt_title.focus();return false;
	}
	if(form.txt_content.value==""){
		alert("请输入新闻内容!");form.txt_content.focus();return false;
	}
form.submit();
}
</script>
<div class="bgimg">
<a href="login_out.php" title="退出"><img src="image/logout-box-r-line.png" ></a>
</div>
<div class="content">
    <div class="con_left">
        <div class="con_left1">
            <div class="con_header"><div class="title"><span>新闻管理</span></div></div>
            <div>
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
            <div>
                <div class="con_header"><div class="title"><span>您当前的位置：添加新闻信息</span></div></div>
                <div style="margin-top:100px;margin-left: 100px;">
                    <form name="form1" method="post" action="doAction.php" enctype="multipart/form-data">
                        <table width="520" height="212" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                            
                            <tr>
                                <td width="87" align="center">新闻标题：</td>
                                
                                <td width="433" height="31"><input required name="title" type="text" id="txt_title" size="40">*</td>
                            </tr>
                            <tr>
                                <td height="124" align="center">新闻内容：</td>
                                <td><textarea name="content" cols="50" required rows="8" id="txt_content" style="resize: none;"></textarea>*</td>
                            </tr>
                            <tr>
                                <td width="87" align="center" >新闻配图：</td>
                                <td>
                                <input style="margin-top:4px ;" type="file" name="myfile" >
                                </td>
                                
                            </tr>
                            <tr>
                                <td width="87" align="center">新闻元素：</td>
                                <td>
                                    <select name="texttype" >
                                    <option value="体育">体育</option>
                                    <option value="科技">科技</option>
                                    <option value="音乐">音乐</option>
                                    <option value="经济">经济</option>
                                    <option value="动漫">动漫</option>
                                </select>
                                *
                                </td>
                                
                            </tr>
                            <tr>
                                <td height="40" colspan="2" align="center">
                                <input name="Submit" type="button" class="btn_grey" value="提交" style="margin: 35px 80px 40px auto;" onClick="return check(form1);">
                                    &nbsp; <input type="reset" name="Submit2" value="重置" class="btn_back"></td>
                            </tr>
                        </table>
                    </form>
                </div>
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