<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Page d'acceuil</title>
  </head>
  <body>
    <?php
      $criteres =
        [
          array("name"=>"Titre","value"=>"titre"),array("name"=>"Alphabétique","value"=>"alphabetique"),
          array("name"=>"Pays","value"=>"pays"),array("name"=>"Ordre chronologique","value"=>"chronologique"),
          array("name"=>"Durée","value"=>"duree"),
          array("name"=>"Réalisateur","value"=>"realisateur")
        ];
    ?>
    <form action='liste.php' method="GET">
      Rechercher par nom : <input type="text" name="recherche">
      <input type="submit">
      </form>
    <form action='liste.php' method="GET">
      Critères :
        <?php
        foreach($criteres as $c){
          echo "<br><input type='radio' name=$c[name] value=$c[value]> ";
          echo "<label for=$c[value]> $c[name] </label>";
        }

         ?>
         <br><input type="submit">

    </form>
  </body>
</html>
