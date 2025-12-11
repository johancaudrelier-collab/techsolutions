# TechSolutions - Site Web Complet

Une plateforme web moderne pour **TechSolutions** avec authentification sécurisée, gestion administrateur et interface client.

## 🎯 Fonctionnalités

### 👤 Authentification
- ✅ Inscription sécurisée avec hashage des mots de passe
- ✅ Connexion avec gestion de sessions
- ✅ Déconnexion
- ✅ Protection par rôle (admin, employe, direction, rh, support)

### 📊 Espace Administrateur
- ✅ Tableau de bord avec statistiques
- ✅ Gestion des actualités (CRUD)
- ✅ Gestion des contacts reçus
- ✅ Gestion des clients
- ✅ Gestion du parc informatique

### 🌐 Interface Publique
- ✅ Accueil avec dernières actualités
- ✅ Page actualités complète
- ✅ Formulaire de contact
- ✅ Parc informatique (réservé admin)

### 🔒 Sécurité
- ✅ Mots de passe hashés avec PASSWORD_DEFAULT
- ✅ Prepared statements pour éviter l'injection SQL
- ✅ Échappement HTML pour prévenir XSS
- ✅ Gestion de sessions sécurisée
- ✅ Validation des emails et données

## 📋 Prérequis

- XAMPP (Apache + MySQL + PHP)
- PHP 7.4+
- MySQL 5.7+

## 🚀 Installation

1. **Cloner le projet**
   ```bash
   git clone <repo-url>
   cd techsolutions
   ```

2. **Initialiser la base de données**
   - Ouvre: `http://localhost/techsolutions/setup_database.php`
   - Cela crée toutes les tables automatiquement

3. **Accéder au site**
   - URL: `http://localhost/techsolutions/`

## 📚 Documentation

- **[Guide complet d'utilisation](GUIDE.md)** - Workflow complet et tutoriels
- **[Page de test](test.php)** - Vérification de la configuration

## 📁 Structure du projet

```
techsolutions/
├── index.php                 # Accueil
├── register.php              # Inscription
├── login.php                 # Connexion
├── logout.php                # Déconnexion
├── parc.php                  # Parc informatique (admin)
├── actualites.php            # Actualités (public)
├── contact.php               # Formulaire de contact
├── config.php                # Configuration (DB, constantes)
├── styles.css                # Styles CSS
│
├── includes/
│   ├── db.php                # Connexion base de données
│   ├── header.php            # En-tête avec navigation
│   └── footer.php            # Pied de page
│
├── admin/                    # Espace administrateur
│   ├── index.php             # Dashboard
│   ├── news.php              # Gestion actualités
│   ├── contacts.php          # Gestion contacts
│   ├── clients.php           # Gestion clients
│   └── pcs.php               # Gestion postes IT
│
├── client/                   # Espace client
│   └── profil.php            # Profil client
│
├── assets/
│   ├── css/
│   │   └── futuristic.css    # Design futuriste
│   └── images/               # Images du site
│
├── setup_database.php        # Script d'initialisation
├── GUIDE.md                  # Guide complet
└── README.md                 # Ce fichier
```

## 🔑 Compte de test

Après initialisation, créez un compte administrateur:

- **Username:** admin
- **Email:** admin@techsolutions.com
- **Password:** MonPassword123

## 🛠️ Configuration

Édite `config.php` pour personnaliser:

```php
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'techsolutions');
define('DB_USER', 'root');
define('DB_PASS', '');
define('SITE_NAME', 'TechSolutions');
define('CURRENCY', '€');
```

## 📊 Base de données

**Tables créées automatiquement:**

- `users` - Comptes utilisateurs
- `news` - Actualités
- `contacts` - Messages de contact
- `clients` - Profils clients
- `pcs` - Postes informatiques

[Voir détails des tables dans le GUIDE.md](GUIDE.md)

## 🚀 Workflow complet

1. **Sans compte:** Accueil, Actualités, Contact (public)
2. **Créer un compte:** [register.php](register.php)
3. **Se connecter:** [login.php](login.php)
4. **Admin:** [/admin/](admin/) - Gestion complète
5. **Parc IT:** [parc.php](parc.php) - Visible seulement pour admin
6. **Déconnexion:** [logout.php](logout.php)

## 🧪 Tests

Ouvre [test.php](test.php) pour:
- Vérifier la configuration
- Accéder à tous les formulaires
- Tester chaque page

## 📞 Support technique

Vérifiez les points suivants en cas de problème:

1. XAMPP est lancé (Apache + MySQL)
2. La base de données `techsolutions` existe
3. `setup_database.php` a été exécuté
4. Les fichiers `config.php` et `includes/db.php` sont corrects

## 📄 Licence

Propriété de TechSolutions © 2025

## ✨ Fonctionnalités futures

- [ ] Authentification email
- [ ] Export PDF des rapports
- [ ] API REST
- [ ] Module de facturation
- [ ] Chat support
- [ ] Analytics avancées

---

**Version:** 1.0.0  
**Status:** ✅ Production Ready  
**Dernière mise à jour:** Décembre 2025
