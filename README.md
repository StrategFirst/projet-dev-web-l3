# projet-dev-web-l3
### Projet de Dev Web de L3 Informatique de l'Unversité d'Angers.
### Contributeurs : Charles Sauvagnac & Mathieu Toulon

#### INSTALLATION
l'installatio de la BDD se fait tout seul avec le fichier .ini (lors de la première visite sur le site), si vous souhaitez modifier des paramètres (port, base ect.) vous pouvez le faire directement dans ce fichier

#### Partie Absences :
 particularité lorque le l'on seelectionne l'option 'vide' cela supprime l'absence associée

#### Partie Rencontres :
 Seul compétition et équipe sont des types enumérés les reste est editable

### Partie Administration :
 Lors de la création du site 2 compte ont été créé automatiquement
* Secretaire
  * login : secretaire
  * password : secretaire
* Entraineur
  * login : entraineur
  * password : entraineur

### Insertion par CSV
Il est possible d'ajouter des rencontres via un fichier CSV
cependant il doit respecter le format suivant:<br/>
`compétition`;`équipe local`;`équipe adverse`;`date\*`;`heure\*`;`terrain`;`lieu`<br/>
avec la date au format : `AAAA-MM-JJ`<br/>
et l'heure au format : `HH:mm`<br/>
