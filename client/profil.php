<?php
require_once __DIR__ . '/../includes/db.php';
if (session_status() === PHP_SESSION_NONE) session_start();

if (empty($_SESSION['client_id'])) {
  header('Location: ../client_login.php');
  exit;
}

$client_id = $_SESSION['client_id'];
$stmt = pdo()->prepare('SELECT * FROM clients WHERE id = :id');
$stmt->execute([':id' => $client_id]);
$client = $stmt->fetch();

if (!$client) {
  header('Location: ../client_login.php');
  exit;
}

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $first_name = trim($_POST['first_name'] ?? '');
  $last_name = trim($_POST['last_name'] ?? '');
  $phone = trim($_POST['phone'] ?? '');
  $company = trim($_POST['company'] ?? '');
  $address = trim($_POST['address'] ?? '');
  $city = trim($_POST['city'] ?? '');
  $postal_code = trim($_POST['postal_code'] ?? '');
  $country = trim($_POST['country'] ?? '');

  if ($first_name === '' || $last_name === '') {
    $error = 'Prénom et nom sont obligatoires.';
  } else {
    try {
      $stmt = pdo()->prepare('UPDATE clients SET first_name = :first_name, last_name = :last_name, phone = :phone, company = :company, address = :address, city = :city, postal_code = :postal_code, country = :country WHERE id = :id');
      $stmt->execute([
        ':first_name' => $first_name,
        ':last_name' => $last_name,
        ':phone' => $phone,
        ':company' => $company,
        ':address' => $address,
        ':city' => $city,
        ':postal_code' => $postal_code,
        ':country' => $country,
        ':id' => $client_id
      ]);
      $success = 'Profil mis à jour avec succès !';
      $stmt = pdo()->prepare('SELECT * FROM clients WHERE id = :id');
      $stmt->execute([':id' => $client_id]);
      $client = $stmt->fetch();
    } catch (PDOException $e) {
      $error = 'Erreur lors de la mise à jour.';
    }
  }
}

require_once __DIR__ . '/../includes/header.php';
?>

<section class="client-section">
  <div class="container">
    <h1>Mon profil</h1>
    <p>Connecté en tant que: <?= htmlspecialchars($client['email']) ?></p>
    <a href="../logout.php" class="btn btn-secondary btn-sm">Déconnexion</a>

    <?php if ($success): ?>
      <div class="alert-success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>
    <?php if ($error): ?>
      <div class="alert-error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="post" style="background:#fff;padding:20px;border-radius:12px;border:1px solid #e6eef2;max-width:600px;margin:20px auto">
      <h2>Mes informations personnelles (RGPD)</h2>
      <p style="color:#64748b">Vous pouvez modifier vos données à tout moment. Conformément au RGPD, vous avez le droit d'accès, de modification et de suppression de vos données.</p>

      <div class="form-group">
        <label>Prénom</label>
        <input type="text" name="first_name" value="<?= htmlspecialchars($client['first_name']) ?>" required>
      </div>

      <div class="form-group">
        <label>Nom</label>
        <input type="text" name="last_name" value="<?= htmlspecialchars($client['last_name']) ?>" required>
      </div>

      <div class="form-group">
        <label>Téléphone</label>
        <input type="tel" name="phone" value="<?= htmlspecialchars($client['phone'] ?? '') ?>">
      </div>

      <div class="form-group">
        <label>Entreprise</label>
        <input type="text" name="company" value="<?= htmlspecialchars($client['company'] ?? '') ?>">
      </div>

      <div class="form-group">
        <label>Adresse</label>
        <input type="text" name="address" value="<?= htmlspecialchars($client['address'] ?? '') ?>">
      </div>

      <div class="form-group">
        <label>Ville</label>
        <input type="text" name="city" value="<?= htmlspecialchars($client['city'] ?? '') ?>">
      </div>

      <div class="form-group">
        <label>Code postal</label>
        <input type="text" name="postal_code" value="<?= htmlspecialchars($client['postal_code'] ?? '') ?>">
      </div>

      <div class="form-group">
        <label>Pays</label>
        <input type="text" name="country" value="<?= htmlspecialchars($client['country'] ?? '') ?>">
      </div>

      <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>

    <div style="background:#f0f9ff;padding:16px;border-radius:8px;margin:20px auto;max-width:600px">
      <h3>Vos droits (RGPD)</h3>
      <ul>
        <li>Droit d'accès: vous pouvez voir toutes vos données</li>
        <li>Droit de rectification: vous pouvez modifier vos données</li>
        <li>Droit à l'oubli: vous pouvez demander la suppression de vos données</li>
        <li>Droit à la portabilité: vous pouvez recevoir vos données</li>
      </ul>
      <p style="color:#64748b">Pour exercer ces droits, contactez-nous à <strong>privacy@techsolutions.fr</strong></p>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
