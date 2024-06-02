<?php

// ouverture d'une connexion à la base de données agenda
$objetPdo = new PDO("mysql:host=localhost;dbname=agenda", "root", "");

/* préparer la requête dans le cas présent n'a aucin intérêt, mais je garde
la même logique que pour les autres méthodes dans un soucis pédagogique 
*/
$pdostat = $objetPdo->prepare('SELECT * FROM contact');

//exécution de la requête
$executeIsOk = $pdostat->execute();

// récupération des résultats en une seuls fois
$contact = $pdostat->fetchAll(PDO::FETCH_ASSOC);

/*
echo'<pre>';
var_dump($contact);
'</pre>';
*/
?>

<!-- HTML -->
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste des contacts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1>Liste des contacts</h1>
        <ul>
            <?php foreach ($contact as $contact) : ?>
                <li>
                    <?= $contact['nom'] ?>
                    <?= $contact['prenom'] ?> -
                    <?= $contact['telephone'] ?> -
                    <?= $contact['email'] ?>
                    <a href="supprimer.php?numContact=<?=$contact['id'] ?>">Supprimer</a>
                    <a href="form_modification.php?numContact=<?=$contact['id'] ?>">Modifier</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>