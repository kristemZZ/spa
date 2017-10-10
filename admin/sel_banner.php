<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Kuta Admin 2.0.2</title>
		<link href="library/css/bootstrap.css" rel="stylesheet" />
		<link href="library/css/styles.css" rel="stylesheet" />
		<script type="text/javascript" src="js/jquery.js"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script type="text/javascript" src="js/myjs.js"></script>
		<style type="text/css">
			#slider_banner {overflow: hidden;zoom:1;width: 950px;margin: 60px auto}
			#slider_banner ul {margin-top: 50px}
			#banner_pic{display: block;width: 200px;height: 200px}
			#slider_banner ul li a:hover{color: #f00}
			#slider_banner ul li {width: 250px;height: 200px;float: left;position: relative;}
			.ban_chk{position: absolute;right: 50px;top: 0; }
			.del{ position: absolute;right: 50px;bottom: 15px;}
			#slider_banner ul li img {width: 200px;height:150px}
			#slider_banner ul li span {display: block;text-align: center;width: 200px;height: 50px;line-height: 50px}
		</style>
	</head>
	<body>
<div id="left_layout">
			<div id="main_content" class="container-fluid">
				<div class="page-heading">
					<h2 class="page-title muted">
						<i class="icon-dashboard"></i> 轮播图管理
					</h2>
				</div>	
				<ul class="breadcrumb breadcrumb-main">
					<li><a href="index.php" target="_top">首页</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li><a href="sel_banner.php">轮播图</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li class="text-info">查看轮播图</li>
				</ul>
				<div id="slider_banner">
					<form method="post" action="del_check_banner.php">
						<input type="button" name="btn" value="全选" onclick="checkAll()" id="chk_all">
						<input type="button" name="btn" value="不选" onclick="uncheck()" id="un_chk">
						<input type="submit" name="sub" value="批量删除" id="sub" onclick="return get_confirm()">
						<input type="button" name="btn" value="添加" onclick="location.href='add_banner.php'" id="add_date">
						<ul>
						
							<?php
								require '../data/db_function.php';
								$list=page('tb_banner',$conf,$pagesize=3);
								foreach ($list as $val) 
								{
									if (is_array($val)) 
									{
										foreach ($val as $banner) 
										{	
							?>
									<li>
										<a id="banner_pic" href="update_center_banner.php?id=<?=$banner['id'] ?>" >
											<img src="<?='../'.$banner['srcpic'] ?>" />
											<span>
												<?=$banner['name'] ?> 
											</span>
										</a>
										<input type="checkbox" value="<?=$banner['id'] ?>" class="ban_chk" name ="chk[]" style="width:25px;height:25px" />
										<a class='del' href="del_banner.php?id=<?=$banner['id']?>" onclick="return get_confirm()">删除
										</a>
									</li>
							<?php

										}
									}	
								}
							?>
							</form>
						</ul>
						
				</div>
				<p class="prompt">
					<?php
						$str=admin_page_style($list,$_SERVER['PHP_SELF']);
						echo $str;
					?>
				</p>			
			</div>
</div>
</body>
</html>