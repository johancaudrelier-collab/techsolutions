<?php
require_once __DIR__ . '/includes/db.php';
if (session_status() === PHP_SESSION_NONE) session_start();

// Articles fictifs (statiques pour la démo)
$articles = [
  [
    'id' => 1,
    'title' => 'TechSolutions remporte le contrat de transformation numérique pour GrouPME',
    'excerpt' => 'Nous sommes fiers d\'annoncer que TechSolutions a été sélectionnée pour accompagner GrouPME dans sa transformation numérique complète.',
    'content' => 'GrouPME, leader des services de gestion d\'entreprise, a confié à TechSolutions la modernisation de son infrastructure IT et le développement d\'une nouvelle plateforme client. Ce projet de 6 mois comprend la migration vers le cloud, l\'implémentation de solutions de cybersécurité avancées et la formation complète des équipes. Nous entamons cette collaboration avec enthousiasme et déterminés à livrer une solution à la hauteur de leurs attentes.',
    'author' => 'Équipe Marketing',
    'published_at' => '2025-12-10 09:00:00',
    'category' => 'Projets'
  ],
  [
    'id' => 2,
    'title' => 'Nouvelle certification ISO 27001 obtenue',
    'excerpt' => 'TechSolutions vient d\'obtenir sa certification ISO 27001, confirmant son engagement envers la sécurité de l\'information.',
    'content' => 'Après 3 mois d\'audit rigoureux, TechSolutions a obtenu la certification ISO 27001 qui atteste du respect de la norme internationale de gestion de la sécurité de l\'information. Cette certification reflète nos efforts constants pour protéger les données de nos clients et maintenir les plus hauts standards de sécurité. Nos processus, la formation continue de nos équipes et nos infrastructure sécurisées ont permis de réussir cette certification avec succès.',
    'author' => 'Direction',
    'published_at' => '2025-12-08 14:00:00',
    'category' => 'Actualités'
  ],
  [
    'id' => 3,
    'title' => 'Webinaire gratuit : "Cybersécurité et PME" le 20 décembre',
    'excerpt' => 'Rejoignez-nous pour un webinaire interactive sur les enjeux de sécurité informatique pour les petites et moyennes entreprises.',
    'content' => 'TechSolutions organise un webinaire gratuit destiné aux dirigeants et responsables IT des PME. Au programme : les menaces actuelles, les bonnes pratiques de sécurité, et les solutions adaptées au contexte PME. Notre expert en cybersécurité répondra à vos questions en direct. Inscription gratuite et places limitées. Rejoignez plus de 150 participants confirmés !',
    'author' => 'Équipe Formation',
    'published_at' => '2025-12-06 10:30:00',
    'category' => 'Événements'
  ],
  [
    'id' => 4,
    'title' => 'Tendance 2026 : l\'IA générative au service des PME',
    'excerpt' => 'Découvrez comment l\'IA générative peut transformer vos processus métier et améliorer votre productivité.',
    'content' => 'Les outils d\'IA générative ne sont plus réservés aux grandes entreprises. En 2026, nous observons une démocratisation rapide avec des solutions accessibles et abordables pour les PME. TechSolutions accompagne ses clients dans l\'intégration responsable de ces technologies : automatisation de tâches, amélioration du service client, analyse de données. Nous vous proposons un audit gratuit pour évaluer le potentiel de l\'IA dans votre entreprise.',
    'author' => 'Département Développement',
    'published_at' => '2025-12-04 11:00:00',
    'category' => 'Tendances'
  ],
  [
    'id' => 5,
    'title' => 'Bienvenue à l\'équipe ! 5 nouveaux développeurs rejoignent TechSolutions',
    'excerpt' => 'TechSolutions se renforce avec l\'arrivée de 5 nouveaux développeurs fullstack expérimentés.',
    'content' => 'Pour répondre à la croissance de la demande et renforcer nos capacités de développement, TechSolutions a recruté 5 nouveaux développeurs fullstack avec des expertise en React, Node.js et Python. Cette expansion reflète notre confiance dans la croissance du marché et notre ambition d\'offrir des services encore plus compétitifs. Bienvenue à toute l\'équipe !',
    'author' => 'RH',
    'published_at' => '2025-12-02 15:00:00',
    'category' => 'Entreprise'
  ],
  [
    'id' => 6,
    'title' => 'Succès client : BâtimPlus augmente sa productivité de 35%',
    'excerpt' => 'Retour d\'expérience : comment BâtimPlus a optimisé ses processus grâce à nos solutions IT sur mesure.',
    'content' => 'BâtimPlus, entreprise spécialisée dans les services du bâtiment, a fait appel à TechSolutions pour moderniser sa gestion de projet. Suite à l\'implémentation d\'une solution ERP intégrée et de processus d\'automatisation, BâtimPlus rapporte une augmentation de productivité de 35% et une meilleure traçabilité de ses chantiers. "L\'équipe TechSolutions a été exemplaire dans son accompagnement", déclare le directeur général de BâtimPlus.',
    'author' => 'Équipe Support',
    'published_at' => '2025-11-28 08:00:00',
    'category' => 'Cas client'
  ]
];

// Récupérer l'article si c'est une page de détail
$article_detail = null;
$article_id = isset($_GET['id']) ? intval($_GET['id']) : null;
if ($article_id) {
  foreach ($articles as $a) {
    if ($a['id'] == $article_id) {
      $article_detail = $a;
      break;
    }
  }
  if (!$article_detail) {
    header('Location: actualites.php');
    exit;
  }
}

require_once __DIR__ . '/includes/header.php';
?>


<?php if (!$article_id): ?>
<!-- Actualités : Listing -->

<section class="hero-section" style="min-height:300px">
  <div class="hero-content">
    <h1 class="hero-title">Actualités & Blog</h1>
    <p class="hero-subtitle">Suivez les dernières nouvelles, tendances et succès de TechSolutions</p>
  </div>
</section>

<section class="section">
  <div class="container">
    <h2 class="section-title">Nos derniers articles</h2>
    
    <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(350px,1fr));gap:30px;margin-top:40px">
      <?php foreach ($articles as $a): ?>
        <article style="background:#fff;border-radius:12px;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.1);transition:transform 0.3s ease;display:flex;flex-direction:column"
                 onmouseover="this.style.transform='translateY(-5px)'"
                 onmouseout="this.style.transform='translateY(0)'">
          <div style="background:linear-gradient(135deg,#0ea5a4,#06b6d4);color:#fff;padding:20px">
            <span style="display:inline-block;background:rgba(255,255,255,0.3);padding:5px 12px;border-radius:20px;font-size:12px;font-weight:600">
              <?= htmlspecialchars($a['category']) ?>
            </span>
            <h3 style="margin:15px 0 0 0;font-size:18px;line-height:1.4"><?= htmlspecialchars($a['title']) ?></h3>
          </div>
          
          <div style="padding:20px;flex-grow:1">
            <p style="color:#666;line-height:1.6;margin-bottom:15px"><?= htmlspecialchars($a['excerpt']) ?></p>
            
            <div style="display:flex;justify-content:space-between;align-items:center;font-size:13px;color:#999;margin-top:15px;padding-top:15px;border-top:1px solid #eee">
              <span><?= htmlspecialchars($a['author']) ?></span>
              <span><?= date('d M Y', strtotime($a['published_at'])) ?></span>
            </div>
          </div>
          
          <div style="padding:0 20px 20px">
            <a href="actualites.php?id=<?= $a['id'] ?>" 
               style="display:inline-block;color:#0ea5a4;text-decoration:none;font-weight:600;padding:10px 15px;border:2px solid #0ea5a4;border-radius:6px;transition:all 0.3s ease"
               onmouseover="this.style.background='#0ea5a4';this.style.color='#fff'"
               onmouseout="this.style.background='transparent';this.style.color='#0ea5a4'">
              Lire la suite →
            </a>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php else: ?>
<!-- Actualités : Article détail -->

<section class="section" style="background:#f8f9fb;padding:40px 0">
  <div class="container" style="max-width:800px">
    <a href="actualites.php" style="color:#0ea5a4;text-decoration:none;font-weight:600;margin-bottom:20px;display:inline-block">← Retour aux actualités</a>
    
    <article style="background:#fff;border-radius:12px;padding:40px">
      <div style="margin-bottom:25px">
        <span style="background:#0ea5a4;color:#fff;padding:6px 14px;border-radius:20px;font-size:13px;font-weight:600">
          <?= htmlspecialchars($article_detail['category']) ?>
        </span>
      </div>
      
      <h1 style="font-size:32px;line-height:1.3;margin-bottom:20px;color:#1a1a1a">
        <?= htmlspecialchars($article_detail['title']) ?>
      </h1>
      
      <div style="display:flex;gap:15px;color:#999;font-size:14px;margin-bottom:30px;padding-bottom:20px;border-bottom:1px solid #eee">
        <span>Par <strong><?= htmlspecialchars($article_detail['author']) ?></strong></span>
        <span>•</span>
        <span><?= date('d M Y', strtotime($article_detail['published_at'])) ?></span>
      </div>
      
      <div style="line-height:1.8;font-size:16px;color:#333">
        <?= nl2br(htmlspecialchars($article_detail['content'])) ?>
      </div>
      
      <div style="margin-top:40px;padding-top:30px;border-top:1px solid #eee">
        <a href="actualites.php" class="btn btn-primary">Tous les articles</a>
      </div>
    </article>
  </div>
</section>

<?php endif; ?>

<section class="news-section">
  <div class="container">
    <h1>Actualités</h1>
    <p class="subtitle">Suivez les dernières infos et mises à jour de TechSolutions</p>

    <?php if (empty($news_list)): ?>
      <p>Aucune actualité pour le moment.</p>
    <?php else: ?>
      <div class="news-list">
        <?php foreach ($news_list as $article): ?>
          <article class="news-card">
            <div class="news-header">
              <h2><?= htmlspecialchars($article['title']) ?></h2>
              <time><?= date('d/m/Y H:i', strtotime($article['published_at'])) ?></time>
            </div>
            <p><?= htmlspecialchars($article['content']) ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
