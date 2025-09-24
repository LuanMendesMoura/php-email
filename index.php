<?php

require 'vendor/autoload.php';

require_once __DIR__ . '/Services/MailService.php';

$mailService = new MailService();

$mailService->enviarEmailTeste('');
$mailService->enviarEmailBoasVindas([
    'email' => '',
    'nome' => ''
]);

echo "mensagens enviadas";
