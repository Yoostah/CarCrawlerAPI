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

            $html->filter('div.list-of-cards')
             ->children('div.item')
             ->each(function ($node) {
                $car = new Car($node);
                array_push($this->result, $car->getCarData());

            });
        } catch (\Throwable $th) {
            //throw $th;
        }





    }

    public function crawl(){
        return
            $this->result
        ;
    }


}
