<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Kuta Admin 2.0.2</title>
		<link href="library/css/bootstrap.css" rel="stylesheet" />
		<link href="library/css/styles.css" rel="stylesheet" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<style type="text/css">
			input{width: 500px;height: 30px;line-height: 30px}
			td{height: 30px;line-height: 30px}
			textarea{width: 500px;}
			#sub{margin-left: 60px; width: 80px;height: 40px;line-height: 40px;text-align: center;}
			table{margin-left: 200px}
		</style>
	</head>
	<body>
<div id="left_layout">
			<div id="main_content" class="container-fluid">
				<div class="page-heading">
					<h2 class="page-title muted">
						<i class="icon-dashboard"></i> 修改新闻
					</h2>
				</div>	
				<ul class="breadcrumb breadcrumb-main">
					<li><a href="index.php">首页</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li><a href="sel_news.php">新闻中心</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li class="text-info">修改新闻</li>
				</ul>
				<?php
					require '../data/db_function.php';
					require 'fckeditor/fckeditor_php5.php';
					$fck = new FCKeditor('news_content');
					$fck->BasePath = 'fckeditor/';
					$fck->Width = '515';
					$fck->Height = '400px';
					db_connect($conf);
					$id=@$_GET['id'];
					$row=db_select_admin_id('tb_news',$id);
					$fck->Value = $row['news_content'];
				?>
				<form method="post" enctype="multipart/form-data">
				<!-- 显示修改对象的内容以便修改 -->
					<table>
						<tr><td>新闻标题:</td><td><input type="text" name="news_title" value="<?=$row['news_title'] ?>" ></td></tr>
						<tr><td>新闻描述:</td><td><input type="text" name="news_desc" value="<?=$row['news_desc'] ?>" ></td></tr>
						<tr><td valign="top">新闻内容:</td><td><?php $fck->Create() ?></td></tr>
						<tr><td>新闻作者:</td><td><input type="text" name="news_author" value="<?=$row['news_author'] ?>" ></td></tr>
						<tr><td>新闻类型:</td><td><input type="text" name="classify" value="<?=$row['classify'] ?>" ></td></tr>
						<tr><td valign="top">新闻图片:</td><td><img src="../<?=$row['pic'] ?>" width="510" /></td></tr>
						<tr><td>修改图片:</td><td><input type="file" name="pic" ></td></tr>
						<tr><td>添加时间:</td><td><?=$row['time'] ?></td></tr>
						<tr><td colspan="2"><input type="submit" name="sub" value="修改" id="sub"></td></tr>
					</table>
				</form>				
			</div>
			<?php
				// 点击修改执行
				admin_update_news('tb_news',$id,$_POST);				
			?>
</div>
</body>
</html>