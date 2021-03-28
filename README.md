# ConvSport
### Projet de Dev Web de L3 Informatique de l'Unversité d'Angers.
### Contributeurs : Charles Sauvagnac & Mathieu Toulon

## Installation
L'installation de la base de donnée est automatiquement réalisé à la première visite
il ne faut juste pas avoirs de base de donnée nommée convsport (ni créé ni vide)
avec le fichier .ini , si vous souhaitez modifier des paramètres (port, host ect.) vous pouvez le faire directement dans le fichier `config.ini`

## Spécificité de chaque partie
### Partie Absences :
 particularité lorque le l'on seelectionne l'option 'vide' cela supprime l'absence associée

### Partie Rencontres :
 Seul compétition et équipe sont des types enumérés les reste est editable

### Partie Administration :
 Lors de la création du site 2 compte ont été créé automatiquement
* Secretaire
  * login : secretaire
  * password : secretaire
* Entraineur
  * login : entraineur
  * password : entraineur

## Insertion par CSV
Il est possible d'ajouter des rencontres via un fichier CSV
cependant il doit respecter le format suivant:<br/>
`compétition`;`équipe local`;`équipe adverse`;`date\*`;`heure\*`;`terrain`;`lieu`<br/>
avec la date au format : `AAAA-MM-JJ`<br/>
et l'heure au format : `HH:mm`<br/>
Par exemple ceci est un fichier csv d'insertion valide
```csv
amical;Angers SCO;FC Nantes;2020-10-09;19:50;stade raymond kopa;Angers
coupe de france;"Angers SCO";PSG;2020-10-02;21:00;Le Parc des Princes;Paris
```
