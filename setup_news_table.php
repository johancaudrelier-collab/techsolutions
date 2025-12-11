<?php
require_once __DIR__ . '/config.php';

try {
  $db = pdo();
  
  // Créer la table news
  $sql = "CREATE TABLE IF NOT EXISTS news (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content LONGTEXT NOT NULL,
    image_url VARCHAR(255),
    published_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";
  
  $db->exec($sql);
  echo "✅ Table 'news' créée ou vérifiée avec succès!\n\n";
  
  // Insérer quelques actualités de test si la table est vide
  $result = $db->query("SELECT COUNT(*) as count FROM news");
  $count = $result->fetch(PDO::FETCH_ASSOC);
  
  if ($count['count'] == 0) {
    $test_news = [
      [
        'title' => 'Lancement du nouveau parc informatique',
        'content' => 'Nous sommes heureux d\'annoncer le lancement de notre nouveau parc informatique avec des équipements dernière génération. Cette mise à jour améliore significativement la performance et la productivité.',
        'image_url' => ''
      ],
      [
        'title' => 'Formation aux nouveaux outils',
        'content' => 'Une formation complète aux nouveaux outils informatiques sera proposée à tous les collaborateurs à partir du mois prochain. Cela permettra à chacun de tirer le meilleur parti des nouvelles technologies.',
        'image_url' => ''
      ],
      [
        'title' => 'Maintenance système prévue',
        'content' => 'Une maintenance système est programmée le vendredi 15 décembre de 22h à 6h du matin. Nous vous prie de sauvegarder vos données importantes avant cette date.',
        'image_url' => ''
      ]
    ];
    
    $stmt = $db->prepare("INSERT INTO news (title, content, image_url) VALUES (?, ?, ?)");
    foreach ($test_news as $article) {
      $stmt->execute([$article['title'], $article['content'], $article['image_url']]);
    }
    
    echo "✅ 3 actualités de test insérées!\n\n";
  } else {
    echo "ℹ️  La table news contient déjà " . $count['count'] . " actualité(s).\n\n";
  }
  
  echo "📊 Actualités présentes dans la base:\n";
  $result = $db->query("SELECT id, title, published_at FROM news ORDER BY published_at DESC");
  $news = $result->fetchAll(PDO::FETCH_ASSOC);
  foreach ($news as $item) {
    echo "  - [" . $item['id'] . "] " . $item['title'] . " (" . $item['published_at'] . ")\n";
  }
  
} catch (PDOException $e) {
  echo "❌ ERREUR: " . $e->getMessage() . "\n";
}
?>
