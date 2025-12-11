<?php
require_once __DIR__ . '/../includes/db.php';
if (session_status() === PHP_SESSION_NONE) session_start();

if (empty($_SESSION['user']) || ($_SESSION['role'] ?? '') !== 'admin') {
  header('Location: ../login.php');
  exit;
}

$success = '';
$error = '';

try {
  $db = pdo();
  $id = intval($_GET['id'] ?? 0);
  if (!$id) {
    header('Location: messagerie.php');
    exit;
  }

  // handle reply via mail (best-effort)
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['action']) && $_POST['action'] === 'reply') {
    $reply = trim($_POST['reply'] ?? '');
    $to = trim($_POST['to_email'] ?? '');
    $subject = trim($_POST['subject'] ?? 'Réponse de TechSolutions');

    if ($reply === '' || $to === '') {
      $error = 'Le message de réponse et l\'email de destination sont requis.';
    } else {
      // Tentative d'envoi (si mail() configuré sur ton serveur)
      $headers = 'From: ' . COMPANY_EMAIL . "\r\n" . 'Reply-To: ' . COMPANY_EMAIL . "\r\n" . 'X-Mailer: PHP/' . phpversion();
      $sent = @mail($to, $subject, $reply, $headers);
      if ($sent) {
        $success = 'Réponse envoyée avec succès.';
        // Marquer comme traité et enregistrer la réponse en base
        $upd = $db->prepare('UPDATE messages SET status = :s, reply_text = :rt, replied_by = :rb, replied_at = :ra WHERE id = :id');
        $upd->execute([
          ':s' => 'traite',
          ':rt' => $reply,
          ':rb' => ($_SESSION['user'] ?? 'admin'),
          ':ra' => date('Y-m-d H:i:s'),
          ':id' => $id
        ]);
      } else {
        // Même si mail() échoue, on peut sauvegarder la réponse en base et noter l'échec d'envoi
        $error = 'Impossible d\'envoyer l\'email depuis ce serveur (mail() non configuré). La réponse est sauvegardée en base ; répondez manuellement.';
        $upd = $db->prepare('UPDATE messages SET reply_text = :rt, replied_by = :rb, replied_at = :ra WHERE id = :id');
        $upd->execute([
          ':rt' => $reply,
          ':rb' => ($_SESSION['user'] ?? 'admin'),
          ':ra' => date('Y-m-d H:i:s'),
          ':id' => $id
        ]);
      }
    }
  }

  $stmt = $db->prepare('SELECT * FROM messages WHERE id = :id');
  $stmt->execute([':id' => $id]);
  $msg = $stmt->fetch(PDO::FETCH_ASSOC);
  if (!$msg) {
    header('Location: messagerie.php');
    exit;
  }

} catch (PDOException $e) {
  $error = 'Erreur base de données: ' . $e->getMessage();
}

require_once __DIR__ . '/../includes/header.php';
?>

<section class="admin-section">
  <div class="container">
    <h1>Message de <?= htmlspecialchars($msg['name']) ?></h1>
    <?php if ($success): ?><div class="alert alert-success"><?= htmlspecialchars($success) ?></div><?php endif; ?>
    <?php if ($error): ?><div class="alert alert-error"><?= htmlspecialchars($error) ?></div><?php endif; ?>

    <div class="message-detail" style="padding:15px;background:#fff;border-radius:8px;border:1px solid #eee;margin-bottom:20px">
      <p><strong>De:</strong> <?= htmlspecialchars($msg['name']) ?> &lt;<?= htmlspecialchars($msg['email']) ?>&gt;</p>
      <p><strong>Sujet:</strong> <?= htmlspecialchars($msg['subject']) ?></p>
      <p><strong>Reçu le:</strong> <?= date('d/m/Y H:i', strtotime($msg['created_at'])) ?></p>
      <hr>
      <div style="white-space:pre-wrap"><?= htmlspecialchars($msg['message']) ?></div>
    </div>

    <h2>Répondre</h2>
    <form method="post">
      <input type="hidden" name="action" value="reply">
      <input type="hidden" name="to_email" value="<?= htmlspecialchars($msg['email']) ?>">
      <div class="form-group">
        <label for="subject">Sujet</label>
        <input type="text" id="subject" name="subject" value="Réponse: <?= htmlspecialchars($msg['subject']) ?>" required>
      </div>
      <div class="form-group">
        <label for="reply">Message</label>
        <textarea id="reply" name="reply" rows="8" required></textarea>
      </div>
      <div class="form-group">
        <button class="btn btn-primary" type="submit">Envoyer la réponse</button>
        <a class="btn" href="messagerie.php">Retour</a>
      </div>
    </form>

  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
