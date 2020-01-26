@extends('layouts.template')

@section('title','API CarCrawler - Search Endpoint')

@section('content')

<div class="hub-reference">
    <div class="hub-reference-section">
        <header>
            <h2>Busca de Veículos através de filtros</h2>
        </header>
    </div>
    <hr>
    <div class="hub-api">
        <div class="hub-reference-left">
            <div class="param-type-header">
                <h3>Query Params</h3>
            </div>
            <form class="rjsf" id="form-search">
                <div class="form-group field field-object">
                    <fieldset>
                        <div class="form-group field field-string param">
                            <span class="label">
                                <label class="label-name">type
                                    {{-- <span class="label-required">*</span> --}}
                                </label>
                                <span class="label-type">string</span>
                                <div class="description">
                                    <div class="field-description">
                                        <p>Tipo de veículo</p>
                                        <p>Se este parâmetro não for enviado, a consulta será por carro</p>
                                        <p>Opções: <strong>[carro, moto, caminhao]</strong></p>
                                    </div>
                                </div>
                            </span>
                        </div>
                        <div class="form-group field field-string param">
                            <span class="label">
                                <label class="label-name">manufacturer
                                    {{-- <span class="label-required">*</span> --}}
                                </label>
                                <span class="label-type">string</span>
                                <div class="description">
                                    <div class="field-description">
                                        <p>Marca do fabricante</p>
                                    </div>
                                </div>
                            </span>
                        </div>
                        <div class="form-group field field-string param">
                            <span class="label">
                                <label class="label-name">model
                                    {{-- <span class="label-required">*</span> --}}
                                </label>
                                <span class="label-type">string</span>
                                <div class="description">
                                    <div class="field-description">
                                        <p>Modelo do veículo</p>
                                        <p>Para utilizar este filtro, é necessário informar o filtro
                                            <strong>manufacturer</strong></p>
                                    </div>
                                </div>
                            </span>
                        </div>
                        <div class="form-group field field-string param">
                            <span class="label">
                                <label class="label-name">yearRange
                                    {{-- <span class="label-required">*</span> --}}
                                </label>
                                <span class="label-type">integer</span>
                                <div class="description">
                                    <div class="field-description">
                                        <p>Intervalo de Anos de Fabricação do veículo</p>
                                        <p>Para utilizar este filtro, é obrigatório o preenchimento de pelo menos o
                                            ano inicial OU ano final separados com "-".</p>
                                        <p>Exemplo: [2000-] , [-2020] ou [2018-2020]</p>
                                    </div>
                                </div>
                            </span>
                        </div>
                        <div class="form-group field field-string param">
                            <span class="label">
                                <label class="label-name">priceRange
                                    {{-- <span class="label-required">*</span> --}}
                                </label>
                                <span class="label-type">integer</span>
                                <div class="description">
                                    <div class="field-description">
                                        <p>Intervalo de preço do veículo</p>
                                        <p>Para utilizar este filtro, é obrigatório o preenchimento de pelo menos o
                                            preço minimo OU preço máximo separados com "-".</p>
                                        <p>Os valores devem ser inteiros, sem separadores de milhar</p>
                                        <p>Exemplo: [20000-] , [-50000] ou [20000-50000]</p>
                                    </div>
                                </div>
                            </span>
                        </div>
                        <div class="form-group field field-string param">
                            <span class="label">
                                <label class="label-name">mileageRange
                                    {{-- <span class="label-required">*</span> --}}
                                </label>
                                <span class="label-type">integer</span>
                                <div class="description">
                                    <div class="field-description">
                                        <p>Intervalo de quilometragem do veículo</p>
                                        <p>Para utilizar este filtro, é obrigatório o preenchimento de pelo menos o
                                            valor minimo OU valor máximo separados com "-".</p>
                                        <p>Os valores devem ser inteiros, sem separadores de milhar</p>
                                        <p>Exemplo: [50000-] , [-150000] ou [50000-150000]</p>
                                    </div>
                                </div>
                            </span>
                        </div>
                        <div class="form-group field field-string param">
                            <span class="label">
                                <label class="label-name">status
                                    {{-- <span class="label-required">*</span> --}}
                                </label>
                                <span class="label-type">string</span>
                                <div class="description">
                                    <div class="field-description">
                                        <p>Estado do veículo</p>
                                        <p>Opções: <strong>[seminovo, novo]</strong></p>
                                    </div>
                                </div>
                            </span>
                        </div>
                        <div class="form-group field field-string param">
                            <span class="label">
                                <label class="label-name">origin
                                    {{-- <span class="label-required">*</span> --}}
                                </label>
                                <span class="label-type">string</span>
                                <div class="description">
                                    <div class="field-description">
                                        <p>Origem do veículo</p>
                                        <p>Opções: <strong>[particular, revenda]</strong></p>
                                        <p>Caso a opção selecionada seja <strong>revenda</strong> os dados do
                                            revendedor virão na resposta</p>
                                    </div>
                                </div>
                            </span>
                        </div>
                        <div class="form-group field field-string param">
                            <span class="label">
                                <label class="label-name">transmission
                                    {{-- <span class="label-required">*</span> --}}
                                </label>
                                <span class="label-type">string</span>
                                <div class="description">
                                    <div class="field-description">
                                        <p>Tipo de Câmbio do veículo</p>
                                        <p>Para utilizar este filtro, é obrigatório o preenchimento de pelo menos
                                            uma opção e em caso de multiplas opções, os valores deverão ser
                                            separados com "-".</p>
                                        <p>Opções: <strong>[automatico, manual, automatizado]</strong></p>
                                        <p>Exemplo: [automatico] , [automatico-manual]</p>
                                    </div>
                                </div>
                            </span>
                        </div>
                        <div class="form-group field field-string param">
                            <span class="label">
                                <label class="label-name">perPage
                                    {{-- <span class="label-required">*</span> --}}
                                </label>
                                <span class="label-type">integer</span>
                                <div class="description">
                                    <div class="field-description">
                                        <p>Quantidade de Registros retornados pelo Crawler</p>
                                        <p>Para que o crawler retorne todos os resultados, informe
                                            <strong>-1</strong></p>
                                        <p>ATENÇÃO, AO INFORMAR <STRong>-1</STRong> O RETORNO PODE DEMORAR DE ACORDO
                                            COM OS RESULTADOS</p>
                                    </div>
                                </div>
                            </span>
                        </div>
                        <div class="form-group field field-string param">
                            <span class="label">
                                <label class="label-name">page
                                    {{-- <span class="label-required">*</span> --}}
                                </label>
                                <span class="label-type">integer</span>
                                <div class="description">
                                    <div class="field-description">
                                        <p>Após informar o filtro anterior, os resultados poderão ser páginados.</p>
                                        <p>Para que o crawler navegue pelas páginas, é necessário informar esta
                                            parâmetro junto ao perPage</p>
                                    </div>
                                </div>
                            </span>
                        </div>
                    </fieldset>
                </div>
                <button style="display: none;" type="submit"></button>
            </form>
            <div class="param-type-header">
                <h3>Endpoint Completo</h3>
            </div>
            <div class="hub-reference-section-code">
                <div class="code-sample tabber-parent">
                    <div>
                        <div class="code-sample-body">
                            <div style="display: block;">
                                <pre class="tomorrow-night tabber-body" style="display: block;">
                                <span class="cm-s-tomorrow-night"><strong>https://localhost:8000/api/</strong>{type}{manufacturer}{model}{yearRange}{priceRange}{mileageRange}{status}{origin}{transmission}{perPage}{page}</span>
                            </pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hub-reference-right">
            <ul class="code-sample-tabs hub-reference-results-header">
                <a class="hub-reference-results-header-item tabber-tab invalidclass selected" href="#">
                    <span class="httpsuccess">
                        <i class="fa fa-circle"></i>
                        ENDPOINT
                    </span>
                </a>
            </ul>
            <div class="code">
                <pre>
                    <code>
                        https://localhost:8000/api/<span class="param">{type}</span>
                    </code>
                </pre>
            </div>
            <ul class="code-sample-tabs hub-reference-results-header">
                <a class="hub-reference-results-header-item tabber-tab invalidclass selected" href="#">
                    <span class="httpsuccess">
                        <i class="fa fa-circle"></i>
                        URL PESQUISADA
                    </span>
                </a>
            </ul>
            <div class="code">
                <pre>
                    <code>
                        https://seminovos.com.br/<span class="param">carro</span>
                        https://seminovos.com.br/<span class="param">moto</span>
                        https://seminovos.com.br/<span class="param">caminhao</span>
                    </code>
                </pre>
            </div>
            <ul class="code-sample-tabs hub-reference-results-header">
                <a class="hub-reference-results-header-item tabber-tab invalidclass selected" href="#">
                    <span class="httpsuccess">
                        <i class="fa fa-circle"></i>
                        ENDPOINT
                    </span>
                </a>
            </ul>
            <div class="code">
                <pre>
                    <code>
                        https://localhost:8000/api/<span class="param">{type}{manufacturer}{model}</span>
                    </code>
                </pre>
            </div>
            <ul class="code-sample-tabs hub-reference-results-header">
                <a class="hub-reference-results-header-item tabber-tab invalidclass selected" href="#">
                    <span class="httpsuccess">
                        <i class="fa fa-circle"></i>
                        URL PESQUISADA
                    </span>
                </a>
            </ul>
            <div class="code">
                <pre>
                    <code>
                        https://seminovos.com.br/<span class="param">carro/fiat</span>
                        https://seminovos.com.br/<span class="param">carro/fiat/bravo</span>
                        https://seminovos.com.br/<span class="param">moto/honda</span>
                        https://seminovos.com.br/<span class="param">caminhao/agrale/9.200</span>
                    </code>
                </pre>
            </div>
            <ul class="code-sample-tabs hub-reference-results-header">
                <a class="hub-reference-results-header-item tabber-tab invalidclass selected" href="#">
                    <span class="httpsuccess">
                        <i class="fa fa-circle"></i>
                        ENDPOINT
                    </span>
                </a>
            </ul>
            <div class="code">
                <pre>
                    <code>
                        https://localhost:8000/api/{type}{manufacturer}{model}<span class="param">{yearRange}{priceRange}{mileageRange}</span>
                    </code>
                </pre>
            </div>
            <ul class="code-sample-tabs hub-reference-results-header">
                <a class="hub-reference-results-header-item tabber-tab invalidclass selected" href="#">
                    <span class="httpsuccess">
                        <i class="fa fa-circle"></i>
                        URL PESQUISADA
                    </span>
                </a>
            </ul>
            <div class="code">
                <pre>
                    <code>
                        https://seminovos.com.br/carro/fiat/<span class="param">ano-2018-</span>
                        https://seminovos.com.br/carro/fiat/bravo/<span class="param">ano-2019</span>
                        https://seminovos.com.br/moto/honda/<span class="param">ano-2018-2020</span>
                        https://seminovos.com.br/moto/honda/<span class="param">ano-2018-2020/preco-10000-15000</span>
                        https://seminovos.com.br/caminhao/agrale/9.200/<span class="param">ano-2018-2020/preco-10000-15000/km-50000-200000</span>
                    </code>
                </pre>
            </div>
            <ul class="code-sample-tabs hub-reference-results-header">
                <a class="hub-reference-results-header-item tabber-tab invalidclass selected" href="#">
                    <span class="httpsuccess">
                        <i class="fa fa-circle"></i>
                        ENDPOINT
                    </span>
                </a>
            </ul>
            <div class="code">
                <pre>
                    <code>
                        https://localhost:8000/api/{type}{manufacturer}{model}{yearRange}{priceRange}{mileageRange}<span class="param">{status}{origin}{transmission}</span>
                    </code>
                </pre>
            </div>
            <ul class="code-sample-tabs hub-reference-results-header">
                <a class="hub-reference-results-header-item tabber-tab invalidclass selected" href="#">
                    <span class="httpsuccess">
                        <i class="fa fa-circle"></i>
                        URL PESQUISADA
                    </span>
                </a>
            </ul>
            <div class="code">
                <pre>
                    <code>
                        https://seminovos.com.br/carro/fiat/ano-2018-/<span class="param">estado-novo</span>
                        https://seminovos.com.br/carro/fiat/bravo/ano-2019/<span class="param">estado-seminovo/listaAcessorios[]-11</span>
                        https://seminovos.com.br/moto/honda/ano-2018-2020/<span class="param">origem-revenda/estado-seminovo</span>
                        https://seminovos.com.br/moto/honda/ano-2018-2020/preco-10000-15000/<span class="param">estado-seminovo/origem-particular/listaAcessorios[]-11-60</span>
                    </code>
                </pre>
            </div>
            <ul class="code-sample-tabs hub-reference-results-header">
                <a class="hub-reference-results-header-item tabber-tab invalidclass selected" href="#">
                    <span class="httpsuccess">
                        <i class="fa fa-circle"></i>
                        ENDPOINT
                    </span>
                </a>
            </ul>
            <div class="code">
                <pre>
                    <code>
                        https://localhost:8000/api/{type}{manufacturer}{model}{yearRange}{priceRange}{mileageRange}{status}{origin}{transmission}<span class="param">{perPage}{page}</span>
                    </code>
                </pre>
            </div>
            <ul class="code-sample-tabs hub-reference-results-header">
                <a class="hub-reference-results-header-item tabber-tab invalidclass selected" href="#">
                    <span class="httpsuccess">
                        <i class="fa fa-circle"></i>
                        URL PESQUISADA
                    </span>
                </a>
            </ul>
            <div class="code">
                <pre>
                    <code>
                        https://seminovos.com.br/carro/fiat/ano-2018-/estado-novo/<span class="param">?ordenarPor=2&amp;registrosPagina=10</span>
                        https://seminovos.com.br/carro/fiat/bravo/ano-2019/estado-seminovo/listaAcessorios[]-11/<span class="param">?ordenarPor=2&amp;registrosPagina=30?page=2</span>
                        https://seminovos.com.br/moto/honda/ano-2018-2020/origem-revenda/estado-seminovo/<span class="param">ordenarPor=2&amp;registrosPagina=-1</span>
                    </code>
                </pre>
            </div>
        </div>
    </div>
    @endsection
