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
function search_ajax()
{
	
	var code = document.getElementById('code').value;
	var xmlhttp = get_request();
	xmlhttp.open('POST','code/code_ajax_deal.php',true);
	xmlhttp.setRequestHeader('content-type','application/x-www-form-urlencoded');
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4 && xmlhttp.status==200)
		{

			document.getElementById('state').innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.send('code='+code);
}
search_ajax();
function login_limit()
{
	var re = document.getElementById('state').innerHTML;
	if (re == ' ') 	
	{
		return true;
	}else
	{
		alert('验证码错误');
		return false;
	}
}