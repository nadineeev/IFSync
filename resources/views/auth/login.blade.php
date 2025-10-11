<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IFSync | Login</title>

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
            margin: 0;
            background-color: #0B2E5B;
            background-image: url("{{ asset('img/login-telafundo.png') }}");
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            font-family: 'Agrandir', system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
            color: #0a2a47;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .login-container {
            background-color: #FBF8F1;
            border-radius: 20px;
            padding: 50px 60px;
            width: 400px;
            max-width: 90vw;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
            text-align: center;
            animation: fadeIn 0.8s ease-in-out;
            display: flex;
            flex-direction: column;
            align-items: center;
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

        .login-container form {
            width: 100%;
            max-width: 380px;
            /* limita largura do conteúdo interno */
            display: flex;
            flex-direction: column;
            align-items: center;
            /* centraliza o formulário */
        }

        .logo {
            width: 250px;
            height: auto;
            margin-bottom: 30px;
        }

        h1 {
            color: #093E79;
            margin-bottom: 10px;
        }

        .input-group {
            width: 100%;
            text-align: left;
            margin-bottom: 20px;
        }

        .input-group label {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            /* espaço entre ícone e texto */
            font-size: 16px;
            color: #093E79;
            font-weight: 600;
            margin-bottom: 5px;
            transition: color 0.2s ease;
        }

        .input-group label i {
            font-size: 18px;
            color: #198754;
            /* verde do tema */
        }

        .input-group input:focus+label,
        .input-group input:hover+label {
            color: #198754;
        }

        .input-group input {
            width: 100%;
            padding: 12px 14px;
            border-radius: 8px;
            border: 2px solid #22A45D;
            outline: none;
            transition: border-color .2s ease, box-shadow .2s ease, background-color .2s ease;
            font-size: 14px;
            background: #fff;
            box-sizing: border-box;

        }

        .input-group input:hover {
            border-color: #22A45D;
            box-shadow: 0 0 0 3px rgba(34, 164, 93, 0.18);
            background: #fff;
            cursor: text;
        }

        .input-group input:focus {
            border-color: #198754;
            box-shadow: 0 0 0 3px rgba(34, 164, 93, 0.25);
        }

        .esqueceu-senha {
            width: 100%;
            display: flex;
            justify-content: flex-end;
            margin-top: 1px;
            margin-bottom: 20px;
        }

        .esqueceu-senha a {
            color: #0A4D92;
            font-size: 14px;
            text-decoration: none;
        }

        .esqueceu-senha a:hover {
            text-decoration: underline;
        }

        button {
            width: 76%;
            height: 48px;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #22A45D;
            color: #fff;
            border: none;
            border-radius: 10px;
            font-weight: 700;
            font-size: 22px;
            line-height: 1;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button:hover {
            background-color: #198754;
            transform: scale(1.03);
        }

        .register {
            margin-top: 15px;
            font-size: 14px;
            color: #333;
        }

        .register a {
            color: #F77B55;
            text-decoration: none;
            font-weight: 500;
        }

        .register a:hover {
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

    <a href="{{ route('landing') }}" class="back-button">
        <i class="ph ph-arrow-left"></i>
    </a>

    <div class="login-container">
        <img src="{{ asset('img/logo-ifsync.svg') }}" alt="Logo IFSync" class="logo">

        @if ($errors->any())
            <div style="color:red; margin-bottom:10px;">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <div class="input-group">
                <label for="usuario">
                    <i class="ph ph-user"></i>
                    E-mail
                </label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="input-group">
                <label for="senha">
                    <i class="ph ph-lock-key"></i>
                    Senha
                </label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="esqueceu-senha">
                <a href="#">Esqueceu a senha?</a>
            </div>

            <button type="submit">LOGIN</button>

            <p class="register">Não possui uma conta? <a href="#">Cadastre-se</a></p>
        </form>
    </div>

</body>

</html>