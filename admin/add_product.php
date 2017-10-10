
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Kuta Admin 2.0.2</title>
		<link href="library/css/bootstrap.css" rel="stylesheet" />
		<link href="library/css/styles.css" rel="stylesheet" />
		<style type="text/css">
			input{width: 500px;height: 30px;line-height: 30px}
			td{height: 30px;line-height: 30px}
			textarea{width: 500px;}
			#product_sub{margin-left: 70px; width: 80px;height: 40px;line-height: 40px;text-align: center;}
			table{margin-left: 200px}		
		</style>
		<script type="text/javascript" src="js/jquery.js"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	<body>
<div id="left_layout">
			<div id="main_content" class="container-fluid">
				<div class="page-heading">
					<h2 class="page-title muted">
						<i class="icon-dashboard"></i> 修改产品信息
					</h2>
				</div>	
				<ul class="breadcrumb breadcrumb-main">
					<li><a href="index.php" target="_top">首页</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li><a href="sel_product.php">产品中心</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li class="text-info">修改产品信息</li>
				</ul>
				<form method="post" enctype="multipart/form-data">
					<table>
						<tr>
							<td>产品名称：</td><td><input type="text" name="pro_desc" ></td>
						</tr>		
						<tr>
							<td>产品型号：</td><td><input type="text" name="model"></td>
						</tr>
						<tr>
							<td>产品编号：</td><td><input type="text" name="numb" ></td>
						</tr>
						<tr>
							<td valign="top">产品介绍：</td><td><textarea name="introduce" rows="4"></textarea></td>
						</tr>
						<tr>
							<td>添加图片：</td><td><input type="file" name="srcpic"></td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" name="sub" value="添加" id="product_sub"></td>
						</tr>
					</table>
				</form>
				<?php
					require '../data/db_function.php';
					db_connect($conf);
					if(isset($_POST['sub']))
					{
						if($_POST['pro_desc'] != '' && $_POST['model'] != '' && $_POST['numb'] != '' && $_POST['introduce'] != '')
						{
							$res = db_addData($_POST,$_FILES['srcpic'],'srcpic','tb_product');
							if($res)
							{
								header('location:sel_product.php');
							}
						}else
						{
							echo "<script>alert('输入内容不能为空')</script>";
						}
					}
				?>	
			</div>
</div>
</body>
</html>