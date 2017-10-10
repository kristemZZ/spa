<?php
session_start();
$code = strtolower($_POST['code']);
$code_php = strtolower(@$_SESSION['code']);
if($code == $code_php)
{
	echo ' ';
}else
{
	echo '';
}
?>