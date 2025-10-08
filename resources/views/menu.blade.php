<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IFSync | Menu</title>
    <link rel="icon" href="{{ asset('favicons/favicon.ico') }}" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a2e0f1f2c3.js" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            background-color: #f7f9f8;
            display: flex;
            height: 100vh;
        }

        /* === SIDEBAR === */
        .sidebar {
            width: 220px;
            background-color: #ffffff;
            border-right: 1px solid #e0e0e0;
            padding: 30px 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 30px;
        }

        .logo img {
            width: 30px;
        }

        .logo h2 {
            font-size: 18px;
            color: #004d40;
            font-weight: 700;
            margin: 0;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #004d40;
            text-decoration: none;
            margin: 12px 0;
            font-weight: 500;
            transition: 0.2s;
        }

        .menu-item:hover {
            color: #00bfa5;
        }

        .logout-btn {
            background: none;
            border: none;
            color: #d32f2f;
            font-weight: bold;
            font-size: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .logout-btn:hover {
            color: #b71c1c;
        }

        /* === MAIN (apenas placeholder) === */
        .main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #004d40;
        }
    </style>
</head>
<body>

    {{-- SIDEBAR --}}
    <div class="sidebar">
        <div>
            <div class="logo">
                <img src="{{ asset('logo-ifsync.svg') }}" alt="IFSync Logo">
                <h2>IFSync</h2>
            </div>

            <a href="#" class="menu-item"><i class="fas fa-calendar-alt"></i> Agenda</a>
            <a href="#" class="menu-item"><i class="fas fa-table"></i> Grade</a>
            <a href="#" class="menu-item"><i class="fas fa-check-circle"></i> Notas</a>
            <a href="#" class="menu-item"><i class="fas fa-user-check"></i> Frequência</a>
        </div>

        {{-- BOTÃO DE LOGOUT --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>

    {{-- MAIN (vazio por enquanto) --}}
    <div class="main">
        <h2>Bem-vindo(a), {{ auth()->user()->name }}! 🌿</h2>
    </div>

</body>
</html>
