function init_ajax()
{
	var xmlhttp;
	try{
		xmlhttp=new XMLHttpRequest();	
	}catch(e){
		try{
			xmlhttp=new ActiveXObject('Msxml2.XMLHTTP');
		}catch(e){
			try{
				xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
			}catch(e){
				return false;
			}
		}
	}
	return xmlhttp;
		
}
	function get_ajax(p)
	{
		var xmlhttp=init_ajax();
		xmlhttp.open('GET','data/product_deal.php?p='+p,true);
		xmlhttp.onreadystatechange=function()
		{
			if(xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById('msg').innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.send();	
	}
	get_ajax(1);