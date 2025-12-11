<?php
require_once __DIR__ . '/../includes/db.php';
if (session_status() === PHP_SESSION_NONE) session_start();

if (empty($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
  header('Location: ../login.php');
  exit;
}

$stmt = pdo()->query('SELECT * FROM contacts ORDER BY created_at DESC');
$contacts = $stmt->fetchAll();

require_once __DIR__ . '/../includes/header.php';
?>

<section class="admin-section">
  <div class="container">
    <h1>Gestion des contacts</h1>
    <a href="index.php" class="btn btn-secondary btn-sm">← Retour au tableau de bord</a>

    <table class="admin-table" style="margin-top:20px">
      <thead>
        <tr>
          <th>Nom</th>
          <th>Email</th>
          <th>Sujet</th>
          <th>Message</th>
          <th>Date</th>
          <th>Statut</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($contacts as $contact): ?>
          <tr>
            <td><?= htmlspecialchars($contact['name']) ?></td>
            <td><?= htmlspecialchars($contact['email']) ?></td>
            <td><?= htmlspecialchars($contact['subject']) ?></td>
            <td><?= htmlspecialchars(substr($contact['message'], 0, 50)) ?>...</td>
            <td><?= date('d/m/Y H:i', strtotime($contact['created_at'])) ?></td>
            <td><?= htmlspecialchars($contact['status']) ?></td>
            <td>
              <a href="contact-detail.php?id=<?= $contact['id'] ?>" class="btn btn-sm btn-primary">Voir</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
