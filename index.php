<?php
require_once __DIR__ .'/pthbot.php';
$bot = new Linebot();
$text = $bot->getMessageText();
$to="U3b5751f42f6ef750828f9d74adb4c8ce";
$imageUrl="http://pth.ddns.net/2018-04-17231.jpg";
 $previewImageUrl=$imageUrl;
$bot->pushImage($to, $imageUrl);
?>
