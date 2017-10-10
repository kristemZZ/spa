<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>boutique spa——新闻中心</title>
<link href="css/header.css" rel="stylesheet" type="text/css"/>
<link href="css/left_nav.css" rel="stylesheet" type="text/css"/>
<link href="css/news_center.css" rel="stylesheet" type="text/css"/>

</head>

<body>
<?php
require'header.php';
?>
<div class="center">
   <div class="cent">
       <div class="cent_l">
  		   <div class="juxing">
              <?php
                 $row = url_get_column();
                 $id = $row['id'];
                 $news_col = get_son($id,'tb_column'); 
              ?>
           	  <h3><?=$row['name'] ?></h3>
              <p>NEWS</p>
           </div>
           <ul class="ju_t">
              <?php
                foreach ($news_col as $val) 
                {
              ?>
                  <li><a href="<?=$val['url'] ?>?id=<?=$val['id'] ?>"><?=$val['name'] ?></a></li>
              <?php
                }
              ?>
           </ul>
           <div class="juxing">
           	  <!--放图片-->
           </div>
       </div>
   
       <div class="cent_r">
       	  <ul class="cen_t">
              <img src="images/block.png"/>
              <h2>新闻列表</h2>
              <?php
                $id =max(@$_GET['id'],6);
                $arr_parent = get_parent($id);
                $str = '';
                foreach ($arr_parent as $value) 
                {
                  $str .="<li><a href='{$value['url']}'>".$value['name']."</a>|</li>";
                }
                echo $str;
              ?>
              <div class="arrow"><img src="images/arrow.png"/></div>
          </ul>
          <div id="msg">
            <script type="text/javascript" src="js/news_ajax.js"></script>
          </div>
       </div>
   </div>
</div>
<?php
require'footer.php';
?>