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
					<li><a href="selLink.php">友情链接</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li class="text-info">添加链接</li>
				</ul>
				<form method="post">
					<table style="margin-left:80px">
						<tr>
							<td align="right">网站名字：</td>
							<td colspan="2"><input type="text" name="name"></td>
						</tr>
						<tr>
							<td align="right">网站地址：</td>
							<td>
								<input type="text" name="url" id="http" onblur="verify_http()">	
							</td>
							<td><span id="msg"></span></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="sub" value="添加" id="sub" onclick="return verify_http()"></td>
						</tr>
					<?php
						require '../data/db_function.php';
						if(@$_POST['name']!='' && @$_POST['url']!='')
						{
							$link=db_connect($conf);
							array_pop($_POST);
							$res=db_insert($_POST,'tb_link');
							header('location:selLink.php');					
						}
					?>
					</table>
				</form>		
			</div>
			<script type="text/javascript">
				function verify_http()
				{
					var http = document.getElementById('http').value;
					var reg = /^(https|ftp|http):\/\/www\.\S+\.[a-z]{2,3}\/{0,1}$/;
					if(reg.test(http))
					{
						document.getElementById('msg').innerHTML = "<font color=green>格式正确</font>";
						return true;
					}else
					{
						document.getElementById('msg').innerHTML = "<font color=red>*请输入正确的链接格式例如：http://www.xxxx.com/</font>";
						return false;
					}
				}
			</script>
</div>
</body>
</html>