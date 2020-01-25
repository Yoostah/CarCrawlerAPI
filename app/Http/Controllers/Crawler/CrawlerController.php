<?php

namespace App\Http\Controllers\Crawler;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\ProjectClasses\Crawler;


class CrawlerController extends Controller
{

    protected function index() {
        $crawler = new Crawler('https://seminovos.com.br/carro');
        return $crawler->crawl();
    }
}
