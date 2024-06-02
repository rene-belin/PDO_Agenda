<?php

// ouverture d'une connexion à la base de données agenda
$objetPdo = new PDO("mysql:host=localhost;dbname=agenda", "root", "");

// préparation de la requête d'insertion (SQL)
$pdoStat = $objetPdo->prepare("SELECT * FROM contact WHERE id=:num");

// liaison du paramètre nommé
$pdoStat->bindValue(':num', $_GET['numContact'], PDO::PARAM_INT);

//exécution de la requête
$executeIsOk = $pdoStat->execute();

//On récupère le contact
$contact = $pdoStat->fetch();
?>

<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modifier un contact</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <div class="container mt-5">
    <h1>Modifier un contact</h1>
    <form action="modifier.php" method="post">

      <p>
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" value="<?= $contact['nom']; ?>">

      </p>
      <p>
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom" value="<?= $contact['prenom']; ?>">
      </p>
      <p>
        <label for="telephone">Téléphone</label>
        <input type="text" name="telephone" id="telephone" value="<?= $contact['telephone']; ?>">
      </p>
      <p>
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" value="<?= $contact['email']; ?>">
      </p>
      <p><input type="submit" value="Enregistrer  les modifications"></p>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>