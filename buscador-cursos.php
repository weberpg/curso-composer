<?php

require 'vendor/autoload.php';

// Teste::metodo();
// exit;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use Alura\BuscadorDeCursos\Buscador;

$client = new Client([
    'base_uri' => 'https://www.metacursos.com.br/',
    'verify' => false
]);

$crawler = new Crawler();
$buscador = new Buscador($client, $crawler);

$cursos = $buscador->buscar("/cursos.html");
foreach ($cursos as $curso) {
    echo exibeMensagem($curso);
}