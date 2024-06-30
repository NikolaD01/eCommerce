<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white antialiased font-sans">
    <header class="bg-white grid grid-cols-2 items-center gap-2 py-6 lg:grid-cols-3">
        @if (Route::has('login'))
        @endif
    </header>
    <main class="">
        <div class="container m-auto flex flex-col gap-32 ">
            {{$slot}}
        </div>
    </main>
    @include('components.footer.default')
</body>
</html>
