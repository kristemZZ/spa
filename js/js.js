//提示函数
function prompt($numb)
{
	switch($numb)
	{
		case 1:
		document.getElementById('user').innerHTML="<font color=blue>支持输入2-4位汉字</font>";
		break;
		case 2:
		document.getElementById('matter').innerHTML="<font color=blue>请输入字数不超过50个的内容</font>";
		break;
	}
}
//验证函数
function vrify($numb)
{
	switch($numb)
	{
		case 1:  //姓名限定2~4个中文汉字
		var username=myform.username.value;
		var reg=/^[\u4e00-\u9fa5]{2,4}$/;
		if (!reg.test(username)) 
		{
			document.getElementById('user').innerHTML="<font color=red>*只支持2~4个汉字！</font>";  //输入错误时红色提示
		}else
		{
			document.getElementById('user').innerHTML="<img src='images/true3.gif' /><font color=green>正确</font>";
			return true;
		}
		break;
		case 2:  //手机号码格式验证
		var phone=myform.phone.value;
		var reg=/^((13[1-9])|(15[^4,\D])|(18[^4,\D])|(14[0,9])|(177))[0-9]{8}$/;
		if (!reg.test(phone)) 
		{
			document.getElementById('phone').innerHTML="<font color=red>*请输入正确的手机号码！</font>";
		}else
		{
			document.getElementById('phone').innerHTML="<img src='images/true3.gif' /><font color=green>正确</font>";
			return true;
		}
		break;
		case 3:  //e-mail格式验证
		var email=myform.email.value;
		var reg=/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;
		if (!reg.test(email)) 
		{
			document.getElementById('email').innerHTML="<font color=red>*请输入正确的邮箱地址！</font>";
		}else
		{
			document.getElementById('email').innerHTML="<img src='images/true3.gif' /><font color=green>正确</font>";
			return true;
		}
		case 4:  //留言内容
		var cont=myform.content.value.length;
		if (cont==0) 
		{
			document.getElementById('matter').innerHTML="<font color=red>*留言内容不能为空！</font>";
		}else if (cont>= 1 && cont<= 50) 
		{
			document.getElementById('matter').innerHTML="<img src='images/true3.gif' /><font color=green>正确</font>";
			return true;
		}else
		{
			document.getElementById('matter').innerHTML="<font color=red>*留言内容字数不能超过50个！</font>";
		}		
	}
}
//运用ajax获得验证码的动态验证
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
function ajax()
{
	var yan=myform.cord.value;
	if (yan=='') 
	{
		document.getElementById('veri').innerHTML="<font color=red>验证码不能为空</font>";
	}else
	{
		xmlhttp=get_request();
		xmlhttp.open('POST','admin/ajax_cord.php',true);
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200) 
			{
				document.getElementById('veri').innerHTML=xmlhttp.responseText;
				return true;
			}
		}
		// alert(xmlhttp.status);
		xmlhttp.setRequestHeader('content-type','application/x-www-form-urlencoded');
		xmlhttp.send('cord='+yan);
	}	
}

function get_verify()
{
	for (var i = 1; i <= 4; i++)
	{
		if (vrify(i)==true) 
		{
			var res=true;
		}else
		{
			var res=false;
			break;
		}	
	}
	return res;
}