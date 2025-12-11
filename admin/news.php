<?php
require_once __DIR__ . '/../includes/db.php';
if (session_status() === PHP_SESSION_NONE) session_start();

if (empty($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
  header('Location: ../login.php');
  exit;
}

$success = '';
$stmt = get_pdo()->query('SELECT * FROM news ORDER BY published_at DESC');
$news = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
  if ($_POST['action'] === 'add') {
    $stmt = pdo()->prepare('INSERT INTO news (title, content) VALUES (:title, :content)');
    $stmt->execute([
      ':title' => trim($_POST['title'] ?? ''),
      ':content' => trim($_POST['content'] ?? '')
    ]);
    $success = 'Actualité créée !';
    header('Refresh: 1; url=news.php');
  } elseif ($_POST['action'] === 'delete' && isset($_POST['id'])) {
    $stmt = pdo()->prepare('DELETE FROM news WHERE id = :id');
    $stmt->execute([':id' => intval($_POST['id'])]);
    $success = 'Actualité supprimée !';
    header('Refresh: 1; url=news.php');
  }
}

require_once __DIR__ . '/../includes/header.php';
?>

<section class="admin-section">
  <div class="container">
    <h1>Gestion des actualités</h1>
    <a href="index.php" class="btn btn-secondary btn-sm">← Retour</a>

    <?php if ($success): ?>
      <div class="alert-success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>

    <h3>Ajouter une actualité</h3>
    <form method="post" style="background:#fff;padding:16px;border-radius:8px;margin-bottom:20px">
      <input type="hidden" name="action" value="add">
      <div class="form-group">
        <label>Titre</label>
        <input type="text" name="title" required>
      </div>
      <div class="form-group">
        <label>Contenu</label>
        <textarea name="content" rows="4" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>

    <h3>Liste des actualités</h3>
    <table class="admin-table">
      <thead>
        <tr>
          <th>Titre</th>
          <th>Date</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($news as $article): ?>
          <tr>
            <td><?= htmlspecialchars($article['title']) ?></td>
            <td><?= date('d/m/Y', strtotime($article['published_at'])) ?></td>
            <td>
              <form method="post" style="display:inline">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="id" value="<?= $article['id'] ?>">
                <button type="submit" class="btn btn-sm" style="background:#dc2626;color:#fff">Supprimer</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
