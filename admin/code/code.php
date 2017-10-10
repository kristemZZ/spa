<?php
session_start();
header('content-type:image/png');
$img = imagecreatetruecolor(80, 44);
$color = imagecolorallocate($img, 250, 250, 250);
$line_color = imagecolorallocate($img, rand(0,255), rand(0,255), rand(0,255));
$text_color = imagecolorallocate($img, rand(0,255), rand(0,255), rand(0,255));
$piexl_color = imagecolorallocate($img, rand(0,255), rand(0,255), rand(0,255));
imagefill($img, 0, 0, $color);
for ($i=0; $i < 100; $i++) 
{ 
	imagesetpixel($img, rand(0,80), rand(0,44), $piexl_color);
}
for ($j=0; $j < 5; $j++) 
{ 
	imageline($img, rand(3,20), rand(3,20), rand(20,60), rand(15,40), $line_color);
}
$str_res = '';
$str="0123456789zxcvbnmlkjhgfdsaqwertyuiopPOIUYTREWQASDFGHJKLMNBVCXZ";
for ($k=1; $k <= 4; $k++) 
{ 
	$strs=substr($str, rand(0,strlen($str)-1),1);
	imagestring($img, 5, 14*$k, rand(15,20), $strs, $text_color);
	$str_res.=$strs;
}
$_SESSION['code'] = $str_res;
imagepng($img);
imagedestroy($img);
?>