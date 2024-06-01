<?php

try {
    // Ouverture d'une connexion à la bdd agenda avec options de sécurité
    $objetPdo = new PDO('mysql:host=localhost;dbname=agenda;charset=utf8', 'root', '');
    
    // Définir le mode d'erreur PDO sur Exception
    $objetPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Désactiver l'émulation des requêtes préparées
    // Sécurité, l'émulation des requêtes préparées peut potentiellement exposer votre application à des injections SQL
    $objetPdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    // Préparation de la requête d'insertion (SQL)
    $pdoStat = $objetPdo->prepare('INSERT INTO contact (id, nom, prenom, tel, mel) VALUES (NULL, :nom, :prenom, :tel, :mel)');

    // Validation et sanitisation des entrées utilisateur
    $nom = htmlspecialchars($_POST['lastname'], ENT_QUOTES, 'UTF-8');
    $prenom = htmlspecialchars($_POST['firstname'], ENT_QUOTES, 'UTF-8');
    $tel = htmlspecialchars($_POST['phone'], ENT_QUOTES, 'UTF-8');
    $mel = filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL);

    // Lier chaque marqueur à une valeur
    $pdoStat->bindValue(':nom', $nom, PDO::PARAM_STR);
    $pdoStat->bindValue(':prenom', $prenom, PDO::PARAM_STR);
    $pdoStat->bindValue(':tel', $tel, PDO::PARAM_STR);
    $pdoStat->bindValue(':mel', $mel, PDO::PARAM_STR);

    // Exécution de la requête préparée
    $insertIsOk = $pdoStat->execute();

    if ($insertIsOk) {
        $message = 'Le contact a été ajouté avec succès !';
    } else {
        $message = 'Erreur lors de l\'ajout du contact';
    }

} catch (PDOException $e) {
    // Enregistrer l'erreur dans un fichier de log
    error_log("Erreur PDO : " . $e->getMessage());

    // Message générique pour l'utilisateur
    $message = 'Une erreur est survenue lors de la connexion à la base de données.';
}

?>

<!-- Code HTML -->
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agenda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1>Insertion des contacts</h1>
        <p><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>