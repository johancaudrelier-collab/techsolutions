<?php
require_once __DIR__ . '/includes/db.php';

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

// Si déjà connecté, rediriger vers l'accueil
if (!empty($_SESSION['user'])) {
  header('Location: index.php');
  exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = trim($_POST['username'] ?? '');
  $password = $_POST['password'] ?? '';

  if ($username === '' || $password === '') {
    $error = 'Veuillez remplir tous les champs.';
  } else {
    try {
      $stmt = pdo()->prepare('SELECT id, username, password FROM users WHERE username = :username LIMIT 1');
      $stmt->execute([':username' => $username]);
      $user = $stmt->fetch();
      
      if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['username'];
        header('Location: index.php');
        exit;
      }
      $error = 'Identifiants invalides. Veuillez réessayer.';
    } catch (PDOException $e) {
      $error = 'Erreur de connexion. Veuillez réessayer.';
    }
  }
}

require_once __DIR__ . '/includes/header.php';
?>

<section class="auth-container">
  <div class="auth-box">
    <h1>Connexion administrateur</h1>
    <p class="auth-subtitle">Accédez à votre espace de gestion</p>

    <?php if ($error): ?>
      <div class="alert alert-error">
        <strong>✗</strong> <?= htmlspecialchars($error) ?>
      </div>
    <?php endif; ?>

    <form method="post" action="login.php" class="auth-form">
      <div class="form-group">
        <label for="username">Identifiant</label>
        <input 
          type="text" 
          id="username" 
          name="username" 
          placeholder="Entrez votre identifiant"
          autocomplete="username"
          required>
      </div>

      <div class="form-group">
        <label for="password">Mot de passe</label>
        <input 
          type="password" 
          id="password" 
          name="password" 
          placeholder="Entrez votre mot de passe"
          autocomplete="current-password"
          required>
      </div>

      <button type="submit" class="btn btn-primary btn-lg">Se connecter</button>
    </form>

    <div class="auth-footer">
      <p>Vous n'avez pas accès ? <a href="index.php">Retour à l'accueil</a></p>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
