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
			table{border：1px dashed #aaaaaa}
			#sub{margin-left: 190px}
		</style>
	</head>
	<body>
<div id="left_layout">
			<div id="main_content" class="container-fluid">
				<div class="page-heading">
					<h2 class="page-title muted">
						<i class="icon-dashboard"></i> 关于我们
					</h2>
				</div>	
				<ul class="breadcrumb breadcrumb-main">
					<li><a href="index.php" target="_top">首页</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li><a href="sel_aboutus.php">关于我们</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li class="text-info">查看信息</li>
				</ul>
				<div id="slider_banner">
				<form method="post" enctype="multipart/form-data">
					<table width="1000" cellspacing="0" cellpadding="0">
						<?php
						require '../data/db_function.php';
						db_connect($conf);
						$id = $_GET['id'];
						$arr = db_select_admin_id('tb_aboutus',$id);
						?>
						<tr>
							<td align="right">栏目名称：</td>
							<td><input type="text" name="name" value="<?=$arr['name'] ?>" /></td>	
						</tr>
						<tr>
							<td align="right">标题：</td>
							<td>
								<textarea name="center_title"><?=$arr['center_title']?></textarea>
							</td>	
						</tr>
						<tr>
							<td align="right">内容：</td>
							<td>
								<textarea name="center_content"><?=$arr['center_content']?></textarea>
							</td>	
						</tr>
						<tr>
							<td align="right">图片标题：</td>
							<td>
								<input type="text" name="pic_title" value="<?=$arr['pic_title'] ?>" />
							</td>	
						</tr>
						<tr>
							<td align="right">图片：</td>
							<td>
								<img src="<?='../'.$arr['pic'] ?>" width='300' height='300' />
							</td>	
						</tr>
						<tr>
							<td align="right">修改图片：</td>
							<td>
								<input type="file" name="pic">
							</td>
						</tr>
						<tr>
							<td align="right">添加时间：</td>
							<td><?=$arr['time']?></td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="submit" name="sub" value="修改" id="sub">
							</td>
						</tr>
					</table>
				</form>
				</div>			
			</div>
			<?php
				if(isset($_POST['sub']))
				{
					admin_update_aboutus($_POST,$_FILES['pic'],$id);
				}
			?>
</div>
</body>
</html>