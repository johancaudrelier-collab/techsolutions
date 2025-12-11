<?php
require_once __DIR__ . '/includes/db.php';

// Start session if needed
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

// If already logged in, redirect to homepage
if (!empty($_SESSION['user'])) {
  header('Location: index.php');
  exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = trim($_POST['username'] ?? '');
  $password = $_POST['password'] ?? '';

  if ($username === '' || $password === '') {
    $error = 'Remplissez tous les champs.';
  } else {
    $stmt = pdo()->prepare('SELECT id, username, password FROM users WHERE username = :username LIMIT 1');
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();
    if ($user && password_verify($password, $user['password'])) {
      // Authentication success
      $_SESSION['user'] = $user['username'];
      header('Location: gestion_parc.php');
      exit;
    }
    $error = 'Identifiants invalides.';
  }
}

require_once __DIR__ . '/includes/header.php';
?>

<section class="auth">
  <h1>Connexion administrateur</h1>
  <?php if ($error): ?>
    <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>

  <form method="post" action="login.php">
    <div>
      <label for="username">Nom d'utilisateur</label>
      <input id="username" name="username" type="text" required>
    </div>
    <div>
      <label for="password">Mot de passe</label>
      <input id="password" name="password" type="password" required>
    </div>
    <div>
      <button type="submit">Se connecter</button>
    </div>
  </form>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
<?php
require_once __DIR__ . '/includes/db.php';

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = trim($_POST['username'] ?? '');
  $password = $_POST['password'] ?? '';

  if ($username === '' || $password === '') {
    $error = 'Remplissez tous les champs.';
  } else {
    $stmt = pdo()->prepare('SELECT * FROM users WHERE username = :username LIMIT 1');
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();
    if ($user) {
      // Accept either a hashed password (recommended) or a plain-text password (legacy)
      if (password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['username'];
        header('Location: gestion_parc.php');
        exit;
      }
      if ($user['password'] === $password) {
        // Legacy plain-text password — migrate to a secure hash now
        $_SESSION['user'] = $user['username'];
        $newHash = password_hash($password, PASSWORD_DEFAULT);
        $up = pdo()->prepare('UPDATE users SET password = :hash WHERE id = :id');
        $up->execute(['hash' => $newHash, 'id' => $user['id']]);
        header('Location: gestion_parc.php');
        exit;
      }
    }
    $error = 'Identifiants invalides.';
  }
}

require_once __DIR__ . '/includes/header.php';
?>

<section class="auth">
  <h1>Connexion</h1>
  <?php if ($error): ?>
    <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>

  <form method="post" action="login.php">
    <div>
      <label for="username">Nom d'utilisateur</label>
      <input id="username" name="username" type="text" required>
    </div>
    <div>
      <label for="password">Mot de passe</label>
      <input id="password" name="password" type="password" required>
    </div>
    <div>
      <button type="submit">Se connecter</button>
    </div>
  </form>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
