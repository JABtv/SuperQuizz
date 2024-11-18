<?php

//J'inclus les fichiers model dont j'ai besoin
include './model/model_user.php';

//J'INCLUS / IMPORTE MES FICHIERS DE RESSOURCES (model, fonction utilitaire)
include './utils/functions.php';


//Définition du code formateur
$codeFormateur = "2368";

//Déclaration des variables d'affichage
$message = "";



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



//Tester si le formulaire d'inscription m'est envoyé
if(isset($_POST["Inscription"])){
    //Je lance le test de mes données
    $tab = dataTestInscription();

    //Je vérifie si je suis dans un cas d'erreur
    if($tab['erreur'] != ''){
        $message = $tab['erreur'];
    }else{
        //Création de mon $user à partir de ModelUser
        $user = new ModelUser($tab['pseudo']);
        
        //J'utilise les Setter pour donner à mon objet le nameUSer, firstNameUser et mdpUser
        $user->setLastname($tab['nom'])->setFirstname($tab['prenom'])->setEmail($tab['email'])->setPassword($tab['password']);

        if($tab['code'] === $codeFormateur){
            $user->setRole(2);
        }else{
            if($tab['code'] != ''){
                $message = "Code formateur invalide!";
            }else{
                $user->setRole(1);
            } 
        }

        //Je vérifie que le pseudo est diponible
        if(empty($user->readUserByAvatar())){
            //Si la réponse de la BDD est vide, alors le Login est disponible (car non trouvé en BDD), je peux donc l'utiliser.
            //Je lance l'ajout de mon utilisateur en BDD
            $message = $user->addUser();

        }else{
            //Si la réponse de la BDD n'est pas vide, alors ce le login est trouvé en BDD, donc le login n'est pas disponible, et je renvoie un message d'erreur
            $message="Ce Pseudo existe déjà en BDD !";
        }
    }
}


//Inclure ma Vue :
include './views/view_inscription.php';
include './views/view_footer.php';
?>