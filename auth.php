<?php
require_once 'vendor/autoload.php';

$client = new Google_Client();
$client->setClientId('YOUR_CLIENT_ID');
$client->setClientSecret('YOUR_CLIENT_SECRET');
$client->setRedirectUri('http://localhost/callback'); // Ajuste conforme necessário
$client->addScope('profile');  // Adiciona escopo para acessar informações do perfil
$client->addScope('email');    // Adiciona escopo para acessar o e-mail

// Crie uma URL de autenticação
$authUrl = $client->createAuthUrl();

// Redirecione o usuário para a URL de autenticação
header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
exit();
