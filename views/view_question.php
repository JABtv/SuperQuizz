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
    <h2>Question <?php echo $numberQuestion ?>/5 </h2>
    <form method="POST">
        <label for="title">Titre</label>
        <input type="text" name="title" id="title"/>
        <label for="description">Description</label>
        <textarea name="description" id="description" rows="5" cols="30">  
        </textarea>
        <label for="image">Image</label>
        <div>
            <i class="fa-solid fa-image" style=""></i>
            <input type="text" name="image" id="image"/>
        </div>
        <div id="categoryChoice">
            <label for="frontend"><input type="radio" name="category" id="frontend">Frontend</label>
            <label for="backend"><input type="radio" name="category" id="backend">Backend</label>
        </div>
        <button type="submit">Valider et passer aux réponses</button>
    </form>
</main>