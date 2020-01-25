<?php

namespace App\Http\Controllers\Crawler;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\ProjectClasses\Crawler;
use App\Http\ProjectClasses\Filter;


class CrawlerController extends Controller
{

    protected function index(Request $request) {

        $filters = $this->setFilters($request);

        $crawler = new Crawler("https://seminovos.com.br/$filters");
        return $crawler->crawl();
    }

    protected function setFilters($request){
        $filters = new Filter($request->all());
        exit;

        //print_r($filters);

        $urlParams = (!$request->type) ? 'carro' : '';



        echo $urlParams;
        return $urlParams;


        //Filtro veículo




        // //Filtro estado de conservação
        // if($request->estado_conservacao == "0km")
        //     $externa .= "estado-conservacao/0km/";
        // if($request->estado_conservacao == "seminovo")
        //     $externa .= "estado-conservacao/seminovo/";

        // //Filtro de marca e modelo
        // $externa .= "marca/".$request->marca."/";
        // $externa .= "modelo/".$request->modelo."/";

        // //Filtro de cidade
        // if(isset($request->cidade))
        //     $externa .= "cidade/".$request->cidade."/";

        // //Filtro de valores
        // if(isset($request->valor1) && isset($request->valor2))
        //     $externa .= "valor1/".$request->valor1."/valor2/".$request->valor2."/";

        // //Filtro de anos
        // if(isset($request->ano1) && isset($request->ano2))
        //     $externa .= "ano1/".$request->ano1."/ano2/".$request->ano2."/";

        // //Filtro de tipo de usuário
        // if($request->usuario == "particular")
        //     $externa .= "usuario/particular/";
        // else if($request->usuario == "revenda")
        //     $externa .= "usuario/revenda/";
        // else
        //     $externa .= "usuario/todos/";

    }
}
