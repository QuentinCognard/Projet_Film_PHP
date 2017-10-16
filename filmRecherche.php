<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Liste Recherche </title>
    <link rel="stylesheet" type="text/css" href="accueil.css">
  </head>
  <header>
    <h1><a href="accueil.php"> Film Search</a></h1>
  </header>
  <body>
    <section id='principale'>
    <?php

    $file_db=new PDO("sqlite:BD_GENERAL.sqlite");

    if (isset($_POST['rechercheFilm'])){

      if ($_POST['criteresCombo']=='nom'){
        $result=$file_db->query("SELECT * FROM films WHERE titre_original LIKE '".$_POST['recherche']."%'");
        echo "<ul>";

        foreach($result as $c){
          echo "<a href='filmExemple.php?value=$c[titre_original]'><li>$c[code_film] $c[titre_original] $c[realisateur]</a>";
        }
        echo "</ul>";
      }

      elseif ($_POST['criteresCombo']=='pays'){
        $result=$file_db->query("SELECT * FROM films WHERE pays LIKE '".$_POST['recherche']."%'");
        echo "<ul>";

        foreach($result as $c){
          echo "<li><a href='filmExemple.php?value=$c[titre_original]'> $c[code_film] $c[titre_original]</a>";
        }
        echo "</ul>";
      }

      elseif ($_POST['criteresCombo']=='realisateur'){
        $result=$file_db->query("SELECT * FROM films NATURAL JOIN individus WHERE nom LIKE '".$_POST['recherche']."%'and code_indiv=realisateur");
        echo "<ul>";

        foreach($result as $c){
          echo "<a href='filmExemple.php?value=$c[titre_original]'><li>$c[code_film] $c[titre_original]</a>";
        }
        echo "</ul>";
      }
  }

  elseif (isset($_POST['criteresFilm'])) {
    if (isset($_POST['criteres'])){
      if ($_POST['criteres']=='titre'){
        $result=$file_db->query("SELECT * from films");
        echo "<ul>";

        foreach($result as $c){
          echo "<a href='filmExemple.php?value=$c[titre_original]'><li>$c[titre_original]</a>";
        }
        echo "</ul>";

      }
      elseif ($_POST['criteres']=='alphabetique'){
        $result=$file_db->query("SELECT * from films ORDER BY titre_original");
        echo "<ul>";

        foreach($result as $c){
          echo "<a href='filmExemple.php?value=$c[titre_original]'><li>$c[titre_original]</a>";
        }
        echo "</ul>";

      }
      elseif ($_POST['criteres']=='chronologique'){
        $result=$file_db->query("SELECT * from films ORDER BY date");
        echo "<ul>";

        foreach($result as $c){
          echo "<a href='filmExemple.php?value=$c[titre_original]'><li>$c[titre_original] $c[date]</a>";
        }
        echo "</ul>";
      }
      elseif ($_POST['criteres']=='duree'){
        $result=$file_db->query("SELECT * from films ORDER BY duree");
        echo "<ul>";

        foreach($result as $c){
          echo "<li><a href='filmExemple.php?value=$c[titre_original]'>$c[titre_original] $c[duree]</a>";
        }
        echo "</ul>";
      }
    else{
      echo "NON";
      }
    }
  }

  elseif (isset($_POST['genreFilm'])) {
    $result=$file_db->query("SELECT * from films NATURAL JOIN genres NATURAL JOIN classification where nom_genre LIKE '".$_POST['genreCombo']."%'and code_film=ref_code_film and code_genre=ref_code_genre");
    echo "<ul>";
    foreach($result as $c){
      echo "<li><a href='filmExemple.php?value=$c[titre_original]'>$c[titre_original] $c[duree]</a>";
    }
    echo "</ul>";
  }

    $file_db=null;
    ?>
  </section>
  </body>
</html>
