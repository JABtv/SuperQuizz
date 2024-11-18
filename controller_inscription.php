<?php

//J'inclus les fichiers model dont j'ai besoin
include './model/model_user.php';

//J'INCLUS / IMPORTE MES FICHIERS DE RESSOURCES (model, fonction utilitaire)
include './utils/functions.php';


//Définition du code formateur
$code = "2368";

//Déclaration des variables d'affichage


//Inclure ma Vue : view_accueil.php
include 'views/view_inscription.php';
include 'views/view_footer.php';

//Fonction pour tester les données du formulaire d'inscription

function dataTestInscription(){
    //1er Etape de sécurité : vérifie si les champs obligatoires sont vides
    if(empty($_POST["email"]) || empty($_POST["password"] || empty($_POST["pseudo"])) || empty($_POST["confirmationPassword"])){
        return ["nom"=>'', "prenom"=>'',"email"=>'',"password"=>'',"pseudo"=>'', "code"=>'',"erreur"=>'Veuillez remplir Pseudo, email ainsi que mot de passe !'];
    }
    if($_POST["password"] != $_POST["confirmationPassword"]){
        return ["nom"=>'', "prenom"=>'',"email"=>'',"password"=>'',"pseudo"=>'', "code"=>'',"erreur"=>'Les deux mots de passe ne correspondent pas !'];
    }

    //2nd Etape de sécurité : nettoyage
    $lastname= sanitize($_POST['nom']);
    $firstname = sanitize($_POST['prenom']);
    $pseudo = sanitize($_POST['pseudo']);
    $email = sanitize($_POST["email"]);
    $password = sanitize($_POST["password"]);
    $code = sanitize($_POST["code"]);
    

    //3eme Etape de sécurité : Vérifier que les données sont au bon format
    //Code bien que ce soit des chiffres est un string, de ce fait pas besoin e vérifier son format
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){

        return ["nom"=>'', "prenom"=>'',"email"=>'',"password"=>'',"pseudo"=>'', "code"=>'',"erreur"=>'Login pas au bon format !'];
    }

    //4eme Etape de sécurité : hasher le mot de passe
    $password = password_hash($password,PASSWORD_BCRYPT);

    return ["nom"=>$lastname, "prenom"=>$firstname,"email"=>$email,"password"=>$password,"pseudo"=>$pseudo, "code"=>$code,"erreur"=>''];
}




?>