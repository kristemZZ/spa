<?php
require '../data/db_function.php';
db_connect($conf);
$id = $_GET['id'];
tb_delete('tb_message',$id);
header('location:sel_message.php');
?>