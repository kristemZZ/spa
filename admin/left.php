<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/jquery.js"></script>
<script type="text/javascript">
$(function(){	
	//导航切换
	$(".menuson .header").click(function(){
		var $parent = $(this).parent();
		$(".menuson>li.active").not($parent).removeClass("active open").find('.sub-menus').hide();
		
		$parent.addClass("active");
		if(!!$(this).next('.sub-menus').size()){
			if($parent.hasClass("open")){
				$parent.removeClass("open").find('.sub-menus').hide();
			}else{
				$parent.addClass("open").find('.sub-menus').show();	
			}
					
		}
	});
	
	// 三级菜单点击
	$('.sub-menus li').click(function(e) {
        $(".sub-menus li.active").removeClass("active")
		$(this).addClass("active");
    });
	
	$('.title').click(function(){
		var $ul = $(this).next('ul');
		$('dd').find('.menuson').slideUp();
		if($ul.is(':visible')){
			$(this).next('.menuson').slideUp();
		}else{
			$(this).next('.menuson').slideDown();
		}
	});
})	
</script>


</head>

<body style="background:#90c2cb;">
	<div class="lefttop"><span></span>目录</div>   
    <dl class="leftmenu">  
    	<dd>
	        <div class="title"><span><img src="images/leftico04.png" /></span>管理栏目</div>
	        <ul class="menuson">
	            <li><cite></cite><a href="sel_banner.php" target="rightFrame">图片管理</a><i></i></li>
 				<li><cite></cite><a href="sel_news.php" target="rightFrame">新闻中心</a><i></i></li>
 				<li><cite></cite><a href="sel_product.php" target="rightFrame">产品中心</a><i></i></li>
 				<li><cite></cite><a href="sel_message.php" target="rightFrame">留言管理</a><i></i></li>
 				<li><cite></cite><a href="sel_aboutus.php" target="rightFrame">关于我们</a><i></i></li>
 				<li><cite></cite><a href="sel_contact.php" target="rightFrame">联系我们</a><i></i></li>
 				<li><cite></cite><a href="sel_column.php" target="rightFrame">栏目列表</a><i></i></li>
 				<li><cite></cite><a href="selLink.php" target="rightFrame">友情链接</a><i></i></li>
	        </ul>
	    </dd>
	    <?php
	    if(@$_SESSION['power'] == '超级管理员')
	    {
	    ?>
	    <dd>
	        <div class="title"><span><img src="images/leftico04.png" /></span>管理管理员</div>
	        <ul class="menuson">
	            <li><cite></cite><a href="sel_admin.php" target="rightFrame">查询管理员</a><i></i></li>
	            <li><cite></cite><a href="add_admin.php" target="rightFrame">添加管理员</a><i></i></li>
	        </ul>
	    </dd> 
	    <?php	
	    }
	    ?>  

    </dl>
    
</body>
</html>
