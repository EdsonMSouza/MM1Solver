<?php

namespace Api;

class Solver
{
    private static int $lambda;
    private static float $mi;

    public function __construct(float $lambda, float $mi)
    {
        self::$lambda = $lambda;
        self::$mi = $mi;
    }

    public function getTempoMedioEntreChegadas()
    {
        $horas = round((1 / self::$lambda), 4);
        $minutos = round((1 / self::$lambda) * 60, 4);
        $segundos = round((1 / self::$lambda) * 3600, 4);

        return [
            "variável" => "Tempo médio entre chegadas",
            "lambda" => self::$lambda,
            "mi" => self::$mi,
            "horas" => $horas,
            "minutos" => $minutos,
            "segundos" => $segundos,
        ];
    }

    public function getTempoMedioAtendimento()
    {
        $horas = round((1 / self::$mi), 4);
        $minutos = round((1 / self::$mi), 4) * 60;
        $segundos = round((1 / self::$mi) * 3600, 4);

        return [
            "variável" => "Tempo médio de atendimento",
            "lambda" => self::$lambda,
            "mi" => self::$mi,
            "horas" => $horas,
            "minutos" => $minutos,
            "segundos" => $segundos,
        ];

    }

    public function getTempoProvavelSistema()
    {
        $horas = round(1 / (self::$mi - self::$lambda), 4);
        $minutos = round(1 / (self::$mi - self::$lambda) * 60, 4);
        $segundos = round(1 / (self::$mi - self::$lambda) * 3600, 4);

        return [
            "variável" => "Tempo provável no sistema",
            "lambda" => self::$lambda,
            "mi" => self::$mi,
            "horas" => $horas,
            "minutos" => $minutos,
            "segundos" => $segundos,
        ];
    }

    public function getTempoProvavelFila()
    {
        $horas = round((self::$lambda) / (self::$mi * (self::$mi - self::$lambda)), 4);
        $minutos = round((self::$lambda) / (self::$mi * (self::$mi - self::$lambda)) * 60, 4);
        $segundos = round((self::$lambda) / (self::$mi * (self::$mi - self::$lambda)) * 3600, 4);

        return [
            "variável" => "Tempo Provável na fila",
            "lambda" => self::$lambda,
            "mi" => self::$mi,
            "horas" => $horas,
            "minutos" => $minutos,
            "segundos" => $segundos,
        ];

    }

    public function getProbabilidadeFilaVazia()
    {
        return [
            "variável" => "Probabilidade da Fila Vazia",
            "lambda" => self::$lambda,
            "mi" => self::$mi,
            "valor" => (1 - round(pow((self::$lambda / self::$mi), 2), 4)),
            "percentual" => (1 - round(pow((self::$lambda / self::$mi), 2), 4)) * 100,
        ];
    }

    public function getProbabilidadeSistemaVazio()
    {
        return [
            "variável" => "Probabilidade do Sistema Vazio",
            "lambda" => self::$lambda,
            "mi" => self::$mi,
            "valor" => (1 - round((self::$lambda / self::$mi), 4)),
            "percentual" => (1 - round((self::$lambda / self::$mi), 4)) * 100,
        ];
    }

    public function getOcupacaoSistema()
    {
        return [
            "variável" => "Taxa de Ocupação do Sistema",
            "lambda" => self::$lambda,
            "mi" => self::$mi,
            "valor" => round((self::$lambda / self::$mi), 4),
            "percentual" => round((self::$lambda / self::$mi) * 100, 2),

        ];
    }

    public function getNumeroProvavelSistema()
    {
        return [
            "variável" => "Número Provável no Sistema",
            "lambda" => self::$lambda,
            "mi" => self::$mi,
            "valor" => round(self::$lambda / (self::$mi - self::$lambda), 2),
        ];
    }

    public function getNumeroProvavelFila()
    {
        return [
            "variável" => "Número Provável na Fila",
            "lambda" => self::$lambda,
            "mi" => self::$mi,
            "valor" => round((pow(self::$lambda, 2) / (self::$mi * (self::$mi - self::$lambda))), 2),
        ];

    }
}
