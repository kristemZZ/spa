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
			tr:hover{background: #aaaaaa}
			table{border: 1px dashed #aaaaaa}
		</style>
	</head>
	<body>
<div id="left_layout">
			<div id="main_content" class="container-fluid">
				<div class="page-heading">
					<h2 class="page-title muted">
						<i class="icon-dashboard"></i> 友情链接
					</h2>
				</div>	
				<ul class="breadcrumb breadcrumb-main">
					<li><a href="index.php" target="_top">首页</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li><a href="selLink.php" target="rightFrame">友情链接</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li class="text-info">查询链接</li>
				</ul>				
				<form method="post" action="delete_check.php">
					<span id="operation">
					<input type="button" name="btn" value="全选" onclick="checkAll()" id="chk_all">
					<input type="button" name="btn" value="不选" onclick="uncheck()" id="un_chk">
					<input type="submit" name="sub" value="批量删除" id="sub" onclick="return get_confirm()">
					<input type="button" name="btn" value="添加" onclick="location.href='addLink.php'" id="add_date">
					<table id="show" cellspacing="0" cellpadding="0" width="1000">
						<tr align="center">
							<td>选择</td>
							<td>序号</td>
							<td>网站名称</td>
							<td>网站地址</td>
							<td>添加时间</td>
							<td>操作</td>
						</tr>
						<?php
							require '../data/db_function.php';
							$list = page('tb_link',$conf,'4');
							$i=1;
							foreach ($list as $val) 
							{
								if(is_array($val))
								{
									foreach ($val as $value) 
									{
						?>
						<tr align="center">
							<td><input type="checkbox" name="chk[]" value="<?=$value['id'] ?> "/></td>
							<td><?=$i ?></td>						
							<td><?=$value['name'] ?></td>
							<td><?=$value['url'] ?></td>
							<td><?=$value['time'] ?></td>
							<td><a href="update.php?id=<?=$value['id'] ?>" target="rightFrame" >修改</a><a href="del.php?id=<?=$value['id'] ?>" target="rightFrame" onclick="return get_confirm()">删除</a></td>
						</tr>
						<?php
										$i++;
									}
								}		
							}
						?>						
					</table>
				</form>
				<p class="prompt">
					<?php
						$str=admin_page_style($list,'selLink.php');
						echo $str;
					?>
				</p>				
			</div>
			<script type="text/javascript">
				$('#main_content table tr:nth-child(2n+3)').addClass('reg');
			</script>						
</div>
</body>
</html>