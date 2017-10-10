<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Kuta Admin 2.0.2</title>
		<link href="library/css/bootstrap.css" rel="stylesheet" />
		<link href="library/css/styles.css" rel="stylesheet" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script type="text/javascript" src="js/myjs.js"></script>
		<style type="text/css">
			form{margin:50px auto;width: 600px}
			b{font-weight: normal;font-size: 6px;}
			#sub{margin-left: 75px}
		</style>
	</head>
	<body>
<div id="left_layout">
			<div id="main_content" class="container-fluid">
				<div class="page-heading">
					<h2 class="page-title muted">
						<i class="icon-dashboard"></i> 管理管理员
					</h2>
				</div>	
				<ul class="breadcrumb breadcrumb-main">
					<li><a href="index.php" target="_top">首页</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li><a href="sel_admin.php" target="rightFrame">管理管理员</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li class="text-info">修改管理员</li>
				</ul>
					<?php
						require '../data/db_function.php';
						$link=db_connect($conf);
					?>
					<form method="post">						
						<span>用户名　：</span>
						<input type="text" name="user" id='user' onblur="input_limit(1)" /><b id="show_user"></b><br>
						<span>密　　码：</span>						
						<input type="password" name="pwd" id="pwd" onblur="input_limit(2)"  /><b id="show_pwd"></b><br>
						<span>确认密码：</span>						
						<input type="password" name="pwd" id="agin" onblur="input_limit(3)" /><b id="pwd_agin"></b><br>
						<span>权　　限：</span>						
						<select name="power">
							<option value="超级管理员">超级管理员</option>
							<option value="管理员" selected>管理员</option>
						</select><br>
						<input type="submit" name="sub" value="添加" id="sub" onclick="return url_limit()">
						<?php
							if(isset($_POST['sub']))
							{
								array_pop($_POST);
								db_insert($_POST,'tb_admin');
								header('location:sel_admin.php');
							}
						?>					
					</form>			
			</div>
</div>
</body>
</html>