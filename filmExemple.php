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
    <?php
$file_db=new PDO("sqlite:BD_GENERAL.sqlite");

      if (isset($_GET['id'])){
        if($_GET['id']==15){
          $result=$file_db->query("SELECT * FROM films WHERE titre_original LIKE 'Star Wars: Episode V, T%'");
          foreach($result as $c){
            echo "<li>$c[code_film] $c[titre_original]";
          }
        }
        if($_GET['id']==16){
          $result=$file_db->query("SELECT * FROM films WHERE titre_original LIKE '2001%'");
          foreach($result as $c){
            echo "<li>$c[code_film] $c[titre_original]";
          }
        }
      }

        $file_db=null;
        ?>

  </body>
</html>
