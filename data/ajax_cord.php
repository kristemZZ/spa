<?php
session_start();
$input=strtolower($_POST['cord']);
$yan=strtolower($_SESSION['yan']);
if($input!=$yan)
{
	echo "<font color=red>*验证码错误</font>";
}
?>