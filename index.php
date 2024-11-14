<?php
/*DEMO MVC*/
/*ICI JE SUIS DANS LE CONTROLER
    - Je possède l'algorithme de la page
    - Je suis le fichier auquel le Client accède dans l'url
*/

//J'INCLUS / IMPORTE MES FICHIERS DE RESSOURCES (model, fonction utilitaire)
include './utils/functions.php';

//Déclaration de ma varibale d'affichage
//Permet de dire à la View quelles sont les données à afficher
$message = "";
$listArticle = "";


//Inclure ma Vue : view_accueil.php
include './view/view_accueil.php';
include './view/view_footer.php';
?>