<?php
session_start();
header('content-type:text/html;charset=utf-8');
require '../data/db_function.php';
$link=db_connect($conf);
$username=$_POST['username'];
$sql="select * from tb_admin where user='$username'";
$result=mysql_query($sql);
if(!mysql_num_rows($result))
{
	echo "<script>alert('用户名不存在,请重新登录');location.href='login.php';</script>";
}else
{
	$arr=mysql_fetch_assoc($result);
	if($_POST['password']!=$arr['pwd'])
	{
		echo "<script>alert('密码错误,请重新登录');location.href='login.php';</script>";
	}else
	{
		$_SESSION['power'] = $arr['power'];
		$_SESSION['username']=$_POST['username'];
		if($_POST['chk'] == '1')
		{
			setcookie('username',$_POST['username'],time()+7*24*60*60);
			setcookie('password',$_POST['password'],time()+7*24*60*60);
			setcookie('chk_state','1',time()+7*24*60*60);
		}else
		{
			setcookie('username',$_POST['username'],time()-1);
			setcookie('password',$_POST['password'],time()-1);
			setcookie('chk_state','1',time()-1);
		}
			header('location:index.php');
	}
}
?>