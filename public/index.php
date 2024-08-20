<?php
require_once 'vendor/autoload.php'; // Certifique-se de que a biblioteca do Google está instalada

session_start(); // Inicia a sessão

$client = new Google_Client();
$client->setClientId('85601593943-rd8j0r3irr420a8o3md3kh1j0e103fv1.apps.googleusercontent.com'); // Substitua pelo seu Client ID
$client->setClientSecret('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'); // Substitua pelo seu Client Secret
$client->setRedirectUri('http://localhost/ProjetoTCC/callback.php'); // Substitua pela URL do seu callback
$client->addScope('profile');
$client->addScope('email');

$authUrl = $client->createAuthUrl();

if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    // Usuário já está autenticado
    header('Location: profile.php'); // Redireciona para a página de perfil ou onde desejar
    exit();
} else {
    // Mostra o link para iniciar o login com Google
    echo '<a href="' . htmlspecialchars($authUrl) . '">Login com Google</a>';
}
