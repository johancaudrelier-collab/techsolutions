<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Accueil - techsolutions</title>
    <meta name="description" content="Page d'accueil de techsolutions" />
    <style>
        :root{
            --accent:#0b74de;
            --accent-2:#06b6d4;
            --muted:#6b7280;
            --bg:#f7fafc;
            --card-bg:#ffffff;
            --radius:12px;
            --shadow: 0 10px 30px rgba(11,116,222,0.06);
        }
        *{box-sizing:border-box}
        body{margin:0;font-family:Inter, system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial;background:linear-gradient(180deg,#fbfdff,var(--bg));color:#0f172a}
        header{background:rgba(255,255,255,0.9);backdrop-filter:blur(6px);border-bottom:1px solid rgba(15,23,42,0.04)}
        .container{max-width:1100px;margin:0 auto;padding:1rem}
        .brand{display:flex;align-items:center;gap:.75rem}
        img.site-logo{height:48px;width:auto;border-radius:8px;display:inline-block;object-fit:contain;background:#fff;padding:6px;box-shadow:0 10px 24px rgba(11,116,222,0.06);transition:transform .18s ease}
        .brand-link:hover img.site-logo{transform:translateY(-4px) scale(1.02)}
        nav{margin-left:auto}
        .nav-list{display:flex;gap:.5rem;list-style:none;margin:0;padding:0}
        .nav-list a{text-decoration:none;color:var(--muted);padding:.55rem .85rem;border-radius:10px;font-weight:600}
        .nav-list a:hover{background:linear-gradient(90deg, rgba(11,116,222,0.06), rgba(6,182,212,0.03));color:var(--accent)}
        .hero{display:grid;grid-template-columns:1fr;gap:1rem;padding:3.5rem 0;align-items:center}
        .hero h1{font-size:clamp(1.8rem,4vw,2.6rem);margin:0 0 .5rem;color:#07163a}
        .hero p{margin:0;color:var(--muted);max-width:60ch}
        .cta{margin-top:1rem;display:flex;gap:.75rem}
        .btn{background:linear-gradient(90deg,var(--accent),var(--accent-2));color:#fff;padding:.7rem 1.2rem;border-radius:12px;text-decoration:none;font-weight:700}
        .btn.secondary{background:#fff;color:var(--accent);border:1px solid rgba(11,116,222,0.08)}
        .features{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:1rem;margin-top:2rem}
        .card{background:var(--card-bg);border-radius:var(--radius);padding:1rem;box-shadow:var(--shadow)}
        footer{padding:1.25rem 0;text-align:center;color:var(--muted);font-size:.9rem;margin-top:2rem}
        @media(min-width:800px){
            .hero{grid-template-columns:1fr 380px}
            nav{margin-left:2rem}
        }
        @media(max-width:768px){
            header .container{padding:0.75rem}
        }
    </style>
</head>
<body>
    <header>
        <div class="container" style="display:flex;align-items:center;">
            <div class="brand">
                <img src="assets/images/logo.png" alt="techsolutions" class="site-logo" />
                <div>
                    <div style="font-weight:700">techsolutions</div>
                    <div style="font-size:.85rem;color:var(--muted);margin-top:2px">Solutions web et infra</div>
                </div>
            </div>
            <nav>
                <ul class="nav-list">
                        <li><a href="accueil1.php" class="active">Accueil</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Projets</a></li>
                        <li><a href="pagecontact2.php">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container">
        <section class="hero">
            <div>
                <h1>Des sites performants. Des solutions sur mesure.</h1>
                <p>Conception, développement et hébergement. Accompagnement technique complet pour entreprises et indépendants.</p>
                <div class="cta">
                    <a id="demande-devis" class="btn" href="pagecontact2.php">Demander un devis</a>
                    <a class="btn secondary" href="#">En savoir plus</a>
                </div>

                <div class="features" style="margin-top:1.5rem">
                    <article class="card">
                        <strong>Développement web</strong>
                        <p style="margin:.5rem 0 0;color:var(--muted)">Sites modernes, CMS, e‑commerce et webapps.</p>
                    </article>
                    <article class="card">
                        <strong>Hébergement & DevOps</strong>
                        <p style="margin:.5rem 0 0;color:var(--muted)">Infra sécurisée, sauvegardes et monitoring.</p>
                    </article>
                    <article class="card">
                        <strong>Support & Maintenance</strong>
                        <p style="margin:.5rem 0 0;color:var(--muted)">Contrats SLA et mises à jour régulières.</p>
                    </article>
                </div>
            </div>

            <aside class="card" style="align-self:start">
                <h3 style="margin-top:0">Contact rapide</h3>
                <p style="margin:.25rem 0;color:var(--muted)">Envoyez-nous un message et nous reviendrons sous 24h.</p>
                <form action="#" method="post" style="display:grid;gap:.5rem;margin-top:.5rem">
                    <input type="text" name="nom" placeholder="Nom" style="padding:.6rem;border-radius:6px;border:1px solid #e6eef6" />
                    <input type="email" name="email" placeholder="Email" style="padding:.6rem;border-radius:6px;border:1px solid #e6eef6" />
                    <button class="btn" type="submit" style="width:100%">Envoyer</button>
                </form>
            </aside>
        </section>
    </main>

    <footer>
        <div class="container">
            © <span id="year"></span> techsolutions — Tous droits réservés
        </div>
    </footer>

    <script>
        // petit script utile pour la page statique
        document.getElementById('year').textContent = new Date().getFullYear();
    </script>
</body>
</html>