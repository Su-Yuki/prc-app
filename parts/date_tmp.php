<?php 
$rs = "";

$timestamp = time();
// date("Y/m/d H:i:s", strtotime('-1 day')) . "\n"; 
// date("Y/m/d", strtotime('last Saturday')) . "\n"; 
$strtotime = strtotime( "+1 day" , $timestamp);

$date = date("Y-m-j", $timestamp);
$rs = date("Y-m-j", $strtotime);


// date_default_timezone_set('Asia/Tokyo'); タイムゾーンの設定
// y：年（2桁表記）
// m：月（2桁表記）
// n：月（先頭にゼロない）
// d：日（2桁表記）
// H：時間（24時間単位）
// h：時間（12時間単位）
// i：分
// s：秒
// t：指定した月の日数
// w：曜日番号（0[日曜]から6[土曜]の値）
// .：文字列連結
// \n：改行


// var_dump($rs);
echo "<br>";
echo $rs;
?>