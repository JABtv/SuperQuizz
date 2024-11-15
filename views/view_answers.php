<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperQuizz - Nouveau Quizz</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<main>
    <?php echo "<p>$quizzName</p>" ?>
    <?php echo "<p>Question {$numberQuestion}/5</p>" ?>
    <h2>Reponses</h2>
    <form method="POST">
        <p>Correct</p>
        <label for="answerA">Réponse A</label>
        <input type="text" name="answerA" id="answerA"/>
        <input type="radio" name="answer" id="answerA"/>

        <label for="answerB">Réponse B</label>
        <input type="text" name="answerB" id="answerB"/>
        <input type="radio" name="answer" id="answerB"/>

        <label for="answerC">Réponse C</label>
        <input type="text" name="answerC" id="answerC"/>
        <input type="radio" name="answer" id="answerC"/>

        <label for="answerD">Réponse D</label>
        <input type="text" name="answerD" id="answerD"/>
        <input type="radio" name="answer" id="answerD"/>

        <!-- Selon si on est ou non à la dernière question : -->
        <!-- A faire en PHP avec if, rendus : -->
        <!-- <button type="submit">Question suivante<button> -->
        <button type="submit">Poster</button>
    </form>
</main>