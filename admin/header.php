
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Kuta Admin 2.0.2</title>
		<link href="library/css/bootstrap.css" rel="stylesheet" />
		<link href="library/css/styles.css" rel="stylesheet" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

	<body>
		<div id="header" class="navbar">
			<div class="navbar-inner">
				<a class="brand hidden-phone" href="index.php" target="_top" style="color:#000">boutique spa美容会所后台管理中心</a>
				
				<script type="text/javascript">
				function get_num($a)
				{
					if ($a<'10') 
					{
						return $a = '0'+$a; 
					}else
					{
						return $a;
					}
				}
				function get_date()
				{
					var day=new Array('日','一','二','三','四','五','六');
					var date = new Date();
					var year = date.getFullYear();
					var month = date.getMonth()+1;
					var dates = date.getDate();
					var day = day[date.getDay()];
					var hours = date.getHours();
					var minute = date.getMinutes();
					var second = date.getSeconds();
					document.getElementById('date_show').innerHTML=
					year+'年'+month+'月'+dates+'日'+'星期'+day+' '+get_num(hours)+':'+get_num(minute)+':'+get_num(second);					
				}
				setInterval('get_date()',1000);	
				</script>
				<h6 class="admin_show">
					欢迎您：<?=@$_SESSION['username'] ?>[<font color="#fff"><?=@$_SESSION['power'] ?></font>]
					<a href="loginout.php" target="_top">安全退出</a>
				</h6>
				<h1 id="date_show"></h1>
			</div>
		</div>
</body>
</html>