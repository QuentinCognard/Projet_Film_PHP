<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Liste Recherche </title>
  </head>
  <body>
    <?php

    $file_db=new PDO("sqlite:oui.sqlite");
    $result=$file_db->query("SELECT * FROM films WHERE titre_original LIKE '".$_POST['recherche']."%'");
    echo "<ul>";

    foreach($result as $c){
      echo "<li>$c[code_film] $c[titre_original]";
  }
  echo "</ul>";
    $file_db=null;
    ?>
  </body>
</html>
