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
						<i class="icon-dashboard"></i> 添加栏目
					</h2>
				</div>	
				<ul class="breadcrumb breadcrumb-main">
					<li><a href="index.php" target="_top">首页</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li><a href="sel_column.php">栏目管理</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li class="text-info">添加栏目</li> 
				</ul>
				<form method="post" >
					<?php
					require '../data/db_function.php';
					db_connect($conf);	
					?>
					<table>
						<tr><td align="right">栏目名称：</td><td><input type="text" name="name"  /></td></tr>
						<tr><td align="right">所属栏目：</td><td><?=get_all_select();?></td></tr>
						<tr><td colspan="2"><input type="submit" name="sub" id="sub" value="添加"></td></tr>
					</table>
				</form>				
			</div>
			<?php
				if(isset($_POST['sub']))
				{
					if($_POST['name'] != '')
					{
						array_pop($_POST);
						$res = db_insert($_POST,'tb_column');
						if(mysql_insert_id())
						{
							header('location:sel_column.php');
						}
					}
				}
			?>
</div>
</body>
</html>