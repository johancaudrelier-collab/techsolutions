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

  // Actions: mark read/unread, delete
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['action']) && $_POST['action'] === 'toggle_status') {
      $id = intval($_POST['id'] ?? 0);
      $new = ($_POST['new_status'] ?? 'nouveau');
      $stmt = $db->prepare('UPDATE messages SET status = :status WHERE id = :id');
      $stmt->execute([':status' => $new, ':id' => $id]);
      $success = 'Statut mis à jour.';
    }
    if (!empty($_POST['action']) && $_POST['action'] === 'delete') {
      $id = intval($_POST['id'] ?? 0);
      $stmt = $db->prepare('DELETE FROM messages WHERE id = :id');
      $stmt->execute([':id' => $id]);
      $success = 'Message supprimé.';
    }
  }

  $stmt = $db->query("SELECT id, name, email, subject, status, created_at FROM messages ORDER BY created_at DESC");
  $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
  $error = 'Erreur base de données: ' . $e->getMessage();
}

require_once __DIR__ . '/..//includes/header.php';
?>

<section class="admin-section">
  <div class="container">
    <h1>Messagerie - Messages reçus</h1>
    <?php if ($success): ?>
      <div class="alert alert-success"><?php echo htmlspecialchars($success); ?></div>
    <?php endif; ?>
    <?php if ($error): ?>
      <div class="alert alert-error"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <?php if (empty($messages)): ?>
      <p>Aucun message reçu.</p>
    <?php else: ?>
      <table class="admin-table">
        <thead>
          <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Sujet</th>
            <th>Statut</th>
            <th>Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($messages as $m): ?>
            <tr>
              <td><?= htmlspecialchars($m['name']) ?></td>
              <td><?= htmlspecialchars($m['email']) ?></td>
              <td><?= htmlspecialchars($m['subject']) ?></td>
              <td><?= htmlspecialchars($m['status']) ?></td>
              <td><?= date('d/m/Y H:i', strtotime($m['created_at'])) ?></td>
              <td>
                <a class="btn btn-sm" href="messagerie_view.php?id=<?= $m['id'] ?>">Voir</a>
                <form method="post" style="display:inline">
                  <input type="hidden" name="id" value="<?= $m['id'] ?>">
                  <input type="hidden" name="action" value="toggle_status">
                  <input type="hidden" name="new_status" value="<?= $m['status'] === 'nouveau' ? 'traite' : 'nouveau' ?>">
                  <button class="btn btn-sm"><?= $m['status'] === 'nouveau' ? 'Marquer traité' : 'Marquer nouveau' ?></button>
                </form>
                <form method="post" style="display:inline" onsubmit="return confirm('Supprimer ce message ?');">
                  <input type="hidden" name="id" value="<?= $m['id'] ?>">
                  <input type="hidden" name="action" value="delete">
                  <button class="btn btn-sm btn-danger">Supprimer</button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
