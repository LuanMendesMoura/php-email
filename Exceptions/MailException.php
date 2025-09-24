<?php

class MailException extends Exception
{
    public static $erroCriarMailer = 'Ocorreu um erro ao criar PHPMailer';
    public static $erroEnviarEmail = 'Ocorreu um erro ao enviar e-mail';
    
    public function __construct(string $mensagem, Throwable $erro)
    {
        parent::__construct($mensagem, previous: $erro);
    }
}
