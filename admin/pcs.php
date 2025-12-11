<?php
require_once __DIR__ . '/../includes/db.php';
if (session_status() === PHP_SESSION_NONE) session_start();

if (empty($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
  header('Location: ../login.php');
  exit;
}

$success = '';
$error = '';

try {
  $db = pdo();

  // Handle POST actions
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['action']) && $_POST['action'] === 'add_pc') {
      $name = trim($_POST['name'] ?? '');
      $description = trim($_POST['description'] ?? '');
      $image_url = trim($_POST['image_url'] ?? '');
      $price = floatval($_POST['price'] ?? 0);

      if ($name === '') {
        $error = 'Le nom du poste est requis.';
      } else {
        $stmt = $db->prepare('INSERT INTO pcs (name, description, image_url, price) VALUES (:name, :description, :image_url, :price)');
        $stmt->execute([
          ':name' => $name,
          ':description' => $description,
          ':image_url' => $image_url,
          ':price' => $price
        ]);
        $success = 'Poste ajouté avec succès.';
      }
    }

    if (!empty($_POST['action']) && $_POST['action'] === 'add_component') {
      $comp_name = trim($_POST['comp_name'] ?? '');
      $comp_type = trim($_POST['comp_type'] ?? '');
      $comp_desc = trim($_POST['comp_desc'] ?? '');

      if ($comp_name === '') {
        $error = 'Le nom du composant est requis.';
      } else {
        $stmt = $db->prepare('INSERT INTO components (name, type, description) VALUES (:name, :type, :description)');
        $stmt->execute([
          ':name' => $comp_name,
          ':type' => $comp_type,
          ':description' => $comp_desc
        ]);
        $success = 'Composant ajouté avec succès.';
      }
    }

    if (!empty($_POST['action']) && $_POST['action'] === 'attach_component') {
      $pc_id = intval($_POST['pc_id'] ?? 0);
      $component_id = intval($_POST['component_id'] ?? 0);
      if ($pc_id && $component_id) {
        // prevent duplicates
        $check = $db->prepare('SELECT * FROM pc_components WHERE pc_id = :pc_id AND component_id = :component_id');
        $check->execute([':pc_id' => $pc_id, ':component_id' => $component_id]);
        if ($check->fetch()) {
          $error = 'Ce composant est déjà attaché à ce poste.';
        } else {
          $stmt = $db->prepare('INSERT INTO pc_components (pc_id, component_id) VALUES (:pc_id, :component_id)');
          $stmt->execute([':pc_id' => $pc_id, ':component_id' => $component_id]);
          $success = 'Composant attaché au poste.';
        }
      }
    }

    if (!empty($_POST['action']) && $_POST['action'] === 'delete_pc') {
      $pc_id = intval($_POST['pc_id'] ?? 0);
      if ($pc_id) {
        $db->prepare('DELETE FROM pc_components WHERE pc_id = :pc_id')->execute([':pc_id' => $pc_id]);
        $db->prepare('DELETE FROM pcs WHERE id = :id')->execute([':id' => $pc_id]);
        $success = 'Poste supprimé.';
      }
    }

    if (!empty($_POST['action']) && $_POST['action'] === 'remove_component') {
      $pc_id = intval($_POST['pc_id'] ?? 0);
      $component_id = intval($_POST['component_id'] ?? 0);
      if ($pc_id && $component_id) {
        $db->prepare('DELETE FROM pc_components WHERE pc_id = :pc_id AND component_id = :component_id')
           ->execute([':pc_id' => $pc_id, ':component_id' => $component_id]);
        $success = 'Composant détaché du poste.';
      }
    }
  }

  // Fetch pcs
  $pcs_stmt = $db->query('SELECT id, name, description, image_url, price FROM pcs ORDER BY id');
  $pcs = $pcs_stmt->fetchAll(PDO::FETCH_ASSOC);

  // Fetch components
  $components_stmt = $db->query('SELECT id, name, type, description FROM components ORDER BY name');
  $components = $components_stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
  $error = 'Erreur base de données: ' . $e->getMessage();
}

require_once __DIR__ . '/../includes/header.php';
?>

<section class="admin-section">
  <div class="container">
    <h1>Gestion du parc informatique</h1>
    <?php if ($success): ?>
      <div class="alert alert-success">✓ <?= htmlspecialchars($success) ?></div>
    <?php endif; ?>
    <?php if ($error): ?>
      <div class="alert alert-error">✗ <?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <h2>Ajouter un poste</h2>
    <form method="post" class="form-inline">
      <input type="hidden" name="action" value="add_pc">
      <div class="form-group"><input type="text" name="name" placeholder="Nom du poste" required></div>
      <div class="form-group"><input type="text" name="image_url" placeholder="URL image"></div>
      <div class="form-group"><input type="number" step="0.01" name="price" placeholder="Prix"></div>
      <div class="form-group"><input type="text" name="description" placeholder="Description"></div>
      <div class="form-group"><button class="btn">Ajouter</button></div>
    </form>

    <h2>Ajouter un composant</h2>
    <form method="post" class="form-inline">
      <input type="hidden" name="action" value="add_component">
      <div class="form-group"><input type="text" name="comp_name" placeholder="Nom composant" required></div>
      <div class="form-group"><input type="text" name="comp_type" placeholder="Type (ex: RAM, CPU)"></div>
      <div class="form-group"><input type="text" name="comp_desc" placeholder="Description"></div>
      <div class="form-group"><button class="btn">Ajouter</button></div>
    </form>

    <h2>Postes existants</h2>
    <?php if (empty($pcs)): ?>
      <p>Aucun poste enregistré.</p>
    <?php else: ?>
      <div class="pc-list">
        <?php foreach ($pcs as $pc): ?>
          <div class="pc-card">
            <h3><?= htmlspecialchars($pc['name']) ?> <small>(#<?= $pc['id'] ?>)</small></h3>
            <?php if (!empty($pc['image_url'])): ?>
              <img src="<?= htmlspecialchars($pc['image_url']) ?>" alt="<?= htmlspecialchars($pc['name']) ?>" style="max-width:200px">
            <?php endif; ?>
            <p><?= nl2br(htmlspecialchars($pc['description'])) ?></p>
            <p><strong>Prix:</strong> <?= number_format((float)$pc['price'], 2, ',', ' ') . ' ' . CURRENCY ?></p>

            <h4>Composants attachés</h4>
            <?php
              $comp_stmt = $db->prepare('SELECT c.id, c.name, c.type FROM pc_components pc JOIN components c ON pc.component_id = c.id WHERE pc.pc_id = :pc_id');
              $comp_stmt->execute([':pc_id' => $pc['id']]);
              $attached = $comp_stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <?php if (empty($attached)): ?>
              <p>Aucun composant attaché.</p>
            <?php else: ?>
              <ul>
                <?php foreach ($attached as $a): ?>
                  <li>
                    <?= htmlspecialchars($a['name']) ?> (<?= htmlspecialchars($a['type']) ?>)
                    <form method="post" style="display:inline">
                      <input type="hidden" name="action" value="remove_component">
                      <input type="hidden" name="pc_id" value="<?= $pc['id'] ?>">
                      <input type="hidden" name="component_id" value="<?= $a['id'] ?>">
                      <button class="btn btn-sm">Retirer</button>
                    </form>
                  </li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>

            <h5>Attacher un composant</h5>
            <form method="post" class="form-inline">
              <input type="hidden" name="action" value="attach_component">
              <input type="hidden" name="pc_id" value="<?= $pc['id'] ?>">
              <select name="component_id" required>
                <option value="">--Choisir un composant--</option>
                <?php foreach ($components as $c): ?>
                  <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['name']) ?> (<?= htmlspecialchars($c['type']) ?>)</option>
                <?php endforeach; ?>
              </select>
              <button class="btn">Attacher</button>
            </form>

            <form method="post" onsubmit="return confirm('Supprimer ce poste ?');">
              <input type="hidden" name="action" value="delete_pc">
              <input type="hidden" name="pc_id" value="<?= $pc['id'] ?>">
              <button class="btn btn-danger">Supprimer le poste</button>
            </form>
          </div>
          <hr>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
