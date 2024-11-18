<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/quiz.css">
    <title>Quiz</title>
</head>
<body>
    <main>
    <div class="upsidequiz">
            <h2>Description</h2>
            <p class="category">Frontend</p>
        </div>
        <div class="question">
            <p>L'opérateur ==</p>
            <ul>
                <li class="clicker">A. Teste l’égalité</li>
                <li class="clicker">B. S’utilise pour les affectations</li>
                <li class="clicker">C. N’existe pas en Javascript</li>
                <li class="clicker">D. Est un “OU” logique</li>
            </ul>
        </div>
    </main>
    
    <script>
        // Sélectionner l'élément
        const element = document.querySelector('.clicker');
        istoggled= true;
        // Ajouter un écouteur d'événements pour le clic
        element.addEventListener('click', function() {
            // Changer le style de l'élément
            this.style.backgroundColor = '#ffc835'; // Changer la couleur de fond
            this.style.border = '2px solid black'; 
            !istoggled;// Changer la bordure
        });
    </script>
</body>
</html>