<?php
require_once __DIR__ . '/includes/db.php';

// Démarrer la session si nécessaire pour afficher les contrôles réservés aux admins
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

// Restreindre l'accès: seuls les admins peuvent voir cette page
if (empty($_SESSION['user']) || ($_SESSION['role'] ?? '') !== 'admin') {
  header('Location: login.php');
  exit;
}

require_once __DIR__ . '/includes/header.php';

try {
  // Récupérer les postes (la table pcs dans ta BDD n'a pas de colonne 'description')
  $pcs = pdo()->query('SELECT id, name, image_url, price FROM pcs ORDER BY id')->fetchAll(PDO::FETCH_ASSOC);

  // Récupérer les composants attachés à chaque PC
  $compRows = pdo()->query('SELECT pc_components.pc_id as pc_id, components.id as id, components.name as name, components.description as description FROM pc_components JOIN components ON pc_components.component_id = components.id ORDER BY pc_components.pc_id')->fetchAll(PDO::FETCH_ASSOC);
  $pc_components = [];
  foreach ($compRows as $r) {
    $pc_components[$r['pc_id']][] = $r;
  }

} catch (PDOException $e) {
  $pcs = [];
  $pc_components = [];
  error_log('Parc query error: ' . $e->getMessage());
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
              <?php
                $components = $pc_components[$pc['id']] ?? [];
                if (!empty($components)): ?>
                <details class="pc-specs">
                  <summary>Voir les spécifications</summary>
                  <ul>
                    <?php foreach ($components as $comp): ?>
                      <li><strong><?= htmlspecialchars($comp['name']) ?></strong><?php if (!empty($comp['description'])): ?> — <?= htmlspecialchars(trim($comp['description'])) ?><?php endif; ?></li>
                    <?php endforeach; ?>
                  </ul>
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
