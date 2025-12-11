<?php
require_once __DIR__ . '/includes/db.php';
if (session_status() === PHP_SESSION_NONE) session_start();

$success = '';
$error = '';
$form_data = ['name' => '', 'email' => '', 'subject' => '', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $form_data['name'] = trim($_POST['name'] ?? '');
  $form_data['email'] = trim($_POST['email'] ?? '');
  $form_data['subject'] = trim($_POST['subject'] ?? '');
  $form_data['message'] = trim($_POST['message'] ?? '');

  if ($form_data['name'] === '' || $form_data['email'] === '' || $form_data['subject'] === '' || $form_data['message'] === '') {
    $error = 'Tous les champs sont obligatoires.';
  } elseif (!filter_var($form_data['email'], FILTER_VALIDATE_EMAIL)) {
    $error = 'Veuillez entrer une adresse email valide.';
  } elseif (strlen($form_data['message']) < 10) {
    $error = 'Le message doit contenir au moins 10 caractères.';
    } else {
      try {
        // Insère dans la nouvelle table `messages` (voir messages.sql)
        $stmt = pdo()->prepare('INSERT INTO messages (name, email, subject, message) VALUES (?, ?, ?, ?)');
        $stmt->execute([
          $form_data['name'],
          $form_data['email'],
          $form_data['subject'],
          $form_data['message']
        ]);
        $success = 'Merci ! Votre message a été envoyé avec succès. Nous vous recontacterons très bientôt.';
        $form_data = ['name' => '', 'email' => '', 'subject' => '', 'message' => ''];
      } catch (PDOException $e) {
        $error = 'Une erreur est survenue lors de l\'envoi. Veuillez réessayer plus tard.';
      }
    }
}

require_once __DIR__ . '/includes/header.php';
?>

<section class="contact-section">
  <div class="container">
    <h1>Nous contacter</h1>
    <p class="subtitle">Vous avez une question ? Envoyez-nous un message, notre équipe vous répondra dans les 24h.</p>

    <?php if ($success): ?>
      <div class="alert alert-success">✓ <?= htmlspecialchars($success) ?></div>
    <?php endif; ?>
    <?php if ($error): ?>
      <div class="alert alert-error">✗ <?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="post" action="contact.php" class="contact-form">
      <div class="form-group">
        <label for="name">Nom complet *</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($form_data['name']) ?>" required>
      </div>
      <div class="form-group">
        <label for="email">Adresse email *</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($form_data['email']) ?>" required>
      </div>
      <div class="form-group">
        <label for="subject">Sujet *</label>
        <input type="text" id="subject" name="subject" value="<?= htmlspecialchars($form_data['subject']) ?>" required>
      </div>
      <div class="form-group">
        <label for="message">Message *</label>
        <textarea id="message" name="message" rows="6" required><?= htmlspecialchars($form_data['message']) ?></textarea>
        <small>Minimum 10 caractères</small>
      </div>
      <button type="submit" class="btn btn-primary btn-lg">Envoyer le message</button>
    </form>

    <div class="contact-info" style="margin-top:40px;padding:20px;background:#f0f9ff;border-radius:12px;border-left:4px solid #0ea5a4">
      <h3>Autres moyens de nous contacter</h3>
      <p><strong>Email:</strong> <?= COMPANY_EMAIL ?></p>
      <p><strong>Téléphone:</strong> <?= COMPANY_PHONE ?></p>
      <p><strong>Adresse:</strong> <?= COMPANY_ADDRESS ?>, <?= COMPANY_POSTAL_CODE ?> <?= COMPANY_CITY ?></p>
      <p><strong>Contact:</strong> <?= COMPANY_DIRECTOR ?> (<?= COMPANY_DIRECTOR_TITLE ?>)</p>
      <p><strong>Horaires:</strong> Lundi-Vendredi, 9h-18h</p>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
