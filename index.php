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
    <p class="section-subtitle">Solutions complètes pour tous vos besoins informatiques</p>
    
    <div class="services-grid">
      <!-- Service Card 1 -->
      <article class="service-card">
        <div class="service-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12 6.477 2 12 2z"/>
            <path d="M12 6v6l4 2"/>
          </svg>
        </div>
        <h3 class="service-title">Consulting IT</h3>
        <p class="service-desc">Audit, stratégie et optimisation de votre infrastructure informatique pour maximiser la performance et réduire les coûts.</p>
      </article>

      <!-- Service Card 2 -->
      <article class="service-card">
        <div class="service-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <rect x="2" y="3" width="20" height="14" rx="2" ry="2"/>
            <line x1="2" y1="20" x2="22" y2="20"/>
          </svg>
        </div>
        <h3 class="service-title">Support Technique</h3>
        <p class="service-desc">Support 24/7, maintenance préventive et résolution rapide de tous vos problèmes informatiques.</p>
      </article>

      <!-- Service Card 3 -->
      <article class="service-card">
        <div class="service-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M12 1v6m0 6v6M1 12h6m6 0h6"/>
            <circle cx="12" cy="12" r="9"/>
          </svg>
        </div>
        <h3 class="service-title">Cloud & Sécurité</h3>
        <p class="service-desc">Migration cloud sécurisée, sauvegarde des données et protection contre les cybermenaces.</p>
      </article>

      <!-- Service Card 4 -->
      <article class="service-card">
        <div class="service-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/>
          </svg>
        </div>
        <h3 class="service-title">Développement Custom</h3>
        <p class="service-desc">Applications et logiciels sur mesure adaptés à vos besoins métier spécifiques.</p>
      </article>

      <!-- Service Card 5 -->
      <article class="service-card">
        <div class="service-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M18.364 5.636l-3.536 3.536m9.172-9.172l-3.536 3.536m0 9.172l3.536 3.536m-9.172-9.172l3.536-3.536"/>
            <rect x="3" y="3" width="18" height="18" rx="2"/>
          </svg>
        </div>
        <h3 class="service-title">Infrastructure</h3>
        <p class="service-desc">Conception, mise en place et gestion de serveurs, réseaux et data centers.</p>
      </article>

      <!-- Service Card 6 -->
      <article class="service-card">
        <div class="service-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2m0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/>
          </svg>
        </div>
        <h3 class="service-title">Formation & Accompagnement</h3>
        <p class="service-desc">Formation des équipes, documentation et accompagnement pour maîtriser vos nouveaux outils.</p>
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
    $stmt = get_pdo()->query('SELECT * FROM news ORDER BY published_at DESC LIMIT 3');
    $news_list = $stmt->fetchAll();
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
