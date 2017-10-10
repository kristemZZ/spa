<?php
require '../data/param.php';
require '../data/db_function.php';
$list=page('tb_product',$conf,'6');
echo "<ul id='chanpin'>";
foreach ($list['arr'] as $value) 
{
	$arr=$value;
?>
<li><img src="<?=$arr['srcpic'] ?>" width="239" height="182" /><p><?=$arr['pro_desc'] ?></p><a href="product.php?id=<?=$arr['id'] ?>">更多详情</a></li>
<?php
}
echo "</ul>";
$str=page_style($list);
echo $str;
?>