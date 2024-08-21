<?php
require_once 'vendor/autoload.php'; // Certifique-se de que a biblioteca do Google está instalada

session_start(); // Inicia a sessão

$client = new Google_Client();
$client->setClientId('85601593943-rd8j0r3irr420a8o3md3kh1j0e103fv1.apps.googleusercontent.com'); // Substitua pelo seu Client ID
$client->setClientSecret('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'); // Substitua pelo seu Client Secret
$client->setRedirectUri('http://localhost/ProjetoTCC/callback.php'); // Substitua pela URL do seu callback
$client->addScope('profile');
$client->addScope('email');

// Verifica se o token de acesso está presente e válido
if (!isset($_SESSION['access_token']) || $_SESSION['access_token'] === 'expired') {
    // Redireciona para a página de autorização do Google
    $authUrl = $client->createAuthUrl();
    header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
    exit();
}

// Configura o token de acesso
$client->setAccessToken($_SESSION['access_token']);

// Debug: Verifica se a classe Google_Service_Oauth2 está carregada
if (class_exists('Google_Service_Oauth2')) {
    //echo 'Google_Service_Oauth2 está carregada.';
} else {
    //echo 'Google_Service_Oauth2 não está carregada.';
}

try {
    $oauth = new Google_Service_Oauth2($client);
    $userInfo = $oauth->userinfo->get();
    echo '<h1>Bem-vindo, ' . htmlspecialchars($userInfo->name) . '</h1>';
    echo '<p>Email: ' . htmlspecialchars($userInfo->email) . '</p>';
    echo '<a href="logout.php">Sair</a>';
} catch (Exception $e) {
    echo 'Erro ao obter informações do usuário: ' . $e->getMessage();
}
