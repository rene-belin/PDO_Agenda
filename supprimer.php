<?php
try {
    // Vérifiez si l'ID est passé en paramètre et est valide
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = intval($_GET['id']);

        // Ouverture d'une connexion à la bdd agenda avec options de sécurité
        $objetPdo = new PDO('mysql:host=localhost;dbname=agenda;charset=utf8', 'root', '');

        // Définir le mode d'erreur PDO sur Exception
        $objetPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Préparation de la requête de suppression des contacts
        $pdoStat = $objetPdo->prepare('DELETE FROM contact WHERE id = :id LIMIT 1');

        // Lier l'ID à la requête préparée
        $pdoStat->bindValue(':id', $id, PDO::PARAM_INT);

        // Exécution de la requête préparée
        $deleteIsOk = $pdoStat->execute();

        if ($deleteIsOk) {
            $message = 'Le contact a été supprimé avec succès !';
        } else {
            $message = 'Erreur lors de la suppression du contact.';
        }
    } else {
        // Si l'ID n'est pas valide ou manquant
        $message = 'ID de contact invalide.';
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
        <h1>Suppression de contact</h1>
        <p><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></script>
</body>

</html>
