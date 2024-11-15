<link rel="stylesheet" href="style/style.css">
<link rel="stylesheet" href="style/login.css">
<main>
    <article>
        <div class="container">
            <h2>Connexion</h2>
            <form method="post" action="connexion.php">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Mot de Passe" required>
                <a class="forgetPassword" href="#">Mot de passe oublié ?</a>
                <button type="submit">Se connecter</button>
            </form>
            <a href="controller_inscription.php">Je n'ai pas de compte</a>
        </div>
    </article>
</main>