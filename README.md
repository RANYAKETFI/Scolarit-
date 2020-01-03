# ESI-Scolarité



## Objectifs de l'application

**ESI-Scolarité** est une application réalisée à l'intention de la scolarité de l'ESI.

Les deux fonctionnalités développées sont :
- Permettre à tout enseignant de marquer les absences des étudiants qui se sont absentés dans les séances qu'il enseigne.
- Permettre à tout étudiant de visualiser ses absences ainsi que leurs états (Justifié / Non justifié)

## Technologies utilisées

| Front-end : React|   | Backend : PHP Laravel 
| ------ | -- | -- | 
* **Docker** pour le déploiement.



## Pré-requis
* **XAMPP (Recommandé)**, WAMPP ou une plateforme de développement Backend équivalente.
* Dernière version du framework PHP Laravel : [Installation de Laravel]
* Dernière version de Composer.
* [npm] (Nécessaire afin de pouvoir lancer l'application sous React)
* Docker (Nécessaire dans l'étape de déploiement seulement)

## Première utilisation
###### [Les étapes mentionnées ci-dessous sont supposées fonctionner avec XAMPP]
1) Forker, copier ou télécharger le projet, et le placer dans le dossier C:\xampp\htdocs\\**Nom_de_votre_répertoire**
2) Dans la racine du projet, lancer la commande de téléchargement des packages nécessaires :

**Installation des dépendances de Laravel (packages):**
```bash
composer update
```

**Installation des dépendances de React (modules) :**
```bash
npm install
```
3) Lancer les services **Apache** et **MySQL** dans l'interface de contrôle de XAMPP.

4) Créer une nouvelle base de données via **PhpMyAdmin** ayant les caractéristiques :

| Nom : scolarite |   | Identifiant : root || Mot de passe : (laisser vide) 
| ------ | -- | --  | -- | -- | 
###### N.B : Ces caractéristiques sont modifiables via le fichier .env situé dans la racine du projet.

5) En se positionnant dans la racine du projet, lancer dans l'ordre la suite de commandes :

**Lancement de le l'environnement de développement Back-end (Laravel):**

```bash
php artisan serve
```

**Lancement des scripts de Front-end** :

```bash
npm start
```


L'application est prête à être utilisée en local, et est accessible via **localhost:3000** (3000 est le port généralement attribué pour l'exécution des scripts React excepté dans le cas où celui-ci est déjà occupé par un autre programme. Le port sera explicitement indiqué comme réponse à la commande **npm start**).

## Exécution des tests unitaires
Les tests unitaires se trouvent dans le répertoire **tests/Unit**

Pour lancer les tests unitaires, il suffit de se positionner dans la racine du projet puis de lancer la commande :

```bash
php phpunit.phar
```

## Exécution des tests automatisés
Les tests automatisés se trouvent dans le répertoire **tests/Browser**, et ont été réalisés avec l'outil **Dusk**, très similaire à Selenium et officiellement intégré à Laravel.

Pour lancer les tests automatisés, il suffit de se positionner dans la racine du projet puis de lancer la commande :

```bash
php artisan dusk
```

###### N.B : Dans le cas où les tests ne se lanceraient pas, vérifier que les données introduites dans les fichiers de tests se trouvant dans tests/Browser coïncident avec les données présentes dans la base de données du testeur.
###### Dans le cas d'une erreur d'exécution, essayer d'exécuter la commande : php artisan dusk:chrome-driver , puis réessayer (Dans le cas où le système d'exploitation du testeur dispose du navigateur Chrome par défaut)


## Documentation technique
###### Générée automatiquement avec l'outil "Laravel API Doc Generator"
S'agit de la documentation de l'API, les routes utilisées ainsi que des contrôleurs

La documentation technique de ESI-Scolarité figure dans le répertoire **public/docs** qui se trouve dans la racine de l'application. Il suffit d'ouvrir le fichier **index.html**.

## Documentation fonctionnelle :
###### Générée avec l'outil Daux
Elle décrit les fonctionnalités de l'application sous forme d'un guide d'utilisation.

La documentation fonctionnelle de l'application figure dans le répertoire **static** qui se trouve dans la racine de l'application. Il suffit d'ouvrir le fichier **ESI_SCOLARITE.html** avec un navigateur web.


## Déploiement avec Docker :

- Se positionner dans la racine de l'application, puis exécuter la commande :
```bash
docker build -t scolarite
```
## Membres de l'équipe de développement


| Nom | Prénom | Groupe |
| ------ | -- | -- |
| BOUDJELLI | Ahmed Mehdi | 06 |
| KETFI | Raniya | 06 |
| BENBRAHIM | Adam | 06 |



   [Installation de Laravel]: <https://laravel.com/docs/5.8/installation>
[npm]: <https://nodejs.org/en/download/>

