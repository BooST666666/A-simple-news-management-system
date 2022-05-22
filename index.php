<?php
include_once("functions/is_login.php");
session_start();
$server="localhost";
$db_user="root";// 用户名
$db_psw="root";// 登录密码
$link =mysqli_connect($server,$db_user,$db_psw)or die("Unable to connect to MySQL"); 
echo ""; // mysqli_connect连接数据库，地址，用户名，密码 
$selected = mysqli_select_db($link,"news") or die("Could not select examples"); // 寻找数据库

?>
<!DOCTYPE html>
<html>
	<head>
		
		<meta charset="utf-8">
		<title>news</title>
		<link href="size/fonts/remixicon.css" rel="stylesheet">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/swiper-bundle.min.css"/>
		<link rel="shortcut icon" href="image/icon.jpg" type="image/x-icon">
  
	</head>
	<body>
		<header>
			<div class="nav-bar">
				<a href="index.php" class="logo">BooST News</a>
				<div class="navigation">
					<div class="nav-items">
						<i class="ri-close-line nav-close-btn"></i>
						<a href="index.php"><i class="ri-home-line"></i>主页</a>
						<a href="find.php"><i class="ri-search-line"></i>搜索</a>
						<a href="login.html"><i class="ri-creative-commons-by-line"></i>登录</a>
						<a href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=v42NiYqNjIqMiY--zs6R3NDS"><i class="ri-qq-line"></i>联系我</a>
						<a href="login_out.php"><i class="ri-logout-box-r-line"></i>退出</a>
					</div>
				</div>
				<i class="ri-function-line nav-menu-btn"></i>
			</div>
		</header>

		<section class="home">


			<div class="media-icons">
				<a href=""><i class="ri-qq-fill"></i></a>
				<a href=""><i class="ri-wechat-fill"></i></a>
				<a href=""><i class="ri-weibo-fill"></i></a>
			</div>

			<div class="swiper bg-slider">
			<div class="swiper-wrapper">
			  <div class="swiper-slide dark-layer">
				<img src="image/fengmian/sport.jpg" alt="">
				<div class="text-content">
					<h2 class="title">体育<span> </span></h2>
					<p> 体育新闻是传播人类体育运动、健身活动及其相关的一些信息，张扬人类向自身的极限挑战、不断战胜自我、超越自我、追求自身的至善至美的一种人文精神。</p>
					<button class="read-btn" >往下拉了解更多<i class="ri-arrow-right-line"></i></button>
				</div>
			  </div>
			  <div class="swiper-slide dark-layer">
				<img src="image/fengmian/economics.jpg" alt="">
				<div class="text-content">
					<h2 class="title">经济<span> </span></h2>
					<p>以经济为主要报道内容,兼顾社会、文化,为读者提供前瞻性的权威信息。</p>
					<button class="read-btn">往下拉了解更多<i class="ri-arrow-right-line"></i></button>
				</div>
			  </div>
			  <div class="swiper-slide dark-layer">
				<img src="image/fengmian/science.jpg" alt="">
				<div class="text-content">
					<h2 class="title">科技 <span> </span></h2>
					<p> 科技新闻是指科学技术领域新近发生的事实的报道。所谓科技事实可以是科技成果及其推广应用，可以是党和国家的科技政策，也可以是科技工作者的成就、科技界的活动。这些科技事实经过报道、传播，才成为科技新闻。</p>
					<button class="read-btn">往下拉了解更多<i class="ri-arrow-right-line"></i></button>
				</div>
			  </div>
			  <div class="swiper-slide dark-layer">
				<img src="image/fengmian/music.jpg" alt="">
				<div class="text-content">
					<h2 class="title">音乐 <span> </span></h2>
					<p>为广大的音乐爱好者和发烧友提供最新的音乐新闻和音乐推荐</p>
					<button class="read-btn">往下拉了解更多<i class="ri-arrow-right-line"></i></button>
				</div>
			  </div>
			  <div class="swiper-slide dark-layer">
				<img src="image/fengmian/cartoon.jpg" alt="">
				<div class="text-content">
					<h2 class="title">动漫 <span> </span></h2>
					<p> 动漫即是动画和漫画的合称，因两者间存在密切联系而(汉语里)一般把两者合称为动漫。当今网络、电视、杂志等媒体上“动漫”一词已经被频繁使用，但因为部分传媒的误用，对这一词的误解也越来越多。

动漫是动画或漫画的合称与缩写，是在华人地区才有的称呼，另外西方国家将日本动画称Anime、漫画则称为Manga。

而现今，动漫的发展已属于文化创意产业，同时是目前全世界热门且高人气的流行文化。</p>
					<button class="read-btn">往下拉了解更多<i class="ri-arrow-right-line"></i></button>
				</div>
			  </div>
			</div>
		  </div>

		  <div class="bg-slider-thumbs">
			<div class="swiper-wrapper thumbs-container">
			  <img src="image/fengmian/sport.jpg" class="swiper-slide" alt="">
			  <img src="image/fengmian/economics.jpg" class="swiper-slide" alt="">
			  <img src="image/fengmian/science.jpg" class="swiper-slide" alt="">
			  <img src="image/fengmian/music.jpg" class="swiper-slide" alt="">
			  <img src="image/fengmian/cartoon.jpg" class="swiper-slide" alt="">
			</div>
		  </div>
		</section>
		
		<div class="main">
				


				<div class="news left">
					<div>
						<div class="title_b">
							<span>体育</span>
						<div class="news_view" style="height: 238px;">
							<ul>
								
								<?php
								$sql= "select * from sport order by news_id desc";
								$newsRes = mysqli_query($link,$sql);
								while($news = mysqli_fetch_array($newsRes)){
							    	echo
									"<li>
									<span>$news[6]</span>
									<a href='sport_content.php?news_id= ".$news[0]."'>$news[3]</a>
									</li>";
								}
								?>
							</ul>
						</div>
					    </div>
						
					
				    </div>
			    </div>
				
				<div class="m_r right">
					<div class="guanggao">
						<table align="center">
							<tbody>
								<tr>
									<td>
										<a href="#">
											<img src="image/zu.png">
								        </a>  
								    </td>
						        </tr>
					        </tbody>
				        </table>
					</div>

					<div class="guanggao" style="padding-top : 20px">
					    <div class="title_b title_a">
						<span style="border-bottom:3px solid lightblue;">动漫</span>
						</div>
						<div class="news_lb">
							<ul>
							<?php
								$sql= "select * from cartoon order by news_id desc";
								$newsRes = mysqli_query($link,$sql);
								while($news = mysqli_fetch_array($newsRes)){
							    	echo
									"<li>
									<span>$news[6]</span>
									<a href='cartoon_content.php?news_id= ".$news[0]."'>$news[3]</a>
									</li>";
								}
								?>
							</ul>

				
				
				        </div>
						<div class="title_b title_a">
						<span style="border-bottom:3px solid lightblue;">科技</span>
						</div>
						<div class="news_lb">
							<ul>
							<?php
								$sql= "select * from science order by news_id desc";
								$newsRes = mysqli_query($link,$sql);
								while($news = mysqli_fetch_array($newsRes)){
							    	echo
									"<li>
									<span>$news[6]</span>
									<a href='science_content.php?news_id= ".$news[0]."'>$news[3]</a>
									</li>";
								}
								?>
							</ul>

				
				
				        </div>


				    </div>
				
		        </div>
		
		    <div class="news left">
					<div>
						<div class="title_b">
							<span>经济</span>
						<div class="news_view" style="height: 238px;">
							<ul>
								
							<?php
								$sql= "select * from economics order by news_id desc";
								$newsRes = mysqli_query($link,$sql);
								while($news = mysqli_fetch_array($newsRes)){
							    	echo
									"<li>
									<span>$news[6]</span>
									<a href='economics_content.php?news_id= ".$news[0]."'>$news[3]</a>
									</li>";
								}
								?>
							</ul>
						</div>
					    </div>
						
					
				    </div>
			</div>
			<div class="news left">
					<div>
						<div class="title_b">
							<span>音乐</span>
						<div class="news_view" style="height: 238px;">
							<ul>
								
							<?php
								$sql= "select * from music order by news_id desc";
								$newsRes = mysqli_query($link,$sql);
								while($news = mysqli_fetch_array($newsRes)){
							    	echo
									"<li>
									<span>$news[6]</span>
									<a href='music_content.php?news_id= ".$news[0]."'>$news[3]</a>
									</li>";
								}
								?>
							</ul>
						</div>
					    </div>
						
					
				    </div>
			</div>
			
			
		
		
	
		</div>
	    <div class="f">
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
		
		
		<script src="js/swiper-bundle.min.js"></script>
		<script src="js/style.js"></script>

		<script src="js/scrollreveal.min.js"></script>
	</body>

</html>
