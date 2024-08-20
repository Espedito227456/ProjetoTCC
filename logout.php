<?php
session_start(); // Inicia a sessão

// Remove o token da sessão
unset($_SESSION['access_token']);

// Redireciona para a página inicial
header('Location: index.php');
exit();
