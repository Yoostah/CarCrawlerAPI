@extends('layouts.template')

@section('title','API CarCrawler - Details Endpoint')

@section('content')

<div class="hub-reference">
    <div class="hub-reference-section">
        <header>
            <h2>Busca de detalhes de um Veículo</h2>
        </header>
    </div>
    <div class="hub-api">
        <div>
            <div class="hub-reference-left">
                <div class="param-type-header">
                    <h3>Query Params</h3>
                </div>
                <form class="rjsf" id="form-search">
                    <div class="form-group field field-object">
                        <fieldset>
                            <div class="form-group field field-string param">
                                <span class="label">
                                    <label class="label-name">carUrl
                                        <span class="label-required">*</span>
                                    </label>
                                <span class="label-type">string</span>
                                    <div class="description">
                                        <div class="field-description">
                                            <p>URL de detalhamento do veículo</p>
                                            <p>Esta informação é obtida na busca do veículo.</p>
                                            <p>Ao enviar a URL ao Endpoint, o mesmo irá retornar todas as informações básicas e as informações avançadas do veículo.</p>
                                        </div>
                                    </div>
                                </span>
                            </div>
                        </fieldset>
                    </div>
                </form>
                <div class="param-type-header">
                    <h3>Endpoint Completo</h3>
                </div>
            <div class="hub-reference-right">
                <div class="hub-reference-section-code">
                    <div class="code-sample tabber-parent">
                        <div>
                            <div class="code-sample-body">
                                <div style="display: block;">
                                    <pre class="tomorrow-night tabber-body" style="display: block;">
                                        <span class="cm-s-tomorrow-night"><strong>URL_SEMINOVOS/</strong>{carUrl}</span>
                                    </pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
