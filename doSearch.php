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
                   $search=$_POST['keyword'];
                   
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
				<div class="con_header"><div class="title"><span>您当前的位置：搜索新闻结果</span></div></div>
				
                <table class="table1">
                    <tr>
                        <th width="20%">新闻标题</th>
                        <th width="80%">新闻内容</th>
                       
                    </tr>
            <?php
                
                
                $sql1 = "(select * from sport where title like '%$search%' or content like '%$search' order by news_id desc)
                union
                (select * from science where title like '%$search%' or content like '%$search' order by news_id desc)
                union
                (select * from music where title like '%$search%' or content like '%$search' order by news_id desc)
                union
                (select * from economics where title like '%$search%' or content like '%$search' order by news_id desc)
                union
                (select * from cartoon where title like '%$search%' or content like '%$search' order by news_id desc)";

                $newsRes1 = mysqli_query($link,$sql1);
                
               
                $row = mysqli_fetch_object($newsRes1);                 //获取查询结果集
				if(!$row){
					echo "<font color='red'>您搜索的信息不存在，请使用类似的关键字进行检索!</font>";
					}                                                 //如果要检索的信息资源不存在，则弹出提示信息
					do{                                               //使用do…while循环语句输出查询结果
                    ?>
					<tr>
					    <td style="font-size:14px; text-align:left"><?php echo $row->title;?></td>
						<td style="font-size:14px; text-align:left"><?php echo $row->content;?></td>
					</tr>
                    <?php
					}
                    while($row = mysqli_fetch_object($newsRes1));         //循环语句结束
					mysqli_free_result($newsRes1);                         //释放结果集
					mysqli_close($link);     
                
		// if (!$newsRes1) { // 检查sql问题，输出其问题错误所在
		// printf("Error: %s\n", mysqli_error($link));
		// 	exit();
		//   }





			?>
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