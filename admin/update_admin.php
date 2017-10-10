<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Kuta Admin 2.0.2</title>
		<link href="library/css/bootstrap.css" rel="stylesheet" />
		<link href="library/css/styles.css" rel="stylesheet" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<style type="text/css">
			form{margin-top: 50px}
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
						$id=$_GET['id'];
						$arr=db_select_admin_id('tb_admin',$id);
					?>
					<form method="post">						
						<span>用户名：</span>
						<input type="text" name="user" value="<?=$arr['user'] ?>" >
						<span>密码：</span>						
						<input type="text" name="pwd" value="<?=$arr['pwd'] ?>" >
						<span>权限：</span>						
						<input type="text" name="power" value="<?=$arr['power'] ?>" >
						<span>添加时间：</span>	
						<span><?=$arr['time'] ?></span>
						<input type="submit" name="sub" value="修改" id="sub">
						<?php
							if(isset($_POST['sub']))
							{
								date_default_timezone_set('Asia/shanghai');
								$time = date('Y-m-d H:i:s');
								$sql = "update tb_admin set user='{$_POST['user']}',pwd='{$_POST['pwd']}',power='{$_POST['power']}',time='{$time}' where id='$id'";
								mysql_query($sql) or die(mysql_error());
								header('location:sel_admin.php');
							}
						?>					
					</form>				
			</div>

</div>
</body>
</html>