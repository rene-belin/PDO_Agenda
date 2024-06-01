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
    <h1>Ajouter un contact</h1>
    <form action="insertion.php" method="post">
      <p>
        <label for="nom">Nom</label>
        <input type="text" name="firstname" id="nom">
      </p>
      <p>
        <label for="prenom">Prénom</label>
        <input type="text" name="lastname" id="prenom">
      </p>
      <p>
        <label for="tel">Téléphone</label>
        <input type="text" name="phone" id="tel">
      </p>
      <p>
        <label for="mel">E-mail</label>
        <input type="email" name="mail" id="mel">
      </p>
      <p><input type="submit" value="Enregistrer"></p>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>