<?php
require_once __DIR__ . '/config.php';

try {
  $db = pdo();
  
  // 1. Créer la table news
  $sql = "CREATE TABLE IF NOT EXISTS news (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content LONGTEXT NOT NULL,
    image_url VARCHAR(255),
    published_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";
  
  $db->exec($sql);
  echo "✅ Table 'news' créée!\n";
  
  // 2. Insérer les données de test
  $db->exec("DELETE FROM news"); // Vider d'abord
  
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
  
  echo "✅ 3 actualités insérées!\n\n";
  
  // 3. Afficher le résultat
  $result = $db->query("SELECT id, title, published_at FROM news ORDER BY published_at DESC");
  $news = $result->fetchAll(PDO::FETCH_ASSOC);
  
  echo "📊 Actualités présentes:\n";
  foreach ($news as $item) {
    echo "  [" . $item['id'] . "] " . $item['title'] . "\n";
  }
  
  echo "\n✅ SUCCÈS! La table news est maintenant opérationnelle.\n";
  
} catch (PDOException $e) {
  echo "❌ ERREUR: " . $e->getMessage() . "\n";
  exit(1);
}
?>
