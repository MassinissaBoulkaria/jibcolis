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

try {
    $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error hkjhlgjhlgjhg: ' . $e->getMessage();
    exit;
}

if (! isset($accessToken)) {
    if ($helper->getError()) {
        header('HTTP/1.0 401 Unauthorized');
        echo "Error: " . $helper->getError() . "\n";
        echo "Error Code: " . $helper->getErrorCode() . "\n";
        echo "Error Reason: " . $helper->getErrorReason() . "\n";
        echo "Error Description: " . $helper->getErrorDescription() . "\n";
    } else {
        header('HTTP/1.0 400 Bad Request');
        echo 'Bad request';
    }
    exit;
}

// Logged in
echo '<h3>Access Token</h3>';
var_dump($accessToken->getValue());

// The OAuth 2.0 client handler helps us manage access tokens
$oAuth2Client = $fb->getOAuth2Client();

// Get the access token metadata from /debug_token
$tokenMetadata = $oAuth2Client->debugToken($accessToken);
echo '<h3>Metadata</h3>';
var_dump($tokenMetadata);

// Validation (these will throw FacebookSDKException's when they fail)
$tokenMetadata->validateAppId('149232425750031'); // Replace {app-id} with your app id
// If you know the user ID this access token belongs to, you can validate it here
//$tokenMetadata->validateUserId('123');
$tokenMetadata->validateExpiration();

if (! $accessToken->isLongLived()) {
    // Exchanges a short-lived access token for a long-lived one
    try {
        $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
        exit;
    }

    echo '<h3>Long-lived</h3>';
    var_dump($accessToken->getValue());

}

$_SESSION['fb_access_token'] = (string) $accessToken;

// connexion reussie :)
// recuperer les informations dans une session

try {
    if (isset($_SESSION['fb_access_token'])) {
        $accessToken = $_SESSION['fb_access_token'];
    } else {
        $accessToken = $helper->getAccessToken();
    }
} catch (Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error1: ' . $e->getMessage();
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error1: ' . $e->getMessage();
    exit;
}
if (isset($accessToken)) {
    if (isset($_SESSION['fb_access_token'])) {
        $fb->setDefaultAccessToken($_SESSION['fb_access_token']);
    } else {
        $_SESSION['fb_access_token'] = (string)$accessToken;
        // OAuth 2.0 client handler
        $oAuth2Client = $fb->getOAuth2Client();
        // Exchanges a short-lived access token for a long-lived one
        $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['fb_access_token']);
        $_SESSION['fb_access_token'] = (string)$longLivedAccessToken;
        $fb->setDefaultAccessToken($_SESSION['fb_access_token']);
    }
}

// validating the access : token acceder au TOKEN
try {
    $request = $fb->get('/me');
} catch (Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    if ($e->getCode() == 190) {
        unset($_SESSION['fb_access_token']);
        $helper = $fb->getRedirectLoginHelper();
        $loginUrl = $helper->getLoginUrl('https://apps.facebook.com/APP_NAMESPACE/', $permissions);
        echo "<script>window.top.location.href='" . $loginUrl . "'</script>";
    }
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returneeeeeeeed an error2: ' . $e->getMessage();
    exit;
}

// recuperer les informations basics de lutilisateurs
try {
    $request = $fb->get('/me?fields=id,first_name,last_name,friends,email,gender');
    $profile = $request->getGraphNode()->asArray();
    // $response = $fb->get('/me',$_SESSION['fb_access_token'],
    //    ['fields' => 'id,name,email,address,first_name,last_name']);
} catch (Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error2: ' . $e->getMessage();
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error3: ' . $e->getMessage();
    exit;
}
echo 'voila les information de votre profil';
echo $profile['first_name'];
var_dump($profile);



// User is logged in with a long-lived access token.
// You can redirect them to a members-only page.
header('Location: http://localhost/jibcolis%20project/src/JibColis/html/profil.php');