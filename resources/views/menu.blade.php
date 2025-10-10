<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IFSync | Menu</title>
    <link rel="icon" href="{{ asset('favicons/favicon.ico') }}" type="image/x-icon">
    <link rel="preload" href="{{ asset('fonts/agrandir/Agrandir-Regular.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('fonts/agrandir/Agrandir-Bold.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --bg-sidebar: #ffffff;
            --bg-principal: #f6f1e6;
            --texto-principal: #0a315b;
            --texto-alternativo: #582e26;
            --link-selecionado: #31934b;
        }

        @font-face {
            font-family: 'Agrandir';
            src: url("{{ asset('fonts/agrandir/Agrandir-Regular.woff2') }}") format('woff2');
            font-weight: 400;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'Agrandir';
            src: url("{{ asset('fonts/agrandir/Agrandir-Bold.woff2') }}") format('woff2');
            font-weight: 700;
            font-style: normal;
            font-display: swap;
        }

        body {
            font-family: 'Agrandir', system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
            background-color: var(--bg-principal);
            color: var(--texto-principal);
            display: flex;
            height: 100vh;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .sidebar-esquerda,
        .sidebar-direita {
            width: 240px;
            background-color: var(--bg-sidebar);
            padding: 30px 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            text-overflow: hidden;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 30px;
        }

        .logo img {
            width: 80%;
        }

        .img-apoio {
            width: 70%;
            margin: 20px;
        }

        .logo h2 {
            font-size: 18px;
            color: #004d40;
            font-weight: 700;
            margin: 0;
        }

        .menu-item,
        .logout-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            color: inherit;
            text-decoration: none;
            margin: 12px 0;
            font-weight: 500;
            transition: 0.2s;
        }

        .menu-item:hover {
            color: var(--link-selecionado);
        }

        .logout-btn {
            background: none;
            border: none;
            color: #ff4524;
            font-family: inherit;
            font-size: inherit;
            cursor: pointer;
            padding: 0;
        }

        .logout-btn:hover {
            color: #b71c1c;
        }

        .subtitulo {
            color: var(--texto-principal);
            font-weight: 900;
            font-size: 20px;
        }


        .icons {
            font-size: 20px;
        }

        .icon-perfil {
            align-self: center;
            font-size: 80px;
            color: var(--link-selecionado);
        }

        .texto-alternativo {
            color: var(--texto-alternativo);
            font-size: 11px;
            margin: 5px 0;
        }

        .perfil-usuario-menu {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 0;
            text-align: center;
        }

        .perfil-usuario-menu p {
            margin: 0;
            padding: 2px;
        }

        .lista-horizontal,
        .lista-horizontal-espacada {
            display: flex;
            width: 100%;
            justify-content: space-between;
            align-self: center;
            align-items: center;
        }

        .icons-borda {
            border: 1px solid var(--texto-principal);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: 0.2s;
        }

        .icons-borda:hover {
            background-color: var(--link-selecionado);
            color: #fff;
            border-color: var(--link-selecionado);
            cursor: pointer;
        }

        .icons-borda i,
        .icon-perfil {
            margin-bottom: -4px;
        }

        .lista-disciplinas {
            margin: 10px 20px 20px 20px;
            font-size: 15px;
        }

        .lista-disciplinas li {
            padding: 4px;
        }

        /* === MAIN (apenas placeholder) === */
        .main {
            padding: 15px 15px 0 15px;
            flex: 1;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-direction: column;
        }

        .rodape-logo {
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .rodape-logo img {
            width: 20vw;
            min-width: 250px;
        }
    </style>
</head>

<body>

    {{-- sidebar esquerda --}}
    <div class="sidebar-esquerda">
        <div>
            <div class="logo">
                <img src="{{ asset('img/logo-ifsync.svg') }}" alt="Logomarca IFSync">
            </div>

            <h3 class="subtitulo">VISÃO GERAL</h3>
            <a href="#" class="menu-item"><i class="icons bi bi-calendar-date"></i>Agenda</a>
            <a href="#" class="menu-item"><i class="icons bi bi-calendar4-range"></i>Grade de Horários</a>
            <a href="#" class="menu-item"><i class="icons bi bi-check2-circle"></i>Avaliações e Notas</a>
            <a href="#" class="menu-item"><i class="icons bi bi-alarm"></i>Frequência</a>
        </div>

        <img src="{{ asset('img/img-sidebar.png') }}" class="img-apoio" alt="Figura com elementos acadêmicos">

        <div>
            <h3 class="subtitulo">CONFIGURAÇÕES</h3>
            <a href="#" class="menu-item"><i class="icons bi bi-gear"></i>Configurações</a>

            {{-- BOTÃO DE LOGOUT --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn">
                    <i class="icons bi bi-box-arrow-left"></i>Logout
                </button>
            </form>
        </div>
    </div>

    {{-- MAIN --}}
    <div class="main">
        <h2>Conteúdo</h2>
        <footer class="rodape-logo">
            <img src="{{ asset('img/logo-ifsudeste.png') }}" alt="Sistemas de Informação, IF Sudeste MG">
        </footer>
    </div>


    {{-- sidebar direita --}}
    <div class="sidebar-direita">
        <div class="lista-horizontal-espacada">
            <h3 class="subtitulo">Seu perfil</h3>
            <a href="#"><i class="icons bi bi-three-dots-vertical"></i></a>
        </div>
        <div>
        <div class="perfil-usuario-menu">
            <i class="icon-perfil bi bi-person-circle"></i>
            <p>&#127774; Bom dia, Aluno(a)!</p>
            <p class="texto-alternativo">Acesse suas notificações, arquivos e fique por dentro das novidades da instituição.</p>
        </div>
        <div class="lista-horizontal">
            <a href="#" class="menu-item"><span class="icons-borda"><i class="icons bi bi-bell"></i></span></a>
            <a href="#" class="menu-item"><span class="icons-borda"><i class="icons bi bi-files"></i></span></a>
            <a href="#" class="menu-item"><span class="icons-borda"><i class="icons bi bi-newspaper"></i></span></a>
        </div>
    </div>
        <div class="disciplinas-usuario">
            <h3 class="subtitulo">Suas disciplinas</h3>
            <ul class="lista-disciplinas">
                <li>Disciplina 1</li>
                <li>Disciplina 2</li>
                <li>Disciplina 3</li>
                <li>Disciplina 4</li>
                <li>Disciplina 5</li>
                <li>Disciplina 6</li>
                <li>Disciplina 7</li>
                <li>Disciplina 8</li>
            </ul>
        </div>
    </div>
</body>

</html>