<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Détail de Film</title>
      <link rel="stylesheet" type="text/css" href="accueil.css">
  </head>
  <header>
    <h1> Film Search</h1>
  </header>
  <body>
    <section id='principale'>
    <?php
$file_db=new PDO("sqlite:BD_GENERAL.sqlite");

      if (isset($_GET['value'])){
        $result=$file_db->query("SELECT * FROM films WHERE titre_original LIKE '$_GET[value]%'");
        $real=$file_db->query("SELECT nom FROM individus NATURAL JOIN films WHERE titre_original LIKE '$_GET[value]%' and code_indiv=realisateur");
        foreach($result as $c){
          echo "<ul>";
          echo "<li>Nom du Film : $c[titre_original] ";
          echo "<li>Nom Français : $c[titre_francais]";
          echo "<li>Origine : $c[pays]";
          foreach($real as $r){
            echo "<li>Réalisateur : $r[nom]";
          }
          echo"<li>Date de parution : $c[date]";
          echo "<li>Durée du film : $c[duree] minutes";
          echo "</ul>";
          if (isset($_GET['link'])){
          echo "<img src='$_GET[link]' alt='Image non chargé' height='300' width='200'>";
        }

        }

      }

        $file_db=null;
        ?>
</section>
  </body>
</html>
