@extends('app')


@section('title', 'Lorenzo – Portfolio')

@section('styles')
<style>
    /* ---------- Hero ---------- */
    .hero {
        position: relative;
        min-height: calc(100vh - 68px);
        display: grid;
        grid-template-columns: 1.1fr .9fr;
        align-items: center;
        gap: clamp(2rem, 6vw, 5rem);
        padding: clamp(2.5rem, 6vw, 4.5rem) clamp(1.25rem, 6vw, 5.5rem) clamp(7rem, 14vw, 10rem);
    }

    .hero-texte { position: relative; z-index: 1; }

    .eyebrow {
        font-size: .72rem;
        font-weight: 500;
        letter-spacing: .16em;
        text-transform: uppercase;
        color: var(--orange);
        margin-bottom: 1.4rem;
    }

    .hero h1 {
        font-size: clamp(2.6rem, 6.4vw, 5.2rem);
        font-weight: 800;
        line-height: 1.04;
        letter-spacing: -.045em;
        margin-bottom: 1.6rem;
    }

    .hero h1 .nom {
        background: linear-gradient(transparent 68%, rgba(217, 103, 43, .28) 68%, rgba(217, 103, 43, .28) 92%, transparent 92%);
        padding: 0 .08em;
    }

    .intro {
        max-width: 34rem;
        font-size: 1.05rem;
        line-height: 1.75;
        color: var(--texte);
        margin-bottom: 2rem;
    }

    .tags {
        display: flex;
        flex-wrap: wrap;
        gap: .5rem;
        list-style: none;
        margin-bottom: 2.25rem;
    }

    .tags li {
        font-size: .78rem;
        font-weight: 500;
        padding: .35rem .85rem;
        border: 1px solid var(--trait);
        border-radius: 999px;
        color: var(--sapin);
        background: rgba(255, 255, 255, .5);
    }

    .actions { display: flex; align-items: center; flex-wrap: wrap; gap: 1.5rem; }

    .balise {
        position: relative;
        display: inline-flex;
        align-items: center;
        padding: 1.05rem 3rem 1.05rem 1.6rem;
        background: var(--sapin);
        color: var(--fond);
        font-size: .95rem;
        font-weight: 700;
        text-decoration: none;
        clip-path: polygon(0 0, calc(100% - 24px) 0, 100% 50%, calc(100% - 24px) 100%, 0 100%);
        transition: transform .2s ease, background .2s ease;
    }

    .balise::after {
        content: "";
        position: absolute;
        right: 27px;
        top: 50%;
        width: 8px;
        height: 8px;
        margin-top: -4px;
        border-radius: 50%;
        background: var(--orange);
    }

    .balise:hover { background: var(--sapin-fonce); transform: translateX(4px); }
    .balise:focus-visible { background: var(--orange); color: var(--sapin-fonce); outline: none; }

    .lien {
        font-size: .88rem;
        font-weight: 500;
        text-decoration: none;
        border-bottom: 1.5px solid var(--sapin);
        padding-bottom: 2px;
    }

    .lien:hover { color: var(--orange); border-color: var(--orange); }

    /* ---------- Arche (photo ou paysage) ---------- */
    .hero-visuel {
        position: relative;
        z-index: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1rem;
    }

    .arche {
        width: min(100%, 360px);
        aspect-ratio: 4 / 5;
        border: 7px solid var(--sapin);
        border-radius: 999px 999px 22px 22px;
        overflow: hidden;
        background: var(--ciel);
    }

    .arche img,
    .arche svg { display: block; width: 100%; height: 100%; object-fit: cover; }

    .altitude {
        font-family: "Courier New", Courier, monospace;
        font-style: italic;
        font-size: .82rem;
        color: #9A7556;
    }

    /* ---------- Crêtes en fond ---------- */
    .crete {
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: clamp(110px, 17vw, 210px);
        pointer-events: none;
    }

    /* ---------- Apparition douce ---------- */
    .hero-texte > *,
    .hero-visuel { animation: fondu .9s ease both; }
    .hero-texte > :nth-child(2) { animation-delay: .08s; }
    .hero-texte > :nth-child(3) { animation-delay: .16s; }
    .hero-texte > :nth-child(4) { animation-delay: .24s; }
    .hero-texte > :nth-child(5) { animation-delay: .32s; }
    .hero-visuel { animation-delay: .2s; }

    @keyframes fondu {
        from { opacity: 0; transform: translateY(10px); }
        to   { opacity: 1; transform: none; }
    }

    @media (prefers-reduced-motion: reduce) {
        .hero-texte > *, .hero-visuel { animation: none; }
        .balise { transition: none; }
    }

    @media (max-width: 900px) {
        .hero { grid-template-columns: 1fr; min-height: auto; }
        .arche { width: min(100%, 300px); }
    }
</style>
@endsection

@section('content')
<section class="hero" id="accueil">

    <div class="hero-texte">
        <p class="eyebrow">Étape 01 · Le point de départ</p>

        <h1>Salut, moi c'est <span class="nom">Lorenzo</span>.</h1>

        <p class="intro">
            Étudiant en BTS SIO, je crée des sites web, des applications
            et je créer des jeux vidéos. Ce portfolio raconte mon parcours : mes missions d'AP,
            mes stages et mes projets perso.
        </p>

        <ul class="tags" aria-label="Domaines">
            <li>Tailwind CSS</li>
            <li>C#</li>
            <li>Flutter</li>
            <li>Laravel</li>
            <li>React</li>
        </ul>

        <div class="actions">
            <a class="balise" href="#projets">Voir mes projets</a>
            <a class="lien" href="#a-propos">En savoir plus</a>
        </div>
    </div>

    <div class="hero-visuel">
        <div class="arche">
            @if (file_exists(public_path('images/lorenzo.jpg')))
                <img src="{{ asset('images/lorenzo.jpg') }}" alt="Portrait de Lorenzo">
            @else
                {{-- Paysage de remplacement tant qu'il n'y a pas de photo dans public/images/lorenzo.jpg --}}
                <svg viewBox="0 0 380 475" preserveAspectRatio="xMidYMid slice" role="img" aria-label="Paysage de montagne au lever du soleil">
                    <rect width="380" height="475" fill="#F0DFC4"/>
                    <circle cx="245" cy="175" r="42" fill="#D9672B"/>
                    <polygon points="0,330 90,230 150,290 250,190 380,320 380,475 0,475" fill="#6B8F71"/>
                    <polygon points="0,400 110,330 200,380 290,325 380,375 380,475 0,475" fill="#243F34"/>
                    <polygon points="36,360 50,396 22,396" fill="#17291F"/>
                    <polygon points="62,372 74,402 50,402" fill="#17291F"/>
                    <path d="M120 472 C150 440 110 420 170 402 S240 392 262 352" fill="none" stroke="#F7F3EB" stroke-width="3" stroke-dasharray="8 8" stroke-linecap="round" opacity=".85"/>
                </svg>
            @endif
        </div>
        <p class="altitude">Altitude : 0 m. Tout commence ici.</p>
    </div>

    <svg class="crete" viewBox="0 0 1440 210" preserveAspectRatio="none" aria-hidden="true">
        <polygon fill="#6B8F71" fill-opacity=".14" points="0,210 0,130 160,70 270,115 440,25 590,110 730,60 870,120 1020,35 1180,115 1300,70 1440,125 1440,210"/>
        <polygon fill="#243F34" fill-opacity=".1" points="0,210 0,172 230,132 390,160 610,118 830,164 1050,128 1260,166 1440,140 1440,210"/>
    </svg>

</section>
@endsection