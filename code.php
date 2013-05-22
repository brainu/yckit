<?php
session_start();
header("Content-type: image/PNG");
$w=150;
$h=50;
$fontface="core/fonts/code.ttf"; //字体文件
$str = "七万丈三上下不与丐丑专业且世丘丛东丝丢两严个丫中丰串临丸丹为丽举乃久么义之乌乎乏乐乔习乡书买乱乳争事互仙";

$code="";
$str = iconv('utf-8','gbk//IGNORE',$str);
for($i=0;$i<4;$i++){
        $Xi=mt_rand(0,strlen($str)/2);
        if($Xi%2) $Xi+=1;
        $code.=substr($str,$Xi,2);
}
$_SESSION['code']=iconv('gbk','utf-8//IGNORE',$code);;

$im=imagecreatetruecolor($w,$h);
$bkcolor=imagecolorallocate($im,250,250,250);
imagefill($im,0,0,$bkcolor);
/***添加干扰***/
for($i=0;$i<5;$i++){
        $fontcolor=imagecolorallocate($im,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
        imagearc($im,mt_rand(-10,$w),mt_rand(-10,$h),mt_rand(30,300),mt_rand(20,200),55,44,$fontcolor);
}
for($i=0;$i<300;$i++){
        $fontcolor=imagecolorallocate($im,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
        imagesetpixel($im,mt_rand(0,$w),mt_rand(0,$h),$fontcolor);
}
/***********内容*********/
for($i=0;$i<4;$i++){
        $fontcolor=imagecolorallocate($im,mt_rand(0,150),mt_rand(0,150),mt_rand(0,150)); //这样保证随机出来的颜色较深。
        $codex=iconv("GB2312","UTF-8",substr($code,$i*2,2));
        imagettftext($im,mt_rand(14,18),mt_rand(-60,60),30*$i+20,mt_rand(30,35),$fontcolor,$fontface,$codex);
}
imagepng($im);
imagedestroy($im);