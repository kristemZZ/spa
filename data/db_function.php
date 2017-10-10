<?php
header('content-type:text/html;charset=utf-8');
require'param.php';
//连接数据库
function db_connect($conf)
{	
	$link=mysql_connect($conf['host'],$conf['user'],$conf['pwd']);
	mysql_select_db($conf['db_name'],$link);
	mysql_query('set names '.$conf['charset']);
	return $link;
}
//查询数据表中所有的记录
function tb_select($table)
{
	$sql="select * from {$table}";
	$result=mysql_query($sql) or die(mysql_error());
}
//按id查询数据表中的所有的记录返回一个数组
function db_select_id($table)
{
	$id=max(@$_GET[id],2);
	$sql="select * from {$table} where id='$id'";
	$result=mysql_query($sql);
	$arr=mysql_fetch_assoc($result);
	return $arr;
}
//按条件查询数据表中的记录(时间降序)
function db_limit_time_desc($table,$star,$length)  //返回结果集
{	
	$sql="select * from $table order by time desc limit $star,$length";
	$result=mysql_query($sql);
	return $result;
}
//按id删除记录
function tb_delete($table,$id)
{
	$sql="delete from $table where id='$id'";
	$result=mysql_query($sql) or die(mysql_error());
	return $result;
}
//插入数据库函数
function db_insert($arr,$table)  
{
	$keys=implode(',',array_keys($arr));
	$values="'".implode("','",array_values($arr))."'";
	$sql="insert into {$table}($keys) values($values)";
	$result=mysql_query($sql) or die(mysql_error());
	return $result;
}
//上下篇函数
function news_next($table = 'tb_news')
{
	$id=@$_GET['id'];
	$sql="select * from $table where id>'$id' order by id asc limit 0,1";
	$result=mysql_query($sql);
	if(mysql_num_rows($result)!=0)
	{
		$arr=mysql_fetch_assoc($result);
		return $arr;
	}else
	{
		return false;
	}	
}
//详情页下一篇
function news_prev($table = 'tb_news')
{
	$id=@$_GET['id'];
	$sql="select * from $table where id<'$id' order by id desc limit 0,1";
	$result=mysql_query($sql);
	if(mysql_num_rows($result)!=0)
	{
		$arr=mysql_fetch_assoc($result);
		return $arr;
	}else
	{
		return false;
	}
}
//查询总的记录数
function countees($table,$conf)
{
	$dns="mysql:host=$conf[host];dbname=$conf[db_name]";
	$pdo=new PDO($dns,$conf['user'],$conf['pwd']);
	$pdo->query('set names '.$conf['charset']);
	$sql="select id from $table";
	$result=$pdo -> query($sql);
	$counts=$result->rowCount();
	return $counts;
}
//分页查询
function page($table,$conf,$pagesize=8,$query='')
{
	$dns="mysql:host=$conf[host];dbname=$conf[db_name]";
	$pdo=new PDO($dns,$conf['user'],$conf['pwd']);
	$pdo->query('set names '.$conf['charset']);
	$list=array();
	$list['pagesize']=$pagesize;
	$list['counts']=countees($table,$conf);
	$list['pages']=ceil($list['counts']/$list['pagesize']);
	$list['p']=max(@$_GET['p'],1);
	$list['offset']=($list['p']-1)*$pagesize;
	$sql="select * from $table {$query} order by time desc limit $list[offset],$pagesize";
	$res=$pdo -> query($sql);
	$list['arr']=$res -> fetchAll(PDO::FETCH_ASSOC);
	return $list;
}
//分页样式
function page_style($list)
{
	$str='';
	$str.="<ul id='anniu'>";
	$prev=max($list['p']-1,1);
	$next=min($list['p']+1,$list['pages']);
	$str.="<li><a href='javascript:' onclick=get_ajax($prev)>上一页</a><li>";
	for ($i=1; $i <= $list['pages'] ; $i++) 
	{
		if($list['p']==$i)
		{
			$str.="<a class='anxiao' href='javascript:'>$i</a>";
		}else
		{
			$str.="<li><a href='javascript:' onclick=get_ajax($i)>$i</a><li>";
		}	
	}
	$str.="<li><a href='javascript:' onclick=get_ajax($next)>下一页</a><li>";
	$str.="</ul>";
	return $str;
}
//获取菜单栏目
/**
*父级的id寻找子级栏目
*/
function get_son($id,$table = 'tb_column')
{
	$arr = array();
	$sql = "select * from $table where pid='$id'";
	$result = mysql_query($sql);
	while($row = mysql_fetch_assoc($result))
	{
		$arr[] = $row;
	}
	return $arr;
}
/**
*子级栏目的id查询父级信息
*/
function get_parent($id,$table = 'tb_column',&$arr = array())
{
	$sql = "select * from $table where id='$id'";
	$res = mysql_query($sql);
	$row = mysql_fetch_assoc($res);
	if($row)
	{
		$pid = $row['pid'];
		$arr[] = $row;
		get_parent($pid,$table,$arr);
	}
	// krsort($arr);
	return $arr;
}
/**
*获取当前url下的栏目
*/
function url_get_column($table = 'tb_column')
{
	$url = trim(strrchr($_SERVER['PHP_SELF'], '/'),'/');
    $sql = "select * from $table where url='$url'";
    $res = mysql_query($sql);
    $row = mysql_fetch_assoc($res);
    return $row;
}
/**
*根据栏目名称查询该栏目记录
*/
function get_col_record($name,$table = 'tb_column')
{
	$query = "select * from $table where name='$name'";
    $result = mysql_query($query);
    $row = mysql_fetch_assoc($result);
    return $row;
}
/**
*查询pid下的所有栏目
*/
function get_child($pid = 0,&$arr = array(),$level = 0,$table = 'tb_column')
{
	$sql = "select * from $table where pid=$pid";
	$res = mysql_query($sql);
	while ($row = mysql_fetch_assoc($res)) 
	{
		$id = $row['id'];
		$row['name'] = str_repeat('|——', $level).$row['name'];
		$arr[] = $row;
		get_child($id,$arr,$level+1);
	}
	return $arr;
}
/**
*获得栏目select
*/
function get_select($pid,$str = '')
{
	$str .="<select name='pcolumn'>";
	$arr = get_child();
	foreach ($arr as $val) 
	{
		if($val['id'] == $pid)
		{
			$str .="<option value='{$val['id']}' selected='true'>{$val['name']}</option>";
		}else
		{
			$str .="<option value='{$val['id']}'>{$val['name']}</option>";
		}
	}
	$str .= "</select>";
	return $str;
}
/**
*获得一个下拉框包含所有的栏目
*/
function get_all_select($str = '')
{
	$str .= "<select name='pid'>";
	$arr = get_child();
	foreach ($arr as $val) 
	{
		$str .= "<option value='{$val['id']}'>{$val['name']}</option>";
	}
	$str .= "</select>";
	return $str;
}


//更新(修改)友情链接数据表
function tb_update($table,$arr,$id)
{
	$name=@$arr['name'];
	$url=@$arr['url'];
	$sql="update $table set name='$name',url='$url' where id='$id'";
	$result=mysql_query($sql) or die(mysql_error());
	return $result;

}
//按id查询数据表
function db_select_admin_id($table,$id)
{
	$sql="select * from {$table} where id='$id'";
	$result=mysql_query($sql);
	$arr=mysql_fetch_assoc($result);
	return $arr;
}
//添加数据到数据库中(包括上传文件,submit按钮在最后)
/**
*@param $arr为$_POST
*@param $files为$_FILES['上传文件name']
*@param $filename为input file中的name值
*@param $table为数据表
*/
function db_addData($arr,$files,$filename,$table)
{
	if($files['name']=='')
	{
		echo "<script>alert('请选择上传的图片')</script>";
	}else
	{
		$aft=strrchr($files['name'], '.');
		if($aft == '.jpg' || $aft == '.jpeg' || $aft == '.png' || $aft == '.gif')
		{
			$dest='../images/'.$files['name'];
			if(move_uploaded_file($files['tmp_name'], $dest))
			{
				array_pop($arr);
				$pic = "images/".$files['name'];
				$arr[$filename] = $pic;
				date_default_timezone_set('Asia/shanghai');
				$time=date('Y-m-d H:i:s');
				$arr['time'] = $time;
				if(db_insert($arr,$table))
				{
					return true;
				}else
				{
					return false;
				}
								
			}
		}else
		{
			echo "<script>alert('请选择正确的上传的图片')</script>";
		}
	}							
}
//后台分页样式
function admin_page_style($list,$url)
{
	$str='';
	$prev=max($list['p']-1,1);
	$next=min($list['p']+1,$list['pages']);
	$str.="<a href=$url?p=$prev>上一页</a>";
	$str.="<span class='numb'>";
	for ($i=1; $i <= $list['pages'] ; $i++) 
	{
		if($list['p']==$i)
		{
			$str.="<a class='home' href='javascript:'>$i</a>";
		}else
		{
			$str.="<a href=$url?p={$i}>$i</a>";
		}	
	}
	$str.="</span>";
	$str.="<a href=$url?p=$next>下一页</a>";
	$str.="<b>总共:<font color='red'>{$list['counts']}</font>条&nbsp;&nbsp;&nbsp;当前:<font color='red'>{$list['p']}</font>/{$list['pages']}页</b>";
	return $str;
}
//ajax模糊匹配分页样式
function admin_like_page_style($list)
{
	$str='';
	$prev=max($list['p']-1,1);
	$next=min($list['p']+1,$list['pages']);
	$str.="<a href='javascript:' onclick=search_ajax($prev)  target='_self' >上一页</a>";
	$str.="<span class='numb'>";
	for ($i=1; $i <= $list['pages'] ; $i++) 
	{
		if($list['p']==$i)
		{
			$str.="<a class='home' href='javascript:' target='_self'>$i</a>";
		}else
		{
			$str.="<a href='javascript:' onclick=search_ajax($i) target='_self'>$i</a>";
		}	
	}
	$str.="</span>";
	$str.="<a href='javascript:' onclick=search_ajax($next)  target='_self'>下一页</a>";
	$str.="<b>总共:<font color='red'>{$list['counts']}</font>条&nbsp;&nbsp;&nbsp;当前:<font color='red'>{$list['p']}</font>/{$list['pages']}页</b>";
	return $str;
}
//批量删除
function batch_delete($arr,$table)
{
	$str='';
	array_shift($arr);
	foreach ($arr as $val) 
	{
		$str=implode(',',$val);
		$sql="delete from $table where id in($str)";
		$resule=mysql_query($sql) or die(mysql_error());
	}
	return $str;
}
//后台新闻列表数据修改函数
function admin_update_news($table,$id,$arr)
{
	if (isset($arr['sub'])) 
	{
		$news_title = $arr['news_title'];
		$news_desc = $arr['news_desc'];
		$news_content = $arr['news_content'];
		$news_author = $arr['news_author'];
		$classify = $arr['classify'];
		date_default_timezone_set('Asia/shanghai');
		$time=date('Y-m-d H:i:s');
		if($_FILES['pic']['name']!="")  //选择了上传图片
		{
			$type=strrchr($_FILES['pic']['name'], '.');  //获取文件后缀 
			//判断是否是图片文件
			if($type=='.jpg' || $type=='.jpeg' || $type=='.png' || $type=='.gif')
			{
				$dest="../images/".$_FILES['pic']['name'];  //设置图片移动目标文件路径
				//移动文件
				if(move_uploaded_file($_FILES['pic']['tmp_name'], $dest))
				{
					$pic_url="images/".$_FILES['pic']['name'];
					//修改新闻数据表中pic字段
					$sql="update $table set news_title='$news_title',news_desc='$news_desc',news_content='$news_content',news_author='$news_author',classify='$classify',time='$time',pic='$pic_url' where id='$id'";
					$result=mysql_query($sql) or die(mysql_error());					
					if(mysql_affected_rows() > 0)
					{
						header("location:sel_news.php");
						return true;
					}
				}
			}else
			{
				echo "<script>alert('请选择正确的上传文件');</script>";
				return false;
			}
		}else
		{
			$sql="update $table set news_title='$news_title',news_desc='$news_desc',news_content='$news_content',news_author='$news_author',classify='$classify',time='$time' where id='$id'";
			$result=mysql_query($sql) or die(mysql_error());
			header("location:sel_news.php");
			return true;
		}		
	}	
}
//后台产品表数据修改函数
function admin_update_product($table,$id,$arr)
{
	if (isset($_POST['sub'])) 
	{
		$desc = $arr['desc'];
		$model = $arr['model'];
		$numb = $arr['numb'];
		$introduce = $arr['introduce'];
		date_default_timezone_set('Asia/shanghai');
		$time=date('Y-m-d H:i:s');
		if($_FILES['srcpic']['name']!="")  //选择了上传图片
		{
			$type=strrchr($_FILES['srcpic']['name'], '.');  //获取文件后缀 
			//判断是否是图片文件
			if($type=='.jpg' || $type=='.jpeg' || $type=='.png' || $type=='.gif')
			{
				$dest="../images/".$_FILES['srcpic']['name'];  //设置图片移动目标文件路径
				//移动文件
				if(move_uploaded_file($_FILES['srcpic']['tmp_name'], $dest))
				{
					$pic_url="images/".$_FILES['srcpic']['name'];
					//修改新闻数据表中pic字段
					$query = "update $table set srcpic='$pic_url',numb='$numb',model='$model',introduce='$introduce',time='$time',pro_desc='$desc' where id='$id'";
					mysql_query($query) or die(mysql_error());
					header("location:sel_product.php");	
				}
			}else
			{
				echo "<script>alert('请选择正确的上传文件');</script>";
			}
		}else
		{
			$sql="update $table set numb='$numb',model='$model',introduce='$introduce',time='$time',pro_desc='$desc' where id='$id'";
			$result=mysql_query($sql) or die(mysql_error());
			header("location:sel_product.php");
		}		
	}	
}
//更新轮播图
function admin_update_banner($arr,$files,$id)
{

		if($files['name']=='')
		{
			echo "<script>alert('请选择上传的图片')</script>";
			return false;
		}else
		{
			$aft=strrchr($files['name'], '.');
			if($aft == '.jpg' || $aft == '.jpeg' || $aft == '.png' || $aft == '.gif')
			{
				$dest='../images/'.$files['name'];
				if(move_uploaded_file($files['tmp_name'], $dest))
				{
					$pic = "images/".$files['name'];
					$name = $arr['name'];
					date_default_timezone_set('Asia/shanghai');
					$time=date('Y-m-d H:i:s');
					$sql = "update tb_banner set name='$name',srcpic='$pic',time='$time' where id='$id'";
					$result=mysql_query($sql) or die(mysql_error());
					header('location:sel_banner.php');
					return true;
				}
			}else
			{
				echo "<script>alert('请选择正确的上传的图片')</script>";
				return false;
			}
		}
	
}
function admin_update_aboutus($arr,$files,$id,$table = 'tb_aboutus')
{
	$name = $arr['name'];
	$center_title = $arr['center_title'];
	$center_content = $arr['center_content'];
	$pic_title = $arr['pic_title'];
	date_default_timezone_set('Asia/shanghai');
	$time=date('Y-m-d H:i:s');
	if($files['name']!="")  //选择了上传图片
	{
		$type=strrchr($files['name'], '.');  //获取文件后缀 
			//判断是否是图片文件
		if($type=='.jpg' || $type=='.jpeg' || $type=='.png' || $type=='.gif')
		{
			$dest="../images/".$files['name'];  //设置图片移动目标文件路径
				//移动文件
			if(move_uploaded_file($files['tmp_name'], $dest))
			{
				$pic_url="images/".$files['name'];
					//修改新闻数据表中pic字段
				$query = "update $table set name='$name',center_title='$center_title',center_content='$center_content',pic_title='$pic_title',time='$time',pic='$pic_url' where id='$id'";
				mysql_query($query) or die(mysql_error());
				header("location:sel_aboutus.php");	
			}
		}else
		{
			echo "<script>alert('请选择正确的上传文件');</script>";
		}
	}else
	{
		$sql="update $table set name='$name',center_title='$center_title',center_content='$center_content',pic_title='$pic_title',time='$time' where id='$id'";
		$result=mysql_query($sql) or die(mysql_error());
		header("location:sel_aboutus.php");
	}	
}
?>
 