<?php

// ouverture d'une connexion à la base de données agenda
$objetPdo = new PDO("mysql:host=localhost;dbname=agenda", "root", "");

// préparation de la requête d'insertion (SQL)
$pdoStat = $objetPdo->prepare("INSERT INTO contact VALUES(NULL, :nom, :prenom, :telephone, :email)");

// on lie chaque marqueur à une valeur
$pdoStat->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
$pdoStat->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
$pdoStat->bindValue(':telephone', $_POST['telephone'], PDO::PARAM_STR);
$pdoStat->bindValue(':email', $_POST['email'], PDO::PARAM_STR);

// éxécution de la requête préparée
$insertIsOk = $pdoStat->execute();

// ici on fait un teste
if ($insertIsOk) {
    $message = 'Le contact a été ajouté avec succès !';
} else {
    $message = 'Erreur lors de l\'ajout du contact';
}
?>

<!-- HTML -->
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Insertion des contacts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1>Insertion des contacts</h1>
        <p><?php echo $message; ?></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>