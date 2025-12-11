<?php
/**
 * GUIDE DE TEST DU SITE TECHSOLUTIONS
 * ====================================
 * 
 * Ce script affiche le statut de toutes les fonctionnalités du site.
 */

require_once __DIR__ . '/config.php';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Test TechSolutions</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
      background: #f5f5f5;
      color: #333;
    }
    .container {
      max-width: 1000px;
      margin: 0 auto;
      background: white;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    h1 {
      color: #0ea5a4;
      border-bottom: 3px solid #0ea5a4;
      padding-bottom: 10px;
    }
    h2 {
      color: #0ea5a4;
      margin-top: 30px;
    }
    .test-item {
      padding: 15px;
      margin: 10px 0;
      border-left: 4px solid #ddd;
      background: #f9f9f9;
      border-radius: 4px;
    }
    .test-item.success {
      border-left-color: #10b981;
      background: #f0fdf4;
    }
    .test-item.error {
      border-left-color: #ef4444;
      background: #fef2f2;
    }
    .status {
      font-weight: bold;
      margin-right: 10px;
    }
    .success .status { color: #10b981; }
    .error .status { color: #ef4444; }
    .link {
      margin-top: 10px;
    }
    .link a {
      display: inline-block;
      padding: 8px 15px;
      background: #0ea5a4;
      color: white;
      text-decoration: none;
      border-radius: 4px;
      margin-right: 10px;
      margin-top: 5px;
    }
    .link a:hover {
      background: #0d9297;
    }
    code {
      background: #f0f0f0;
      padding: 2px 5px;
      border-radius: 3px;
      font-family: 'Courier New', monospace;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>🚀 Test du site TechSolutions</h1>
    
    <h2>📝 Étapes de test recommandées</h2>
    
    <div class="test-item success">
      <span class="status">✅ ÉTAPE 1:</span> Créer un compte administrateur
      <div class="link">
        <a href="register.php">Accéder à l'enregistrement</a>
      </div>
      <p><strong>Instructions:</strong></p>
      <ul>
        <li>Username: <code>admin</code></li>
        <li>Email: <code>admin@techsolutions.com</code></li>
        <li>Password: <code>MonPassword123</code></li>
        <li>Confirmez le mot de passe</li>
      </ul>
    </div>

    <div class="test-item success">
      <span class="status">✅ ÉTAPE 2:</span> Se connecter
      <div class="link">
        <a href="login.php">Accéder à la connexion</a>
      </div>
      <p><strong>Instructions:</strong></p>
      <ul>
        <li>Username: <code>admin</code></li>
        <li>Password: <code>MonPassword123</code></li>
      </ul>
    </div>

    <div class="test-item success">
      <span class="status">✅ ÉTAPE 3:</span> Accéder à l'espace administrateur (après connexion)
      <div class="link">
        <a href="admin/">Accéder au dashboard admin</a>
      </div>
      <p><strong>Fonctionnalités disponibles:</strong></p>
      <ul>
        <li>Voir les statistiques (contacts, actualités, clients, postes IT)</li>
        <li>Gérer les contacts reçus</li>
        <li>Gérer les actualités (créer, modifier, supprimer)</li>
        <li>Gérer les clients</li>
        <li>Gérer les postes informatiques</li>
      </ul>
    </div>

    <div class="test-item success">
      <span class="status">✅ ÉTAPE 4:</span> Voir le parc informatique (admin uniquement)
      <div class="link">
        <a href="parc.php">Accéder au parc informatique</a>
      </div>
      <p><strong>Note:</strong> Cette page est <strong>réservée aux admins connectés</strong>. Si vous n'êtes pas connecté, vous serez redirigé vers login.</p>
    </div>

    <div class="test-item success">
      <span class="status">✅ ÉTAPE 5:</span> Consulter les actualités (public)
      <div class="link">
        <a href="actualites.php">Accéder aux actualités</a>
      </div>
      <p><strong>Note:</strong> Page publique, accessible à tous.</p>
    </div>

    <div class="test-item success">
      <span class="status">✅ ÉTAPE 6:</span> Envoyer un message via le formulaire de contact
      <div class="link">
        <a href="contact.php">Accéder au formulaire de contact</a>
      </div>
      <p><strong>Note:</strong> Page publique, les messages sont sauvegardés en base de données.</p>
    </div>

    <div class="test-item success">
      <span class="status">✅ ÉTAPE 7:</span> Se déconnecter
      <div class="link">
        <a href="logout.php">Se déconnecter</a>
      </div>
      <p><strong>Note:</strong> Détruit la session et redirige vers l'accueil.</p>
    </div>

    <h2>🔍 Vérifications techniques</h2>

    <?php
    // Vérifier la base de données
    try {
      $db = pdo();
      echo '<div class="test-item success">';
      echo '<span class="status">✅</span> Connexion à la base de données: <code>' . DB_NAME . '</code>';
      echo '</div>';

      // Vérifier les tables
      $tables = ['users', 'news', 'contacts', 'pcs', 'clients'];
      foreach ($tables as $table) {
        try {
          $result = $db->query("SELECT COUNT(*) as count FROM $table");
          $count = $result->fetch(PDO::FETCH_ASSOC)['count'];
          echo '<div class="test-item success">';
          echo '<span class="status">✅</span> Table <code>' . $table . '</code>: ' . $count . ' enregistrement(s)';
          echo '</div>';
        } catch (PDOException $e) {
          echo '<div class="test-item error">';
          echo '<span class="status">❌</span> Table <code>' . $table . '</code> n\'existe pas!';
          echo '</div>';
        }
      }
    } catch (PDOException $e) {
      echo '<div class="test-item error">';
      echo '<span class="status">❌</span> Erreur de connexion: ' . $e->getMessage();
      echo '</div>';
    }
    ?>

    <h2>💡 Conseils</h2>
    <ul>
      <li>Testez d'abord sans être connecté (accueil, contact, actualités)</li>
      <li>Puis créez un compte et connectez-vous</li>
      <li>Essayez d'accéder aux pages protégées (parc, admin)</li>
      <li>Gérez les actualités depuis l'admin</li>
      <li>Testez la déconnexion</li>
      <li>Vérifiez que les données sont bien sauvegardées en base de données</li>
    </ul>

    <h2>📞 Support</h2>
    <p>Si vous rencontrez des problèmes, vérifiez:</p>
    <ul>
      <li>Que XAMPP est bien lancé</li>
      <li>Que MySQL est actif</li>
      <li>Que la base de données <code>techsolutions</code> existe</li>
      <li>Les fichiers <code>config.php</code> et <code>includes/db.php</code></li>
    </ul>

  </div>
</body>
</html>
