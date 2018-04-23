<?php
require_once 'C:\wamp\www\jibcolis project\google-api-php-client\src\Google_Client.php';
require_once 'C:\wamp\www\jibcolis project\google-api-php-client\src\contrib\Google_AnalyticsService.php';
require_once 'C:\wamp\www\jibcolis project\google-api-php-client\src\contrib\Google_Oauth2Service.php';
session_start();

$client = new Google_Client();
$client->setApplicationName("Google UserInfo PHP Starter Application");
$scriptUri = "http://localhost/jibcolis%20project/src/JibColis/html/gpCallback.php";

$client->setAccessType('online'); // default: offline
$client->setApplicationName('My Application name');
$client->setClientId('296518496590-2qnum6hr0ccclr46ecn1fu4iglf1gvtf.apps.googleusercontent.com');
$client->setClientSecret('n-r9fMH2c305XA5078Vg05zF');
$client->setRedirectUri($scriptUri);
$client->setDeveloperKey('AIzaSyBwAdWNN2uMOuPH39uQ_pTtMNrVYCAEVQ0'); // API key

// $service implements the client interface, has to be set before auth call
$service = new Google_AnalyticsService($client);

if (isset($_GET['logout'])) { // logout: destroy token
    unset($_SESSION['token']);
    die('Logged out.');
}

$oauth2 = new Google_Oauth2Service($client);
if (isset($_GET['code'])) { // we received the positive auth callback, get the token and store it in session
    $client->authenticate();
    $_SESSION['token'] = $client->getAccessToken();

}

if (isset($_SESSION['token'])) { // extract token from session and configure client
    $token = $_SESSION['token'];
    $client->setAccessToken($token);
}

if ($client->getAccessToken()) {
    $user = $oauth2->userinfo->get();

    $email = filter_var($user['email'], FILTER_SANITIZE_EMAIL);
    $img = filter_var($user['picture'], FILTER_VALIDATE_URL);
    $personMarkup = "$email<div><img src='$img?sz=50'></div>";
    $_SESSION['meail']=$user['email'];
    $_SESSION['token'] = $client->getAccessToken();
    $_SESSION['googleUser']=$user;
    header("Location: profil.php");
} else {
    $authUrl = $client->createAuthUrl();
}

if(isset($personMarkup)):
    print $personMarkup; //Print user Information
endif;

if (!$client->getAccessToken()) { // auth call to google
    $authUrl = $client->createAuthUrl();
    header("Location: ".$authUrl);
    die;
}
echo 'Hello, world.';