<?php
require 'vendor/autoload.php';

// Teste a classe de uma das dependências
use PHPUnit\Framework\TestCase;

// Verifique se a classe TestCase existe
if (class_exists('PHPUnit\Framework\TestCase')) {
    echo "Autoloading está funcionando!";
} else {
    echo "Autoloading falhou.";
}
