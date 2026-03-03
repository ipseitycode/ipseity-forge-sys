<?php

class IpseityForgeConfiguration {

    private $titulo = "home";
    private $url = "/home";
    private $categoria = "home"; 

    function __construct()
    {
        $this->configurar();
    }

    function build()
    {
        return $this;
    }


    function getNome()
    {
        return $this->titulo;
    }

    function getUrl()
    {
        return $this->url;
    }

    function getCategoria()
    {
        return $this->categoria;
    }

    function configurar()
    {

    }

    public function configurarSistema(): array {
        
        // vermelho - 1 = cancelado
        // verde    - 2 = fazendo
        // amarelo  - 3 = atrasado
        // azul     - 4 = concluido
        // cinza    - 5 = indefinido

        $sistemas = [

            'session' => [
                'id' => 1,
                'url' => 'session-system',
                'nome' => 'session',
                'categoria' => 'system',
                'publicar' => 1,
                'status' => 2,
            ],

        ];

        return $sistemas;
    }

    function filtrarPorStatus($status)
    {
        $mapStatus = [
            'cancelado'   => 1,
            'fazendo'     => 2,
            'atrasado'    => 3,
            'concluido'   => 4,
            'indefinido'  => 5,
        ];

        $status = strtolower($status);

        if (!isset($mapStatus[$status])) {
            return []; // retorna vazio se status invalido
        }

        $statusNumero = $mapStatus[$status];

        // Pega todos os sistemas
        $sistemas = $this->configurarSistema();

        // Filtra pelo status
        $filtrados = array_filter($sistemas, function($item) use ($statusNumero) {
            return $item['status'] == $statusNumero;
        });

        return $filtrados;
    }

    function filtrarPorBusca($busca)
    {
        $busca = strtolower(trim($busca));

        // Se busca vazia, retorna todos
        if (empty($busca)) {
            return $this->configurarSistema();
        }

        $layouts = $this->configurarSistema();

        $filtrados = array_filter($layouts, function($item) use ($busca) {

            // Ignora nao publicados
            if ($item['publicar'] == 0) {
                return false;
            }

            // Busca parcial no nome
            return strpos(strtolower($item['nome']), $busca) !== false;
        });

        return $filtrados;
    }


}