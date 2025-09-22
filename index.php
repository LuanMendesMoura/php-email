<?php

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

try {
    $mailer = new PHPMailer(true);
    $mailer->isSMTP();

    // Parâmetros para conectar no servidor SMTP
    $mailer->Host = 'smtp.gmail.com';
    $mailer->Port = '587';
    $mailer->Username = '';
    $mailer->Password = '';
    $mailer->SMTPAuth = true;
    $mailer->setFrom('');

    // Constroi a mensagem
    $destinatario = '';
    $mailer->addAddress($destinatario);
    $mailer->Subject = 'Mensagem de teste';
    $mailer->Body = 'Olá! Estou testando o envio de mensagens com SMTP!';

    $mailer->send();

    echo "mensagem enviada $destinatario";

} catch (Exception $e) {
    echo '<pre>';
    print_r($e);
    echo '</pre>';
}
