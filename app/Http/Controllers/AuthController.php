<?php
session_start();
require_once __DIR__ . '/../../../vendor/autoload.php';

include(__DIR__  . '/../../../config/database.php');

$db=$conn;
 
error_reporting(-1);
ini_set('display_errors', 'On');
 
$provider = new TheNetworg\OAuth2\Client\Provider\Azure([
    'clientId'          => '5b90d632-c1b0-4945-b2a4-963489190477',
    'clientSecret'      => 'dQMakB83hE1W5Wgzj~.Uesnh._~aQ_rZ-U',
    'redirectUri'       => 'http://localhost/FTI/app/Http/Controllers/AuthController.php',
    'resource'          => 'https://graph.microsoft.com/'
]);
 
if (!isset($_GET['code'])) {

    $authUrl = $provider->getAuthorizationUrl();
    $_SESSION['oauth2state'] = $provider->getState();
    header('Location: '.$authUrl);
    exit;

}elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {
    unset($_SESSION['oauth2state']);
    exit("State mismatch, ending auth");

}else {

    $token = $provider->getAccessToken('authorization_code', [
    'code' => $_GET['code']
    ]);

    $accesstoken = $provider->getAccessToken('refresh_token', [
    'refresh_token' => $token->getRefreshToken(),
    'resource' => 'https://graph.microsoft.com/'
    ]);

    $me = $provider->get($provider->getRootMicrosoftGraphUri($token) . '/v1.0/me', $token);
    
    $_SESSION['displayName'] = $me['displayName'];
    $_SESSION['mail'] = $me['mail'];
    $check_email="SELECT email FROM admins WHERE email= '". $me['mail'] . "'";
    $run_email=mysqli_query($db,$check_email);
    if(mysqli_num_rows($run_email)>0){
        $_SESSION['admin'] = TRUE;
        header('Location: /../../FTI/mainPage.php');
    }else if(preg_match('/^[\w-\.]+@fti\.edu\.al$/gi',$me['mail']) == 1){
        $_SESSION['admin'] = FALSE;
        header('Location: /../../FTI/mainPage.php');
    }else{
        header('Location: SignOut.php');
    }


//echo '<pre>'; print_r($me); echo '</pre>';
 //   header('Location: /../../FTI/mainPage.php');
}
 
?>