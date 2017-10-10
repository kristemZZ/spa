<div class="footer">
     <div class="bottom_logo">
         <ul>
         <li><img src="<?=$logo['pic_bottom'] ?>"/></li>
         <li><p>友情链接:
         <?php
         	$result_link=db_limit_time_desc('tb_link',0,4);
         	while ($link=mysql_fetch_assoc($result_link)) 
         	{
         		echo "<a href={$link['url']}>{$link['name']}</a>";
         	}
         ?><a href="admin/index.php">管理员入口</a></p>
         </li>
         <li><p>全国免费服务咨询热线：0752-1212112</p></li>
         <li><p>互联网医疗保健信息服务同意书：湘卫网申字(2013) 第057号医疗广告审查证明文号：(湘)医广【2013】第13-0731-974号		 	   </p></li>
         <li><p>地址：湖南省长沙市芙蓉区五一大道湘江明珠大厦 </p></li>
         </ul>
         <div class="bottom_img"><img src="images/erweima.jpg"/></div>
     </div>
</div>

</body>
</html>