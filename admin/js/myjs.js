function get_confirm()    //删除确认框
{
	$ret=confirm('确认删除吗?');
	if ($ret) 
	{
		return true;
	}else
	{
		return false;
	}
}
function checkAll()  //全选框
{
	var ob=document.getElementsByTagName('input');
	for (var i = 0; i < ob.length; i++)
	{
		if(ob[i].type=='checkbox')
		{
			if(ob[i].checked==false)
			{
				ob[i].checked=true;
			}
		}
	}
}
function uncheck()   //不选框
{
	var ob=document.getElementsByTagName('input');
	for (var i = 0; i < ob.length; i++)
	{
		if(ob[i].type=='checkbox')
		{
			if(ob[i].checked==true)
			{
				ob[i].checked=false;
			}
		}
	}
}
//实例化
function get_request()
{
	try{
		xmlhttp=new XMLHttpRequest();
	}catch(e){
		try{
			xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
		}catch(e){
			try{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}catch(e){
				return 'error';
			}
		}
	}
	return xmlhttp;
}
function search_ajax(p)
{
	
	var contents = document.getElementById('search').value;
	var sel = document.getElementById('sel_mold').value;
	var xmlhttp = get_request();
	xmlhttp.open('POST','search_ajax_deal.php',true);
	xmlhttp.setRequestHeader('content-type','application/x-www-form-urlencoded');
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4 && xmlhttp.status==200)
		{

			document.getElementById('msg').innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.send('data='+contents+'&sel='+sel+'&p='+p);
}
//添加管理员正则限制
function input_limit($num)
{
	switch($num)
	{
		case 1:
		var user = document.getElementById('user').value;
		var reg = /^\w+$/;
		if(reg.test(user))
		{
			var xml = get_request();
			xmlhttp.open('POST','add_admin_deal.php',true);
			xmlhttp.setRequestHeader('content-type','application/x-www-form-urlencoded');
			xmlhttp.onreadystatechange=function()
			{
				if(xmlhttp.readyState==4 && xmlhttp.status==200)
				{

					document.getElementById('show_user').innerHTML=xmlhttp.responseText;
				}
			}
			xmlhttp.send('user='+user);
			$info = document.getElementById('res').innerHTML;
			if($info == '正确')
			{
				return true;
			}
		}else
		{
			document.getElementById('show_user').innerHTML = "<font color=red>*只支持数字字母下划线</font>";
		}
		break; 
		case 2:
		var pwd = document.getElementById('pwd').value;
		var reg = /^\w{4,6}$/;
		if(reg.test(pwd))
		{
			document.getElementById('show_pwd').innerHTML = "<font color=green>正确</font>";
			return true;
		}else
		{
			document.getElementById('show_pwd').innerHTML = "<font color=red>*请输入4~6位数字字母下划线组成的密码</font>";
		}
		break;
		case 3:
		var pwd = document.getElementById('pwd').value;
		var agin = document.getElementById('agin').value;
		if(agin == '')
		{
			document.getElementById('pwd_agin').innerHTML = "<font color=red>*请再输入您上面输入的密码</font>";
		}else
		{
			if(agin != pwd)
			{
				document.getElementById('pwd_agin').innerHTML = "<font color=red>*请再输入您上面输入的密码</font>";
			}else
			{
				document.getElementById('pwd_agin').innerHTML = "<font color=green>正确</font>";
				return true;
			}
		}
	}
}
//添加限制
function url_limit()
{
	for (var i = 1; i <= 3; i++) 
	{
		$res = input_limit(i);
		if ($res == true) 
		{
			$result = true;
		}else
		{
			$result = false;
			break;
		}  
	}
	return $result;
}