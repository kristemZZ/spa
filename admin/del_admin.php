<?php
require '../data/db_function.php';
$link=db_connect($conf);
if(isset($_POST['chk']))
{
	$str = implode(',', $_POST['chk']);
	$sql = "delete from tb_admin where id in($str)";
	mysql_query($sql) or die(mysql_error());
	header('location:sel_admin.php');
}else
{
	$id = $_GET['id'];
	tb_delete('tb_admin',$id);
	header('location:sel_admin.php');
}
?>