<?php
$msg_line=$_GET['msg_line'];
$link=$_GET['link'];
 $line_id=$_GET['line_id'];
$strAccessToken = "4Twn1MlK34hhjetxAspfd8QoOYQSl3yluDVmRguMTrrPlMtcSQVlAJhe+H3aE+FhlAZ5dOB8cJZr+vnszYz8xknwzX9mHBx7mzpwasExfoE+vsJfGO5doTtd50NmZuSW04CkvI43ffrGu4mJ3uLuXwdB04t89/1O/w1cDnyilFU=";
 
$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
 
$strUrl = "https://api.line.me/v2/bot/message/reply";

 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
 
if($arrJson['events'][0]['message']['text'] == "สวัสดี"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "สวัสดี ID คุณคือ ".$arrJson['events'][0]['source']['userId'];
 $uid=$arrJson['events'][0]['source']['userId'];
}else if($arrJson['events'][0]['message']['text'] == "จองคิว"){
  $arrPostData = array();

  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $uid=$arrJson['events'][0]['source']['userId'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "จองคิวทีนี่ http://pth.ddns.net/que_register.php?regist=".$uid;
}else{
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันไม่เข้าใจคำสั่ง";
}
 
 
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
 
?>

<?php
 
//$strAccessToken = "ACCESS_TOKEN";
 
$strUrl = "https://api.line.me/v2/bot/message/push";
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
 
$arrPostData = array();
$arrPostData['to'] = $line_id;
$arrPostData['messages'][0]['type'] = "text";
$arrPostData['messages'][0]['text'] = $msg_line." ".$link;
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
$strUrl = "https://api.line.me/v2/bot/message/push";
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
 
$arrPostData = array();
$arrPostData['to'] = $line_id;
//$arrPostData['messages'][0]['type'] = "text";
//$arrPostData['messages'][0]['text'] = $msg_line." ".$link;
$arrPostData['messages'][0]['type'] = "location";
$arrPostData['messages'][0]['title'] = "โรงพยาบาลปทุมธานี";
$arrPostData['messages'][0]['address'] = "7 ต.บางปรอก อ.เมือง จ.ปทุมธานี tel:025988888";
$arrPostData['messages'][0]['latitude'] = "14.0207310";
$arrPostData['messages'][0]['longitude'] = "100.5232990";
//$arrPostData['messages'][0]['originalContentUrl'] = "https://raw.githubusercontent.com/stoudecha/pthlinebot/master/cat.png";
//$arrPostData['messages'][0]['previewImageUrl'] = "https://raw.githubusercontent.com/stoudecha/pthlinebot/master/cat.png";
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

 echo"<meta http-equiv=\"refresh\" content=\"0;URL=$link\">";
?>
