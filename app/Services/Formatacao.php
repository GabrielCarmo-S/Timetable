<?php

namespace App\Services;

class Formatacao
{
    public static function Hora($inicio, $termino)
    {
        $duracao = strtotime($termino) - strtotime($inicio);

        $horas = floor($duracao / 3600);
        $minutos = floor(($duracao % 3600) / 60);

        $duracao = strftime('%H:%M', $duracao);

        return $duracao;
    }
}
