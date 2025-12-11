<?php
require_once __DIR__ . '/../includes/db.php';
if (session_status() === PHP_SESSION_NONE) session_start();

if (empty($_SESSION['user'])) {
  header('Location: ../login.php');
  exit;
}

$stmt = get_pdo()->query('SELECT * FROM clients ORDER BY created_at DESC');
$clients = $stmt->fetchAll();

require_once __DIR__ . '/../includes/header.php';
?>

<section class="admin-section">
  <div class="container">
    <h1>Gestion des clients</h1>
    <a href="index.php" class="btn btn-secondary btn-sm">← Retour</a>

    <table class="admin-table" style="margin-top:20px">
      <thead>
        <tr>
          <th>Prénom</th>
          <th>Nom</th>
          <th>Email</th>
          <th>Entreprise</th>
          <th>Téléphone</th>
          <th>Inscrit le</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($clients as $client): ?>
          <tr>
            <td><?= htmlspecialchars($client['first_name']) ?></td>
            <td><?= htmlspecialchars($client['last_name']) ?></td>
            <td><?= htmlspecialchars($client['email']) ?></td>
            <td><?= htmlspecialchars($client['company']) ?></td>
            <td><?= htmlspecialchars($client['phone']) ?></td>
            <td><?= date('d/m/Y', strtotime($client['created_at'])) ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
