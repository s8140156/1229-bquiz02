<?php
include_once "./api/db.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>健康促進網</title>
	<link href="./css/css.css" rel="stylesheet" type="text/css">
	<script src="./js/jquery-1.9.1.min.js"></script>
	<script src="./js/js.js"></script>
	<!-- 起首式 整理素材 調整路徑 -->
	<style>
		.pop {
			background: rgba(51, 51, 51, 0.8);
			color: #FFF;
			min-height: 300px;
			width: 300px;
			position: absolute; /*讓modal視窗固定不要動*/
			display: none;
			z-index: 9999;
			overflow: auto;
			padding: 10px;
		}
	</style>
</head>

<body>
	<!-- <div id="alerr" style=>
		<pre id="ssaa"></pre>
	</div> -->
	<!-- <iframe name="back" style="display:none;"></iframe> -->
	<!-- 改用ajax -->
	<div id="all">
		<div id="title">
			<?= date("m月d日 l"); ?> |
			<!-- l 是顯示英文星期 -->
			今日瀏覽:<?= $Total->find(['date' => date('Y-m-d')])['total']; ?> | <!--一開始以為要先用判斷 但是其實就是拿今天日期裡面的total欄位放上即可-->
			累積瀏覽: <?= $Total->sum('total'); ?> <!-- 使用sum把total欄位加總 -->
			<a href="index.php" style="float: right;">回首頁</a> <!-- 這邊加入回首頁float定位右 -->
		</div>
		<div id="title2" title="健康促進網-回首頁">
			<!-- 替代文字寫在這邊title -->
			<a href="index.php">
				<img src="./icon/02B01.jpg" alt="">
			</a>
			<!-- 這邊加入banner圖片 @titile2 -->
		</div>
		<div id="mm">
			<div class="hal" id="lef">
				<a class="blo" href="?do=po">分類網誌</a>
				<a class="blo" href="?do=news">最新文章</a>
				<a class="blo" href="?do=pop">人氣文章</a>
				<a class="blo" href="?do=know">講座訊息</a>
				<a class="blo" href="?do=que">問卷調查</a>
			</div>
			<div class="hal" id="main">
				<div>
					<marquee style="width:80%; display:inline-block;">請民眾踴躍投稿電子報，讓電子報成為大家相互交流、分享的園地！詳見最新文章</marquee>
					<!-- 增加跑馬燈,並須調整寬度 不然會員登入會被擠下去 因為是block(box佔滿整行)屬性關係 -->
					<!-- style比照以下span -->
					<!-- 觀察版面 跑馬燈位置在會員登入的左邊 -->

					<span style="width:16%; display:inline-block;">
						<?php
						if (!isset($_SESSION['user'])) {

						?>
							<a href="?do=login">會員登入</a>
						<?php
						} else {


						?>
							歡迎,<?= $_SESSION['user']; ?>
							<button onclick="location.href='./api/logout.php'">登出</button>
							<?php
							if ($_SESSION['user'] == 'admin') {
							?>
								<button onclick="location.href='back.php'">管理</button>
						<?php
							}
						}

						?>
					</span>
					<div class="">
						<!-- 在這邊切換不同fron/do?頁面進來 -->
						<?php
						$do = $_GET['do'] ?? 'main';
						$file = "./front/{$do}.php";
						if (file_exists($file)) {
							include $file;
						} else {
							include "./front/main.php";;
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<div id="bottom">
			本網站建議使用：IE9.0以上版本，1024 x 768 pixels 以上觀賞瀏覽 ， Copyright © 2024健康促進網社群平台 All Right Reserved
			<br>
			服務信箱：health@test.labor.gov.tw<img src="./icon/02B02.jpg" width="45">
		</div>
	</div>

</body>

</html>