<?php

require_once __DIR__ . '/../Exceptions/MailException.php';

use PHPMailer\PHPMailer\PHPMailer;

class Mailer
{

    private PHPMailer $mailer;

    public function __construct()
    {
        try {
            $this->mailer = new PHPMailer(true);
            $this->mailer->isSMTP();

            $this->mailer->Host = 'smtp.gmail.com';
            $this->mailer->Port = '587';
            $this->mailer->Username = '';
            $this->mailer->Password = '';
            $this->mailer->SMTPAuth = true;
            $this->mailer->setFrom('');
        } catch (Exception $e) {
            throw new MailException(MailException::$erroCriarMailer, $e);
        }
    }

    public function send($destinatario, $titulo, $conteudo): void
    {
        try {
            $this->mailer->clearAddresses();
            $this->mailer->addAddress($destinatario);
            $this->mailer->Subject = $titulo;
            $this->mailer->Body = $conteudo;

            $this->mailer->send();
        } catch (Exception $e) {
            throw new MailException(MailException::$erroEnviarEmail, $e);
        }
    }
}
