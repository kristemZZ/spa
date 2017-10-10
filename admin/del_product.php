<?php
require '../data/db_function.php';
db_connect($conf);
$id = $_GET['id'];
$res = tb_delete('tb_product',$id);
if($res)
{
	header('location:sel_product.php');
}
?>