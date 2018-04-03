<?php
<?php
require_once __DIR__ . '/pthbot.php';
$bot = new Linebot();
$text = $bot->getMessageText();
$bot->reply($text);

?>
