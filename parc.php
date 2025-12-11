<?php
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/header.php';

try {
  $pcs = pdo()->query('SELECT id, name, description, image_url, price FROM pcs ORDER BY id')->fetchAll();
} catch (PDOException $e) {
  $pcs = [];
}
?>

<section class="parc-section">
  <div class="container">
    <h1>Parc informatique</h1>
    <p class="subtitle">Découvrez nos postes de travail et leurs configurations</p>

    <?php if (empty($pcs)): ?>
      <p>Aucun poste disponible pour le moment.</p>
    <?php else: ?>
      <div class="pc-grid">
        <?php foreach ($pcs as $pc): ?>
          <article class="pc-card">
            <?php if (!empty($pc['image_url'])): ?>
              <div class="pc-image">
                <img src="<?= htmlspecialchars($pc['image_url']) ?>" alt="Photo de <?= htmlspecialchars($pc['name']) ?>">
              </div>
            <?php endif; ?>
            <div class="pc-content">
              <h2><?= htmlspecialchars($pc['name']) ?></h2>
              <?php if (!empty($pc['price'])): ?>
                <p class="pc-price"><?= number_format((float)$pc['price'], 2, ',', ' ') . ' ' . CURRENCY ?></p>
              <?php endif; ?>
              <?php if (!empty($pc['description'])): ?>
                <details class="pc-specs">
                  <summary>Voir les spécifications</summary>
                  <pre><?= htmlspecialchars($pc['description']) ?></pre>
                </details>
              <?php endif; ?>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
