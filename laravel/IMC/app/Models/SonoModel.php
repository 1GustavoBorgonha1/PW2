<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SonoModel extends Model
{
    public static function classificar($idade, $horas, $mes = null)
    {
        if ($idade < 0 || $horas < 0 || ($mes !== null && ($mes < 0 || $mes > 12))) {
            return null; // Validação básica para idades e meses negativos
        }

        // Classificação para menores de 1 ano (usando meses)
        if ($idade < 1) {
            if ($mes >= 0 && $mes <= 3) { // 0 a 3 meses
                return self::classificarSonoPorHoras($horas, 14, 17, 'Dormindo bem', 'Dormindo mal');
            } elseif ($mes >= 4 && $mes <= 11) { // 4 a 11 meses
                return self::classificarSonoPorHoras($horas, 10, 14, 'Dormindo bem', 'Dormindo mal');
            }
        }

        // Classificação para 1 ano ou mais (usando anos)
        if ($idade >= 1) {
            // Classificação de acordo com a faixa etária
            if ($idade >= 1 && $idade <= 2) { // 1 a 2 anos
                return self::classificarSonoPorHoras($horas, 11, 14, 'Dormindo bem', 'Dormindo mal');
            } elseif ($idade >= 3 && $idade <= 5) { // 3 a 5 anos
                return self::classificarSonoPorHoras($horas, 10, 13, 'Dormindo bem', 'Dormindo mal');
            } elseif ($idade >= 6 && $idade <= 13) { // 6 a 13 anos
                return self::classificarSonoPorHoras($horas, 9, 11, 'Dormindo bem', 'Dormindo mal');
            } elseif ($idade >= 14 && $idade <= 17) { // 14 a 17 anos
                return self::classificarSonoPorHoras($horas, 8, 10, 'Dormindo bem', 'Dormindo mal');
            } elseif ($idade >= 18 && $idade <= 64) { // 18 a 64 anos
                return self::classificarSonoPorHoras($horas, 7, 9, 'Dormindo bem', 'Dormindo mal');
            } elseif ($idade >= 65) { // 65 anos ou mais
                return self::classificarSonoPorHoras($horas, 7, 8, 'Dormindo bem', 'Dormindo mal');
            }
        }

        return 'Faixa etária não definida';
    }

    // Função auxiliar para classificar o sono por horas
    private static function classificarSonoPorHoras($horas, $min, $max, $dormindoBem, $dormindoMal)
    {
        if ($horas < $min) {
            return $dormindoMal;
        } elseif ($horas > $max) {
            return 'Dormindo demais';
        } else {
            return $dormindoBem;
        }
    }
}
