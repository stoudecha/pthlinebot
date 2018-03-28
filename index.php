<?php echo "hello"; 
$access_token = '4Twn1MlK34hhjetxAspfd8QoOYQSl3yluDVmRguMTrrPlMtcSQVlAJhe+H3aE+FhlAZ5dOB8cJZr+vnszYz8xknwzX9mHBx7mzpwasExfoE+vsJfGO5doTtd50NmZuSW04CkvI43ffrGu4mJ3uLuXwdB04t89/1O/w1cDnyilFU=';
$url = 'https://api.line.me/v1/oauth/verify';
$headers = array('Authorization: Bearer'.$access_token);
$ch = curl_init($url);curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);
echo $result;


?>
