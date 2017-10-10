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
						<i class="icon-dashboard"></i> 留言中心
					</h2>
				</div>	
				<ul class="breadcrumb breadcrumb-main">
					<li><a href="index.php" target="_top">首页</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li><a href="sel_message.php">留言管理</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li class="text-info">查看留言</li>
				</ul>
				<form>
					<input type="button" name="btn" value="全选" onclick="checkAll()" id="chk_all">
					<input type="button" name="btn" value="不选" onclick="uncheck()" id="un_chk">
					<input type="submit" name="sub" value="批量删除" id="sub" onclick="return get_confirm()">
					<table cellpadding="0" cellspacing="0" width="1000">
						<tr align="center">
							<td>选择</td>
							<td>序号</td>
							<td>用户名</td>
							<td>电话号码</td>
							<td>邮箱</td>
							<td>留言主题</td>
							<td>留言时间</td>
							<td>操作</td>
						</tr>
						<?php
							require '../data/db_function.php';
							$list=page('tb_message',$conf,$pagesize=8);
							foreach ($list as $val) 
							{
								if (is_array($val)) 
								{
									$i=1;  //用来计算序号
									foreach ($val as $value) 
									{
										$id=$value['id'];
						?>
										<tr align="center">
											<td><input type="checkbox" name="mes_chk[]" value="<?=$value['id'] ?>" /></td>
											<td><?=$i ?></td>
											<td><?=$value['username'] ?></td>
											<td><?=$value['phone'] ?></td>
											<td><?=$value['email'] ?></td>
											<td><?=$value['motif'] ?></td>
											<td><?=$value['time'] ?></td>
											<td id="news_list"><a href="sel_message_center.php?id=<?=$id ?>" >查看</a><a href="del_message.php?id=<?=$id ?>" onclick="return get_confirm()">删除</a></td>
										</tr>			
						<?php	
										$i++;  //累计序号				
									}
									
								}
							}
						?>
					</table>
				</form>
				<p class="prompt">
					<?php
						$str=admin_page_style($list,$_SERVER['PHP_SELF']);
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