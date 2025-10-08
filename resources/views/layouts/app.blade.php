<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'IFSync')</title>

    {{-- Favicon global --}}
    <link rel="icon" type="image/png" href="{{ asset('assets/img/icon.png') }}">

    {{-- CSS global (se houver) --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @stack('styles')
</head>

<body>
    {{-- Conteúdo das páginas --}}
    @yield('content')

    {{-- Scripts globais (opcional) --}}
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @stack('scripts')
</body>
</html>
