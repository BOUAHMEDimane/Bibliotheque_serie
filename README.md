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

## Les parties implémentées
- La page d’Accueil affichant les 3 dernières série est accessible soit en cliquant sur le bouton **Home** dans le menu BiblioSerie ou bien via l'URL http://localhost:8000  
- La page series affiche une liste de toutes les séries est accessible soit en cliquant sur le bouton **Series** dans le menu BiblioSerie ou bien via l'URL http://localhost:8000/series  
- La page d’une série sera affichée après avoir cliquée sur sont titre dans la liste des séries ou bien via l'URL http://localhost:8000/series/{url_series}, sachant que {url_series} c'est le titre de la série
- La page de contact est accessible soit en cliquant sur le bouton **Contact** dans le menu BiblioSerie ou bien via l'URL  http://localhost:8000/contact 

# le CRUD de série:
- Pour accéder a la page du CRUD de série il faut aller sur l'URL http://localhost:8000/admin/series 
    - Pour l’ajout d'une série, il faut cliquer sur le boutton Ajouter une nouvelle serie ou bien aller sur l'URL http://localhost:8000/admin/series/create , une nouvelle page serra charger avec formulaire pour remplir les champs et  un  message d'erreur signal le champs qui manque a remplir et un message indiquant que la serie a bien été créée sera affiché sur la même page.
    - Pour la suppression d'une serie il faut cliquer sur le bouton `supprimer`à côté de la serie qu'on veut supprimer,un pop up pour alerter si on veut confirmer la suppression, une fois confirmé avec ok, la serie sera supprimé de la table et un message indiquant que la recette a bien été supprimée sera affiché sur la même page 
    - Pour l’édition d'une serie il faut cliquer sur le boutton `Editer` à côté de la series qu'on veut modifier ou bien aller sur l'URL http://localhost:8000/admin/series/{id_series}/edit une nouvelle page serra charger avec formulaire pour modifier les champs ,un  message d'erreur signal le champs qui manque a remplir une fois on clique sur le boutton enregistré  on sera rediriger vers http://localhost:8000/admin/series  et un message indiquant que la serie a bien été modifier sera affiché sur la même page et on aura la série qui modifier dans la table  
    - Pour la consultation d'une serie il faut cliquer sur le boutton `consulter` à côté de la series qu'on veut Consulter ou bien aller sur l'URL http://localhost:8000/admin/series/{id_series}/{id_series}   et cliquer sur le bouton `Annuler` pour revenir a la page du CRUD . 
## Diffeculter rencontré:
- application cassé a cause de jetstream alors sa ma pris le temps pour la récupéré 