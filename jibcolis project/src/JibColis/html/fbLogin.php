<?php
require_once 'C:\wamp\www\jibcolis project\php-graph-sdk-5.x\src\Facebook\autoload.php';
if (!session_id()) {
    session_start();

}
$fb = new Facebook\Facebook([
    'app_id' => '149232425750031', // Replace {app-id} with your app id
    'app_secret' => 'fe51ef10a91a313bb234cc5a96b29d9c',
    'default_graph_version' => 'v2.2',
]);

$helper = $fb->getRedirectLoginHelper();
$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://localhost/jibcolis%20project/src/JibColis/html/fb-callback.php', $permissions);
$facebookConnect = htmlspecialchars($loginUrl);

?>