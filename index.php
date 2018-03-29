<?php

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('4Twn1MlK34hhjetxAspfd8QoOYQSl3yluDVmRguMTrrPlMtcSQVlAJhe+H3aE+FhlAZ5dOB8cJZr+vnszYz8xknwzX9mHBx7mzpwasExfoE+vsJfGO5doTtd50NmZuSW04CkvI43ffrGu4mJ3uLuXwdB04t89/1O/w1cDnyilFU=');
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => 'cf2b32132d0788dd0f476592226c40be
']);
$response = $bot->getProfile('U3b5751f42f6ef750828f9d74adb4c8ce');
if ($response->isSucceeded()) {
    $profile = $response->getJSONDecodedBody();
    echo $profile['displayName'];
    echo $profile['pictureUrl'];
    echo $profile['statusMessage'];
}
?>
