<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Liste Recherche </title>
  </head>
  <body>
    <?php

    $file_db=new PDO("sqlite:films.sqlite");

    if (isset($_POST['rechercheFilm'])){


      $result=$file_db->query("SELECT * FROM films WHERE titre_original LIKE '".$_POST['recherche']."%'");
      echo "<ul>";

      foreach($result as $c){
        echo "<li>$c[code_film] $c[titre_original]";
    }
    echo "</ul>";
  }

  elseif (isset($_POST['criteresFilm'])) {
    if (isset($_POST['criteres'])){
      if ($_POST['criteres']=='titre'){
        $result=$file_db->query("SELECT * from films");
        echo "<ul>";

        foreach($result as $c){
          echo "<li>$c[titre_original]";
        }
        echo "</ul>";

      }
      elseif ($_POST['criteres']=='alphabetique'){
        $result=$file_db->query("SELECT * from films ORDER BY titre_original");
        echo "<ul>";

        foreach($result as $c){
          echo "<li>$c[titre_original]";
        }
        echo "</ul>";

      }
      elseif ($_POST['criteres']=='pays'){
        $result=$file_db->query("SELECT DISTINCT pays from films ORDER BY pays");
        echo "<ul>";

        foreach($result as $c){
          echo "<li>$c[pays]";
        }
        echo "</ul>";
      }
      elseif ($_POST['criteres']=='chronologique'){
        $result=$file_db->query("SELECT * from films ORDER BY date");
        echo "<ul>";

        foreach($result as $c){
          echo "<li>$c[titre_original] $c[date]";
        }
        echo "</ul>";
      }
      elseif ($_POST['criteres']=='duree'){
        $result=$file_db->query("SELECT * from films ORDER BY duree");
        echo "<ul>";

        foreach($result as $c){
          echo "<li>$c[titre_original] $c[duree]";
        }
        echo "</ul>";
      }
      elseif ($_POST['criteres']=='realisateur'){
        $result=$file_db->query("SELECT DISTINCT realisateur from films ORDER BY realisateur");
        echo "<ul>";

        foreach($result as $c){
          echo "<li>$c[realisateur]";
        }
        echo "</ul>";
      }

    else{
      echo "NON";
    }
  }
}
    $file_db=null;
    ?>
  </body>
</html>
