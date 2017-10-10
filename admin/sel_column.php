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
						<i class="icon-dashboard"></i> 栏目管理
					</h2>
				</div>	
				<ul class="breadcrumb breadcrumb-main">
					<li><a href="index.php" target="_top">首页</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li><a href="sel_column.php">栏目管理</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li class="text-info">查看栏目</li>
				</ul>
				<div id="slider_banner">
					<form method="post" action="del_column.php">
						<input type="button" name="btn" value="添加栏目" onclick="location.href='add_column.php'" id="add_date">
						<table width="1000" cellspacing="0" cellpadding="0">
							<tr align="center">
								<td>序号</td>
								<td>栏目名称</td>
								<td>添加时间</td>
								<td>操作</td>
							</tr>
							<?php
								require '../data/db_function.php';
								db_connect($conf);
								$column_list = get_child();
								$i = 1;
								foreach ($column_list as $val) 
								{
							?>
								<tr align="center">
									<td><?=$i ?></td>
									<td align="left"><?=$val['name'] ?></td>
									<td><?=$val['time'] ?></td>
									<td id="news_list"><a href="update_column.php?id=<?=$val['id'] ?>">修改</a><a href="del_column.php?id=<?=$val['id'] ?>" onclick="return get_confirm()">删除</a></td>
								</tr>
							<?php
									$i++;
								}	
							?>
						</table>
						</form>	
				</div>			
			</div>
			<script type="text/javascript">
				$('#main_content table tr:nth-child(2n+3)').addClass('reg');
			</script>
</div>
</body>
</html>