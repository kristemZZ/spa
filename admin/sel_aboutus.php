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
			tr{height: 80px;line-height: 20px;}
			p{word-break:break-all;}
			tr:hover{background: #aaaaaa;}
			table{border: 1px dashed #aaaaaa}
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
					<input type="button" name="btn" value="添加" onclick="location.href='add_aboutus.php'" id="add_date">
					<table width="1000" cellspacing="0" cellpadding="0">
						<tr align="center">
							<td>序号</td>
							<td>栏目名称</td>
							<td>标题</td>
							<td>图片标题</td>
							<td>图片</td>
							<td>操作</td>
						</tr>
						<?php
						require '../data/db_function.php';
						db_connect($conf);
						$sql = "select * from tb_aboutus";
						$res = mysql_query($sql);
						$i = 1;
						while ($row = mysql_fetch_assoc($res)) 
						{
						?>
						<tr>
							<td align="center"><?=$i ?></td>
							<td align="center"><?=$row['name'] ?></td>
							<td width="500px"><p><?=$row['center_title'] ?></p></td>
							<td align="center"><?=$row['pic_title'] ?></td>
							<td align="center"><img src="<?='../'.$row['pic'] ?>" width="100" height="50px" /></td>
							<td align="center">
								<a href="update_about.php?id=<?=$row['id'] ?>">修改</a>
								<a href="del_about.php?id=<?=$row['id'] ?>" onclick="return get_confirm()" >删除</a>
							</td>
						</tr>
						<?php
						}
						?>
					</table>
				</div>			
			</div>
			<script type="text/javascript">
				$('#main_content table tr:nth-child(2n+3)').addClass('reg');
			</script>
</div>
</body>
</html>