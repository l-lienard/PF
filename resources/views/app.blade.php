<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Lorenzo – Portfolio')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --fond: #F7F3EB;
            --bandeau: #F2EADC;
            --sapin: #243F34;
            --sapin-fonce: #17291F;
            --mousse: #6B8F71;
            --orange: #D9672B;
            --ciel: #F0DFC4;
            --texte: #5F6258;
            --trait: #DDD5C5;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }

        body {
            font-family: "Inter", "Helvetica Neue", Arial, sans-serif;
            background: var(--fond);
            color: var(--sapin);
            overflow-x: hidden;
        }

        a { color: inherit; }
        a:focus-visible { outline: 3px solid var(--orange); outline-offset: 4px; }

        /* ---------- Navigation ---------- */
        .nav {
            position: sticky;
            top: 0;
            z-index: 10;
            height: 68px;
            padding: 0 clamp(1.25rem, 5vw, 4rem);
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(242, 234, 220, .92);
            backdrop-filter: blur(6px);
            border-bottom: 1px solid var(--trait);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: .6rem;
            text-decoration: none;
            font-size: .82rem;
            font-weight: 500;
            letter-spacing: .18em;
            text-transform: uppercase;
        }

        .nav ul { display: flex; gap: clamp(1rem, 3vw, 2.25rem); list-style: none; }
        .nav ul a { font-size: .8rem; font-weight: 700; text-decoration: none; }
        .nav ul a:hover { color: var(--orange); }

        @media (max-width: 640px) {
            .nav ul { display: none; }
        }
    </style>
    @yield('styles')
</head>
<body>

    <header class="nav">
        <a class="logo" href="{{ url('/') }}">
            <svg width="16" height="18" viewBox="0 0 16 18" fill="none" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round" aria-hidden="true">
                <path d="M8 1 4.2 6.2h2L3 10.6h2.6L2 15.5h12l-3.6-4.9H13L9.8 6.2h2L8 1Z"/>
                <path d="M8 15.5V17.5"/>
            </svg>
            Lorenzo
        </a>
        <nav aria-label="Navigation principale">
            <ul>
                <li><a href="{{ url('/') }}#a-propos">À propos</a></li>
                <li><a href="{{ url('/') }}#missions-ap">Missions AP</a></li>
                <li><a href="{{ url('/') }}#stages">Stages</a></li>
                <li><a href="{{ url('/') }}#projets">Projets</a></li>
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

</body>
</html>