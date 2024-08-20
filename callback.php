<?php
require_once 'vendor/autoload.php'; // Certifique-se de que a biblioteca do Google está instalada

session_start(); // Inicia a sessão

// Configuração do cliente OAuth2 do Google
$client = new Google_Client();
$client->setClientId(getenv('GOOGLE_CLIENT_ID')); // Pegue o Client ID da variável de ambiente
$client->setClientSecret(getenv('GOOGLE_CLIENT_SECRET')); // Pegue o Client Secret da variável de ambiente
$client->setRedirectUri('http://localhost/ProjetoTCC/callback.php'); // Substitua pela URL do seu callback
$client->addScope('profile');
$client->addScope('email');

// Verificação se existe um código OAuth de retorno do Google
if (isset($_GET['code'])) {
    try {
        $code = $_GET['code'];
        $token = $client->fetchAccessTokenWithAuthCode($code);

        // Verificação de erro no retorno do token
        if (isset($token['error'])) {
            throw new Exception('Erro ao obter o token: ' . $token['error']);
        }

        // Armazena o token na sessão
        $_SESSION['access_token'] = $token;

        // Redireciona para a página de perfil
        header('Location: profile.php');
        exit();
    } catch (Exception $e) {
        // Exibe o erro detalhado
        echo 'Exceção capturada: ' . $e->getMessage();
        exit();
    }
} else {
    // Se não houver código, redireciona para a página inicial
    header('Location: index.php');
    exit();
}

echo getenv('GOOGLE_CLIENT_ID');
echo getenv('GOOGLE_CLIENT_SECRET');
