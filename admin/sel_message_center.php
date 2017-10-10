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
			table{border: 1px dashed #aaaaaa;margin: 0 auto}
			.infor{width: 100px}
			p{word-break:break-all;}
		</style>
	</head>
	<body>
<div id="left_layout">
			<div id="main_content" class="container-fluid">
				<div class="page-heading">
					<h2 class="page-title muted">
						<i class="icon-dashboard"></i> 留言中心
					</h2>
				</div>	
				<ul class="breadcrumb breadcrumb-main">
					<li><a href="index.php" target="_top">首页</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li><a href="sel_message.php">留言管理</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li class="text-info">留言明细</li>
				</ul>
				<?php
					require '../data/db_function.php';
					db_connect($conf);
					$id = $_GET['id'];
					$sql = "select * from tb_message where id='$id'";
					$result = mysql_query($sql);
					$msg = mysql_fetch_assoc($result);
				?>
				<table width="600">
					<tr>
						<td align="right" class="infor">用户名：</td><td><?=$msg['username'] ?></td>
					</tr>
					<tr>
						<td align="right" class="infor">电话号码：</td><td><?=$msg['phone'] ?></td>
					</tr>
					<tr>
						<td align="right" class="infor">邮箱：</td><td><?=$msg['email'] ?></td>
					</tr>
					<tr>
						<td align="right" class="infor">留言主题：</td><td><?=$msg['motif'] ?></td>
					</tr>
					<tr>
						<td align="right" valign="top" class="infor">留言内容：</td><td><p><?=$msg['content'] ?></p></td>
					</tr>
					<tr>
						<td align="right" class="infor">留言时间：</td><td><?=$msg['time'] ?></td>
					</tr>
				</table>						
			</div>
</div>
</body>
</html>