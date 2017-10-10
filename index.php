<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>boutique spa——首页</title>
<link href="css/header.css" rel="stylesheet" type="text/css"/>
<link href="css/index.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<?php
require'header.php';
?>
<div class="center">
  <div class="cen">
           <ul class="newstop">
               <li class="nleft"><h2 class="title">新闻动态</h2></li>
               <li class="nright"><a href="newscenter.php">NEWS<img src="images/right.png"/></a></li>
           </ul>
       	 <div class="news">
           <ul>
              <?php
              $sqllt="select * from tb_news order by time desc limit 0,8";
              $results=mysql_query($sqllt);
              while ($row=mysql_fetch_assoc($results)) 
              {
              ?>
              <li><img src="images/dian.png"/><a href="news.php?id=<?= $row['id'] ?>"><span class="wenzi"><?= $row['news_desc'] ?></span><span class="riqi"><?= substr($row['time'], 0,10) ?></span></a></li>

              <?php
              }
              ?>
               
           </ul>
           <?php
           $images="select * from tb_index_newspic order by time desc limit 0,1";
           $pic_result=mysql_query($images);
           $pic=mysql_fetch_assoc($pic_result);
           ?>
           	   <img src="<?=$pic['pic'] ?>"/>
        </div>
       <ul class="newstop">
       <?php
       $sqln="select * from tb_index_introduction order by time limit 0,1";
       $aboutus=mysql_query($sqln);
       $about=mysql_fetch_array($aboutus);
       ?>
           <h3 class="linian"><?=$about['index_title'] ?></h3>
           <li class="nleft"><h2 class="title">关于我们</h2></li>
           <li class="nright"><a href="aboutus.php">ABOUT US<img src="images/right.png"/></a></li>
       </ul>

       <div class="aboutus">
           <p><?=$about['index_content'] ?></p>           
           <a href="aboutus.php">查看更多 <span>MORE</span><img src="images/chakan.png"/></a>
       </div>

       <ul class="newstop">
           <li class="nleft"><h2 class="title">产品中心</h2></li>
           <li class="nright"><a href="productcenter.php">PORDCUT CENTER<img src="images/right.png"/></a></li>
       </ul>

        <div class="pordcut">
                 <div class="bot_l">
                 <?php
                 $query="select * from tb_host order by time desc limit 0,1";
                 $results=mysql_query($query);
                 $arr=mysql_fetch_assoc($results);
                 ?>
                    <img src="<?= $arr['srcpic'] ?>"/>
                    <p><?=$arr['desc'] ?></p>
                    <a href="product.php?id=<?=$arr['id'] ?>">更多详情</a>
                 </div>
                 <ul>
                 <?php
                 $sqls="select * from tb_product order by time desc limit 0,4";
                 $res=mysql_query($sqls);
                 while ($arrs=mysql_fetch_assoc($res)) 
                 {
                 ?>
                 <li>
                    <img src="<?=$arrs['srcpic']  ?>" width="318" height="145" />
                    <p><?=$arrs['pro_desc'] ?></p>
                    <a href="product.php?id=<?=$arrs['id'] ?>">更多详情</a>
                 </li>
                 <?php 
                 }
                 ?>
                 </ul>
        </div>
  </div>
</div>
<?php
require'footer.php';
?>