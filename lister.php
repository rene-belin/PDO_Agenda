<?php
try {
    // Ouverture d'une connexion à la bdd agenda avec options de sécurité
    $objetPdo = new PDO('mysql:host=localhost;dbname=agenda;charset=utf8', 'root', '');

    // Définir le mode d'erreur PDO sur Exception
    $objetPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Préparation de la requête de sélection des contacts
    $pdoStat = $objetPdo->prepare('SELECT * FROM contact');

    // Exécution de la requête préparée
    $pdoStat->execute();

    // Récupération des résultats
    $contacts = $pdoStat->fetchAll(PDO::FETCH_ASSOC);

    // Vérifier la récupération de $contact
    //echo "<pre>";
    //var_dump($contacts);
    //echo "</pre>";

} catch (PDOException $e) {
    // Enregistrer l'erreur dans un fichier de log
    error_log("Erreur PDO : " . $e->getMessage());

    // Message générique pour l'utilisateur
    $message = 'Une erreur est survenue lors de la connexion à la base de données.';
}
?>

<!-- CODE HTML -->
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
        <h1>Liste des contacts</h1>
        <?php if (isset($message)): ?>
            <div class="alert alert-danger" role="alert">
                <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?>
            </div>
        <?php endif; ?>
        <ul>
            <?php foreach ($contacts as $contact): ?>
                <li>
                    <?= htmlspecialchars($contact['nom'], ENT_QUOTES, 'UTF-8') ?>
                    <?= htmlspecialchars($contact['prenom'], ENT_QUOTES, 'UTF-8') ?> -
                    <?= htmlspecialchars($contact['tel'], ENT_QUOTES, 'UTF-8') ?> -
                    <?= htmlspecialchars($contact['mel'], ENT_QUOTES, 'UTF-8') ?>
                    <a href="supprimer.php?id=<?= htmlspecialchars($contact['id'], ENT_QUOTES, 'UTF-8') ?>">Supprimer</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></script>
</body>

</html>
