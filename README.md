# ESI-Scolarit�



## Objectifs de l'application

**ESI-Scolarit�** est une application r�alis�e � l'intention de la scolarit� de l'ESI.

Les deux fonctionnalit�s d�velopp�es sont :
- Permettre � tout enseignant de marquer les absences des �tudiants qui se sont absent�s dans les s�ances qu'il enseigne.
- Permettre � tout �tudiant de visualiser ses absences ainsi que leurs �tats (Justifi� / Non justifi�)

## Technologies utilis�es

| Front-end : React|   | Backend : PHP Laravel 
| ------ | -- | -- | 
* **Docker** pour le d�ploiement.



## Pr�-requis
* **XAMPP (Recommand�)**, WAMPP ou une plateforme de d�veloppement Backend �quivalente.
* Derni�re version du framework PHP Laravel : [Installation de Laravel]
* Derni�re version de Composer.
* [npm] (N�cessaire afin de pouvoir lancer l'application sous React)
* Docker (N�cessaire dans l'�tape de d�ploiement seulement)

## Premi�re utilisation
###### [Les �tapes mentionn�es ci-dessous sont suppos�es fonctionner avec XAMPP]
1) Forker, copier ou t�l�charger le projet, et le placer dans le dossier C:\xampp\htdocs\\**Nom_de_votre_r�pertoire**
2) Dans la racine du projet, lancer la commande de t�l�chargement des packages n�cessaires :

**Installation des d�pendances de Laravel (packages):**
```bash
composer update
```

**Installation des d�pendances de React (modules) :**
```bash
npm install
```
3) Lancer les services **Apache** et **MySQL** dans l'interface de contr�le de XAMPP.

4) Cr�er une nouvelle base de donn�es via **PhpMyAdmin** ayant les caract�ristiques :

| Nom : scolarite |   | Identifiant : root || Mot de passe : (laisser vide) 
| ------ | -- | --  | -- | -- | 
###### N.B : Ces caract�ristiques sont modifiables via le fichier .env situ� dans la racine du projet.

5) En se positionnant dans la racine du projet, lancer dans l'ordre la suite de commandes :

**Lancement de le l'environnement de d�veloppement Back-end (Laravel):**

```bash
php artisan serve
```

**Lancement des scripts de Front-end** :

```bash
npm start
```


L'application est pr�te � �tre utilis�e en local, et est accessible via **localhost:3000** (3000 est le port g�n�ralement attribu� pour l'ex�cution des scripts React except� dans le cas o� celui-ci est d�j� occup� par un autre programme. Le port sera explicitement indiqu� comme r�ponse � la commande **npm start**).

## Ex�cution des tests unitaires
Les tests unitaires se trouvent dans le r�pertoire **tests/Unit**

Pour lancer les tests unitaires, il suffit de se positionner dans la racine du projet puis de lancer la commande :

```bash
php phpunit.phar
```

## Ex�cution des tests automatis�s
Les tests automatis�s se trouvent dans le r�pertoire **tests/Browser**, et ont �t� r�alis�s avec l'outil **Dusk**, tr�s similaire � Selenium et officiellement int�gr� � Laravel.

Pour lancer les tests automatis�s, il suffit de se positionner dans la racine du projet puis de lancer la commande :

```bash
php artisan dusk
```

###### N.B : Dans le cas o� les tests ne se lanceraient pas, v�rifier que les donn�es introduites dans les fichiers de tests se trouvant dans tests/Browser co�ncident avec les donn�es pr�sentes dans la base de donn�es du testeur.
###### Dans le cas d'une erreur d'ex�cution, essayer d'ex�cuter la commande : php artisan dusk:chrome-driver , puis r�essayer (Dans le cas o� le syst�me d'exploitation du testeur dispose du navigateur Chrome par d�faut)


## Documentation technique
###### G�n�r�e automatiquement avec l'outil "Laravel API Doc Generator"
S'agit de la documentation de l'API, les routes utilis�es ainsi que des contr�leurs

La documentation technique de ESI-Scolarit� figure dans le r�pertoire **public/docs** qui se trouve dans la racine de l'application. Il suffit d'ouvrir le fichier **index.html**.

## Documentation fonctionnelle :
###### G�n�r�e avec l'outil Daux
Elle d�crit les fonctionnalit�s de l'application sous forme d'un guide d'utilisation.

La documentation fonctionnelle de l'application figure dans le r�pertoire **static** qui se trouve dans la racine de l'application. Il suffit d'ouvrir le fichier **ESI_SCOLARITE.html** avec un navigateur web.


## D�ploiement avec Docker :

- Se positionner dans la racine de l'application, puis ex�cuter la commande :
```bash
docker build -t scolarite
```
## Membres de l'�quipe de d�veloppement


| Nom | Pr�nom | Groupe |
| ------ | -- | -- |
| BOUDJELLI | Ahmed Mehdi | 06 |
| KETFI | Raniya | 06 |
| BENBRAHIM | Adam | 06 |



   [Installation de Laravel]: <https://laravel.com/docs/5.8/installation>
[npm]: <https://nodejs.org/en/download/>

