<?php
require '../data/db_function.php';
db_connect($conf);
// 点击提交按钮提交
if (isset($_POST['sub'])) 
{	
	array_pop($_POST);
	array_pop($_POST);
	if(db_insert($_POST,'tb_message'))
	{
		echo "<script> alert('提交成功') </script>";
		echo "<meta http-equiv='refresh' content='0,url=../contact.php' />";
	}else
	{
		echo "<script> alert('请重新提交') </script>";
		echo "<meta http-equiv='refresh' content='0,url=../contact.php' />";
	}
}else
{
	echo "<script> alert('请点击提交') </script>";
	header('location:../contact.php');
}
?>