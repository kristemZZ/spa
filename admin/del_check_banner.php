<?php
require '../data/db_function.php';
db_connect($conf);
$resule=batch_delete($_POST,'tb_banner');
header('location:sel_banner.php');
?>