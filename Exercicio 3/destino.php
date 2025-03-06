<?php

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<br> <h1>Exercício 3 - Composer - Uso de Pacotes + Uso de O.O<h1>');
$mpdf->WriteHTML('<p>'.'Nome: ' . htmlspecialchars($_REQUEST['nome']).'<p>');
$mpdf->WriteHTML('<p>'.'Telefone: ' . htmlspecialchars($_REQUEST['telefone']).'<p>');
$mpdf->WriteHTML('<p>'.'E-mail: ' . htmlspecialchars($_REQUEST['email'])).'<p>';
$mpdf->WriteHTML('<p>'.'Mensagem: ' . nl2br(htmlspecialchars($_REQUEST['mensagem'])).'<p>');
$mpdf->Output();
