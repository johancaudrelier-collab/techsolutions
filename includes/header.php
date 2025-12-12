<?php 
require_once __DIR__ . '/../config.php';
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

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/futuristic.css">
  <link rel="stylesheet" href="styles.css">
</head>
<body>

<header class="site-header">
  <div class="container header-inner">
    <!-- LOGO SEUL À GAUCHE (énorme et visible) -->
    <div class="brand">
      <a href="index.php">
        <img src="assets/images/logo.png" alt="<?= SITE_NAME ?>" class="main-logo">
      </a>
    </div>

    <!-- MENU À DROITE -->
    <nav class="menu">
      <a href="index.php" class="nav-link">Accueil</a>
      <a href="about.php" class="nav-link">À propos</a>
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
        <a href="login.php" class="nav-link">Connexion</a>
        <a href="register.php" class="nav-link">S'enregistrer</a>
      <?php endif; ?>
    </nav>
  </div>
</header>

<main class="container">