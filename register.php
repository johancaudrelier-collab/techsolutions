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

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = trim($_POST['username'] ?? '');
  $password = $_POST['password'] ?? '';
  $password_confirm = $_POST['password_confirm'] ?? '';
  $email = trim($_POST['email'] ?? '');

  // Validation
  if ($username === '' || $password === '' || $email === '') {
    $error = 'Tous les champs sont obligatoires.';
  } elseif (strlen($username) < 3) {
    $error = 'Le nom d\'utilisateur doit contenir au moins 3 caractères.';
  } elseif (strlen($password) < 6) {
    $error = 'Le mot de passe doit contenir au moins 6 caractères.';
  } elseif ($password !== $password_confirm) {
    $error = 'Les mots de passe ne correspondent pas.';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = 'Veuillez entrer une adresse email valide.';
  } else {
    try {
      // Vérifier si l'utilisateur existe déjà
      $stmt = pdo()->prepare('SELECT id FROM users WHERE username = :username LIMIT 1');
      $stmt->execute([':username' => $username]);
      if ($stmt->fetch()) {
        $error = 'Ce nom d\'utilisateur est déjà utilisé.';
      } else {
        // Créer le compte avec mot de passe haché
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = pdo()->prepare('INSERT INTO users (username, password_hash, email, role) VALUES (:username, :password_hash, :email, :role)');
        $stmt->execute([
          ':username' => $username,
          ':password_hash' => $hashed_password,
          ':email' => $email,
          ':role' => 'admin'
        ]);
        $success = 'Compte créé avec succès ! Vous pouvez maintenant vous connecter.';
      }
    } catch (PDOException $e) {
      $error = 'Erreur lors de la création du compte. Veuillez réessayer.';
    }
  }
}

require_once __DIR__ . '/includes/header.php';
?>

<section class="auth-container">
  <div class="auth-box">
    <h1>Créer un compte administrateur</h1>
    <p class="auth-subtitle">Enregistrez-vous pour accéder à l'espace de gestion</p>

    <?php if ($success): ?>
      <div class="alert alert-success">
        <strong>✓</strong> <?= htmlspecialchars($success) ?>
      </div>
      <p style="text-align:center;margin-top:20px">
        <a href="login.php" class="btn btn-primary">Se connecter maintenant</a>
      </p>
    <?php else: ?>

    <?php if ($error): ?>
      <div class="alert alert-error">
        <strong>✗</strong> <?= htmlspecialchars($error) ?>
      </div>
    <?php endif; ?>

    <form method="post" action="register.php" class="auth-form">
      <div class="form-group">
        <label for="username">Nom d'utilisateur</label>
        <input 
          type="text" 
          id="username" 
          name="username" 
          placeholder="Minimum 3 caractères"
          autocomplete="username"
          required>
      </div>

      <div class="form-group">
        <label for="email">Adresse email</label>
        <input 
          type="email" 
          id="email" 
          name="email" 
          placeholder="Votre email"
          autocomplete="email"
          required>
      </div>

      <div class="form-group">
        <label for="password">Mot de passe</label>
        <input 
          type="password" 
          id="password" 
          name="password" 
          placeholder="Minimum 6 caractères"
          autocomplete="new-password"
          required>
      </div>

      <div class="form-group">
        <label for="password_confirm">Confirmer le mot de passe</label>
        <input 
          type="password" 
          id="password_confirm" 
          name="password_confirm" 
          placeholder="Confirmez votre mot de passe"
          autocomplete="new-password"
          required>
      </div>

      <button type="submit" class="btn btn-primary btn-lg">Créer mon compte</button>
    </form>

    <div class="auth-footer">
      <p>Vous avez déjà un compte ? <a href="login.php">Se connecter</a></p>
    </div>

    <?php endif; ?>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
