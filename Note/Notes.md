# Création d'un nouveau projet

[https://symfony.com/doc/6.4/the-fast-track/fr/3-zero.html](Chapitre Zero - Production)

## Générer un nouveau projet

```shell
symfony new guestbook --version=6.4 --php=8.3 --webapp --docker --cloud
```

- `symfony` : outil cli permettant de réaliser des actions
- `new`: permet de créer une nouvelle application. Un dépot Git est automatiquement gérer lors de la génération du projet.
- `guestbook`: c'est le nom du projet
- `--version=6.4`: version de symfony utiliser pour le projet
- `--php-8.4` : version de PHP utilisé pour le projet
- `--webapp`: on veux une application web. Permet de générer le boileplate adapter avec les extension disponible directement. Conseiller pour générer le repo du projet pour une application web.
- `--docker`: cet option permet d'ajouter de manière automatique les services Docker.
- `--cloud`: utiliser lorsque l'on souhaite déployer le projet sur Platform.sh. Permet de générer automatiquement une configuration.

## Structure

```
├── bin/
├── composer.json
├── composer.lock
├── config/
├── public/
├── src/
├── symfony.lock
├── var/
└── vendor/
```

- `bin/`: contient le point d'entrée de la ligne de commande `console`
- `config/`: constitué d'un ensemble de fichiers de configurations sensible initialisé avec des valeurs par défaut. Il y a un fichier par paquet. Généralement, les valeurs par défaut sont correct.
- `public/`: répertoire racine du site web, et le script `index.php` est le point d'entrée principale de toutes les sources HTTP synamique.
- `src/`: héberge le code source de l'application. Par défaut, toutes les classes PHP utilise le namespace `App`.
- `var/`: contient les logs, les caches et fichiers généré par l'application lors de son exécution. C'est le seul répertoire qui doit être en écriture en production.
- `vendor/`: contient les paquets installé par Composer.

## Création de ressources public

Tous ce qui se trouve dans le répertoire `public/` est accessible via le navigateur.

Par exemple, si on viens y placer un fichier `under_construction.gif` dans le répertoire `public/images/`; il sera disponible avec l'URL `https://localhost/images/under-construction.gif`

## Lancer le serveur local

Symfony fournis une commande pour lancer le serveur de développement optimisé.
La commande est à lancer depuis le répertoire contenant le projet

```shell
symfony server:start -d
```

Cette commande lance le serveur en arrière plan avec l'option `-d`
Par défaut, il utilise le port `8000`.

```shell
symfony open:local
```

Cette commande permet d'ouvrir la page web dans le navigateur.

## Changer d'environnement

Le changement d'environnement de travail se fait dans le fichier `.env`. Pour passer dans un environnement, il faut modifier la valeur de la variable `APP_ENV`
