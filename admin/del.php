<?php
$id=$_GET['id'];
require '../data/db_function.php';
$link=db_connect($conf);
$id=$_GET['id'];
$res=tb_delete('tb_link',$id);
header('location:selLink.php');
?>