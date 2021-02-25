<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @include('layouts.partials.navbar')
    <main class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @yield('main')
                </div>
            </div>
        </div>    
    </main>
</body>
</html>