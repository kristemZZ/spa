<?php
require "../data/db_function.php";
db_connect($conf);
$id = $_GET['id'];
tb_delete('tb_column',$id);
header('location:sel_column.php');
?>