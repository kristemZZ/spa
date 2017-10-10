
<?php
session_start();
if(!isset($_SESSION['username']))
{
	header('location:login.php');
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>boutique spa美容会所后台管理中心</title>
		<link href="library/css/bootstrap.css" rel="stylesheet" />
		<link href="library/css/styles.css" rel="stylesheet" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
	</head>
	<frameset rows="80,*" cols="*" frameborder="no" border="0" framespacing="0">
		<frame src="header.php" name="topFrame" scrolling="No" noresize="noresize" id="topFrame" title="topFrame"/>
		<frameset cols="200,*" frameborder="no" border="0" framespacing="0">
			<frame src="left.php" name="leftFrame" scrolling="No" noresize="noresize" id="leftFrame" title="leftFrame"  />
			<frame src="right.php" name="rightFrame" id="rightFrame" title="rightFrame" />
		</frameset>
	</frameset>
	<body>
	</body>
</html>