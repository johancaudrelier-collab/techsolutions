<?php
// Page frontale/alias pour gestion du parc (protégée)
require_once __DIR__ . '/includes/db.php';
if (session_status() === PHP_SESSION_NONE) session_start();

if (empty($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
  header('Location: login.php');
  exit;
}

// Redirige vers la page admin/pcs.php
header('Location: admin/pcs.php');
exit;
?>