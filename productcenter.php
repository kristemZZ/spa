<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>boutique spa——产品中心</title>
<link rel="stylesheet" href="css/header.css" type="text/css"/>
<link rel="stylesheet" href="css/left_nav2.css" type="text/css"/>
<link rel="stylesheet" href="css/product_center.css" type="text/css"/>

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
         <?php
            $pro=url_get_column();
            $id = $pro['id'];
            $pro_col = get_son($id);
            $str = '';
         ?>
           	  <h3><?=$pro['name'] ?></h3>
              <p>PRODUCT CENTER</p>
           </div>
           <ul class="ju_t">
           <?php
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
              <?php
                  $str_title = '';
                  $id_title = max(@$_GET['id'],$id);
                  $arr_title = get_parent($id_title);
                  foreach ($arr_title as $key) 
                  {
                     $str .= "<li><a href=".$key['url'].">".$key['name']."</a><span>|</span></li>";
                  }
                  echo $str;
              ?>
              <div class="arrow"><img src="images/arrow.png"/></div>
          </ul>
          <div id="msg"></div> 
              <script type="text/javascript" src="js/product_ajax.js"></script> 
       </div>
   </div>
</div>
<?php
require 'footer.php';
?>