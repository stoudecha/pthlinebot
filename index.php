<?php
$access_token ='4Twn1MlK34hhjetxAspfd8QoOYQSl3yluDVmRguMTrrPlMtcSQVlAJhe+H3aE+FhlAZ5dOB8cJZr+vnszYz8xknwzX9mHBx7mzpwasExfoE+vsJfGO5doTtd50NmZuSW04CkvI43ffrGu4mJ3uLuXwdB04t89/1O/w1cDnyilFU=';// Get POST body content
$content = file_get_contents('php://input');// Parse JSON
$events = json_decode($content, true);// Validate parsed JSON data
  if (!is_null($events['events'])){ // Loop through each event  
  foreach ($events['events'] as $event) {   // Reply only when message sent is in 'text' format 
    if ($event['type'] == 'message' && $event['message']['type'] == 'text') {     // Get text sent    
      $text = $event['message']['text'];      // Get replyToken     
      $replyToken = $event['replyToken'];     // Build message to reply back  
         $msg ="คุณได้คิวตรวจที่ http://pth.ddns.net/tcpdf/examples/que_card_n.php?ref=MjAxOC0wMy0yODE0"; 
         $text =$text .$msg.$replyToken ;
      $messages = ['type' => 'text',  'text' => $text   ];  
        // Make a POST Request to Messaging API to reply to sender      
     
      $url = 'https://api.line.me/v2/bot/message/reply';    
      $data = [       'replyToken' => $replyToken,        'messages' => [$messages],      ];    
      $post = json_encode($data);     
      $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);   
      $ch = curl_init($url);      
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);     
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      $result = curl_exec($ch); 
      curl_close($ch);      
      echo $result . "";    } }}
echo "OK";
curl -v -X GET https://api.line.me/v2/bot/profile/{userId} \
-H 'Authorization: Bearer 4Twn1MlK34hhjetxAspfd8QoOYQSl3yluDVmRguMTrrPlMtcSQVlAJhe+H3aE+FhlAZ5dOB8cJZr+vnszYz8xknwzX9mHBx7mzpwasExfoE+vsJfGO5doTtd50NmZuSW04CkvI43ffrGu4mJ3uLuXwdB04t89/1O/w1cDnyilFU=';
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('4Twn1MlK34hhjetxAspfd8QoOYQSl3yluDVmRguMTrrPlMtcSQVlAJhe+H3aE+FhlAZ5dOB8cJZr+vnszYz8xknwzX9mHBx7mzpwasExfoE+vsJfGO5doTtd50NmZuSW04CkvI43ffrGu4mJ3uLuXwdB04t89/1O/w1cDnyilFU=');
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => 'cf2b32132d0788dd0f476592226c40be
']);
$response = $bot->getProfile('<userId>');
if ($response->isSucceeded()) {
    $profile = $response->getJSONDecodedBody();
    echo $profile['displayName'];
    echo $profile['pictureUrl'];
    echo $profile['statusMessage'];
}
?>
