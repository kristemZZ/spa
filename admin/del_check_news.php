<?php
require '../data/db_function.php';
db_connect($conf);
$res=batch_delete($_POST,'tb_news');
if($res)
{
	echo "<script>location.href='sel_news.php';</script>";
}
?>