<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>boutique spa——公司简介</title>
<link rel="stylesheet" href="css/header.css" type="text/css"/>
<link rel="stylesheet" href="css/left_nav2.css" type="text/css"/>
<link rel="stylesheet" href="css/aboutus.css" type="text/css"/>

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
                $about = url_get_column();
                $id = $about['id'];
                $son_column = get_son($id);
                $id_star = $son_column['0']['id'];
              ?>
           	  <h3><?=$about['name'] ?></h3>
              <p>ABOUT US</p>
           </div>
           <ul class="ju_t">
              <?php
                $str = '';
                foreach ($son_column as $value) 
                {
                  $str .= "<li><a href=".$value['url'].'?id='.$value['id'].">".$value['name']."</a></li>";
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
              <?php
                $id = max(@$_GET['id'],$id_star);
                $row = db_select_admin_id('tb_column',$id);
              ?>
              <h2><?=$row['name'] ?></h2>
              <?php
                  $con_title = get_parent($id);
                  $str = '';
                  foreach ($con_title as $val) 
                  {
                      $str .= "<li><a href=".$val['url'].">".$val['name']."</a><span>|</span></li>";
                  }
                  echo $str;
              ?>
              <div class="arrow"><img src="images/arrow.png"/></div>
          </ul>
          
       	  <ul class="jianjie">
              <?php
              $result=db_limit_time_desc('tb_aboutus',0,1);
              $about=mysql_fetch_assoc($result);
              ?>
                <p><?=$about['center_title'] ?></p>
                <li><?=$about['center_content'] ?></li>
                <h2><?=$about['pic_title'] ?></h2>
                <img src="<?=$about['pic'] ?>" style="width:897px;height:354px" />
          </ul>
      </div>
   </div>
</div>
<?php
require 'footer.php';
?>
