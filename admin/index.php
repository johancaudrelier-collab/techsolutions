<?php
require_once __DIR__ . '/../includes/db.php';
if (session_status() === PHP_SESSION_NONE) session_start();

// Check admin login
if (empty($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
  header('Location: ../login.php');
  exit;
}

$stats = [
  'contacts' => pdo()->query('SELECT COUNT(*) as count FROM contacts')->fetch()['count'],
  'news' => pdo()->query('SELECT COUNT(*) as count FROM news')->fetch()['count'],
  'clients' => pdo()->query('SELECT COUNT(*) as count FROM clients')->fetch()['count'],
  'pcs' => pdo()->query('SELECT COUNT(*) as count FROM pcs')->fetch()['count'],
];

require_once __DIR__ . '/../includes/header.php';
?>

<section class="admin-section">
  <div class="admin-header">
    <h1>Tableau de bord administrateur</h1>
    <p>Bienvenue, <?= htmlspecialchars($_SESSION['user']) ?></p>
  </div>

  <div class="container">
    <!-- Stats -->
    <div class="admin-stats">
      <div class="stat-card">
        <h3>Clients</h3>
        <p class="stat-number"><?= $stats['clients'] ?></p>
        <a href="clients.php" class="btn btn-sm btn-secondary">Gérer</a>
      </div>
      <div class="stat-card">
        <h3>Contacts</h3>
        <p class="stat-number"><?= $stats['contacts'] ?></p>
        <a href="contacts.php" class="btn btn-sm btn-secondary">Gérer</a>
      </div>
      <div class="stat-card">
        <h3>Actualités</h3>
        <p class="stat-number"><?= $stats['news'] ?></p>
        <a href="news.php" class="btn btn-sm btn-secondary">Gérer</a>
      </div>
      <div class="stat-card">
        <h3>Postes IT</h3>
        <p class="stat-number"><?= $stats['pcs'] ?></p>
        <a href="pcs.php" class="btn btn-sm btn-secondary">Gérer</a>
      </div>
    </div>

    <h2>Derniers contacts</h2>
    <?php
    $stmt = pdo()->query('SELECT * FROM contacts ORDER BY created_at DESC LIMIT 5');
    $recent = $stmt->fetchAll();
    ?>
    <?php if (empty($recent)): ?>
      <p>Aucun contact.</p>
    <?php else: ?>
      <table class="admin-table">
        <thead>
          <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Sujet</th>
            <th>Date</th>
            <th>Statut</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($recent as $contact): ?>
            <tr>
              <td><?= htmlspecialchars($contact['name']) ?></td>
              <td><?= htmlspecialchars($contact['email']) ?></td>
              <td><?= htmlspecialchars($contact['subject']) ?></td>
              <td><?= date('d/m/Y', strtotime($contact['created_at'])) ?></td>
              <td><?= htmlspecialchars($contact['status']) ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
