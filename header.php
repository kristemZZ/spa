<?php
require'data/db_function.php';
 db_connect($conf);  //链接数据库
?>
<div class="top">
<div class="head">
   <div class="lang">
      <ul>
          <li><a href="#">中文</a></li>
          <li><a href="#">Francais<span>|</span></a></li>
          <li><a href="#">Espano<span>|</span></a></li>
          <li><a href="#">Englisch<span>|</span></a></li>
      </ul>
   </div>
   <div class="nav">
      <?php
      $querys="select * from tb_logo order by time desc limit 0,1";
      $resultt=mysql_query($querys);
      $logo=mysql_fetch_array($resultt);
      ?>
      <div class="logo"><a href="index.php"><img src="<?= $logo['srcpic'] ?>"></a>s</div>
      <div class="mainnav">
          <ul>
            <?php
                $index = get_son(0,'tb_column'); //获取1级栏目
                $index = $index['0'];
                echo "<li><a href=".$index['url'].">".$index['name']."</a></li>";
                $nav = get_son(1,'tb_column');  //获取2级栏目
                foreach ($nav as $val) 
                {
            ?>
                <li><a href="<?=$val['url'] ?>"><?=$val['name']?></a></li>
            <?php          
                }
            ?>
          </ul> 
      </div>
      <div class="search">
         <div class="sousuo"><a href="#">搜索</a></div>
         <input type="search" class="sou" value="" placeholder="输入关键字">
      </div>
   </div>
</div>


<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
   $(function(){                        //这个是点击显示图片的
         var i=0;
	     $(".show img").eq(0).show().siblings().hide();
	     $(".dian span").click(function(){
			   i=$(this).index();
			   $(".dian span").eq(i).addClass("hover").siblings().removeClass("hover");
			   $(".show img").eq(i).fadeIn(600).siblings().fadeOut(600);
			 });                        
			 
			 
			 
			 
		 var adtime=null;          //这是自动轮播的
		 function auto(){
			  adtime=setInterval(function(){
				  if(i==2){
				  i=0;
				  $(".dian span").eq(i).addClass("hover").siblings().removeClass("hover");
			      $(".show img").eq(i).fadeIn(600).siblings().fadeOut(600);
				  }
				  else{
				  i++;
				  $(".dian span").eq(i).addClass("hover").siblings().removeClass("hover");
			      $(".show img").eq(i).fadeIn(600).siblings().fadeOut(600);}
				  },4000)
			 };
			 
		 auto();
		 
		 $(".dian").hover(function(){clearInterval(adtime);}
		                 ,function(){auto();})
	   }) 
</script>
<div class="main">
      <div class="show">
      <?php
      $que="select * from tb_banner order by time limit 0,3";
      $resultd=mysql_query($que);
      while($banner=mysql_fetch_assoc($resultd))
      {
      ?>
      <img src=<?= $banner['srcpic']; ?> width="1200" height="348">;
      <?php  
      }
      ?>
      </div>
      <div class="dian">
         <span class="hover"></span>
         <span></span>
         <span></span>      
      </div>
  </div>
</div>