<?php 
require_once __DIR__ . '/../../../vendor/autoload.php';

session_start();
unset($_SESSION['displayName']);
unset($_SESSION['main']);
unset($_SESSION['admin']);

$provider = new TheNetworg\OAuth2\Client\Provider\Azure([
    'clientId'          => '5b90d632-c1b0-4945-b2a4-963489190477',
    'clientSecret'      => 'dQMakB83hE1W5Wgzj~.Uesnh._~aQ_rZ-U',
    'redirectUri'       => 'http://localhost/FTI/app/Http/Controllers/AuthController.php',
    'resource'          => 'https://graph.microsoft.com/'
]);

$post_logout_redirect_uri = 'http://localhost/FTI/mainPage.php'; 
$logoutUrl = $provider->getLogoutUrl($post_logout_redirect_uri);

header('Location: '.$logoutUrl);
    
?>