<?php

namespace App\Http\ProjectClasses;

use Goutte\Client;

use App\Http\ProjectClasses\Car;

class Crawler {

    private $result = [];

    public function __construct($url) {
        $client = new Client();
        try {
            $html = $client->request('GET', $url);

            /*
            * Caso a div abaixo seja encontrada, a api não retorna os
            * carros "veículos na mesma categoria conforme seu critério de busca".
            */
            if($html->filter('div.nenhum-reseultado')->count()){
                array_push($this->result, ['error' => 'No results found for the selected filters.']);
                return;
            }

            $html->filter('div.list-of-cards')
             ->children('div.item:not(.vendido)')
             ->each(function ($node) {
                $car = new Car($node);
                array_push($this->result, $car->getCarData());

            });
        } catch (\Throwable $th) {
            throw $th;
        }





    }

    public function crawl(){
        return
            $this->result
        ;
    }


}
