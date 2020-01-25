<?php

namespace App\Http\Controllers\Crawler;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Goutte\Client;

class CrawlerController extends Controller
{

    protected function index()
    {
        $client = new Client();
        $crawler = $client->request('GET', 'https://seminovos.com.br/carro');
        //print_r($crawler);



        $data = array();
        // Get the latest post in this category and display the titles
        $crawler
        ->filter('div.list-of-cards')
            ->children('div.item')
        ->each(function ($node) {
            $carName = $node->filter('h2.card-title')->text();
            $carPrice = $node->filter('span.card-price')->text();
            $carModel = $node->filter('p.card-subtitle')->text();
            $carFeatures = $node->filter('ul.list-features > li');
            $detailsLink = explode('?', $node->filter('div.card-content > a')->attr('href'));
            //print $node->text()."<br>";
            echo '<pre>';
                    //print_r($node);
              echo "Carro: $carName";
              echo "<br>Preço: $carPrice";
              echo "<br>$carModel<hr>";
              echo "Features:<br>";
              $carFeatures->each(function ($child) {
                switch ($child->attr('title')) {
                    case 'Ano de fabricação':
                        echo '[Ano]: '.$child->text().'<br>';
                        break;
                    case 'Kilometragem atual':
                        echo '[KM]: '.$child->text().'<br>';
                        break;
                    case 'Tipo de câmbio':
                        echo '[Câmbio]: '.$child->text();
                        break;
                    default:
                        break;
                }
              });
              echo '<hr>';
              echo "Detalhes: $detailsLink[0]";
            echo '</pre>';
        });


        /*return view('teste', [
            'data' => $crawler]);*/

    }
}
