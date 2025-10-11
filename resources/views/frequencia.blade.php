<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IFSync | Frequência</title>
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
       
        .main {
            flex: 1;
            padding: 40px 60px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            overflow: auto;
        }

        .titulo {
            font-size: 30px; 
            font-weight: 700; 
            color: var(--link-selecionado); 
            margin-bottom: 20px; 
            margin-left: -5px;
            display: flex; 
            align-items: center; 
            gap: 10px; 
        }

        .subtitulo-main {
            font-size: 25px; 
            font-weight: 500; 
            color: var(--texto-alternativo); 
            margin-bottom: 15px; 
            margin-left: -5px;
            display: flex; 
            align-items: center; 
            gap: 20px; 
        }

        h4 {
            font-size: 25px; 
            font-weight: 500; 
            color: var(--texto-alternativo:); 
            margin-bottom: 15px; 
            margin-left: -5px;
            display: flex; 
            align-items: center; 
            gap: 20px; 
        }

        .tabela-frequencia table {
            width: 100%;
            border-collapse: collapse;
            background: #faf9f7;
            border-radius: 10px;
            overflow: hidden;
        }

        .tabela-frequencia th, .tabela-frequencia td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .tabela-frequencia th {
            background: #ffffffff;
            font-weight: 600;
            color: #0a2463;
        }

        .btn-mais, .btn-menos {
            background: #eee;
            border: none;
            font-size: 18px;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            cursor: pointer;
            transition: 0.2s;
        }
        .btn-mais:hover { background: #b3b3b3ff; }
        .btn-menos:hover { background: #b3b3b3ff; }

        .legenda {
            font-size: 16px;
            margin-top: 30px;
        }

        .legenda-item {
            display: inline-block;
            width: 25px;
            height: 10px;
            margin-right:2x;
            border-radius: 5px;
            vertical-align:middle;             
            border:1px solid rgba(0,0,0,.18);
            box-shadow:
                inset 0 0px 1px rgba(78, 78, 78, 0.24),/* relevo interno */
                0 0 4px rgba(62, 62, 62, 0.08);        
        }

        .legenda .legenda-item:not(:first-of-type){
            margin-left:18px;
        }

        .verde { background: #c4f0b9; }
        .amarelo { background: #fff5b3; }
        .vermelho { background: #ffb3b3; }
        .preto { background: #a3a3a3; }

        .linha-frequencia.zona-segura { background: #e6f8e6; }
        .linha-frequencia.zona-risco { background: #fff7d9; }
        .linha-frequencia.alerta-maximo { background: #ffe5e5; }
        .linha-frequencia.limite-excedido { background: #e0e0e0; }

        .legenda span {
            margin-right: 15px; 
        }

        .legenda i{
            display: inline-block; 
            width: 12px; 
            height: 12px; 
            margin-right: 5px; 
            border-radius: 3px; 
        }

        .card-grafico {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            padding: 16px 12px;
            text-align: center;
            margin-top: 10px;
            transition: 0.3s;
        }

        .card-grafico:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .card-grafico h4 {
            font-size: 14px;
            font-weight: 500;
            color: #0a2463;
            margin-bottom: 10px;
        }

        #grafico-zonas {
            width: 200px;
            height: 200px;
            margin: 0 auto;
            position: relative;
        }

        #grafico-zonas canvas {
            width: 100% !important;
            height: 100% !important;
        }

        .grafico-cards {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 10px;
            max-height: 260px;
            overflow-y: auto;
            padding-right: 5px;
        }

        .barra-item {
            background: #fff;
            border-radius: 8px;
            padding: 8px 10px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.08);
            transition: transform .2s ease;
        }

        .barra-item:hover {
            transform: scale(1.01);
        }

        @media (max-width: 992px) {
            .card-grafico {
                width: 100%;
                margin: 10px auto;
            }
        }

        .sidebar-direita {
            width: 240px;
            background-color: #ffffff;
            padding: 25px 20px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            overflow-y: auto;
        }

        .sidebar-direita .card-grafico {
            font-size: 16px;      
            font-weight: 700;
            line-height: 1.2;
            color: var(--texto-principal);
            margin: 0 0 8px;
            letter-spacing: 0;
        }

        .sidebar-direita .card-grafico {
            background: #fff;
            border: 1px solid #e9ecef;
            border-radius: 12px;
            padding: 14px;
        }

        rodape-logo {
            margin-top: auto;      /* empurra o rodapé para baixo quando sobrar espaço */
            text-align: center;
            padding-top: 24px;
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
                <img src="{{ asset('img/logo-ifsync.svg') }}" alt="Logomarca IFSync" width="150">
            </div>
            
            <a href="{{ route('menu') }}" class="menu-item"><i class="icons bi bi-house"></i>Menu Principal</a>
            <a href="#" class="menu-item"><i class="icons bi bi-calendar-date"></i>Agenda</a>
            <a href="#" class="menu-item"><i class="icons bi bi-calendar4-range"></i>Grade de Horários</a>
            <a href="#" class="menu-item"><i class="icons bi bi-check2-circle"></i>Avaliações e Notas</a>
            <a href="#" class="menu-item ativo"><i class="icons bi bi-alarm"></i>Frequência</a>
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

    {{-- Conteúdo principal --}}
    <div class="main">
        <div>
            <div class="titulo"><i class="bi bi-alarm"></i>Frequência</div>
            <h3 class="subtitulo-main">{{ $periodo }} Controle de Faltas</h3>

                <div class="tabela-frequencia">
                    <table id="tabela-faltas">
                        <thead>
                            <tr>
                                <th>Disciplina</th>
                                <th>Total de Aulas</th>
                                <th>Máx de Faltas</th>
                                <th>Faltas Realizadas em Dias</th>
                                <th>Dias Restantes p/ Faltar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($disciplinas as $disciplina)
                                <tr class="linha-frequencia"
                                    data-total="{{ $disciplina->total_aulas }}"
                                    data-max="{{ $disciplina->max_faltas }}"
                                    data-apd="{{ $disciplina->aulas_por_dia }}" 
                                    data-nome="{{ $disciplina->nome_disciplina }}">

                                    <td>{{ $disciplina->nome_disciplina }}</td>
                                    <td>{{ $disciplina->total_aulas }}</td>
                                    <td>{{ $disciplina->max_faltas }}</td>
                                    
                                    <td class="faltas">
                                        <button class="btn-menos">−</button>
                                        <span class="valor">{{ $disciplina->faltas ?? 0 }}</span>
                                        <button class="btn-mais">+</button>
                                    </td>
                                    
                                    <td class="dias-restantes">0</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <p class="legenda">
                    <strong>As cores indicam a situação:</strong><br>
                    <span class="legenda-item verde"></span> Zona Segura 
                    <span class="legenda-item amarelo"></span> Zona de Risco 
                    <span class="legenda-item vermelho"></span> Alerta Máximo
                    <span class="legenda-item preto"></span> Limite Excedido 
                </p>
        </div>
    </div>

    {{-- Sidebar direita (Dashboards de visão geral) --}}
    <div class="sidebar-direita">
        <h3 class="subtitulo" style="margin-bottom: 15px;">📊 VISÃO GERAL</h3>

        <div class="card-grafico">
            <h4>🧭 Disciplinas por zona</h4>
            <div id="grafico-zonas" style="width: 180px; height: 180px; margin: 0 auto;"></div>
        </div>

        <div class="card-grafico">
            <h4>📚 Faltas por Disciplina</h4>
            <div id="graficoBarrasCustom" class="grafico-cards"></div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const linhas = document.querySelectorAll('.linha-frequencia');

        linhas.forEach(linha => {
            const totalAulas = parseInt(linha.dataset.total);
            const maxFaltas = parseInt(linha.dataset.max);
            const aulasPorDia = parseInt(linha.dataset.apd);
            const faltasSpan = linha.querySelector('.valor');
            const diasRestantesTd = linha.querySelector('.dias-restantes');

            function atualizar() {
                const faltas = parseInt(faltasSpan.textContent);
                const maxDias = Math.floor(maxFaltas / aulasPorDia);
                const diasRestantes = Math.max(0, maxDias - faltas);
                diasRestantesTd.textContent = diasRestantes;

                linha.classList.remove('zona-segura', 'zona-risco', 'alerta-maximo', 'limite-excedido');
                if (diasRestantes >= 4) linha.classList.add('zona-segura');
                else if (diasRestantes <= 3 && diasRestantes > 1) linha.classList.add('zona-risco');
                else if (diasRestantes === 1) linha.classList.add('alerta-maximo');
                else if (diasRestantes === 0) linha.classList.add('limite-excedido');

                atualizarGraficoPizza();
                atualizarGraficoCards();
            }

            linha.querySelector('.btn-mais').addEventListener('click', () => {
                let valor = parseInt(faltasSpan.textContent);
                faltasSpan.textContent = Math.min(valor + 1, Math.floor(maxFaltas / aulasPorDia));
                atualizar();
            });

            linha.querySelector('.btn-menos').addEventListener('click', () => {
                let valor = parseInt(faltasSpan.textContent);
                faltasSpan.textContent = Math.max(valor - 1, 0);
                atualizar();
            });

            atualizar();
        });

        // ===================== GRÁFICO PIZZA =====================
        function atualizarGraficoPizza() {
            const zonaSegura = document.querySelectorAll('.zona-segura').length;
            const zonaRisco = document.querySelectorAll('.zona-risco').length;
            const alertaMaximo = document.querySelectorAll('.alerta-maximo').length;
            const limiteExcedido = document.querySelectorAll('.limite-excedido').length;

            const grafico = document.querySelector('#grafico-zonas');
            if (!grafico) return;

            grafico.innerHTML = `<canvas id="graficoPizza"></canvas>`;

            new Chart(document.getElementById('graficoPizza'), {
                type: 'doughnut',
                data: {
                    labels: ['Zona Segura', 'Zona de Risco', 'Alerta Máximo', 'Limite Excedido'],
                    datasets: [{
                        data: [zonaSegura, zonaRisco, alertaMaximo, limiteExcedido],
                        backgroundColor: ['#c4f0b9', '#fff5b3', '#ffb3b3', '#a3a3a3'],
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: { legend: { display: false } },
                    cutout: '70%'
                }
            });
        }

        // ===================== GRÁFICO DE BARRAS EM CARDS =====================
        function atualizarGraficoCards() {
            const container = document.getElementById('graficoBarrasCustom');
            if (!container) return;

            container.innerHTML = '';
            const linhas = document.querySelectorAll('.linha-frequencia');

            linhas.forEach(linha => {
                const nome  = linha.dataset.nome;
                const faltas = parseInt(linha.querySelector('.valor')?.textContent || 0);
                const aulasPorDia = parseInt(linha.dataset.apd);
                const maxFaltas = parseInt(linha.dataset.max);
                const maxDias = Math.floor(maxFaltas / aulasPorDia);

                const perc = Math.min((faltas / maxDias) * 100, 100);

                let cor = '#c4f0b9';
                if (perc >= 85) cor = '#ffb3b3';
                else if (perc >= 66) cor = '#fff5b3';

                const bloco = document.createElement('div');
                bloco.className = 'barra-item';
                bloco.innerHTML = `
                    <div style="font-weight:600; font-size:0.9rem; margin-bottom:4px;">${nome}</div>
                    <div style="background:#ececec; border-radius:6px; height:10px; overflow:hidden;">
                        <div style="height:100%; width:${perc}%; background:${cor}; transition:width .3s ease;"></div>
                    </div>
                    <div style="font-size:0.75rem; margin-top:2px; color:#555;">${faltas} / ${maxDias} dias</div>
                `;
                container.appendChild(bloco);
            });
        }

        // Inicializa os gráficos na carga inicial
        atualizarGraficoPizza();
        atualizarGraficoCards();
    });
    </script>


</body>
</html>
