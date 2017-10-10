<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>boutique spa——联系我们</title>
<link rel="stylesheet" href="css/header.css" type="text/css"/>
<link rel="stylesheet" href="css/left_nav2.css" type="text/css"/>
<link rel="stylesheet" href="css/contact.css" type="text/css"/>

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
           	  <h3>关于我们</h3>
              <p>ABOUT US</p>
           </div>
           <ul class="ju_t">
               <li><a href="aboutus.php">公司简介</a></li>
               <li><a href="#">执行董事会</a></li>
               <li><a href="#">全球网点</a></li>
               <li><a href="#">监事会</a></li>
               <li><a href="#">boutique spa集团构架</a></li>
               <li><a href="#">我们的市场及客户群</a></li>
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
              <h2>联系我们</h2>
              <li><a href="contact.php">联系我们</a></li>
              <li><a href="index.php">首页</a><span>|</span></li>
              <div class="arrow"><img src="images/arrow.png"/></div>
          </ul>
          
       	  <div class="ditu">
          <script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
          <div style="width:900px;height:371px;border:#ccc solid 1px;" id="dituContent"></div>

<script type="text/javascript">
    //创建和初始化地图函数：
    function initMap(){
        createMap();//创建地图
        setMapEvent();//设置地图事件
        addMapControl();//向地图添加控件
    }
    
    //创建地图函数：
    function createMap(){
        var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
        var point = new BMap.Point(113.340544,23.274545);//定义一个中心点坐标
        map.centerAndZoom(point,9);//设定地图的中心点和坐标并将地图显示在地图容器中
        window.map = map;//将map变量存储在全局
    }
    
    //地图事件设置函数：
    function setMapEvent(){
        map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
        map.enableScrollWheelZoom();//启用地图滚轮放大缩小
        map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
        map.enableKeyboard();//启用键盘上下左右键移动地图
    }
    
    //地图控件添加函数：
    function addMapControl(){
        //向地图中添加缩放控件
  var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
  map.addControl(ctrl_nav);
        //向地图中添加缩略图控件
  var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:1});
  map.addControl(ctrl_ove);
        //向地图中添加比例尺控件
  var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
  map.addControl(ctrl_sca);
    }
    
    
    initMap();//创建和初始化地图
</script>
          
          
          </div>
          <div class="fo">
              <h3>留言板</h3>
              <form method="post" action="data/verification.php" name="myform">
                  <dl>
                       <dt>您的姓名：</dt>
                       <input name="username" type="text" class="tet" onblur="vrify(1)" onfocus="prompt(1)" placeholder="必填"><span id="user"></span>
                  </dl>
                  <dl>
                       <dt>联系电话：</dt>
                       <input name="phone" type="text" class="tet" onblur="vrify(2)" placeholder="必填"><span id="phone"></span>
                  </dl>
                  <dl>
                       <dt>电子邮件：</dt>
                       <input name="email" type="text" class="tet" onblur="vrify(3)" ><span id="email"></span>
                  </dl>
                  <dl>
                       <dt>留言主题：</dt>
                       <input name="motif" type="text" class="zhuti">
                  </dl>
                  <dl>
                       <dt>留言内容：</dt>
                       <textarea name="content"  placeholder="必填" onfocus="prompt(2)" onblur="vrify(4)"></textarea><span id="matter"></span>
                  </dl>
                  <dl class="yan">
                       <dt>验证码　：</dt>
                       <input type="text" name="cord" class="tet" onblur="ajax()" placeholder="必填">

                       <img src="data/cord.php" onclick="javascript:this.src=this.src+'?'+Math.random()" title="看不清？点击刷新下一张" />
                       <span id="veri"></span>
                  </dl>
                  <dl class="anniuu">
                    <input name="sub" type="submit" class="tijiao" value="提交" onclick="return get_verify()">
                    <input name="" type="reset" class="tijiao">
                  </dl>
              </form>
          </div>
       </div>
   </div>
</div>
<script type="text/javascript" src="js/js.js"></script>
<?php
require 'footer.php';
?>
