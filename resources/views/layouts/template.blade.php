<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/all.min.css') }}">
</head>

<body>
    <header class="cabecalho">
        <ul class="nav nav-tabs nav-stacked">
            <li class="nav-item">
                <a class="btn btn-secondary btn-sm ml-3" href="{{route('index')}}" class="nav-link">HOME</a>
            </li>
            <li class="nav-item disabled">
                <a class="btn btn-secondary btn-sm ml-3" href="{{route('endpoints')}}" class="nav-link">ENDPOINTS</a>
            </li>
        </ul>
    </header>
    <div class="jumbotron">
        <h1 class="display-4" align="center">@yield('title')</h1>
    </div>
    <hr>
    <section class="principal">
        <div class="conteudo">
            @yield('content')
        </div>
    </section>
    <hr>
    <br>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</html>
