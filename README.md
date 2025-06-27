# Madarom

## Présentation

**Madarom** est une plateforme e-commerce spécialisée dans la vente d’huiles essentielles et d’épices. L’application offre une solution complète pour parcourir, acheter et gérer les commandes de ces produits.

---

## Fonctionnalités

### Pages Publiques
- **Accueil** : Page d’atterrissage principale
- **À propos** : Informations sur Madarom
- **Nos activités** : Détails sur les activités de l’entreprise
- **Nos partenaires** : Liste des partenaires collaborant avec Madarom
- **Contact** : Formulaire de contact et coordonnées
- **Mentions légales** : Conditions générales, politique de confidentialité, mentions légales

---

### Espace Utilisateur
- **Authentification** : Inscription, connexion, réinitialisation de mot de passe
- **Gestion de compte** : Visualisation et mise à jour des informations personnelles, changement de mot de passe
- **Espace client** : Interface personnalisée pour les utilisateurs enregistrés

---

### Gestion des Produits
- **Catégories de produits** :
  - Huiles essentielles
  - Épices
- **Fonctionnalités produits** :
  - Pages produits détaillées
  - Recherche de produits
  - Questions sur les produits
  - Galerie de plusieurs images par produit

---
 
### Fonctionnalités e-commerce
- **Panier** : Ajout, suppression et gestion des articles
- **Demandes de devis** : Possibilité de demander un devis pour certains produits
- **Traitement des commandes** : Processus complet d’achat
- **Facturation** : Génération et téléchargement de factures
- **Réclamations** : Dépôt de réclamations liées aux commandes ou devis

---

### Espace Administrateur
- **Tableau de bord** : Vue d’ensemble de l’activité du site
- **Gestion du CMS** :
  - Gestion des contenus textuels
  - Gestion des pages statiques
  - Gestion des images
- **Gestion des utilisateurs** : Administration des comptes clients et administrateurs
- **Gestion des produits** : Création, modification, suppression de produits
- **Gestion des devis** : Consultation et réponse aux demandes de devis
- **Gestion des commandes** : Suivi et traitement des commandes
- **Gestion des messages** : Lecture et réponse aux messages de contact
- **Gestion des réclamations** : Traitement des plaintes liées aux commandes ou devis
- **Gestion des partenaires** : Ajout et modification des partenaires
- **Paramètres SEO** : Configuration des métadonnées SEO
- **Configuration du site** : Paramétrage général, y compris le mode maintenance

---

## Détails techniques

### Technologies utilisées
- **Backend** : Laravel 10 (PHP 8.1+)
- **Frontend** : Templates Blade, JavaScript
- **Base de données** :
  - Développement : MySQL
  - Production : PostgreSQL via Supabase

---

### Dépendances principales
- **Paiement** : Stripe
- **Génération PDF** : Laravel DomPDF
- **Authentification** : Laravel Sanctum

---

### Structure de la base de données

Le projet repose sur plusieurs modèles :
- Utilisateurs et administrateurs
- Produits (Product, HuileEssentielle, Epice)
- Commandes (Commande, CommandeComplaint)
- Devis (DemandeDevis, DemandeDevisProduct)
- Gestion de contenu (StaticPage, ImagePage, SEO)
- Paramétrage général (Config, Currency, Unite)

---

## Déploiement

L’application est déployée sur **Vercel** avec la configuration suivante :
- **Runtime PHP** : `vercel-php@0.7.3`
- **Base de données** : PostgreSQL hébergée sur Supabase
- **Cache** : Répertoire temporaire `/tmp`
- **Sessions** : Basées sur des cookies

---

## Mise en route (local)

### Installation en local

1. Cloner le dépôt Git
2. Copier le fichier `.env.example` en `.env` et configurer les informations de connexion à la base de données
3. Exécuter `composer install` pour installer les dépendances PHP
4. Générer la clé d'application :
   ```bash
   php artisan key:generate
