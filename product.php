<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>boutique spa——产品详情</title>
<link rel="stylesheet" href="css/header.css" type="text/css"/>
<link rel="stylesheet" href="css/left_nav2.css" type="text/css"/>
<link rel="stylesheet" href="css/product.css" type="text/css"/>
<style type="text/css">
  #prev{float: left;margin-left: 100px;margin-top: 50px;color: #000}
  #prev:hover{text-decoration: underline;color: #f60}
  #next{float: right;margin-right: 100px;margin-top: 50px;color: #000}
  #next:hover{text-decoration: underline;color: #f60}
</style>
</head>
  
<body>
<?php
require 'header.php';
?>
<div class="center">
   <div class="cent">
   <!--左道航-->
       <div class="cent_l">
  		   <div class="juxing">
           	  <h3>产品中心</h3>
              <p>PRODUCT CENTER</p>
           </div>
           <ul class="ju_t">
                <?php
                    $arr = get_col_record('产品中心');
                    $id = $arr['id'];
                    $pro_col = get_son($id);
                    $str = '';
                    foreach ($pro_col as $value) 
                    {
                       $str .="<li><a href=".$value['url']."?id={$value['id']}".">".$value['name']."</a></li>"; 
                    }
                    echo $str;
                ?>
           </ul>
           <div class="juxing">
           	  <h3>联系我们</h3>
              <p>CONTACT US</p>
           </div>
           <ul class="ju_b">
              <?php
                $str = '';
                $sql = "select * from tb_contact";
                $res = mysql_query($sql);
                $contact = mysql_fetch_assoc($res);
              ?>
               <li><?=$contact['qq'] ?></li>
               <li><?=$contact['fax'] ?></li>
               <li><?=$contact['email'] ?></li>
               <li><?=$contact['phone'] ?></li>
           </ul>
       </div>
   <!--右内容-->
       <div class="cent_r">
       	  <ul class="cen_t">
              <img src="images/block.png"/>
              <h2>产品信息</h2>
              <li><a href="product.php">医用激光仪器设备</a></li>
              <li><a href="productcenter.php">产品中心</a><span>|</span></li>
              <li><a href="index.php">首页</a><span>|</span></li>
              <div class="arrow"><img src="images/arrow.png"/></div>
          </ul>
          
       	  <div class="xinxi">
          <?php
            $arr=db_select_id('tb_product');
          ?>
              <img src="<?=$arr['srcpic'] ?>"/>
            <ul>
              <li>产品名称：<?=$arr['pro_desc'] ?></li>
              <li>海关HS编号：<?=$arr['numb'] ?></li>
              <li>型    号：<?=$arr['model'] ?></li>
            </ul>
              <h6>产品介绍</h6>
              <p><?=$arr['introduce'] ?></p>
          </div>
          <?php
            $prev = news_next('tb_product');
            $next = news_prev('tb_product');
          ?>
       </div>
       <a id="prev" href="product.php?id=<?=$prev['id'] ?>">上一篇：<?=$prev['pro_desc'] ?></a>
       <a id="next"  href="product.php?id=<?=$next['id'] ?>">下一篇：<?=$next['pro_desc'] ?></a>
   </div>
</div>
<?php
require 'footer.php';
?>
