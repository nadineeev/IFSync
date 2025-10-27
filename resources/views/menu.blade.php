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
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg-sidebar: #ffffff;
            --bg-principal: #f6f1e6;
            --texto-principal: #0a315b;
            --texto-alternativo: #582e26;
            --link-selecionado: #31934b;
            --sidebar-pad-y: 20px;   /* ↑ topo mais folgado nas sidebars */
            --sidebar-pad-x: 20px;
        }

        @font-face {
            font-family: 'Agrandir';
            src: url("{{ asset('fonts/agrandir/Agrandir-Regular.woff2') }}") format('woff2');
            font-weight: 400;
        }

        @font-face {
            font-family: 'Agrandir';
            src: url("{{ asset('fonts/agrandir/Agrandir-Bold.woff2') }}") format('woff2');
            font-weight: 700;
        }

        body {
            font-family: 'Agrandir', system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
            background-color: var(--bg-principal);
            color: var(--texto-principal);
            display: flex;
            height: 100vh;
            overflow: hidden; /* Impede scroll duplo */
        }

        .sidebar-esquerda, .sidebar-direita {
            position: fixed;
            top: 0;
            bottom: 0;
            width: 240px;
            height: 100vh; /* garante que não ultrapasse a tela */
            background-color: var(--bg-sidebar);
            padding: var(--sidebar-pad-y) var(--sidebar-pad-x) 24px var(--sidebar-pad-x);
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* distribui o conteúdo */
            font-size: 0.9rem;
            z-index: 9;
            overflow: hidden; /* impede qualquer scroll */
        }

        .sidebar-esquerda {
            left: 0;
            border-right: 3px solid #ffffffff;
        }

        .sidebar-direita {
            right: 0;
            border-left: 3px solid #ffffffff;
        }

        /* Garante que elementos internos se adaptem dentro da altura da sidebar */
        .sidebar-esquerda > div,
        .sidebar-direita > div {
            flex-shrink: 1;
            flex-grow: 0;
            min-height: 0;
        }

        .logo { display: flex; align-items: center; gap: 8px; margin-bottom: 30px; }
        .logo img { width: 80%; }

        .img-apoio { width: 70%; margin: 20px; }

        .menu-item, .logout-btn {
            display: flex; align-items: center; gap: 8px;
            color: inherit; text-decoration: none;
            margin: 12px 0; font-weight: 500; transition: 0.2s;
        }

        .menu-item:hover, .menu-item.ativo { color: var(--link-selecionado); }

        .logout-btn {
            background: none; border: none; color: #ff4524;
            font-family: inherit; font-size: inherit;
            cursor: pointer; padding: 0;
        }
        .logout-btn:hover { color: #b71c1c; }

        .subtitulo { color: var(--texto-principal); font-weight: 900; font-size: 18px; }
        .icons { font-size: 18px; }

        .dropdown-menu {
            border: 1px solid #0a315b !important;
            border-radius: 10px; padding: 6px;
            box-shadow: 0 8px 24px rgba(10, 49, 91, .16);
            min-width: 220px;
        }

        .dropdown-item {
            display: flex; align-items: center; gap: 8px;
            color: var(--texto-principal) !important;
            font-weight: 500; border-radius: 8px;
            padding: 10px 12px;
            transition: color .2s, background-color .2s;
        }

        .dropdown-item:hover {
            color: var(--link-selecionado) !important;
            background-color: rgba(49, 147, 75, 0.08) !important;
        }

        #menuDropdown.btn { padding: 0; line-height: 1; color: var(--texto-principal); }
        #menuDropdown.btn:hover { color: var(--link-selecionado); }

        .icon-perfil { align-self: center; font-size: 75px; color: var(--link-selecionado); }

        .texto-alternativo { color: var(--texto-alternativo); font-size: 11px; margin: 4px 0; }

        .perfil-usuario-menu {
            display: flex; flex-direction: column;
            align-items: center; justify-content: center;
            text-align: center;
        }

        .perfil-usuario-menu p { margin: 0; padding: 2px; }

        .lista-horizontal, .lista-horizontal-espacada {
            display: flex; width: 100%;
            justify-content: space-between; align-items: center;
        }

        .icons-borda {
            border: 1px solid var(--texto-principal);
            border-radius: 60%; width: 40px; height: 40px;
            display: flex; align-items: center; justify-content: center;
            transition: 0.2s;
        }

        .icons-borda:hover {
            background-color: var(--link-selecionado);
            color: #fff; border-color: var(--link-selecionado);
            cursor: pointer;
        }

        .lista-disciplinas { margin: 10px 20px 20px 20px; font-size: 14px; list-style: none;}
        .lista-disciplinas li { padding: 5px; }

        .main {
            padding: 15px;
            flex: 1; display: flex;
            flex-direction: column;
            justify-content: center;     /* centraliza o h2 */
            align-items: center;
            text-align: center;
            position: relative;          /* para posicionar o rodapé dentro da main */
            min-height: 100vh;
        }

        .rodape-logo {
            position: absolute;
            bottom: 15px;                /* gruda no fundo da main */
            left: 50%;
            transform: translateX(-50%);
        }
        .rodape-logo img { width: 20vw; min-width: 250px; }

        /* ≤ 1200px: um pouco menos de respiro para caber melhor */
        @media (max-width: 1200px){
            :root{ --sidebar-pad-y: 34px; }
        }

        /* ≤ 992px: ainda menor, mantendo tudo dentro sem scroll nas sidebars */
        @media (max-width: 992px){
            :root{ --sidebar-pad-y: 26px; }
        }

    </style>
</head>

<body>

    {{-- Sidebar esquerda --}}
    <div class="sidebar-esquerda">
        <div>
            <div class="logo">
                <img src="{{ asset('img/logo-ifsync.svg') }}" alt="Logomarca IFSync">
            </div>

            <a href="#" class="menu-item ativo"><i class="icons bi bi-house"></i>Menu Principal</a>
            <a href="#" class="menu-item"><i class="icons bi bi-calendar-date"></i>Agenda</a>
            <a href="#" class="menu-item"><i class="icons bi bi-calendar4-range"></i>Grade de Horários</a>
            <a href="#" class="menu-item"><i class="icons bi bi-check2-circle"></i>Avaliações e Notas</a>
            <a href="#" class="menu-item"><i class="icons bi bi-alarm"></i>Frequência</a>
        </div>

        <img src="{{ asset('img/img-sidebar.png') }}" class="img-apoio" alt="Figura com elementos acadêmicos">

        <div>
            <h3 class="subtitulo">CONFIGURAÇÕES</h3>
            <a href="#" class="menu-item"><i class="icons bi bi-gear"></i>Configurações</a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn">
                    <i class="icons bi bi-box-arrow-left"></i>Logout
                </button>
            </form>
        </div>
    </div>

    {{-- Main --}}
    <div class="main">
        <h2>Conteúdo</h2>
        <footer class="rodape-logo">
            <img src="{{ asset('img/logo-ifsudeste.png') }}" alt="Sistemas de Informação, IF Sudeste MG">
        </footer>
    </div>

    {{-- Sidebar direita atualizada --}}
    <div class="sidebar-direita">
        <div class="lista-horizontal-espacada">
            <h3 class="subtitulo">Seu perfil</h3>
            <div class="dropdown">
                <button class="btn btn-light border-0" type="button" id="menuDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="icons bi bi-three-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="menuDropdown">
                    <li><a class="dropdown-item" href="#">Editar Perfil</a></li>
                    <li><a class="dropdown-item" href="#">Cadastrar Disciplinas</a></li>
                </ul>
            </div>
        </div>
        
        {{-- Perfil do usuário --}}
        <div>
        <div class="perfil-usuario-menu">
            <i class="icon-perfil bi bi-person-circle"></i>
            <p>☀️ Bom dia, {{ Auth::user()->name ?? 'Aluno(a)' }}!</p>
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
            <p class="lista-disciplinas">
                Nenhuma disciplina foi cadastrada ainda.
            </p>
        </div>



         <!-- {{-- Disciplinas dinâmicas --}}
        <div class="disciplinas-usuario">
            <h3 class="subtitulo">Suas disciplinas</h3>
            <ul class="lista-disciplinas">
                {{-- @php
                    use Illuminate\Support\Facades\DB;
                    use Illuminate\Support\Facades\Auth;

                    $disciplinasUsuario = DB::table('aluno_disciplinas')
                        ->join('disciplinas', 'aluno_disciplinas.disciplina_id', '=', 'disciplinas.id')
                        ->where('aluno_disciplinas.user_id', Auth::id())
                        ->select('disciplinas.nome_disciplina')
                        ->get();
                @endphp 

                @forelse($disciplinasUsuario as $disciplina)
                    <li>{{ $disciplina->nome_disciplina }}</li>
                @empty
                    <li class="text-muted">Nenhuma disciplina cadastrada ainda</li>
                @endforelse --}}
            </ul>
        </div> -->
    </div>
</body>
</html>
