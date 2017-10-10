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
				<?php
					require '../data/db_function.php';
					$link=db_connect($conf);
					require 'fckeditor/fckeditor_php5.php';
					$fck = new FCKeditor('introduce');
					$fck->BasePath = 'fckeditor/';
					$fck->Width = '515';
					$fck->Height = '400px';
					$id=$_GET['id'];
					$product=db_select_admin_id('tb_product',$id);
					$fck->Value = $product['introduce'];
				?>
				<form method="post" enctype="multipart/form-data">
					<table>
						<tr>
							<td>产品名称：</td><td><input type="text" name="desc" value="<?=$product['pro_desc'] ?>"></td>
						</tr>		
						<tr>
							<td>产品型号：</td><td><input type="text" name="model" value="<?=$product['model'] ?>"></td>
						</tr>
						<tr>
							<td>产品编号：</td><td><input type="text" name="numb" value="<?=$product['numb'] ?>"></td>
						</tr>
						<tr>
							<td valign="top">产品图片：</td><td><img src="../<?=$product['srcpic'] ?>" width="200" height="200" /></td>
						</tr>
						<tr>
							<td valign="top">产品介绍：</td><td><?php $fck->Create() ?></td>
						</tr>
						<tr>
							<td>修改图片：</td><td><input type="file" name="srcpic"></td>
						</tr>
						<tr>
							<td>添加时间：</td><td><?=$product['time'] ?></td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" name="sub" value="修改" id="product_sub"></td>
						</tr>
					</table>
				</form>
				<?php
					admin_update_product('tb_product',$id,$_POST);
				?>	
			</div>
</div>
</body>
</html>