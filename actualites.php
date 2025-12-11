<?php
require_once __DIR__ . '/includes/db.php';
if (session_status() === PHP_SESSION_NONE) session_start();

$stmt = get_pdo()->query('SELECT * FROM news ORDER BY published_at DESC');
$news_list = $stmt->fetchAll();

require_once __DIR__ . '/includes/header.php';
?>

<section class="news-section">
  <div class="container">
    <h1>Actualités</h1>
    <p class="subtitle">Suivez les dernières infos et mises à jour de TechSolutions</p>

    <?php if (empty($news_list)): ?>
      <p>Aucune actualité pour le moment.</p>
    <?php else: ?>
      <div class="news-list">
        <?php foreach ($news_list as $article): ?>
          <article class="news-card">
            <div class="news-header">
              <h2><?= htmlspecialchars($article['title']) ?></h2>
              <time><?= date('d/m/Y H:i', strtotime($article['published_at'])) ?></time>
            </div>
            <p><?= htmlspecialchars($article['content']) ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
