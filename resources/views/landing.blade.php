{{-- resources/views/landing.blade.php (Laravel) --}}
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <meta name="description" content="Sua rotina de estudante, mais leve e eficiente.">
    <link rel="preload" href="{{ asset('fonts/agrandir/Agrandir-Regular.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('fonts/agrandir/Agrandir-Bold.woff2') }}" as="font" type="font/woff2" crossorigin>

    <link rel="icon" href="{{ asset('favicons/favicon.svg') }}" type="image/svg+xml">
    <link rel="alternate icon" href="{{ asset('favicons/favicon.ico') }}" sizes="any">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicons/apple-touch-icon.png') }}">
    <link rel="mask-icon" href="{{ asset('favicons/favicon.svg') }}" color="#111111">
    <link rel="manifest" href="{{ asset('favicons/site.webmanifest') }}">
    <meta name="theme-color" content="#ffffff">

    <style>
      @font-face {
        font-family: 'Agrandir';
        src: url('{{ asset('fonts/agrandir/Agrandir-Regular.woff2') }}') format('woff2');
        font-weight: 400;
        font-style: normal;
        font-display: swap;
      }

      @font-face {
        font-family: 'Agrandir';
        src: url('{{ asset('fonts/agrandir/Agrandir-Bold.woff2') }}') format('woff2');
        font-weight: 700;
        font-style: normal;
        font-display: swap;
      }

      body {
        margin:0;
        background:#f6f1e6;
        font-family: 'Agrandir', system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
        color:#0a2a47;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
      }

      :root {
        --vpad: 24px;               
        --hpad: clamp(12px, 2vw, 24px);
      }
      
      .container {
        max-width: clamp(1100px, 92vw, 1440px);
        margin: 0 auto;
        padding: var(--vpad) var(--hpad);
        min-height: calc(100svh - (2 * var(--vpad)));
        display: flex;
        flex-direction: column;
      }

      .topo {
        display:flex;
        justify-content:flex-end;
        gap:12px
      }

      .botao {
        padding:10px 18px;
        border-radius:999px;
        font-weight:600;
        text-decoration:none;
        font-size:15px;border:2px solid transparent;
        transition:.18s
      }

      .botao-contorno {
        color:#2e7d32;
        border-color:#2e7d32
      }

      .botao-contorno:hover {
        background:#2e7d32;color:#fff
      }

      .botao-preenchido {
        background:#2e7d32;
        color:#fff;
        border-color:#2e7d32
      }

      .botao-preenchido:hover {
        background:#1b5e20
      }

      .destaque {
        display: grid;
        grid-template-columns: 1.3fr 1fr;
        gap: clamp(48px, 6vw, 120px);
        align-items: center;
        margin-block: auto;      
      }

      @media (max-width: 900px) {
        .destaque{ grid-template-columns: 1fr; }
        .topo{ justify-content: center; }
      }

      .nome-marca {
        display:flex;
        align-items:center;
        gap:14px;
        margin-bottom: clamp(4px, 1vh, 10px); 
      }

      .logo-marca {
        display:block;
        width:auto;
        height:clamp(130px, 14vw, 260px);
        max-width:min(100%, 900px);
      }

      .titulo { 
        margin: clamp(4px, 0.8vh, 8px) 0 clamp(2px, 0.6vh, 6px);
        letter-spacing: -0.01em;
        font-size: clamp(20px, 4vw, 48px); 
        line-height: 1.05;                
        font-weight: 700;       
      }

      .subtitulo {
        font-size:clamp(18px, 1.9vw, 22px);
        color:#7a5a4a;
        margin: 0 0 30px;
      }

      .botao-saibamais {
        margin-top: clamp(15px, 2vh, 35px); 
        font-size: clamp(20px, 3vw, 22px); 
        padding: 12px 22px;
        border-width: 2px;
      }

      .ilustracao img {
        display:block;
        border-radius:16px;
        width: 420px;
        max-width: 100%;   
        height: auto;
      }

      .ilustracao { 
        justify-self: center; 
      }
    </style>
  </head>

  <body>
    <div class="container">

      <div class="topo" aria-label="Acesso rápido">
        <a class="botao botao-contorno" href="{{ route('register') }}">Cadastrar-se</a>
        <a class="botao botao-preenchido" href="{{ route('login') }}">Login</a>
      </div>

      <section class="destaque" aria-labelledby="hero-title">
        <div>
          <div class="nome-marca" aria-label="IFSync">
            <img class="logo-marca" src="{{ asset('img/logo-ifsync.svg') }}" alt="Logomarca IFSync" loading="eager" />
          </div>

          <h1 id="hero-title" class="titulo">Sincronizando sua vida acadêmica</h1>
          <p class="subtitulo">Sua rotina de estudante, mais leve e eficiente.</p>
          <a class="botao botao-preenchido botao-saibamais" href="{{ route('about') }}">Saiba mais</a>
        </div>

        <div class="ilustracao">
          <img src="{{ asset('img/hero-estudante.png') }}" alt="Estudante estudando — Sistemas de Informação, IF Sudeste MG"/>
        </div>
      </section>

    </div>
  </body>
</html>

