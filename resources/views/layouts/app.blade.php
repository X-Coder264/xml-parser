<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'App') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="container-fluid">
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Brand -->
            <a class="navbar-brand" href="{{ route('xml.index') }}">
                {{ config('app.name', 'App') }}
            </a>

            <!-- Links -->
            <div class="collapse navbar-collapse" id="nav-content">
                <ul class="navbar-nav w-100">
                    <li class="nav-item nav-item">
                        <a class="nav-item nav-link" href="{{ route('xml.index') }}">Uploadaj XML</a>
                    </li>
                    <li class="nav-item nav-item">
                        <a class="nav-item nav-link" href="{{ route('categories.index') }}">Popis kategorija</a>
                    </li>
                    <li class="nav-item nav-item">
                        <a class="nav-item nav-link" href="{{ route('categories.create') }}">Unos nove kategorije</a>
                    </li>
                </ul>
            </div>
        </nav>
        <br>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    @yield('scripts')

</body>
</html>
