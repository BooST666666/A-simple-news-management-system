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
				<div class="con_header"><div class="title"><span>您当前的位置：评论审核</span></div></div>
				<div style="margin-top: 20px; margin-bottom:30px;color:red; font-size:40px ;text-align: center;">编辑新闻信息</div>
                <table class="table1">
                     <tr>
                        <th width="20%">评论用户</th>
                        <th width="60%">评论内容</th>
                        <th width="10%">审核状态</th>
                        <th width="10%">修改状态</th>
                    </tr>
                    <?php
					
					mysqli_set_charset($link,"utf8");                          //设置编码格式
					/*  $_GET['page']为当前页，如果$_GET['page']为空，则初始化为1  */
					if (!isset($_GET['page'])){
						$_GET['page']=1;}
					   if (is_numeric($_GET['page'])){                            //判断变量$page是否为数字，如果是则返回true
						$page_size = 4;     		   					        //每页显示4条记录
						$query = "select * from review order by news_id desc";   
						$result = mysqli_query($link,$query);      				//查询符合条件的记录总条数
						$message_count = mysqli_num_rows($result);		        //要显示的总记录数
						$page_count = ceil($message_count/$page_size);	  	    //根据记录总数除以每页显示的记录数求出所分的页数
						$offset = ($_GET['page']-1)*$page_size;				    //计算下一页从第几条数据开始循环  
						$sql = mysqli_query($link,
                        "select * from review order by news_id desc limit $offset, $page_size");
						$row = mysqli_fetch_object($sql);                       //获取查询结果集
						if(!$row){                                              //如果未检索到信息，则输出提示信息
							echo "<font color='red'>暂无评论信息!</font>";
						}
						do{
						?>
					<tr>
					    <td style="font-size:14px; text-align:left"><?php echo $row->user_name;?></td>
						<td style="font-size:14px; text-align:left"><?php echo $row->content;?></td>
                        <td style="font-size:14px; text-align:left"><?php echo $row->state;?></td>
                        <td align="center"><a href="shenhe.php?id=<?php echo $row->news_id;?>&&review_qu=<?php echo $row->review_qu;?>&&state=<?php echo $row->state ?>"><img src="image/edit-box-fill.png"></a></td>
					</tr>
                    <?php
					}while($row = mysqli_fetch_object($sql));         //循环语句结束
					}
					?>
				</table>
                 <br>
                      <table style="width:100%; font-size:14px; border:0px;">
                        <tr>
                          <!--  翻页条 -->
							<td width="37%">&nbsp;&nbsp;页次：<?php echo $_GET['page'];?>/<?php echo $page_count;?>页&nbsp;记录：<?php echo $message_count;?> 条&nbsp; </td>
							<td width="63%" align="right">
							<?php
							if($_GET['page']!=1){                                           //如果当前页不是首页
							echo  "<a href=review_shenhe.php?page=1 >首页</a>&nbsp;";        //显示“首页”超链接
							echo "<a href=review_shenhe.php?page=".($_GET['page']-1).">上一页</a>&nbsp;";      //显示“上一页”超链接
							}
							if($_GET['page']<$page_count){                                  //如果当前页不是尾页
							echo "<a href=review_shenhe.php?page=".($_GET['page']+1).">下一页</a>&nbsp;";       //显示“下一页”超链接
							echo "<a href=review_shenhe.php?page=".$page_count.">尾页</a>";                  //显示“尾页”超链接
							}
					        mysqli_free_result($sql);                                    //释放结果集
					        mysqli_close($link);                                         //关闭数据库连接
							?>
                        </tr>
                      </table>
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