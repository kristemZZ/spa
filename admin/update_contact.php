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
						<i class="icon-dashboard"></i> 联系我们
					</h2>
				</div>	
				<ul class="breadcrumb breadcrumb-main">
					<li><a href="index.php" target="_top">首页</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li><a href="sel_contact.php">联系我们</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li class="text-info">修改信息</li>
				</ul>
				<div id="slider_banner">
					<?php
					require '../data/db_function.php';
					db_connect($conf);
					$id = $_GET['id'];
					$arr = db_select_admin_id('tb_contact',$id);
					?>
					<form method="post">
						<input type="text" name="qq" value="<?=$arr['qq'] ?>">
						<input type="text" name="fax" value="<?=$arr['fax'] ?>">
						<input type="text" name="email" value="<?=$arr['email'] ?>">
						<input type="text" name="phone" value="<?=$arr['phone'] ?>">
						<input type="submit" name="sub" value="修改" id="sub">
					</form>
				</div>			
			</div>
			<script type="text/javascript">
				$('#main_content table tr:nth-child(2n+3)').addClass('reg');
			</script>
			<?php
			if(isset($_POST['sub']))
			{
				$qq = $_POST['qq'];
				$fax = $_POST['fax'];
				$email = $_POST['email'];
				$phone = $_POST['phone'];
				$sql = "update tb_contact set qq='$qq',fax='$fax',email='$email',phone='$phone' where id='$id'";
				$res = mysql_query($sql);
				if($res)
				{
					header('location:sel_contact.php');
				}
			}
			?>
</div>
</body>
</html>