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
  $sql = "CREATE TABLE IF NOT EXISTS `messages` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(150) NOT NULL,
    `email` varchar(150) NOT NULL,
    `subject` varchar(255) DEFAULT NULL,
    `message` longtext NOT NULL,
    `status` enum('nouveau','traite','archived') NOT NULL DEFAULT 'nouveau',
    `reply_text` longtext DEFAULT NULL,
    `replied_by` varchar(100) DEFAULT NULL,
    `replied_at` datetime DEFAULT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`),
    KEY `status` (`status`),
    KEY `created_at` (`created_at`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";

  $db->exec($sql);
  echo "Table `messages` créée (ou déjà existante).";
} catch (PDOException $e) {
  http_response_code(500);
  echo 'Erreur lors de la création de la table: ' . htmlspecialchars($e->getMessage());
}
