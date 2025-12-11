<?php require_once __DIR__ . '/../config.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= SITE_NAME ?></title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&family=Orbitron:wght@400;700&display=swap" rel="stylesheet">

  <!-- Futuristic stylesheet (primary) and legacy fallback -->
  <link rel="stylesheet" href="assets/css/futuristic.css">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header class="site-header">
    <div class="container">
      <div class="brand">
        <span class="logo">TS</span>
        <span class="name"><?= SITE_NAME ?></span>
      </div>
      <nav class="menu">
        <a href="index.php" class="nav-link">Accueil</a>
        <a href="actualites.php" class="nav-link">Actualités</a>
        <a href="parc.php" class="nav-link">Parc informatique</a>
        <a href="contact.php" class="nav-link">Contact</a>
        <?php if (!empty($_SESSION['user'])): ?>
          <a href="admin/" class="nav-link">Admin</a>
          <a href="logout.php" class="nav-link">Déconnexion</a>
        <?php elseif (!empty($_SESSION['client_id'])): ?>
          <a href="client/profil.php" class="nav-link">Mon compte</a>
          <a href="logout.php" class="nav-link">Déconnexion</a>
        <?php else: ?>
          <a href="login.php" class="nav-link">Admin</a>
          <a href="client/profil.php" class="nav-link">Espace client</a>
        <?php endif; ?>
      </nav>
    </div>
  </header>

  <main class="container">
