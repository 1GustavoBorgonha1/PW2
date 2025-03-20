<?php

namespace App\Models;

class ImcModel
{
    public static function calcular($peso, $altura)
    {
        if ($altura <= 0) {
            return null;
        }

        $imc = $peso / ($altura * $altura);
        return [
            'valor' => $imc,
            'categoria' => self::getCategoriaImc($imc)
        ];
    }

    private static function getCategoriaImc($imc)
    {
        if ($imc < 18.5) {
            return 'Abaixo do peso';
        } elseif ($imc < 24.9) {
            return 'Peso normal';
        } elseif ($imc < 29.9) {
            return 'Sobrepeso';
        } else {
            return 'Obesidade';
        }
    }
}
