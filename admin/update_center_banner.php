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
			table{margin: 0 auto}
			#sub{margin-left: 70px}
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
					<li class="text-info">修改轮播图</li>
				</ul>

					<?php
						require '../data/db_function.php';
						db_connect($conf);
						$id=$_GET['id'];
						$arr=db_select_admin_id('tb_banner',$id);
					?>
					<form method="post" enctype="multipart/form-data">
						<table>
							<tr><td align="right">图片名称：</td><td><input type="text" name="name" value="<?=$arr['name'] ?>" /></td></tr>
							<tr><td valign="top" align="right">图片：</td><td><img src="../<?=$arr['srcpic'] ?>" width="400" height="400"/></td></tr>
							<tr><td align="right">修改图片：</td><td><input type="file" name="srcpic" /></td></tr>
							<tr><td align="right">添加时间：</td><td><?=$arr['time'] ?></td></tr>
							<tr><td colspan="2"><input type="submit" name="sub" id="sub" value="修改"></td></tr>
						</table>
					</form>		
			</div>
			<?php
			if(isset($_POST['sub']))
			{
				admin_update_banner($_POST,$_FILES['srcpic'],$id);
			}
			?>
</div>
</body>
</html>