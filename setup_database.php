<?php
require_once __DIR__ . '/config.php';

try {
  $db = pdo();
  
  echo "🔧 Création des tables manquantes...\n\n";
  
  // 1. TABLE NEWS
  echo "1️⃣  Création de la table 'news'...\n";
  $sql = "CREATE TABLE IF NOT EXISTS news (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content LONGTEXT NOT NULL,
    image_url VARCHAR(255),
    published_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";
  
  $db->exec($sql);
  echo "   ✅ Table 'news' créée\n";
  
  // 2. TABLE CONTACTS
  echo "\n2️⃣  Création de la table 'contacts'...\n";
  $sql = "CREATE TABLE IF NOT EXISTS contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    subject VARCHAR(255) NOT NULL,
    message LONGTEXT NOT NULL,
    status VARCHAR(50) DEFAULT 'nouveau',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";
  
  $db->exec($sql);
  echo "   ✅ Table 'contacts' créée\n";
  
  // 3. TABLE CLIENTS
  echo "\n3️⃣  Création de la table 'clients'...\n";
  $sql = "CREATE TABLE IF NOT EXISTS clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    phone VARCHAR(20),
    company VARCHAR(100),
    address VARCHAR(255),
    city VARCHAR(100),
    postal_code VARCHAR(10),
    country VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";
  
  $db->exec($sql);
  echo "   ✅ Table 'clients' créée\n";
  
  // 4. Insérer les actualités de test
  echo "\n4️⃣  Insertion des données de test...\n";
  $count = $db->query("SELECT COUNT(*) as count FROM news")->fetch()['count'];
  
  if ($count == 0) {
    $db->exec("DELETE FROM news");
    
    $test_news = [
      [
        'title' => 'Lancement du nouveau parc informatique',
        'content' => 'Nous sommes heureux d\'annoncer le lancement de notre nouveau parc informatique avec des équipements dernière génération. Cette mise à jour améliore significativement la performance et la productivité.'
      ],
      [
        'title' => 'Formation aux nouveaux outils',
        'content' => 'Une formation complète aux nouveaux outils informatiques sera proposée à tous les collaborateurs. Cela permettra à chacun de tirer le meilleur parti des nouvelles technologies.'
      ],
      [
        'title' => 'Maintenance système prévue',
        'content' => 'Une maintenance système est programmée. Nous vous prie de sauvegarder vos données importantes avant cette date.'
      ]
    ];
    
    $stmt = $db->prepare("INSERT INTO news (title, content) VALUES (?, ?)");
    foreach ($test_news as $article) {
      $stmt->execute([$article['title'], $article['content']]);
    }
    echo "   ✅ 3 actualités insérées\n";
  } else {
    echo "   ℹ️  La table news contient déjà " . $count . " article(s)\n";
  }
  
  // 5. Afficher le résumé
  echo "\n\n📊 RÉSUMÉ DE LA BASE DE DONNÉES:\n";
  echo "================================\n\n";
  
  $tables = ['users', 'news', 'contacts', 'clients', 'pcs'];
  foreach ($tables as $table) {
    try {
      $result = $db->query("SELECT COUNT(*) as count FROM $table");
      $count = $result->fetch(PDO::FETCH_ASSOC)['count'];
      echo "✅ Table '$table': " . $count . " enregistrement(s)\n";
    } catch (PDOException $e) {
      echo "❌ Table '$table': N'EXISTE PAS\n";
    }
  }
  
  echo "\n✅ TOUS LES TABLEAUX SONT CONFIGURÉS!\n";
  echo "\n🚀 Vous pouvez maintenant accéder au site:\n";
  echo "   👉 http://localhost/techsolutions/\n";
  echo "   👉 http://localhost/techsolutions/test.php (guide de test)\n";
  
} catch (PDOException $e) {
  echo "❌ ERREUR: " . $e->getMessage() . "\n";
  exit(1);
}
?>
