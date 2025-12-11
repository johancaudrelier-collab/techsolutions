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
  $stmt = $db->query('SELECT * FROM contacts');
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $dir = __DIR__ . '/../backups';
  if (!is_dir($dir)) mkdir($dir, 0777, true);
  $file = $dir . '/contacts_backup_' . date('Ymd_His') . '.sql';

  $out = "-- Backup contacts table\n-- Generated: " . date('c') . "\n\n";
  $out .= "DELETE FROM `contacts`;\n\n";

  foreach ($rows as $r) {
    $cols = array_keys($r);
    $vals = array_map(function($v) use ($db) { return $db->quote($v); }, array_values($r));
    $out .= 'INSERT INTO `contacts` (`' . implode('`,`', $cols) . '`) VALUES(' . implode(',', $vals) . ');\n';
  }

  file_put_contents($file, $out);
  echo 'Sauvegarde effectuée: ' . basename($file);
  echo '<br><a href="../backups/' . basename($file) . '">Télécharger</a>';

} catch (PDOException $e) {
  http_response_code(500);
  echo 'Erreur de sauvegarde: ' . htmlspecialchars($e->getMessage());
}
