# Guide d'utilisation du code php avec son architecture

Ce explique comment ce projet . il faut avoir installé git sur son poste et un un compte github.

## Étape 1: Initialiser un dépôt Git

Ouvrez un terminal, naviguez vers le répertoire de votre projet et tapez git init.
Cela crée un nouveau dépôt Git dans votre répertoire de projet.
Pour ce projet chez moi c'est ici C:\wamp64\www\codePhp.
donc en cmd
taper `git init`
git génère automatiquement un repertoire caché .git qu'il ne faut  pas modifier , git s'en occupe

## Étape 2: Vérifier l'état du dépôt

Après avoir initialisé le dépôt, vous pouvez vérifier son état à tout moment en utilisant la commande `git status`. Cette commande vous montrera toutes les modifications qui n'ont pas encore été commitées.

`git status`
on voit ici que tous les repertoires sont en rouges! 
les fichiers et répertoires en rouge sont ceux qui n’ont pas encore été ajoutés au suivi de version par Git. Cela signifie que Git ne les a pas encore “commités”.
 
## Étape 3: Creation du fichier .gitignore

Creation du fichier . gitignore à la base du dossier. Tous les fichiers ou repertoires inscrits dans ce fichier ne neront pas envoyé sur github. Pour mon eemple j'utilise PHP storm qui crée un fichier de configuration à la base du projet que je ne souhaites pas envoyer.
voici le contenu de mon gitignore:
.idea

## Étape 4: Ajouter des fichiers au suivi de version

Ajout des fichiers au suivi de version. Pour cela, utilisation de la commande `git add . ` . Le point ajoute tous les fichiers
git add .

## Étape 5: Faire un commit
Faire un commit. Un commit est une façon de sauvegarder l’état actuel de votre projet dans l’historique de Git. Pour faire un commit, utiliser la commande `git commit`.
Ajout du message de commit qui décrit les modifications apportées.
`git commit -m "Mon premier commit"`

## Étape 6: Pousser les modifications sur GitHub
Après la création d'un repository sur github, et après le premier commit: 
Pousser les modifications sur GitHub. Pour cela, vous devez d’abord ajouter un dépôt distant à votre dépôt local. Vous pouvez le faire avec la commande `git remote add. `
Ensuite, vous pouvez pousser vos modifications avec la commande git push.

`git remote add origin https://github.com/votre_nom_d'utilisateur/votre_dépôt.git `
`git push -u origin master`

pour ma part ça sera 
`git remote add origin https://github.com/Astroboypower/codePHP`
`git push -u origin master`


## cration d'une autre branche
Je vais créer une nouvelle fonctionnalité, donc une nouvelle branche git `dark-theme` pour installer un mode sombre.
en cmd : 
`git branch dark-theme`
`git checkout dark-theme`

Basculer vers la nouvelle branche : Après avoir créé la nouvelle branche, vous pouvez y basculer en utilisant la commande git checkout. Par exemple :
`git checkout dark-theme`

## Pousser les modifications de la nouvelle branche
Nous devons en premier vérifier que nous sommes sur la branche `dark-theme`
en cmd:
`git branch`
le resultat doit être ceci
* dark-theme
  master
  
l’astérisque à côté de dark-theme, indiquant que nous sommes sur cette branche. Sinon en cmd:
`git checkout dark-theme`

Pour vérifier les modifications qui on été faites avant de ajouter à git en cmd
`git status`

si tout est ok 
`git add .`

si tout c'est bien passé
`git commit -m "ajout de la permutation theme clair/foncé et du bouton"`

Pour pousser les modifications de votre branche dark-theme locale vers la branche dark-theme sur GitHub, commande git push. Voici comment :
`git push origin dark-theme`

fusionner ses modifications dans la branche master
`git checkout master`
`git merge dark-theme`


Pour supprimer la branche dark-theme localement, vous pouvez utiliser la commande git branch -d :
`git branch -d dark-theme`

Cette commande supprime la branche dark-theme du dépôt local. Noter que Git ne permettra pas de supprimer la branche si elle contient des modifications non fusionnées.

Pour supprimer la branche dark-theme sur GitHub,utiliser la commande git push avec l’option --delete :
`git push origin --delete dark-theme`
