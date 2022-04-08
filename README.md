# Bibliotheque_serie
## Projet de création d’une application web avec le framework PHP Laravel

Le but de ce projet est de réaliser un site de bibliotheque de serie à l’aide du framework PHP Laravel.
Le site est composé de :
- **Une page d’Accueil** affichant un texte de bienvenue et les 3 dernières series.
- **La page série**, qui affichent une liste de toutes les séries avec une barre de recherche.
- **La page d’une serie**, affichée après avoir été cliquée sur l’une d’elle dans la liste.
- **Une page de contact** avec un formulaire.

## Guide d'installation
- pour cloner le projet sur votre machine copier la clé `HTTPS` du repository git puis ouvrez un Terminal et placer vous dans le répertoire ou vous voulez récupérer le projet , tapper la commande `git clone`, puis collez l'URL que vous avez copiée précédemment puis appuyer sur Entrée pour créer le clone en local.
- exécuter la commande `composer install` pour l'installation des dépendances de l'application web à partir de composer 
- Modifier le fichier **.env** pour configurez les accés et permettre la connexion à la base de donnée, spécifiez l'utillisation de SQLite et le chemin d'accés au fichier **database.db**:
    - Modifier les champs suivant :
        - `DB_CONNECTION`=sqlite
        - `DB_DATABASE` = Mettez le PATH de votre fichier **database.db** 
- Lancez le serveur local comme Wampserveur 
- Dans un Terminal place vous sur le le répertoire de l'application et executer la commande suivante `php artisan serve`
- sur un navigateur web le projet devrait être accessible à l’url suivante:
  http://localhost:8000
- Créez une base de données SQLite vide et le fichier c'est le fichier **database.db** qui se trouve dans **database/database.db** dans le répértoire du projet.   
- Lancez les migrations avec du Seeding avec la commande suivante `php artisan migrate:fresh --seed`


