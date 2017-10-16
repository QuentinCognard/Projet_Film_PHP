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
    <section id='principale'>

    <form action='filmGerer.php' method="POST">
      <?php
      $file_db_ajout=new PDO("sqlite:BD_GENERAL.sqlite");

      function comboPays($file_db_ajout){
        $result=$file_db_ajout->query("SELECT DISTINCT pays from films");
        $html = "<select name='comboPays'>";
        foreach ($result as $r){
          $html .= "<option value=$r[pays]>$r[pays]</option>";
        }
        $html .= "</select>";
        echo $html;
      }

      function comboCouleurs($file_db_ajout){
        $result=$file_db_ajout->query("SELECT DISTINCT couleur from films");
        $html = "<select name='comboCouleurs'>";
        foreach ($result as $r){
          $html .= "<option value=$r[couleur]>$r[couleur]</option>";
        }
        $html .= "</select>";
        echo $html;
      }

       ?>

      <p>Nom du film:</p><input type="text" name="nomFilm" placeholder="ex: Avatar"><br>
      <p>Pays:</p><?php comboPays($file_db_ajout); ?>
      <p>Date(annee):</p><input type="text" name="dateFilm" placeholder="ex: 2017"><br>
      <p>Duree(min):</p><input type="text" name="dureeFilm"><br>
      <p>Couleur:</p><?php comboCouleurs($file_db_ajout); ?>
      <p>Nom du réalisateur:</p><input type="text" name="realisateurFilm" placeholder="ex: Besson"><br>
      <p>Affiche du film (optionnel):</p><input type="text" name="imageFilm"><br>
      <input type="submit" name="ajouterFilm">

    </form>
  </section>
  </body>
</html>
