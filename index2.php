<?php
 $line_id=$_POST['line_id'];
$strAccessToken = "4Twn1MlK34hhjetxAspfd8QoOYQSl3yluDVmRguMTrrPlMtcSQVlAJhe+H3aE+FhlAZ5dOB8cJZr+vnszYz8xknwzX9mHBx7mzpwasExfoE+vsJfGO5doTtd50NmZuSW04CkvI43ffrGu4mJ3uLuXwdB04t89/1O/w1cDnyilFU=";
 
$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
 


<?php
 
//$strAccessToken = "ACCESS_TOKEN";
 
$strUrl = "https://api.line.me/v2/bot/message/push";
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
 
$arrPostData = array();
$arrPostData['to'] = $line_id;
$arrPostData['messages'][0]['type'] = "text";
$arrPostData['messages'][0]['text'] = $line_id;
//$arrPostData['messages'][0]['type'] = "image";
//$arrPostData['messages'][0]['originalContentUrl'] = "https://raw.githubusercontent.com/stoudecha/pthlinebot/master/cat.png";
// $arrPostData['messages'][0]['previewImageUrl'] = "https://raw.githubusercontent.com/stoudecha/pthlinebot/master/cat.png";
//$arrPostData['messages'][0]['type'] = "imagemap";
//$arrPostData['messages'][0]['baseUrl'] = "https://raw.githubusercontent.com/stoudecha/pthlinebot/master/cat";
 //$arrPostData['messages'][0]['baseSize']['hieght'] = 700;
//$arrPostData['messages'][0]['baseSize']['width'] = 700;
//$arrPostData['messages'][0]['action'][0]['type'] = "uri";
//$arrPostData['messages'][0]['action'][0]['linkUri'] = "http://pth.ddns.net";
//$arrPostData['messages'][0]['action'][0]['area']['x'] = 0;
//$arrPostData['messages'][0]['action'][0]['area']['y'] = 0;
//$arrPostData['messages'][0]['action'][0]['area']['width'] = 200;
//$arrPostData['messages'][0]['action'][0]['area']['heigth'] = 200;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close ($ch);
