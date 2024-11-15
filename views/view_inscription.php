<?php
/*
//Fonction qui teste les données du formulaire
//Param : void
//Return : array["nom"=>string,"contenu"=>string,"erreur"=>string]
function formInscription(){
//1er Etape de Sécurité : vérifier les champs vides
if(empty($_POST["nom_article"]) || empty($_POST["contenu_article"])){
return ["nom"=>"", "contenu"=>"", "erreur"=>"Veuillez remplir tous les champs !"];
}

//2nd Etape de sécurité : vérifier le format
// -> on peut pas car ce ne sont que des strings

//3eme Etape de sécurité : nettoyage des données
$name = sanitize($_POST["nom_article"]);
$content = sanitize($_POST["contenu_article"]);

//Je retourne un tableau pour distinguer chaque données et les récupérer facilement
return ["nom"=>$name, "contenu"=>$content, "erreur"=>""];
}


//Je vérifie que je reçois le formulaire
if(isset($_POST["submit"])){
//Je lance ma fonction de teste du formualire
$tab = formInscription();

//Je teste si j'ai une erreur
if($tab["erreur"] != ""){
$message = $tab["erreur"];
}else{
$message = addUser($tab["nom"],$tab["contenu"]);
}
}

//Je conserve les articles récupérés depuis la BDD dans $data


*/
?>

<link rel="stylesheet" href="style/style.css">
<link rel="stylesheet" href="style/login.css">
<main>
    <article>
        <div class="container">
            <h2>Inscription</h2>
            <form method="post" action="inscription.php">
                <div class="username">
                    <input type="text" name="nom" placeholder="Nom">
                    <input type="text" name="prenom" placeholder="Prenom">
                </div>
                <input type="text" name="pseudo" placeholder="Pseudo*" required>
                <input type="email" name="email" placeholder="Email*" required>
                <input type="password" name="password" placeholder="Mot de Passe*" required>
                <input type="password" name="confirmationPassword" placeholder="Confirmation Mot de Passe*" required>

                <button type="submit">S'inscrire'</button>
            </form>
            <a href="controller_connexion.php">J'ai déjà un compte</a>
        </div>
    </article>
</main>