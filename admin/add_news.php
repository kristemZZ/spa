
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
						<i class="icon-dashboard"></i> 添加新闻
					</h2>
				</div>	
				<ul class="breadcrumb breadcrumb-main">
					<li><a href="index.php" target="_top">首页</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li><a href="sel_news.php">新闻中心</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li class="text-info">修改新闻</li>
				</ul>
				<?php
					
				?>
				<form method="post" enctype="multipart/form-data">
				<!-- 显示修改对象的内容以便修改 -->
					<table>
						<tr><td>新闻标题:</td><td><input type="text" name="news_title" ></td></tr>
						<tr><td>新闻描述:</td><td><input type="text" name="news_desc" " ></td></tr>
						<tr><td valign="top">新闻内容:</td><td><textarea rows="5" name="news_content" ></textarea></td></tr>
						<tr><td>新闻作者:</td><td><input type="text" name="news_author"  ></td></tr>
						<tr><td>新闻类型:</td><td><input type="text" name="classify"  ></td></tr>
						<tr><td>添加图片:</td><td><input type="file" name="pic" ></td></tr>
						<tr><td colspan="2"><input type="submit" name="sub" value="添加" id="sub"></td></tr>
					</table>
				</form>				
			</div>
			<?php
			require '../data/db_function.php';
			db_connect($conf);
			if(isset($_POST['sub']))
			{
				if($_POST['news_title'] != '' && $_POST['news_desc'] != '' && $_POST['news_content'] != '' && $_POST['classify'] != '')
				{
					$res = db_addData($_POST,$_FILES['pic'],'pic','tb_news');
					if($res)
					{
						header('location:sel_news.php');
					}
				}else
				{
					echo "<script>alert('输入内容不能为空')</script>";
				}
			}
			?>
</div>
</body>
</html>