<?php
session_start();
$image=imagecreatetruecolor(60, 20);
$color=imagecolorallocate($image, 250, 250, 250);
$piexl_color=imagecolorallocate($image, rand(0,255), rand(0,255), rand(0,255));
$line_color=imagecolorallocate($image, rand(0,255), rand(0,255), rand(0,255));
$text_color=imagecolorallocate($image, rand(0,255), rand(0,255), rand(0,255));
imagefill($image, 0, 0, $color);
for ($i=0; $i < 5; $i++) 
{ 
	imageline($image, rand(0,60), rand(2,5), rand(0,60), rand(15,20), $line_color);
}
for ($j=0; $j < 100; $j++) 
{ 
	imagesetpixel($image, rand(0,60), rand(0,20), $piexl_color);
}
$strs='';
$str="0123456789zxcvbnmlkjhgfdsaqwertyuiopPOIUYTREWQASDFGHJKLMNBVCXZ";
for ($k=0; $k < 4; $k++) 
{ 
	$strs.=substr($str, rand(0,61),1);
}
$_SESSION['yan']=$strs;
imagestring($image, rand(3,5), rand(8,10), rand(3,5), $strs, $text_color);
header('content-type:image/png');
imagepng($image);
imagedestroy($image);
?>