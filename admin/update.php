<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Kuta Admin 2.0.2</title>
		<link href="library/css/bootstrap.css" rel="stylesheet" />
		<link href="library/css/styles.css" rel="stylesheet" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
					<li class="text-info">更新链接</li>
				</ul>
					<?php
						require '../data/db_function.php';
						$link=db_connect($conf);
						$id=$_GET['id'];
						$arr=db_select_admin_id('tb_link',$id);
					?>
					<form method="post">						
						<span>网站名称：</span>
						<input type="text" name="name" value="<?=$arr['name'] ?>" >
						<span>网站地址：</span>						
						<input type="text" name="url" value="<?=$arr['url'] ?>" >
						<span>添加时间：</span>	
						<span><?=$arr['time'] ?></span>
						<input type="submit" name="sub" value="修改" id="sub">
						<?php
							if(isset($_POST['sub']))
							{
								$result=tb_update('tb_link',$_POST,$id);
								echo "<script>location.href='selLink.php';</script>";
							}
						?>					
					</form>				
			</div>

</div>
</body>
</html>