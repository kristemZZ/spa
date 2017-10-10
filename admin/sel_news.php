<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Kuta Admin 2.0.2</title>
		<link href="library/css/bootstrap.css" rel="stylesheet" />
		<link href="library/css/styles.css" rel="stylesheet" />
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/myjs.js"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<style type="text/css">
			.reg{background: #bad8c1}
			tr:hover{background: #aaaaaa}
			table{border: 1px dashed #aaaaaa}
			#search{height: 30px;height: 30px;margin-right: 10px;margin-top: 5px}
			#sel_mold{width: 100px;height: 30px;line-height: 30px;}
		</style>
	</head>
	<body>
<div id="left_layout">
			<div id="main_content" class="container-fluid">
				<div class="page-heading">
					<h2 class="page-title muted">
						<i class="icon-dashboard"></i> 查询新闻
					</h2>
				</div>	
				<ul class="breadcrumb breadcrumb-main">
					<li><a href="index.php" target="_top">首页</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li><a href="sel_news.php">新闻中心</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li class="text-info">查询新闻</li>
				</ul>
					<select name="sel" id="sel_mold">
						<option value="news_title">新闻标题</option>
						<option value="news_author">作者</option>
						<option value="classify">新闻类型</option>
					</select>
					<input type="text" id="search" placeholder="请输入搜索关键字"><input type="button" name="btn" value="搜索" id="sub" onclick="search_ajax()">
				<div id="msg">
					<form method="post" action="del_check_news.php">
						<table width="1000" cellspacing="0" cellpadding="0">
							<input type="button" name="btn" value="全选" onclick="checkAll()" id="chk_all">
							<input type="button" name="btn" value="不选" onclick="uncheck()" id="un_chk">
							<input type="submit" name="sub" value="批量删除" id="sub" onclick="return get_confirm()">
							<input type="button" name="btn" value="添加" onclick="location.href='add_news.php'" id="add_date">
							<tr align="center">
								<td>选择</td>
								<td>编号</td>
								<td>标题</td>
								<td>描述</td>
								<td>作者</td>
								<td>添加时间</td>
								<td>新闻类型</td>
								<td>操作</td>
							</tr>
						<?php
							require '../data/db_function.php';
							$list=page('tb_news',$conf,$pagesize=8);
							$i=1;
							foreach ($list as $val) 
							{
								if(is_array($val))
								{
									foreach ($val as $value) 
									{
						?>
											<tr align="center">
												<td><input type="checkbox" name="chk[]" value="<?=$value['id'] ?>" /></td>
												<td><?=$i ?></td>
												<td><?=$value['news_title'] ?></td>
												<td><?=$value['news_desc'] ?></td>
												<td><?=$value['news_author'] ?></td>
												<td><?=$value['time'] ?></td>
												<td><?=$value['classify'] ?></td>
												<td id="news_list"><a href="update_news.php?id=<?=$value['id'] ?>">修改</a><a href="del_news.php?id=<?=$value['id'] ?>" onclick="return get_confirm()">删除</a></td>
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
							$str=admin_page_style($list,'sel_news.php');
							echo $str;
						?>
					</p>
				</div>
			</div>
			<script type="text/javascript">
				$('#main_content table tr:nth-child(2n+3)').addClass('reg');
			</script>
</div>
</body>
</html>