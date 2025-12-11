<?php
require_once __DIR__ . '/config.php';

try {
  $db = pdo();

  echo "== TABLE STRUCTURE & COUNTS ==\n\n";

  $tables = ['pcs', 'components', 'pc_components'];
  foreach ($tables as $t) {
    try {
      $desc = $db->query("DESCRIBE $t")->fetchAll(PDO::FETCH_ASSOC);
      echo "Table: $t\n";
      foreach ($desc as $col) {
        echo " - {$col['Field']} ({$col['Type']}) nullable={$col['Null']} key={$col['Key']} extra={$col['Extra']}\n";
      }
      $count = $db->query("SELECT COUNT(*) as c FROM $t")->fetch(PDO::FETCH_ASSOC)['c'];
      echo "Count: $count\n\n";
    } catch (PDOException $e) {
      echo "Table '$t' : ERREUR => " . $e->getMessage() . "\n\n";
    }
  }

  echo "== EXAMPLE JOINS (pc with its components) ==\n\n";
  try {
    $rows = $db->query("SELECT p.id as pc_id, p.name as pc_name, c.id as comp_id, c.name as comp_name FROM pcs p LEFT JOIN pc_components pc ON p.id=pc.pc_id LEFT JOIN components c ON pc.component_id=c.id ORDER BY p.id")->fetchAll(PDO::FETCH_ASSOC);
    if (empty($rows)) {
      echo "Aucun résultat pour la jointure pcs->pc_components->components (table vide).\n";
    } else {
      foreach ($rows as $r) {
        echo "PC[{$r['pc_id']}] {$r['pc_name']} -> Component[{$r['comp_id']}] {$r['comp_name']}\n";
      }
    }
  } catch (PDOException $e) {
    echo "Jointure erreur: " . $e->getMessage() . "\n";
  }

} catch (PDOException $e) {
  echo "CONNEXION ERREUR: " . $e->getMessage() . "\n";
}
?>