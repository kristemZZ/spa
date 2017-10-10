<?php
$id=$_GET['id'];
require '../data/db_function.php';
db_connect($conf);
tb_delete('tb_news',$id);
header('location:sel_news.php');
?>