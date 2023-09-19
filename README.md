# Garage V.Parrot

## Exécution en Local

Assurez-vous d'avoir les éléments suivants installés sur votre machine :
- PHP (version 8.2 pour ce projet)
- Serveur Web (Apache pour ce projet)
- Base de données (MySQL)
- Composer (gestionnaire de dépendances PHP)
- Outil de gestion de base de données de votre choix (je conseille DataGrip qui m'a permis d'alimenter mon projet)

### Étapes

1. Clonez le dépôt suivant sur votre machine locale :

2. https://github.com/Fabyjulien2A/Garage.git

3. Accédez au répertoire du projet.

4. Installez les dépendances PHP à l'aide de Composer.

5. Configurez votre serveur web pour servir l'application.

6. Configurez votre base de données :
- Ouvrez DataGrip et connectez-vous à votre base de données.
- Créez une nouvelle base de données pour votre application si elle n'existe pas déjà (je vous conseille de la créer sur [AlwaysData](https://www.alwaysdata.com/fr)).
- Exportez le schéma de la base de données à partir de votre application ou créez des migrations SQL si vous en utilisez.

6. Démarrez votre serveur web et accédez à l'application dans votre navigateur.
L'application devrait maintenant être accessible localement à l'adresse http://localhost:3000/Page-Accueil/accueil.php ou http://localhost:3306/Page-Accueil/accueil.php sur certains navigateurs.

## Création d'un Administrateur

Pour créer un administrateur pour le back-office de l'application, suivez ces étapes :

1. Accédez à l'interface de votre application en local à: http://localhost:3000/Administrateur/connexion.php

2. Vous devrez vous connecter en tant qu'administrateur. Par défaut, utilisez les identifiants suivants :
- Nom d'utilisateur : `Parrot.v@gmail.com`
- Mot de passe : `admin1234`

3. Une fois connecté, accédez à la section "Inscription administrateur/employés/moderateur".

4. Créez un nouvel administrateur en fournissant les informations requises, telles que le nom, le prénom, le poste, l'email, le mot de passe ainsi que le rôle pour être certain d'ajouter un administrateur.

5. Enregistrez les modifications.

Maintenant, vous avez créé un administrateur pour le back-office de l'application web.

## Création d'un Employé

Pour créer un employé pour le back-office de l'application, suivez ces étapes :

1. Accédez à l'interface de votre application en local à: http://localhost:3000/Administrateur/connexion.php

2. Vous devrez vous connecter en tant qu'administrateur en utilisant les identifiants suivants :
- Nom d'utilisateur : `Parrot.v@gmail.com`
- Mot de passe : `admin1234`

3. Une fois connecté, accédez à la section "Inscription administrateur/employés/moderateur".

4. Créez un nouvel employé en fournissant les informations requises, telles que le nom, le prénom, le poste, l'email, le mot de passe ainsi que le rôle pour être certain d'ajouter un employé.

5. Enregistrez les modifications.

Maintenant, vous avez créé un employé pour le back-office de l'application web.

**Note : Un employé est déjà inscrit sur le site avec les informations de connexion suivantes :**
- Adresse email : dupondjean@gmail.com
- Mot de passe : 12345

## Création d'un Modérateur

Pour créer un modérateur pour le back-office de l'application, suivez ces étapes :

1. Accédez à l'interface de votre application en local à: http://localhost:3000/Administrateur/connexion.php

2. Vous devrez vous connecter en tant qu'administrateur en utilisant les identifiants suivants :
- Nom d'utilisateur : `Parrot.v@gmail.com`
- Mot de passe : `admin1234`

3. Une fois connecté, accédez à la section "Inscription administrateur/employés/moderateur".

4. Créez un nouveau modérateur en fournissant les informations requises, telles que le nom, le prénom, le poste, l'email, le mot de passe ainsi que le rôle pour être certain d'ajouter un modérateur.

5. Enregistrez les modifications.

Maintenant, vous avez créé un modérateur pour le back-office de l'application web.

**Note : Un modérateur est déjà inscrit sur le site avec les informations de connexion suivantes :**
- Adresse email : benichousarah@gmail.com
- Mot de passe : benichou123

## Utilisation des Fonctions du Site

### En tant qu'Administrateur

En tant qu'administrateur, vous avez accès aux fonctions suivantes :

- Ajouter ou supprimer un service de réparation : Vous pouvez gérer la liste des services de réparation proposés par le garage.

- Afficher les demandes spécifiques des clients : Vous pouvez consulter les demandes spécifiques des clients qui sont passés par le formulaire de contact.

- Inscrire un employé ou un modérateur voire un nouvel administrateur : Vous pouvez gérer les utilisateurs et leurs rôles.

- Afficher si le garage est ouvert ou fermé instantanément : Vous pouvez vérifier l'état actuel du garage.

### En tant qu'Employé

En tant qu'employé, vous avez accès aux fonctions suivantes :

- Publier un commentaire : Vous pouvez laisser des commentaires et des avis sur l'application.

- Ajouter ou supprimer un véhicule : Vous pouvez gérer la liste des véhicules disponibles.

- Afficher les demandes spécifiques des clients : Vous pouvez consulter les demandes spécifiques des clients qui sont passés par le formulaire de contact.

### En tant que Modérateur

En tant que modérateur, vous avez accès à la fonction suivante :

- Afficher et supprimer un commentaire laissé par les clients : Vous êtes le seul à pouvoir gérer les commentaires laissés par les clients via le formulaire.

## Utilisation de l'Application par un Utilisateur (Client)

En tant qu'utilisateur de l'application, vous avez les fonctionnalités suivantes à votre disposition :

- Laisser un commentaire depuis la page d'accueil : Vous pouvez laisser un commentaire ou un avis sur l'application directement depuis la page d'accueil. Votre commentaire sera pris en compte et pourra être visible pour d'autres utilisateurs.

- Voir les informations de réparations : Vous pouvez consulter les informations sur les services de réparation disponibles depuis la page d'accueil. Cette section vous permettra de mieux comprendre les services proposés par l'entreprise.

- Consulter les véhicules d'occasions : Depuis la page "Nos Véhicules", vous pouvez parcourir la liste des véhicules disponibles. Une modal s'affichera avec plus de détails sur chaque véhicule, y compris les spécifications, les prix, etc. Vous pourrez également accéder au formulaire de contact présent en bas de la modal.

