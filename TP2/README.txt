Exercice n° 5
On réalise cette opération pour des raisons de sécurité: le buffer possède alors un marqueur de fin de chaîne de caractère, ce qui empèche d'avoir accès aux données suivant le buffer dans la mémoire.

Exercice n°6
La fonction free en C permet de libérer le pointeur d'une zone mémoire, c'est à dire qu'il déclare le pointeur à NULL mais il n'effacd pas la mémoire.

Exercice n°17
A la fin de l'exécution de mini_printf, il se peut qu'il reste des caractères dans le buffer que l'on ait pas afficher.

Exercice n°20
Si le nombre de cractère saisie est égal à la taille du buffer, alors il n'y aura pas le marqueur de fin de chaîne de caractère dans le buffer, ce qui peut poser un problème.

Exercice n°21
Si l'on utilise ces fonctions sur des chaînes de caractères de taille suffisement grande, on peut alors avoir accès à toute les données de la mémoire, il faut donc limiter la taille des chaînes de caractère passé en argument.
