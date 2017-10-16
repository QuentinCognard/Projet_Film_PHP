<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Page d'acceuil</title>
    <link rel="stylesheet" type="text/css" href="accueil.css">
  </head>
  <header>
    <h1><a href="accueil.php"> Film Search</a></h1>
  </header>
  <body>
    <form action='filmGerer.php' method="POST">
      <p>Entrez un film à supprimer :</p>
      <input type="text" name="supprimer">
      <input type="submit" name="supprimerFilm">
    </form>
  </body>
</html>
