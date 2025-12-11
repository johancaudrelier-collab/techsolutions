<?php
require_once __DIR__ . '/config.php';

try {
  $db = pdo();
  
  // Vérifier si la table existe
  $result = $db->query("DESCRIBE users");
  $columns = $result->fetchAll(PDO::FETCH_ASSOC);
  
  echo "=== STRUCTURE DE LA TABLE USERS ===\n\n";
  foreach ($columns as $col) {
    echo "Colonne: {$col['Field']}\n";
    echo "Type: {$col['Type']}\n";
    echo "Nullable: {$col['Null']}\n";
    echo "Key: {$col['Key']}\n";
    echo "Extra: {$col['Extra']}\n";
    echo "---\n";
  }
  
  // Afficher les données existantes (si pas vides)
  $result = $db->query("SELECT COUNT(*) as count FROM users");
  $count = $result->fetch(PDO::FETCH_ASSOC);
  echo "\nNombre de comptes: " . $count['count'] . "\n";
  
  // Afficher les utilisateurs existants
  if ($count['count'] > 0) {
    echo "\nUtilisateurs existants:\n";
    $result = $db->query("SELECT * FROM users");
    $users = $result->fetchAll(PDO::FETCH_ASSOC);
    foreach ($users as $user) {
      echo json_encode($user) . "\n";
    }
  }
  
} catch (PDOException $e) {
  echo "ERREUR: " . $e->getMessage() . "\n";
  die;
}
?>
