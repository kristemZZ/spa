<?php
require '../data/db_function.php';
array_shift($_POST);
$str='';
foreach ($_POST as $val) 
{
	$str=implode(',', $val);
}
$link=db_connect($conf);
$sql="delete from tb_product where id in($str)";
mysql_query($sql);
header('location:sel_product.php');
?>