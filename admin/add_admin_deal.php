<?php
require '../data/db_function.php';
$link = db_connect($conf);
$user = $_POST['user'];
$sql = "select id from tb_admin where user='$user'";
$result = mysql_query($sql) or die(mysql_error());
$count = mysql_num_rows($result);
if($count)
{
	echo "<font color='red' id='res'>用户名已存在</font>";
}else
{
	echo "<font color='green' id='res'>正确</font>";
}
?>