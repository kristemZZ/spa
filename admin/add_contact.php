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
			.reg{background: #bad8c1}
			tr:hover{background: #aaaaaa}
			table{border: 1px dashed #aaaaaa}
		</style>
	</head>
	<body>
<div id="left_layout">
			<div id="main_content" class="container-fluid">
				<div class="page-heading">
					<h2 class="page-title muted">
						<i class="icon-dashboard"></i> 联系我们
					</h2>
				</div>	
				<ul class="breadcrumb breadcrumb-main">
					<li><a href="index.php" target="_top">首页</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li><a href="sel_contact.php">联系我们</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li class="text-info">添加信息</li>
				</ul>
				<div id="slider_banner">
					<form method="post">
						<input type="text" name="qq" placeholder="输入格式:客服QQ:xxxxxxxx">
						<input type="text" name="fax" placeholder="输入格式:传真:">
						<input type="text" name="email" placeholder="输入格式:邮箱:">
						<input type="text" name="phone" placeholder="输入格式:电话:">
						<input type="submit" name="sub" value="修改" id="sub">
					</form>
				</div>			
			</div>
			<script type="text/javascript">
				$('#main_content table tr:nth-child(2n+3)').addClass('reg');
			</script>
			<?php
			require '../data/db_function.php';
			db_connect($conf);
			if(isset($_POST['sub']))
			{
				array_pop($_POST);
				$res = db_insert($_POST,'tb_contact');
				if($res)
				{
					header('location:sel_contact.php');
				}
			}
			?>
</div>
</body>
</html>