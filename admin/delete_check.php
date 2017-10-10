<?php

require '../data/db_function.php';
$link=db_connect($conf);
array_shift($_POST);
foreach ($_POST as $value) 
{
	for ($i=0; $i < count($value); $i++) 
	{ 
		$id=$value[$i];
		tb_delete('tb_link',$id);
	}
}
header('location:selLink.php');
?>