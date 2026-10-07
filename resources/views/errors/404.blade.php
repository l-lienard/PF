<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 – Page introuvable</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --fond: #F7F3EB;
            --sapin: #243F34;
            --sapin-fonce: #17291F;
            --mousse: #6B8F71;
            --orange: #D9672B;
            --ciel: #F0DFC4;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            min-height: 100vh;
            font-family: "Inter", "Helvetica Neue", Arial, sans-serif;
            background: var(--fond);
            color: var(--sapin);
            overflow: hidden;
        }

        main {
            position: relative;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: clamp(1.75rem, 5vw, 3rem);
            padding: 2rem 1.25rem clamp(6rem, 16vw, 11rem);
        }

        /* ---------- Le 404, avec un "0" qui est une fenêtre sur la montagne ---------- */
        h1 {
            position: relative;
            z-index: 1;
            font-size: clamp(6.5rem, 26vw, 17rem);
            font-weight: 800;
            line-height: 1;
            letter-spacing: -.06em;
            display: flex;
            align-items: baseline;
            justify-content: center;
        }

        h1 svg {
            height: .76em;
            width: auto;
            margin: 0 .035em;
            overflow: visible;
        }

        .soleil { animation: lever 2s cubic-bezier(.2, .7, .2, 1) .25s both; }

        @keyframes lever {
            from { transform: translateY(52px); }
            to   { transform: translateY(0); }
        }

        /* ---------- Bouton en forme de panneau de balisage ---------- */
        .balise {
            position: relative;
            z-index: 1;
            display: inline-flex;
            align-items: center;
            padding: 1.1rem 1.75rem 1.1rem 3.1rem;
            background: var(--sapin);
            color: var(--fond);
            font-size: 1rem;
            font-weight: 700;
            text-decoration: none;
            clip-path: polygon(0 50%, 24px 0, 100% 0, 100% 100%, 24px 100%);
            transition: transform .2s ease, background .2s ease;
        }

        .balise::before {
            content: "";
            position: absolute;
            left: 27px;
            top: 50%;
            width: 8px;
            height: 8px;
            margin-top: -4px;
            border-radius: 50%;
            background: var(--orange);
        }

        .balise:hover { background: var(--sapin-fonce); transform: translateX(-5px); }

        /* le contour est coupé par le clip-path : on change la couleur à la place */
        .balise:focus-visible { background: var(--orange); color: var(--sapin-fonce); outline: none; }

        /* ---------- Montagnes pleines en bas ---------- */
        .crete {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: clamp(120px, 20vw, 230px);
            pointer-events: none;
        }

        @media (prefers-reduced-motion: reduce) {
            .soleil { animation: none; }
            .balise { transition: none; }
        }
    </style>
</head>
<body>

    <main>
        <h1 aria-label="Erreur 404">
            <span aria-hidden="true">4</span>
            <svg viewBox="0 0 100 130" role="img" aria-hidden="true">
                <defs>
                    <clipPath id="fenetre">
                        <ellipse cx="50" cy="65" rx="44" ry="58"/>
                    </clipPath>
                </defs>
                <g clip-path="url(#fenetre)">
                    <rect width="100" height="130" fill="#F0DFC4"/>
                    <circle class="soleil" cx="52" cy="58" r="18" fill="#D9672B"/>
                    <polygon points="0,102 26,66 46,90 70,52 100,96 100,130 0,130" fill="#6B8F71"/>
                    <polygon points="0,118 34,92 60,110 82,94 100,112 100,130 0,130" fill="#243F34"/>
                </g>
                <ellipse cx="50" cy="65" rx="44" ry="58" fill="none" stroke="#243F34" stroke-width="11"/>
            </svg>
            <span aria-hidden="true">4</span>
        </h1>

        <a class="balise" href="{{ route('index') }}">Retour à l'accueil</a>

        <svg class="crete" viewBox="0 0 1440 230" preserveAspectRatio="none" aria-hidden="true">
            <polygon fill="#6B8F71" fill-opacity=".16" points="0,230 0,140 150,70 260,120 430,20 580,115 720,60 860,125 1010,35 1170,120 1290,70 1440,130 1440,230"/>
            <polygon fill="#243F34" fill-opacity=".14" points="0,230 0,185 220,140 380,172 600,125 820,175 1040,135 1250,178 1440,150 1440,230"/>
        </svg>
    </main>

</body>
</html>