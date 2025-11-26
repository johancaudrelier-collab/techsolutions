<?php
session_start();

// Traitement du formulaire
$message_success = '';
$message_error = '';

// Détection automatique du logo : cherche dans plusieurs emplacements et choisit le premier existant
$logo_candidates = [
    'assets/image/logo.png',
    'assets/images/logo.png',
    'assets/images/logo.svg',
    'assets/image/logo.svg'
];
$logoPath = '';
foreach ($logo_candidates as $candidate) {
    if (file_exists(__DIR__ . '/' . $candidate)) {
        $logoPath = $candidate;
        break;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération et nettoyage des données
    $nom = trim($_POST['nom'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $telephone = trim($_POST['telephone'] ?? '');
    $objet = trim($_POST['objet'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // Validation
    $errors = [];

    if (empty($nom)) {
        $errors[] = "Le nom est obligatoire";
    }

    if (empty($email)) {
        $errors[] = "L'email est obligatoire";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "L'email n'est pas valide";
    }

    if (empty($objet)) {
        $errors[] = "L'objet est obligatoire";
    }

    if (empty($message)) {
        $errors[] = "Le message est obligatoire";
    } elseif (strlen($message) < 10) {
        $errors[] = "Le message doit contenir au moins 10 caractères";
    }

    if (empty($errors)) {
    // Envoi de l'email
    $destinataire = 'contact@techsolutions.com'; // À modifier avec votre email
        $sujet = 'Nouveau message de contact: ' . htmlspecialchars($objet);
        
        $corps = "Vous avez reçu un nouveau message de contact:\n\n";

        $corps .= "Nom: " . htmlspecialchars($nom) . "\n";
        $corps .= "Email: " . htmlspecialchars($email) . "\n";
        $corps .= "Téléphone: " . htmlspecialchars($telephone) . "\n";
        $corps .= "Objet: " . htmlspecialchars($objet) . "\n";
        $corps .= "Message:\n" . htmlspecialchars($message) . "\n";

        $headers = "From: " . htmlspecialchars($email) . "\r\n";
        $headers .= "Reply-To: " . htmlspecialchars($email) . "\r\n";
        $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

        if (mail($destinataire, $sujet, $corps, $headers)) {
            $message_success = "Merci ! Votre message a été envoyé avec succès. Nous vous répondrons sous 24h.";
            // Réinitialiser le formulaire
            $_POST = [];
        } else {
            $message_error = "Erreur lors de l'envoi du message. Veuillez réessayer plus tard.";
        }
    } else {
        $message_error = implode("<br>", $errors);
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Contact - techsolutions</title>
    <meta name="description" content="Nous contacter - techsolutions" />
    <style>
        /* Modernisation du design : typographie, couleurs, ombres et interactions */
        :root{
            --accent:#0b74de;
            --accent-2:#06b6d4;
            --muted:#6b7280;
            --bg:#f7fafc;
            --card-bg:#ffffff;
            --radius:12px;
            --shadow: 0 10px 30px rgba(11,116,222,0.06);
        }

        /* Font stack moderne */
        @media (min-width:0px){
            html { -webkit-font-smoothing:antialiased; -moz-osx-font-smoothing:grayscale; }
        }

        *{box-sizing:border-box}
        body{margin:0;font-family:Inter, system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial;line-height:1.45;background:linear-gradient(180deg,#fbfdff,var(--bg));color:#0f172a}

        header{background:rgba(255,255,255,0.85);backdrop-filter:blur(6px);border-bottom:1px solid rgba(15,23,42,0.04)}
        .container{max-width:1100px;margin:0 auto;padding:1rem}
        .brand{display:flex;align-items:center;gap:.75rem}

        img.site-logo{height:48px;width:auto;border-radius:8px;display:inline-block;object-fit:contain;background:#fff;padding:6px;box-shadow:0 10px 24px rgba(11,116,222,0.06);transition:transform .18s ease,box-shadow .18s}
        .brand-link:hover img.site-logo{transform:translateY(-4px) scale(1.02);box-shadow:0 18px 40px rgba(11,116,222,0.10)}

        nav{margin-left:auto}
        .nav-list{display:flex;gap:.5rem;list-style:none;margin:0;padding:0}
        .nav-list a{text-decoration:none;color:var(--muted);padding:.55rem .85rem;border-radius:10px;font-weight:600;transition:all .18s ease}
        .nav-list a:hover{background:linear-gradient(90deg, rgba(11,116,222,0.06), rgba(6,182,212,0.03));color:var(--accent);transform:translateY(-3px)}
        .nav-list a.active{color:var(--accent);background:linear-gradient(90deg, rgba(11,116,222,0.08), rgba(6,182,212,0.03));}

        .hero{display:grid;grid-template-columns:1fr;gap:1rem;padding:3.5rem 0;align-items:center}
        .hero h1{font-size:clamp(1.8rem,4vw,2.8rem);margin:0 0 .5rem;color:#07163a}
        .hero p{margin:0;color:var(--muted);max-width:60ch}

        .cta{margin-top:1rem;display:flex;gap:.75rem;flex-wrap:wrap}
        .btn{background:linear-gradient(90deg,var(--accent),var(--accent-2));color:#fff;padding:.7rem 1.2rem;border-radius:12px;text-decoration:none;font-weight:700;border:none;cursor:pointer;box-shadow:0 12px 30px rgba(11,116,222,0.10);transition:transform .14s ease,box-shadow .14s}
        .btn.secondary{background:#fff;color:var(--accent);border:1px solid rgba(11,116,222,0.08);box-shadow:none}
        .btn:hover{transform:translateY(-4px);box-shadow:0 20px 40px rgba(11,116,222,0.12)}

        .contact-section{display:grid;grid-template-columns:1fr 1fr;gap:2rem;padding:2rem 0}
        .card{background:var(--card-bg);border-radius:var(--radius);padding:1.5rem;border:none;box-shadow:var(--shadow)}
        .card h2{margin-top:0;color:#07163a;font-size:1.25rem}

        .form-group{margin-bottom:1rem}
        label{display:block;margin-bottom:.4rem;font-weight:600;color:#07163a;font-size:.95rem}
        input,textarea{width:100%;padding:.7rem;border-radius:10px;border:1px solid #e6eef6;font-family:inherit;font-size:.95rem;transition:box-shadow .14s,border-color .14s}
        input:focus,textarea:focus{outline:none;border-color:var(--accent);box-shadow:0 6px 20px rgba(11,116,222,0.08)}
        textarea{resize:vertical;min-height:140px}
        .required{color:#dc2626}

        .alert{padding:1rem;border-radius:8px;margin-bottom:1rem;border-left:4px solid}
        .alert-success{background:#dff8ef;border-color:#10b981;color:#065f46}
        .alert-error{background:#fff0f0;border-color:#ef4444;color:#7f1d1d}

        .contact-info{display:grid;gap:1.5rem;margin-top:1rem}
        .info-item{display:flex;gap:1rem;align-items:flex-start}
        .info-icon{width:44px;height:44px;background:linear-gradient(135deg,var(--accent),var(--accent-2));border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;font-size:1.2rem;flex-shrink:0}
        .info-content h3{margin:0;font-size:.95rem;color:#07163a}
        .info-content p{margin:.25rem 0 0;color:var(--muted);font-size:.9rem}
        .info-content a{color:var(--accent);text-decoration:none}
        .info-content a:hover{text-decoration:underline}

        footer{padding:1.25rem 0;text-align:center;color:var(--muted);font-size:.9rem;margin-top:2rem}

        @media(min-width:800px){
            header .container{display:flex;align-items:center}
            nav{margin-left:2rem}
        }
        @media(max-width:768px){
            .contact-section{grid-template-columns:1fr}
            .cta{flex-direction:column}
            .btn{width:100%}
            .nav-list{gap:.25rem}
            header .container{padding:0.75rem}
        }
    </style>
</head>
<body>
    <header>
        <div class="container" style="display:flex;align-items:center;">
            <div class="brand">
                <!-- Logo external : on essaie assets/image/logo.png puis fallback assets/images/logo.png via onerror -->
                <a href="accueil1.php" class="brand-link" title="Aller à l'accueil" style="display:flex;align-items:center;text-decoration:none;color:inherit;gap:.5rem">
                    <?php if (!empty($logoPath)): ?>
                        <img src="<?php echo htmlspecialchars($logoPath, ENT_QUOTES, 'UTF-8'); ?>" alt="techsolutions" class="site-logo" />
                    <?php else: ?>
                        <!-- Fallback inline SVG si aucun fichier logo n'existe -->
                        <svg class="site-logo" width="50" height="50" viewBox="0 0 240 80" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="techsolutions">
                            <defs>
                                <linearGradient id="g_fallback" x1="0" x2="1">
                                    <stop offset="0" stop-color="#0b74de"/>
                                    <stop offset="1" stop-color="#06b6d4"/>
                                </linearGradient>
                            </defs>
                            <rect width="240" height="80" rx="12" fill="#ffffff" />
                            <rect x="8" y="8" width="64" height="64" rx="10" fill="url(#g_fallback)" />
                        </svg>
                    <?php endif; ?>
                    <div style="margin-left:0.25rem">
                        <div style="font-weight:700">techsolutions</div>
                        <div style="font-size:.85rem;color:var(--muted);margin-top:2px">Solutions web et infra</div>
                    </div>
                </a>
            </div>
            <nav>
                <ul class="nav-list">
                    <li><a href="accueil1.php">Accueil</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Projets</a></li>
                    <li><a href="pagecontact2.php" class="active">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container">
        <section class="hero">
            <div>
                <h1>Nous contacter</h1>
                <p>Vous avez une question ou besoin d'un devis ? Envoyez-nous un message et nous vous répondrons sous 24h.</p>
            </div>
        </section>

        <?php if (!empty($message_success)): ?>
            <div class="alert alert-success">
                ✓ <?php echo $message_success; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($message_error)): ?>
            <div class="alert alert-error">
                ✕ <?php echo $message_error; ?>
            </div>
        <?php endif; ?>

        <section class="contact-section">
            <!-- Formulaire -->
            <div class="card">
                <h2>Envoyez-nous un message</h2>
                <form method="POST">
                    <div class="form-group">
                        <label for="nom">Nom complet <span class="required">*</span></label>
                        <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($_POST['nom'] ?? ''); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email <span class="required">*</span></label>
                        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="telephone">Téléphone</label>
                        <input type="tel" id="telephone" name="telephone" value="<?php echo htmlspecialchars($_POST['telephone'] ?? ''); ?>">
                    </div>

                    <div class="form-group">
                        <label for="objet">Objet <span class="required">*</span></label>
                        <input type="text" id="objet" name="objet" value="<?php echo htmlspecialchars($_POST['objet'] ?? ''); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="message">Message <span class="required">*</span></label>
                        <textarea id="message" name="message" required><?php echo htmlspecialchars($_POST['message'] ?? ''); ?></textarea>
                    </div>

                    <button type="submit" class="btn">Envoyer le message</button>
                </form>
            </div>

            <!-- Infos contact -->
            <div class="card">
                <h2>Informations</h2>
                <div class="contact-info">
                    <div class="info-item">
                        <div class="info-icon">📍</div>
                        <div class="info-content">
                            <h3>Adresse</h3>
                            <p>123 Rue de la Paix<br>75000 Paris, France</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">📞</div>
                        <div class="info-content">
                            <h3>Téléphone</h3>
                            <p><a href="tel:+33123456789">+33 1 23 45 67 89</a></p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">✉️</div>
                        <div class="info-content">
                            <h3>Email</h3>
                                <p><a href="mailto:contact@techsolutions.com">contact@techsolutions.com</a></p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">🕐</div>
                        <div class="info-content">
                            <h3>Horaires</h3>
                            <p>Lundi - Vendredi: 9h00 - 18h00<br>Samedi - Dimanche: Fermé</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            © <span id="year"></span> techsolutions — Tous droits réservés
        </div>
    </footer>

    <script>
        document.getElementById('year').textContent = new Date().getFullYear();
    </script>
</body>
</html>