<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Kuta Admin 2.0.2</title>
		<link href="library/css/bootstrap.css" rel="stylesheet" />
		<link href="library/css/styles.css" rel="stylesheet" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script type="text/javascript" src="js/myjs.js"></script>
		<script type="text/javascript" src="js/jquery.js"></script>
		<style type="text/css">
			.reg{background: #bad8c1}
			.hov{background: #aaaaaa}
			table{border: 1px dashed #aaaaaa}
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
					<li><a href="selLink.php" target="rightFrame">管理管理员</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li class="text-info">查询管理员</li>
				</ul>				
				<form method="post" action="del_admin.php">
					<span id="operation">
					<input type="button" name="btn" value="全选" onclick="checkAll()" id="chk_all">
					<input type="button" name="btn" value="不选" onclick="uncheck()" id="un_chk">
					<input type="submit" name="sub" value="批量删除" id="sub" onclick="return get_confirm()">
					<input type="button" name="btn" value="添加" onclick="location.href='add_admin.php'" id="add_date">
					<table id="show" cellspacing="0" cellpadding="0" width="1000">
						<tr align="center">
							<td>选择</td>
							<td>序号</td>
							<td>用户名</td>
							<td>密码</td>
							<td>添加时间</td>
							<td>权限</td>
							<td>操作</td>
						</tr>
						<?php
							require '../data/db_function.php';
							$link=db_connect($conf);
							$sql="select * from tb_admin order by time desc";
							$res=mysql_query($sql);
							$i=1;
							while ($row=mysql_fetch_assoc($res)) 
							{
						?>
						<tr align="center">
							<td><input type="checkbox" name="chk[]" value="<?=$row['id'] ?> "/></td>
							<td><?=$i ?></td>						
							<td><?=$row['user'] ?></td>
							<td><?=$row['pwd'] ?></td>
							<td><?=$row['time'] ?></td>
							<td><?=$row['power'] ?></td>
							<td><a href="update_admin.php?id=<?=$row['id'] ?>" target="rightFrame" >修改</a><a href="del_admin.php?id=<?=$row['id'] ?>" target="rightFrame" onclick="return get_confirm()">删除</a></td>
						</tr>
						<?php
							$i++;		
							}
						?>						
					</table>
				</form>				
			</div>
			<script type="text/javascript">
				$('#main_content table tr:nth-child(2n+3)').addClass('reg');
				$('#main_content table tr').mouseover(function(){
					$(this).addClass('hov').siblings().removeClass('hov');
				})
			</script>						
</div>
</body>
</html>