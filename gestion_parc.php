<?php
session_start();

// ---------- AUTHENTIFICATION SIMPLE ----------
// Login / mot de passe demandés : 'utilisateur' / 'utilisateur'
$auth_user = 'utilisateur';
$auth_pass = 'utilisateur';

// logout
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    unset($_SESSION['auth']);
    session_regenerate_id(true);
    header('Location: gestion_parc.php');
    exit;
}

// login handling
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'login') {
    $u = trim($_POST['username'] ?? '');
    $p = trim($_POST['password'] ?? '');
    if ($u === $auth_user && $p === $auth_pass) {
        $_SESSION['auth'] = true;
        session_regenerate_id(true);
        header('Location: gestion_parc.php');
        exit;
    } else {
        $login_error = 'Identifiants incorrects.';
    }
}

// If not authenticated, show login form and stop
if (empty($_SESSION['auth'])) {
    ?>
    <!doctype html>
    <html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <title>Connexion - Gestion de parc</title>
        <style>
            body{font-family:Inter, system-ui, -apple-system, 'Segoe UI', Roboto, Arial;background:#f7fafc;display:flex;align-items:center;justify-content:center;height:100vh;margin:0}
            .box{background:#fff;padding:2rem;border-radius:12px;box-shadow:0 12px 40px rgba(11,116,222,0.08);width:360px}
            input{width:100%;padding:.6rem;margin-top:.5rem;border-radius:8px;border:1px solid #e6eef6}
            .btn{display:inline-block;padding:.6rem .9rem;border-radius:10px;background:linear-gradient(90deg,#0b74de,#06b6d4);color:#fff;text-decoration:none;border:none;cursor:pointer;margin-top:.75rem}
            .error{background:#fff0f0;color:#7f1d1d;padding:.6rem;border-radius:8px;margin-bottom:.6rem}
        </style>
    </head>
    <body>
        <div class="box">
            <h3 style="margin-top:0">Connexion — Gestion de parc</h3>
            <?php if (!empty(
                $login_error
            )): ?>
                <div class="error"><?php echo htmlspecialchars($login_error); ?></div>
            <?php endif; ?>
            <form method="POST">
                <input type="hidden" name="action" value="login">
                <label>Login<input name="username" value="" required></label>
                <label>Mot de passe<input name="password" type="password" required></label>
                <div style="text-align:right"><button class="btn" type="submit">Se connecter</button></div>
            </form>
        </div>
    </body>
    </html>
    <?php
    exit;
}

// Emplacement du fichier de données
$dataFile = __DIR__ . '/assets/data/pcs.json';

// Helpers
function load_pcs($file) {
    if (!file_exists($file)) return [];
    $json = file_get_contents($file);
    $data = json_decode($json, true);
    return is_array($data) ? $data : [];
}

function save_pcs($file, $arr) {
    file_put_contents($file, json_encode(array_values($arr), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), LOCK_EX);
}

$pcs = load_pcs($dataFile);

// Add PC (simple server-side validation)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add') {
    $name = trim($_POST['name'] ?? '');
    $ip = trim($_POST['ip'] ?? '');
    $os = trim($_POST['os'] ?? '');
    $user = trim($_POST['user'] ?? '');
    $location = trim($_POST['location'] ?? '');
    $status = trim($_POST['status'] ?? 'Actif');

    $errors = [];
    if ($name === '') $errors[] = 'Le nom est requis.';
    if ($ip === '') $errors[] = 'L\'IP est requise.';

    if (empty($errors)) {
        $ids = array_column($pcs, 'id');
        $nextId = $ids ? max($ids) + 1 : 1;
        $pcs[] = [
            'id' => $nextId,
            'name' => $name,
            'ip' => $ip,
            'os' => $os,
            'user' => $user,
            'location' => $location,
            'status' => $status
        ];
        save_pcs($dataFile, $pcs);
        $_SESSION['flash_success'] = 'PC ajouté.';
        header('Location: gestion_parc.php');
        exit;
    } else {
        $_SESSION['flash_error'] = implode('<br>', $errors);
        header('Location: gestion_parc.php');
        exit;
    }
}

// Delete
if (isset($_GET['delete'])) {
    $delId = (int)$_GET['delete'];
    $new = [];
    foreach ($pcs as $p) {
        if ((int)$p['id'] !== $delId) $new[] = $p;
    }
    save_pcs($dataFile, $new);
    $_SESSION['flash_success'] = 'PC supprimé.';
    header('Location: gestion_parc.php');
    exit;
}

// Load again for display
$pcs = load_pcs($dataFile);
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Gestion de parc - techsolutions</title>
    <style>
        body{font-family:Inter, system-ui, -apple-system, 'Segoe UI', Roboto, Arial;margin:0;background:#f7fafc;color:#07163a}
        .container{max-width:1100px;margin:2rem auto;padding:1rem}
        table{width:100%;border-collapse:collapse;background:#fff;border-radius:10px;overflow:hidden;box-shadow:0 8px 18px rgba(11,116,222,0.06)}
        th,td{padding:.7rem;text-align:left;border-bottom:1px solid #eef2f6}
        thead th{background:#f8fafc;font-weight:700}
        .top{display:flex;justify-content:space-between;align-items:center;margin-bottom:1rem;gap:1rem}
        .card{background:#fff;border-radius:10px;padding:1rem;box-shadow:0 6px 20px rgba(11,116,222,0.06)}
        .btn{display:inline-block;padding:.6rem .9rem;border-radius:10px;background:linear-gradient(90deg,#0b74de,#06b6d4);color:#fff;text-decoration:none}
        form.grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:.5rem}
        input,select{padding:.5rem;border-radius:8px;border:1px solid #e6eef6}
        .muted{color:#6b7280}
        .flash{padding:.7rem;border-radius:8px;margin-bottom:1rem}
        .flash.success{background:#dff8ef;color:#065f46}
        .flash.error{background:#fff0f0;color:#7f1d1d}
    </style>
</head>
<body>
    <div class="container">
        <div class="top">
            <h2>Gestion de parc — PC de techsolutions</h2>
            <a class="btn" href="accueil1.php">Retour accueil</a>
        </div>

        <?php if (!empty($_SESSION['flash_success'])): ?>
            <div class="flash success"><?php echo $_SESSION['flash_success']; unset($_SESSION['flash_success']); ?></div>
        <?php endif; ?>
        <?php if (!empty($_SESSION['flash_error'])): ?>
            <div class="flash error"><?php echo $_SESSION['flash_error']; unset($_SESSION['flash_error']); ?></div>
        <?php endif; ?>

        <div class="card" style="margin-bottom:1rem">
            <h3 style="margin-top:0">Ajouter un PC</h3>
            <form class="grid" method="POST">
                <input type="hidden" name="action" value="add">
                <input name="name" placeholder="Nom (ex: PC-01)" required>
                <input name="ip" placeholder="IP (ex: 192.168.1.10)" required>
                <input name="os" placeholder="OS (ex: Windows 10)">
                <input name="user" placeholder="Utilisateur">
                <input name="location" placeholder="Emplacement">
                <select name="status"><option>Actif</option><option>En maintenance</option><option>Hors service</option></select>
                <div style="grid-column:1/-1;text-align:right;margin-top:.25rem">
                    <button class="btn" type="submit">Ajouter</button>
                </div>
            </form>
        </div>

        <table>
            <thead>
                <tr><th>ID</th><th>Nom</th><th>IP</th><th>OS</th><th>Utilisateur</th><th>Emplacement</th><th>Statut</th><th>Actions</th></tr>
            </thead>
            <tbody>
                <?php if (empty($pcs)): ?>
                    <tr><td colspan="8" class="muted">Aucun PC enregistré.</td></tr>
                <?php else: foreach ($pcs as $p): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($p['id']); ?></td>
                        <td><?php echo htmlspecialchars($p['name']); ?></td>
                        <td><?php echo htmlspecialchars($p['ip']); ?></td>
                        <td><?php echo htmlspecialchars($p['os']); ?></td>
                        <td><?php echo htmlspecialchars($p['user']); ?></td>
                        <td><?php echo htmlspecialchars($p['location']); ?></td>
                        <td><?php echo htmlspecialchars($p['status']); ?></td>
                        <td><a href="?delete=<?php echo (int)$p['id']; ?>" onclick="return confirm('Supprimer ce PC ?');" style="color:#ef4444">Supprimer</a></td>
                    </tr>
                <?php endforeach; endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
