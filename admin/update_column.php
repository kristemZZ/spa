<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Kuta Admin 2.0.2</title>
		<link href="library/css/bootstrap.css" rel="stylesheet" />
		<link href="library/css/styles.css" rel="stylesheet" />
		<script type="text/javascript" src="js/jquery.js"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<style type="text/css">
			table{margin-left: 400px;margin-top: 50px}
			#sub{margin-left: 70px}
		</style>
	</head>
	<body>
<div id="left_layout">
			<div id="main_content" class="container-fluid">
				<div class="page-heading">
					<h2 class="page-title muted">
						<i class="icon-dashboard"></i> 栏目管理
					</h2>
				</div>	
				<ul class="breadcrumb breadcrumb-main">
					<li><a href="index.php" target="_top">首页</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li><a href="sel_column.php">栏目管理</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li class="text-info">修改栏目</li>
				</ul>
				<div id="slider_banner">
					<?php
						require '../data/db_function.php';
						db_connect($conf);
						$id = $_GET['id'];
						$row = db_select_admin_id('tb_column',$id);
						$pid = $row['pid'];
					?>
					<form method="post" name="myform">
						<table>
							<tr>
								<td>名称：</td>
								<td><input type="text" name="name" value="<?=$row['name']?>"></td>
							</tr>
							<tr>
								<td>所属栏目：</td>
								<td><?=get_select($pid);?></td>
							</tr>
							<tr>
								<td colspan="2"><input type="submit" name="sub" value="修改" id="sub"></td>
							</tr>
						</table>
					</form>	
				</div>
				<?php
				if(isset($_POST['sub']))
				{
					$name = $_POST['name'];
					$pid = $_POST['pcolumn'];
					$time=date('Y-m-d H:i:s');
					$sql = "update tb_column set name='$name',pid='$pid',time='$time' where id='$id'" or die(mysql_error());
					$res = mysql_query($sql) or die(mysql_error());
					if(mysql_affected_rows()>0)
					{
						header('location:sel_column.php');
					}
				}	
				?>			
			</div>
</div>
</body>
</html>