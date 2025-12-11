# 🚀 Guide Complet du Site TechSolutions

## ✅ INITIALISATION (À faire une seule fois)

### 1️⃣ Créer les tables de la base de données
Avant d'utiliser le site, exécute ce script pour créer toutes les tables:

👉 **[Initialiser la base de données](setup_database.php)**

Cela crée automatiquement:
- Table `news` (actualités)
- Table `contacts` (messages de contact)
- Table `clients` (profils clients)
- Et insère 3 actualités de test

---

## 👥 WORKFLOW UTILISATEUR

### Étape 1: Créer un compte administrateur

**Lien:** [S'enregistrer (register.php)](register.php)

**Formulaire:**
- Username: `admin` (minimum 3 caractères)
- Email: `admin@techsolutions.com` (doit être valide et unique)
- Password: `MonPassword123` (minimum 6 caractères)
- Confirm Password: (doit correspondre)

**Résultat:** ✅ "Compte créé avec succès!"

---

### Étape 2: Se connecter

**Lien:** [Se connecter (login.php)](login.php)

**Formulaire:**
- Username: `admin`
- Password: `MonPassword123`

**Résultat:** ✅ Redirigé vers l'accueil, la session est créée

---

### Étape 3: Accéder à l'espace administrateur

**Lien:** [Admin (après connexion)](admin/) 

**Dashboard admin affiche:**
- Nombre de clients
- Nombre de contacts reçus
- Nombre d'actualités
- Nombre de postes IT
- Liste des 5 derniers contacts

**Sous-pages disponibles:**

#### 📰 Gérer les actualités
- **Lien:** [Admin > Actualités](admin/news.php)
- **Actions:** Créer, modifier, supprimer des actualités

#### 📋 Voir les contacts
- **Lien:** [Admin > Contacts](admin/contacts.php)
- **Actions:** Voir tous les messages de contact reçus

#### 👥 Voir les clients
- **Lien:** [Admin > Clients](admin/clients.php)
- **Actions:** Voir la liste de tous les clients

#### 🖥️ Gérer les postes IT
- **Lien:** [Admin > Postes IT](admin/pcs.php)
- **Actions:** Créer, modifier, supprimer des postes informatiques

---

### Étape 4: Voir le parc informatique (admin uniquement)

**Lien:** [Parc informatique (parc.php)](parc.php)

**Accès:** ✅ Réservé aux utilisateurs connectés avec rôle "admin"

**Contenu:** Liste des postes de travail avec:
- Photo
- Nom du poste
- Prix
- Spécifications techniques

**Si non connecté:** ❌ Redirection vers la page de connexion

---

### Étape 5: Consulter les actualités (public)

**Lien:** [Actualités (actualites.php)](actualites.php)

**Accès:** ✅ Public, accessible à tous

**Contenu:** 
- Actualités triées par date décroissante
- Titre, contenu, date de publication

---

### Étape 6: Envoyer un message (public)

**Lien:** [Contact (contact.php)](contact.php)

**Accès:** ✅ Public, accessible à tous

**Formulaire:**
- Nom complet (obligatoire)
- Email (obligatoire, doit être valide)
- Sujet (obligatoire)
- Message (obligatoire, minimum 10 caractères)

**Résultat:** 
- ✅ "Message envoyé avec succès!"
- Le message est sauvegardé en base de données
- L'admin peut le voir dans le dashboard

---

### Étape 7: Se déconnecter

**Lien:** [Déconnexion (logout.php)](logout.php)

**Résultat:** 
- ✅ Session détruite
- Redirigé vers l'accueil
- Les pages protégées (parc, admin) ne sont plus accessibles

---

## 🔐 SÉCURITÉ

### Protection par rôle
- ✅ **Parc informatique:** Réservé aux admins
- ✅ **Espace admin:** Réservé aux admins
- ✅ **Formulaires publics:** Accessibles à tous
- ✅ **Pages publiques:** Accessibles à tous

### Validation des données
- ✅ Email valide (filter_var FILTER_VALIDATE_EMAIL)
- ✅ Mot de passe hashé (password_hash PASSWORD_DEFAULT)
- ✅ Protection contre l'injection SQL (prepared statements)
- ✅ Échappement HTML (htmlspecialchars)

### Gestion des sessions
- ✅ Session PHP sécurisée
- ✅ Stockage du username et du rôle
- ✅ Vérification du rôle 'admin' pour les pages protégées

---

## 📊 TABLES DE LA BASE DE DONNÉES

### users
```
id (INT) - Clé primaire
username (VARCHAR 50) - Unique, requis
email (VARCHAR 100) - Unique, requis
password_hash (VARCHAR 255) - Requis
role (ENUM: admin, employe, direction, rh, support)
created_at (TIMESTAMP)
```

### news
```
id (INT) - Clé primaire
title (VARCHAR 255) - Requis
content (LONGTEXT) - Requis
image_url (VARCHAR 255)
published_at (TIMESTAMP)
created_at (TIMESTAMP)
```

### contacts
```
id (INT) - Clé primaire
name (VARCHAR 100) - Requis
email (VARCHAR 100) - Requis
subject (VARCHAR 255) - Requis
message (LONGTEXT) - Requis
status (VARCHAR 50) - Défaut: 'nouveau'
created_at (TIMESTAMP)
```

### clients
```
id (INT) - Clé primaire
first_name (VARCHAR 100) - Requis
last_name (VARCHAR 100) - Requis
email (VARCHAR 100) - Unique, requis
phone (VARCHAR 20)
company (VARCHAR 100)
address (VARCHAR 255)
city (VARCHAR 100)
postal_code (VARCHAR 10)
country (VARCHAR 100)
created_at (TIMESTAMP)
```

### pcs
```
id (INT) - Clé primaire
name (VARCHAR 255) - Requis
description (LONGTEXT)
image_url (VARCHAR 255)
price (DECIMAL)
```

---

## 🧪 TESTS RAPIDES

### Test 1: Sans être connecté
1. Ouvre [http://localhost/techsolutions/parc.php](parc.php)
2. ❌ Tu devrais être redirigé vers la login
3. Ouvre [http://localhost/techsolutions/admin/](admin/)
4. ❌ Tu devrais être redirigé vers la login

### Test 2: Avec un compte admin
1. Va sur [register.php](register.php), crée un compte
2. Va sur [login.php](login.php), connecte-toi
3. ✅ Tu vois maintenant "Admin" et "Déconnexion" dans le menu
4. Accède à [parc.php](parc.php) - ✅ Visible maintenant
5. Accède à [admin/](admin/) - ✅ Visible maintenant

### Test 3: Envoi de message
1. Va sur [contact.php](contact.php)
2. Remplis le formulaire
3. ✅ Message reçu: "Merci! Votre message a été envoyé"
4. Va dans [admin/contacts.php](admin/contacts.php)
5. ✅ Le message apparaît dans la liste

### Test 4: Gestion des actualités
1. Va sur [admin/news.php](admin/news.php)
2. Crée une nouvelle actualité
3. Va sur [actualites.php](actualites.php)
4. ✅ La nouvelle actualité apparaît

---

## 💡 CONSEILS D'UTILISATION

- 🔐 **Stockez le mot de passe en sécurité** - C'est hash en base de données
- 📧 **Utilisez un email réel** - C'est utilisé pour les contacts
- 👤 **Un username par compte** - Le système refuse les doublons
- 🔄 **Déconnectez-vous** avant de fermer le navigateur pour la sécurité

---

## 🆘 DÉPANNAGE

| Problème | Solution |
|----------|----------|
| Erreur "Table not found" | Exécute [setup_database.php](setup_database.php) |
| Connexion échouée | Vérifie username et password |
| Page blanche | Vérifie que XAMPP/MySQL est actif |
| Formulaire ne se soumet pas | Vérifie que tous les champs sont remplis |
| Admin non accessible | Vérifie que le rôle est "admin" dans la base de données |

---

## 📱 NAVIGATION PRINCIPALE

```
Accueil (index.php)
├── Actualités (actualites.php) - Public
├── Parc informatique (parc.php) - Admin seulement
├── Contact (contact.php) - Public
├── Connexion (login.php) - Public
├── S'enregistrer (register.php) - Public
└── [Une fois connecté en admin]
    ├── Admin (admin/index.php) - Dashboard
    ├── Contacts (admin/contacts.php) - Gérer
    ├── Actualités (admin/news.php) - Gérer
    ├── Clients (admin/clients.php) - Voir
    └── Déconnexion (logout.php)
```

---

**Version:** 1.0  
**Dernière mise à jour:** Décembre 2025  
**Status:** ✅ Opérationnel
