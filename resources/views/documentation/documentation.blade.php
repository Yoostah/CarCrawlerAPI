@extends('layouts.template')

@section('title','API CarCrawler - Endpoints')

@section('content')
<div class="hub-reference">
    <div class="hub-reference-section">
        <header>
            <h2><a href="{{route('endpoints.search')}}">Search</a></h2>
        </header>
    </div>
    <div class="hub-api">
        <div>
            <div class="hub-reference-left">
                <div class="param-type-header">
                    <span class="label">
                        <label class="label-name">Através deste endpoint o crawler será acionado e irá efetuar a busca conforme os filtros informados.
                        </label>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="hub-reference-section">
        <header>
            <h2><a href="{{route('endpoints.details')}}">Details</a></h2>
        </header>
    </div>
    <div class="hub-api">
        <div>
            <div class="hub-reference-left">
                <div class="param-type-header">
                    <span class="label">
                        <label class="label-name">Através deste endpoint o crawler irá buscar um maior detalhamento de um veículo.
                        </label>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
