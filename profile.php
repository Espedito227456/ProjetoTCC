<?php
require_once 'vendor/autoload.php'; // Certifique-se de que a biblioteca do Google está instalada

session_start(); // Inicia a sessão

$client = new Google_Client();
$client->setClientId('85601593943-rd8j0r3irr420a8o3md3kh1j0e103fv1.apps.googleusercontent.com'); // Substitua pelo seu Client ID
$client->setClientSecret('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'); // Substitua pelo seu Client Secret
$client->setRedirectUri('http://localhost/ProjetoTCC/callback.php'); // Substitua pela URL do seu callback
$client->addScope('profile');
$client->addScope('email');

if (!isset($_SESSION['access_token'])) {
    header('Location: index.php'); // Redireciona para a página de login se não houver token
    exit();
}

$client->setAccessToken($_SESSION['access_token']);
$oauth = new Google_Service_Oauth2($client);
$userInfo = $oauth->userinfo->get();

echo '<h1>Bem-vindo, ' . htmlspecialchars($userInfo->name) . '</h1>';
echo '<p>Email: ' . htmlspecialchars($userInfo->email) . '</p>';
echo '<a href="logout.php">Sair</a>';
