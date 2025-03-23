<?php

namespace App\Models;

class SonoModel
{
    public static function classificar($idade, $horas, $mes = null)
    {
        // Validação
        if ($idade <= 0 || $horas < 0 || ($mes !== null && ($mes <= 0 || $mes > 12))) {
            return 'Erro: Valores inválidos. Idade, horas ou meses estão incorretos.';
        }

        // Faixas etárias e recomendação de sono (horas mínimas e máximas)
        $faixas = [
            ['min' => 14, 'max' => 17, 'idadeMin' => 0, 'idadeMax' => 0, 'mesMin' => 0, 'mesMax' => 3],  // 0 a 3 meses
            ['min' => 10, 'max' => 14, 'idadeMin' => 0, 'idadeMax' => 0, 'mesMin' => 4, 'mesMax' => 11], // 4 a 11 meses
            ['min' => 11, 'max' => 14, 'idadeMin' => 1, 'idadeMax' => 2], // 1 a 2 anos
            ['min' => 10, 'max' => 13, 'idadeMin' => 3, 'idadeMax' => 5], // 3 a 5 anos
            ['min' => 9,  'max' => 11, 'idadeMin' => 6, 'idadeMax' => 13], // 6 a 13 anos
            ['min' => 8,  'max' => 10, 'idadeMin' => 14, 'idadeMax' => 17], // 14 a 17 anos
            ['min' => 7,  'max' => 9,  'idadeMin' => 18, 'idadeMax' => 64], // 18 a 64 anos
            ['min' => 7,  'max' => 8,  'idadeMin' => 65, 'idadeMax' => 200] // 65+ anos
        ];

        foreach ($faixas as $faixa) {
            if (
                ($idade >= $faixa['idadeMin'] && $idade <= $faixa['idadeMax']) &&
                (!isset($faixa['mesMin']) || ($mes >= $faixa['mesMin'] && $mes <= $faixa['mesMax']))
            ) {
                return self::classificarSonoPorHoras($horas, $faixa['min'], $faixa['max']);
            }
        }

        return 'Faixa etária não definida';
    }

    private static function classificarSonoPorHoras($horas, $min, $max)
    {
        if ($horas < $min) {
            return 'Dormindo mal';
        } elseif ($horas > $max) {
            return 'Dormindo demais';
        } else {
            return 'Dormindo bem';
        }
    }
}
