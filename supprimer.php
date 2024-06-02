<?php

// ouverture d'une connexion à la base de données agenda
$objetPdo = new PDO("mysql:host=localhost;dbname=agenda", "root", "");

// préparation de la requête d'insertion (SQL)
$pdoStat = $objetPdo->prepare("DELETE FROM contact WHERE id=:num LIMIT 1");

// liaison du paramètre nommé
$pdoStat->bindValue(':num', $_GET['numContact'], PDO::PARAM_INT);

//exécution de la requête
$executeIsOk = $pdoStat->execute();

//teste avec une variable message
if ($executeIsOk) {
    $message = 'Le contact a été supprimé';
} else {
    $message = 'Echec de la suppression du contact';
}
?>

<!-- HTML -->
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Suppression</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1>Suppression</h1>
        <p><?php echo $message; ?></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>