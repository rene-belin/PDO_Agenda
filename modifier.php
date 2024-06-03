<?php

// ouverture d'une connexion à la base de données agenda
$objetPdo = new PDO("mysql:host=localhost;dbname=agenda", "root", "");

// préparation de la requête d'insertion (SQL)
$pdoStat = $objetPdo->prepare("UPDATE contact set nom=:nom, prenom=:prenom, telephone=:telephone, email=:email WHERE id=:num LIMIT 1");

// liaison du paramètre nommé
$pdoStat->bindValue(':num', $_POST['numContact'], PDO::PARAM_INT);
$pdoStat->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
$pdoStat->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
$pdoStat->bindValue(':telephone', $_POST['telephone'], PDO::PARAM_STR);
$pdoStat->bindValue(':email', $_POST['email'], PDO::PARAM_STR);

//exécution de la requête
$executeIsOk = $pdoStat->execute();

//teste avec une variable message
if ($executeIsOk) {
    $message = 'Le contact a été mise à jour';
} else {
    $message = 'Echec de la mise à jour du contact';
}
?>

<!-- HTML -->
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modification : résultat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1>résultat de la modification</h1>
        <p><?php echo $message; ?></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>