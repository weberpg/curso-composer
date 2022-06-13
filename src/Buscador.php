<?php

namespace Alura\BuscadorDeCursos;

class Buscador
{
    private $httpClient;
    private $crawler;

    public function __construct($httpClient, $crawler)
    {
        $this->httpClient = $httpClient;
        $this->crawler = $crawler;
    }

    public function buscar(string $url): array
    {
        $response = $this->httpClient->request('GET', $url);
        $html = $response->getBody();
        $this->crawler->addHtmlContent($html);
        $elementos = $this->crawler->filter('h4.card-title');
        $cursosTitulos = [];
        foreach ($elementos as $elemento) {
            $cursosTitulos[] = $elemento->nodeValue;
        }
        return $cursosTitulos;
    }
}
