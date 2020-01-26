@extends('layouts.template')

@section('title','Documentação da API CarCrawler')

@section('content')

<div class="hub-reference">
    <div class="hub-reference-section">
        <header>
            <h2>Objetivo do Crawler:</h2>
        </header>
    </div>
    <div class="hub-api">
        <div>
            <div class="hub-reference-left">
                <div class="param-type-header">
                    <span class="label">
                        <label class="label-name">Efetuar uma busca no website <a href="https://seminovos.com.br/" target="_blank">SEMINIVOSBH</a> e extrair uma listagem
                            de veículos de acordo com os filtros informados na requisição.
                        </label>
                    </span>
                    <span class="label">
                        <label class="label-name">Além da busca, o Crawler deverá à partir de uma URL de detalhamento, buscar mais informações
                            de um determinado veículo.
                        </label>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
