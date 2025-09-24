<?php
class ParametroInvalidoException extends Exception
{
    public function __construct(string $parametro)
    {
        parent::__construct("O parâmetro " . $parametro . " é inválido");
    }
}