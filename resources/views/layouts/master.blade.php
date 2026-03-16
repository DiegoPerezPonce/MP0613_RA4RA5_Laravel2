<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Movies App')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto:wght@300;400;500;700&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --netflix-red: #E50914;
            --netflix-black: #141414;
            --netflix-dark-gray: #1a1a1a;
            --netflix-gray: #2f2f2f;
            --netflix-light-gray: #808080;
            --netflix-white: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: var(--netflix-black);
            color: var(--netflix-white);
            font-family: 'Roboto', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* HEADER NETFLIX STYLE */
        .netflix-header {
            background: linear-gradient(180deg, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0.7) 50%, transparent 100%);
            position: sticky;
            top: 0;
            z-index: 1000;
            padding: 1.5rem 0;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(229, 9, 20, 0.1);
        }

        .netflix-logo {
            font-family: 'Bebas Neue', cursive;
            font-size: 2.5rem;
            color: var(--netflix-red);
            font-weight: 700;
            letter-spacing: 2px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            transition: all 0.3s ease;
        }

        .netflix-logo:hover {
            transform: scale(1.05);
            text-shadow: 0 0 20px rgba(229, 9, 20, 0.6);
        }

        .logo-icon {
            width: 45px;
            height: 45px;
            border-radius: 8px;
            object-fit: cover;
            border: 2px solid var(--netflix-red);
            box-shadow: 0 0 15px rgba(229, 9, 20, 0.3);
        }

        /* MAIN CONTENT */
        main {
            flex: 1;
            padding: 2rem 0;
        }

        /* FOOTER */
        .netflix-footer {
            background: linear-gradient(0deg, var(--netflix-black) 0%, var(--netflix-dark-gray) 100%);
            border-top: 1px solid var(--netflix-gray);
            padding: 2rem 0;
            margin-top: 4rem;
        }

        .footer-content {
            color: var(--netflix-light-gray);
            font-size: 0.9rem;
        }

        .footer-links {
            display: flex;
            gap: 2rem;
            justify-content: center;
            margin-bottom: 1rem;
        }

        .footer-links a {
            color: var(--netflix-light-gray);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--netflix-white);
        }

        /* SMOOTH SCROLLBAR */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: var(--netflix-dark-gray);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--netflix-gray);
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--netflix-red);
        }

        /* ANIMATIONS */
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

        main {
            animation: fadeIn 0.6s ease-out;
        }
    </style>
</head>

<body>

    <!-- HEADER NETFLIX STYLE -->
    <header class="netflix-header">
        <div class="container">
            <div class="d-flex align-items-center">
                <img src="{{ asset('img/logoprueba2.jpg') }}" class="logo-icon" alt="Logo">
                <a href="/" class="netflix-logo text-decoration-none">Movies App</a>
            </div>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="container">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="netflix-footer">
        <div class="container">
            <div class="footer-content text-center">
                <p class="mb-0">© {{ date('Y') }} Movies App - Diego Augusto Pérez Ponce</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
