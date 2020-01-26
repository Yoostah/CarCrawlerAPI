<?php

namespace App\Http\Controllers\Crawler;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\ProjectClasses\Crawler;
use App\Http\ProjectClasses\SearchFilter;


class CrawlerController extends Controller
{

    protected function index(Request $request) {
        $filters = $this->setFilters($request);

        $crawler = new Crawler("https://seminovos.com.br/$filters");

        $response = $crawler->crawl();

        if(count($response))
            return $response;
    }

    protected function setFilters($request){
        $filters = new SearchFilter($request->all());

        return $filters->getFilteredParams();
    }
}
