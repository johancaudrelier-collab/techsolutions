<?php
require_once __DIR__ . '/../includes/db.php';
if (session_status() === PHP_SESSION_NONE) session_start();

if (empty($_SESSION['user']) || ($_SESSION['role'] ?? '') !== 'admin') {
  http_response_code(403);
  echo 'Accès refusé. Connectez-vous en tant qu\'administrateur.';
  exit;
}

try {
  $db = pdo();

  // Vérifier que la table messages existe
  $check = $db->query("SHOW TABLES LIKE 'messages'")->fetch();
  if (!$check) {
    echo 'La table `messages` n\'existe pas. Exécutez d\'abord create_messages_table.php';
    exit;
  }

  // Exécute la migration
  $sql = "INSERT INTO messages (name, email, subject, message, status, created_at)
          SELECT name, email, subject, message, COALESCE(status,'nouveau'), COALESCE(created_at, NOW()) FROM contacts";

  $affected = $db->exec($sql);
  echo 'Migration terminée. Lignes copiées: ' . intval($affected);

} catch (PDOException $e) {
  http_response_code(500);
  echo 'Erreur de migration: ' . htmlspecialchars($e->getMessage());
}
