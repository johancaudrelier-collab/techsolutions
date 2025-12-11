<?php
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/header.php';
?>

<!-- Hero Section -->
<section class="hero-section">
  <div class="hero-content">
    <h1 class="hero-title">Transformez votre infrastructure IT</h1>
    <p class="hero-subtitle">Solutions informatiques modernes et performantes pour votre entreprise</p>
    <div class="hero-buttons">
      <a href="#services" class="btn btn-primary btn-lg">Découvrir nos services</a>
      <a href="#contact" class="btn btn-secondary btn-lg">Nous contacter</a>
    </div>
  </div>
  <div class="hero-background">
    <div class="glow glow-1"></div>
    <div class="glow glow-2"></div>
    <div class="glow glow-3"></div>
  </div>
</section>

<!-- Services Section -->
<section id="services" class="section services-section">
  <div class="container">
    <h2 class="section-title">Nos Services</h2>
    <p class="section-subtitle">Solutions informatiques complètes adaptées à vos besoins</p>
    
    <div class="services-grid">
      <!-- Service Card 1 -->
      <article class="service-card">
        <div class="service-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M14.5 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V9.5"/>
            <path d="M12 13V3m0 10l-4-4m8 4l4-4"/>
          </svg>
        </div>
        <h3 class="service-title">Développement Logiciel</h3>
        <p class="service-desc">Création et maintenance de logiciels sur mesure adaptés à vos processus métier spécifiques.</p>
      </article>

      <!-- Service Card 2 -->
      <article class="service-card">
        <div class="service-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="12" r="1"/>
            <path d="M12 1v6m0 6v6M4.22 4.22l4.24 4.24m2.08 2.08l4.24 4.24M1 12h6m6 0h6M4.22 19.78l4.24-4.24m2.08-2.08l4.24-4.24M19.78 19.78l-4.24-4.24m-2.08-2.08l-4.24-4.24"/>
          </svg>
        </div>
        <h3 class="service-title">Gestion Infrastructure IT</h3>
        <p class="service-desc">Mise en place et entretien des réseaux, serveurs et infrastructures informatiques performantes et sécurisées.</p>
      </article>

      <!-- Service Card 3 -->
      <article class="service-card">
        <div class="service-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="12" r="1"/>
            <path d="M19.07 4.93a10 10 0 0 0-14.14 0"/>
            <path d="M15.58 8.42a6 6 0 0 0-8.49 8.49"/>
            <path d="M12 2v4m0 8v4"/>
          </svg>
        </div>
        <h3 class="service-title">Design UX/UI</h3>
        <p class="service-desc">Conception d'interfaces utilisateur attrayantes, intuitives et fonctionnelles pour vos applications.</p>
      </article>

      <!-- Service Card 4 -->
      <article class="service-card">
        <div class="service-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2m-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
          </svg>
        </div>
        <h3 class="service-title">Support Client Technique</h3>
        <p class="service-desc">Assistance technique réactive et assistance complète pour garantir la continuité de vos services.</p>
      </article>

      <!-- Service Card 5 -->
      <article class="service-card">
        <div class="service-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
            <path d="M7 11V7a4 4 0 0 1 4-4h2a4 4 0 0 1 4 4v4"/>
            <circle cx="12" cy="16" r="1"/>
          </svg>
        </div>
        <h3 class="service-title">Cybersécurité</h3>
        <p class="service-desc">Protection contre les menaces, gestion des accès et conformité avec les normes de sécurité informatique.</p>
      </article>

      <!-- Service Card 6 -->
      <article class="service-card">
        <div class="service-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2m0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm1-13h-2v6l5.25 3.15.75-1.23-3-1.92z"/>
          </svg>
        </div>
        <h3 class="service-title">Formation & Accompagnement</h3>
        <p class="service-desc">Formation des équipes et accompagnement pour assurer l'adoption et la maîtrise de vos nouveaux outils.</p>
      </article>
    </div>
  </div>
</section>

<!-- Why Us Section -->
<section class="section why-us-section">
  <div class="container">
    <h2 class="section-title">Pourquoi nous choisir ?</h2>
    
    <div class="why-us-grid">
      <div class="why-us-card">
        <div class="why-us-number">01</div>
        <h3>Expertise reconnue</h3>
        <p>Plus de 10 ans d'expérience dans le secteur informatique avec une équipe de professionnels certifiés.</p>
      </div>
      <div class="why-us-card">
        <div class="why-us-number">02</div>
        <h3>Réactivité</h3>
        <p>Support rapide et efficace pour minimiser les interruptions de service et maximiser votre productivité.</p>
      </div>
      <div class="why-us-card">
        <div class="why-us-number">03</div>
        <h3>Personnalisation</h3>
        <p>Solutions adaptées à votre contexte, votre budget et vos objectifs métier spécifiques.</p>
      </div>
      <div class="why-us-card">
        <div class="why-us-number">04</div>
        <h3>Transparence</h3>
        <p>Communication claire, rapports détaillés et suivi constant de vos projets informatiques.</p>
      </div>
    </div>
  </div>
</section>

<!-- Testimonials Section -->
<section class="section testimonials-section">
  <div class="container">
    <h2 class="section-title">Témoignages clients</h2>
    
    <div class="testimonials-grid">
      <article class="testimonial-card">
        <div class="testimonial-stars">★★★★★</div>
        <p class="testimonial-text">"TechSolution a transformé notre infrastructure IT. Service professionnel et équipe très réactive."</p>
        <p class="testimonial-author">— Jean Dupont, Directeur IT</p>
      </article>
      
      <article class="testimonial-card">
        <div class="testimonial-stars">★★★★★</div>
        <p class="testimonial-text">"Excellent support technique et solutions innovantes. Hautement recommandé pour les PME/PMI."</p>
        <p class="testimonial-author">— Marie Bernard, CEO StartUp</p>
      </article>
      
      <article class="testimonial-card">
        <div class="testimonial-stars">★★★★★</div>
        <p class="testimonial-text">"Migration cloud sans interruption et formation complète. Un vrai partenaire pour notre croissance."</p>
        <p class="testimonial-author">— Philippe Moreau, Responsable IT</p>
      </article>
    </div>
  </div>
</section>

<!-- News Section -->
<section class="section news-section">
  <div class="container">
    <h2 class="section-title">Actualités</h2>
    <p class="section-subtitle">Restez informé de nos dernières infos et mises à jour</p>
    <?php
    try {
      $stmt = pdo()->query('SELECT * FROM news ORDER BY published_at DESC LIMIT 3');
      $news_list = $stmt->fetchAll();
    } catch (PDOException $e) {
      // Si la table 'news' n'existe pas ou autre erreur DB, on évite une erreur fatale
      $news_list = [];
      error_log('News query error: ' . $e->getMessage());
    }
    ?>
    <?php if (empty($news_list)): ?>
      <p>Aucune actualité pour le moment.</p>
    <?php else: ?>
      <div class="news-grid">
        <?php foreach ($news_list as $article): ?>
          <article class="news-card">
            <h3><?= htmlspecialchars($article['title']) ?></h3>
            <time><?= date('d/m/Y', strtotime($article['published_at'])) ?></time>
            <p><?= htmlspecialchars(substr($article['content'], 0, 120)) ?>...</p>
          </article>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
    <a href="actualites.php" class="btn btn-secondary">Voir toutes les actualités</a>
  </div>
</section>

<!-- CTA Section -->
<section id="contact" class="cta-section">
  <div class="container">
    <h2 class="cta-title">Prêt à améliorer votre IT ?</h2>
    <p class="cta-subtitle">Contactez-nous pour une consultation gratuite et découvrez comment nous pouvons aider votre entreprise.</p>
    <a href="contact.php" class="btn btn-primary btn-lg">Demander un devis</a>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
