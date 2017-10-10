<meta charset="utf-8">
<?php
require '../data/param.php';
require '../data/db_function.php';
$list=page('tb_news',$conf,$pagesize=8);
echo "<ul id='cen_b'>";
foreach ($list['arr'] as $value) 
{
    $news=$value;
?>
 <li><a href="news.php?id=<?=$news['id'] ?>"><span class="t_l"><?=$news['news_desc'] ?></span><span class="t_r"><?=substr($news['time'], 0,10) ?></span></a></li>
<?php
}
echo "</ul>";
$str=page_style($list);
echo $str;
?>