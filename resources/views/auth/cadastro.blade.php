<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IFSync | Cadastro</title>

    <link rel="preload" href="{{ asset('fonts/agrandir/Agrandir-Regular.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('fonts/agrandir/Agrandir-Bold.woff2') }}" as="font" type="font/woff2" crossorigin>

    <link rel="icon" href="{{ asset('favicons/favicon.svg') }}" type="image/svg+xml">
    <link rel="alternate icon" href="{{ asset('favicons/favicon.ico') }}" sizes="any">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicons/apple-touch-icon.png') }}">
    <link rel="mask-icon" href="{{ asset('favicons/favicon.svg') }}" color="#111111">
    <link rel="manifest" href="{{ asset('favicons/site.webmanifest') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <meta name="theme-color" content="#ffffff">

    <style>
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

        :root {
            --bg-principal: #f6f1e6;
            --bg-container: #fdf9ee;
            --texto-principal: #0a315b;
            --texto-alternativo: #582e26;
            --link-selecionado: #31934b;
            --campos-form: #5e90ba;
            --texto-destaque: #ffa361;
        }

        body {
            margin: 0;
            background-color: #31934b;
            background-image: url("{{ asset('img/cadastro-telafundo.png') }}");
            background-size: contain;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            font-family: 'Agrandir', system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
            color: var(--texto-principal);
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .cadastro-container {
            font-family: inherit;
            background-color: var(--bg-container);
            border-radius: 20px;
            padding: 10px;
            width: 900px;
            max-width: 90vw;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
            text-align: center;
            animation: fadeIn 0.8s ease-in-out;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-around;
            flex-wrap: wrap;
            height: 536px;
            max-height: 90vh;
            overflow: auto;
            overflow-x: hidden;
        }

        .texto-container {
            text-align: left;
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100%;
            flex-wrap: wrap;
        }

        .img-cadastro {
            width: 300px;
            max-width: 90%;
            height: auto;
            margin: 10px 10px 0 10px;
        }

        .icons {
            margin: 1px 1px 1px 0;
        }

        .texto,
        .termos, .texto-destaque {
            color: var(--texto-alternativo);
            margin: 0;
        }

        .titulo {
            margin: 0;
            font-size: 40px;
            font-weight: 700;
        }

        .logo {
            width: 250px;
            height: auto;
            margin-bottom: 10px;
        }

        .cadastro-container form {
            user-select: none;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            flex-wrap: wrap;
        }

        .form-floating {
            width: 100%;
            gap: 0px;
        }

        .form-floating label {
            margin: 1px;
            color: var(--texto-principal);
        }

        .form-floating input {
            border: 3px solid var(--campos-form);
            border-radius: 20px;
            background-color: transparent;
            margin-bottom: 10px;
            font-size: 13px;
        }


        .form-floating input:hover+.form-floating input:focus {
            border-color: #326792ff;
            background-color: transparent;
        }

        .termos {
            font-size: 12px;
            margin-left: 5px;
            padding: 0;
            cursor: pointer;
        }

        .texto-destaque {
            font-weight: 600;
            color: var(--texto-destaque);
        }

        .form-grupo {
            display: flex;
            align-items: flex-start;
            justify-content: stretch;
        }

        button {
            width: 70%;
            height: 48px;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--campos-form);
            color: #fff;
            border: none;
            border-radius: 10px;
            font-weight: 700;
            font-size: 22px;
            line-height: 1;
            cursor: pointer;
            transition: all 0.3s ease;
            margin: 15px;
        }

        button:hover {
            background-color: #326792ff;
            transform: scale(1.03);
        }

        .login {
            font-size: 14px;
            color: var(--texto-alternativo);
        }

        .login a {
            color: var(--link-selecionado);
            text-decoration: none;
            font-weight: 500;
        }

        .login a:hover {
            text-decoration: underline;
        }

        .back-button {
            position: absolute;
            top: 25px;
            left: 25px;
            background-color: transparent;
            border: 2px solid #ffffff;
            color: #ffffff;
            border-radius: 50%;
            width: 48px;
            height: 48px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .back-button i {
            font-size: 22px;
            color: #ffffff;
            transition: transform 0.3s ease;
        }

        .back-button:hover {
            background-color: rgba(255, 255, 255, 0.1);
            transform: scale(1.05);
        }

        .back-button,
        .back-button:link,
        .back-button:visited,
        .back-button:hover,
        .back-button:focus,
        .back-button:active {
            text-decoration: none !important;
            outline: none;
        }

        .back-button i {
            line-height: 1;
            pointer-events: none;
        }
    </style>

    <script src="https://unpkg.com/@phosphor-icons/web"></script>

</head>

<body>

    <a href="{{ route('home') }}" class="back-button">
        <i class="ph ph-arrow-left"></i>
    </a>

    <div class="cadastro-container">
        <div class="texto-container">
            <p class="titulo">Cadastre-se</p>
            <p class="texto">O sucesso acadêmico começa com a<br>organização</p>
            <img src="{{ asset('img/img-formcadastro.png') }}" alt="Ilustração de uma mulher escrevendo em um telefone com um relógio ao lado" class="img-cadastro">
        </div>
        <div>
            <img src="{{ asset('img/logo-ifsync.svg') }}" alt="Logo IFSync" class="logo">

            <form method="POST" action="{{ route('register.post') }}">
                @csrf

                <div class="form-floating">
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Nome Completo" required>
                    <label for="name">
                        <i class="icons ph ph-user"></i>
                        Nome completo
                    </label>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-floating">
                            <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="E-mail" required>
                            <label for="email">
                                <i class="icons ph ph-at"></i>
                                E-mail
                            </label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="telefone" id="telefone" value="{{ old('telefone') }}" placeholder="Telefone" required>
                            <label for="telefone">
                                <i class="icons ph ph-phone"></i>
                                Telefone
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Senha" required>
                    <label for="password">
                        <i class="icons ph ph-lock-key"></i>
                        Senha
                    </label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirmar senha" required>
                    <label for="confirm_password">
                        <i class="icons ph ph-lock-key"></i>
                        Confirmar senha
                    </label>
                </div>
                <div class="form-grupo">
                    <input type="checkbox" id="termos" name="termos" style="cursor: pointer;" required>
                    <label for="termos" class="termos">Concordo com todos os <span class="texto-destaque">Termos</span> e <span class="texto-destaque">Política de Privacidade</span></label>
                </div>
                <button type="submit">CRIAR CONTA</button>
            </form>

            <p class="login">Já tem uma conta? <a href="{{ route('login') }}">LOGIN</a></p>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>