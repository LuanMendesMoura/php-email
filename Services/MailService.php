<?php

require_once __DIR__ . '/../Utilities/Mailer.php';
require_once __DIR__ . '/../Exceptions/ParametroInvalidoException.php';

class MailService
{
    private Mailer $mailer;

    public function __construct()
    {
        $this->mailer = new Mailer();
    }

    public function enviarEmailTeste(string $destinatario): void
    {
        if (empty($destinatario)) throw new ParametroInvalidoException('destinatario');

        $this->mailer->send(
            $destinatario,
            'Mensagem de teste',
            'Olá! Estou testando o envio de mensagens com SMTP!'
        );
    }

    /**
     * Summary of enviarEmailBoasVindas
     * @param array $usuario
     * [
     *  "email" => string,
     *  "nome" => string,
     * ]
     * @return void
     */
    public function enviarEmailBoasVindas(array $usuario): void
    {
        if (!isset($usuario)) throw new ParametroInvalidoException('usuario');
        if (empty($usuario['email'])) throw new ParametroInvalidoException('usuario[email]');
        if (empty($usuario['nome'])) throw new ParametroInvalidoException('usuario[nome]');

        $this->mailer->send(
            $usuario['email'],
            "Bem vindo {$usuario['nome']}",
            "Olá, {$usuario['nome']}! Estou enviando esta mensagem para te dar as boas vindas ao nosso sistema!"
        );
    }
}
