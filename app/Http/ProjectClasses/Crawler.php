<?php

namespace App\Http\ProjectClasses;

use Goutte\Client;
use Exception;

use App\Http\ProjectClasses\Car;
use App\Http\ProjectClasses\CarDetails;

class Crawler {

    private $result = [];

    public function __construct($url, $details = false) {
        $client = new Client();

        try {
            $html = $client->request('GET', $url);

            /*
            * Verificação se o Crawler está no site para o qual foi
            * programado.
            */
            if(!($html->filter('body.a-index')->count()))
                throw new Exception('This URL is not allowed!');

            /*
            * Caso a div abaixo seja encontrada, a api não retorna os
            * carros listados em "veículos na mesma categoria conforme seu critério de busca".
            */
            if($html->filter('div.nenhum-reseultado')->count()){
                array_push($this->result, ['error' => 'No results found for the selected filters.']);
                return;
            }


            if($details){

                if($html->filter('div#veiculo-vendido')->count())
                    throw new Exception('This vehicle was sold');

                else{
                    $html->filter('div.row')->children('div.item');
                    $carDetail = new CarDetails($html);
                    array_push($this->result, $carDetail->getCarDetails());
                }
            }else{
                /*
                * Caso a div com a classe vendido seja encontrada, a api não retorna o
                * carro pois o mesmo já foi vendido e não irá para o estoque.
                */
                $html->filter('div.list-of-cards')
                    ->children('div.item:not(.vendido)')
                    ->each(function ($node) {
                        $car = new Car($node);
                        array_push($this->result, $car->getCarData());
                    });
            }


            $this->crawl();

        } catch (Exception $e) {
            echo json_encode([ 'error' => $e->getMessage() ]);
            return false;
        }
    }

    public function crawl(){
        return $this->result;
    }


}
