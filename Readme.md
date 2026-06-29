# 🛒 GES_BOUTIQUE

## 📖 Description

GES_BOUTIQUE est une application web développée avec **Laravel** permettant de gérer efficacement une boutique. Elle facilite la gestion des clients, des produits, des commandes et des factures tout en assurant un suivi du stock.

## ✨ Fonctionnalités

- 👥 Gestion des clients
  - Ajouter un client
  - Modifier un client
  - Supprimer un client
  - Consulter la liste des clients

- 📦 Gestion des produits
  - Ajouter un produit
  - Modifier un produit
  - Supprimer un produit
  - Gestion automatique du stock

- 🛍️ Gestion des commandes
  - Création de commandes
  - Sélection de plusieurs produits
  - Calcul automatique du montant total
  - Mise à jour automatique du stock

- 🧾 Gestion des factures
  - Génération automatique des factures
  - Téléchargement des factures au format PDF

- 📊 Tableau de bord
  - Nombre total de clients
  - Nombre total de produits
  - Nombre total de commandes
  - Chiffre d'affaires

---

## 🛠️ Technologies utilisées

- Laravel
- PHP
- MySQL
- HTML5
- CSS3
- Bootstrap 5
- Blade
- DomPDF

---

## 📂 Structure du projet

```
app/
database/
public/
resources/
routes/
storage/
```

---

## ⚙️ Installation

### 1. Cloner le projet

```bash
git clone https://github.com/VOTRE-NOM-UTILISATEUR/ges_boutique.git
```

### 2. Accéder au dossier

```bash
cd ges_boutique
```

### 3. Installer les dépendances

```bash
composer install
```

### 4. Copier le fichier d'environnement

```bash
cp .env.example .env
```

Sous Windows :

```bash
copy .env.example .env
```

### 5. Générer la clé de l'application

```bash
php artisan key:generate
```

### 6. Configurer la base de données

Modifier le fichier **.env** :

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ges_boutique
DB_USERNAME=root
DB_PASSWORD=
```

### 7. Exécuter les migrations

```bash
php artisan migrate
```

### 8. Lancer le serveur

```bash
php artisan serve
```

Puis ouvrir :

```
http://127.0.0.1:8000
```

---

## 👨‍💻 Auteur

**BEBNONE FISSOUBO Abigail**

Étudiante en Génie Informatique  
CEFOD Business School

---

## 📄 Licence

Ce projet a été réalisé dans un cadre académique à des fins d'apprentissage.
