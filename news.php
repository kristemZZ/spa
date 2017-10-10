<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>boutique spa——新闻详情</title>
<link rel="stylesheet" href="css/left_nav.css" type="text/css"/>
<link rel="stylesheet" href="css/header.css" type="text/css"/>
<link rel="stylesheet" href="css/news.css" type="text/css"/>

</head>

<body>
<?php
require 'header.php';
?>
<!--头部结束-->

<div class="center">
   <div class="cent">
   <!--左道航-->
       <div class="cent_l">
  		   <div class="juxing">
           	  <h3>新闻中心</h3>
              <p>NEWS</p>
           </div>
           <ul class="ju_t">
               <li><a href="news.php">行业动态</a></li>
               <li><a href="newscenter.php">企业新闻</a></li>
           </ul>
           <div class="juxing">
           	  <h3>关于我们</h3>
              <p>ABOUT US</p>
           </div>
           <ul class="ju_b">
               <li><a href="aboutus.php">公司简介</a></li>
               <li><a href="#">执行董事会</a></li>
               <li><a href="#">全球网点</a></li>
               <li><a href="#">监事会</a></li>
               <li><a href="#">boutique spa集团构架</a></li>
               <li><a href="#">我们的市场及客户群</a></li>
           </ul>
       </div>
   <!--右内容-->
       <div class="cent_r">
       	  <ul class="cen_t">
              <img src="images/block.png"/>
              <h2>行业动态</h2>
              <li><a href="news.php">行业动态</a></li>
              <li><a href="newscenter.php">新闻中心</a><span>|</span></li>
              <li><a href="index.php">首页</a><span>|</span></li>
              <div class="arrow"><img src="images/arrow.png"/></div>
          </ul>
          
       	  <ul class="cen_tit">
              <?php
                $news=db_select_id('tb_news');
              ?>
                  <h1><?=$news['news_title'] ?></h1>
                  <p><?php echo $news['time'].' ';echo $news['classify']; ?></p>
                  <li><a href="#"><img src="images/fenxiang.png"/></a></li>
                  <li><a href="#"><img src="images/lianjie.png"/></a><span>|</span></li>
                  <li><a href="#"><img src="images/weibo.png"/></a><span>|</span></li>
                  <li><a href="#"><img src="images/weixin.png"/></a><span>|</span></li>
         </ul>
         <div class="iwatch">
             	<ul>
                    <img src="<?=$news['pic'] ?>"/>
                    <li><?=$news['news_content'] ?></li>
                    <?php
                    // $maxs=last_id_news();
                    // $id=max($_GET['id'],1);
                    $list=news_prev();
                    if ($list==false) 
                    {
                      $list['id'] = 1;
                      $list['news_title'] = '没有了';
                    }
                    $arr=news_next();
                    if ($arr==false) 
                    {
                      $arr['id'] = @$_GET['id'];
                      $arr['news_title'] = '没有了';
                    }
                    ?>
                    <li id="jump"><a id="prev" href="news.php?id=<?=$list['id'] ?>">上一篇：<?=$list['news_title'] ?></a> <a href="news.php?id=<?=$arr['id'] ?>">下一篇：<?=$arr['news_title'] ?></a></li>
              </ul>
         </div>            
       </div>
   </div>
</div>



<!--底部开始-->
<?php
require 'footer.php';
?>
