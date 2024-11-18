<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperQuizz - Nouveau Quizz</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/base_quizz.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
<main>
    <div class="main">
        <h2>
            NOUVEAU QUIZZ
        </h2>
        <div class="form-group">
            <label for="title">
                Titre
            </label>
            <input id="title" type="text" value="PHP"/>
        </div>
        <div class="form-group">
            <label for="description">
                Description
            </label>
            <textarea id="description">PHP est un langage de programmation libre, gratuit, simple d’utilisation, interprété et orienté web. On l’utilise le plus souvent sur un serveur Apache. Il est bien adapté aux traitements des formulaires et permet entre autre l’accès à des bases de données ainsi que la génération à la volée de code HTML, ce qui en fait un langage apprécié pour la création d’applications dynamiques ou interactives.</textarea>
        </div>
        <div class="form-group">
            <label for="image">
                Image
            </label>
            <div class="file-input">
                <i class="fas fa-image">
                </i>
                <span>
      photo-quizz-php.jpg
     </span>
            </div>
        </div>
        <div class="form-group">
            <div class="radio-group">
                <label>
                    <input name="category" type="radio" value="frontend"/>
                    Frontend
                </label>
                <label>
                    <input checked="" name="category" type="radio" value="backend"/>
                    Backend
                </label>
            </div>
        </div>
        <button class="submit-btn">
            VALIDER ET PASSER AUX QUESTIONS
        </button>
    </div>
</main>
</body>