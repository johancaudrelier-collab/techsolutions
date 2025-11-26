<?php require_once __DIR__ . '/../config.php'; ?>
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
        <a href="pagecontact2.php" class="nav-link">Contact</a>
      </nav>
    </div>
  </header>

  <main class="container">
