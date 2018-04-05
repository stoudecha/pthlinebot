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
  $strUrlpic="https://api.line.me/v2/bot/profile/{$uid}";
$arrHeader1 = array();
$arrHeader1[] = "Content-Type: application/json";
$arrHeader1[] = "Authorization: Bearer {$strAccessToken}";
 $arrJson1 = json_decode($content, true);
  $arrPostData1 = array();
  $pic=$arrJson1['pictureUrl'];
 $ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strUrlpic);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData1));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close ($ch);
 
 
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "จองคิวทีนี่ http://pth.ddns.net/que_register.php?regist=".$uid."&pic=".$pic;
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
//$arrPostData['messages'][0]['originalContentUrl'] = "https://f.ptcdn.info/902/056/000/p6k34559wwESApUhdqC-o.jpg";
// $arrPostData['messages'][0]['previewImageUrl'] = "https://f.ptcdn.info/902/056/000/p6k34559wwESApUhdqC-o.jpg";
//$arrPostData['messages'][0]['type'] = "imagemap";
//$arrPostData['messages'][0]['baseUrl'] = "https://f.ptcdn.info/902/056/000/p6k34559wwESApUhdqC-o.jpg";
 //$arrPostData['messages'][0]['baseSize']['hieght'] = 389;
//$arrPostData['messages'][0]['baseSize']['width'] = 389;
//$arrPostData['messages'][0]['action'][0]['type'] = "uri";
//$arrPostData['messages'][0]['action'][0]['linkUri'] = "https://f.ptcdn.info/902/056/000/p6k34559wwESApUhdqC-o.jpg";
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
