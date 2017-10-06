<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Page d'acceuil</title>
    <link rel="stylesheet" type="text/css" href="accueil.css">
  </head>
  <header>
    <h1> Film Search</h1>
  </header>
  <body>
    <section>
      <h2> Recherchez un film</h2>
    <?php

      $criteresCombo=array(
        "type" => "comboBox",
        "name" => "criteresCombo",
        "value" => "criteresCombo",
        "text" => "Rechercher par",
        "text2" => ":",
        "choices" =>[
        array(
          "text" => "Nom",
          "value" => "nom"
        ),
        array(
          "text" => "Pays",
          "value" => "pays"
        ),
        array(
          "text" => "Realisateur",
          "value" => "realisateur"
        )]
      );

      $criteres =
        [array(
          "type"=>"radio",
          "text"=>"Trier les films selon les criteres: ",
          "name"=>"criteres",
          "choices"=> [
          array("text"=>"Titre","value"=>"titre"),
          array("text"=>"Alphabétique","value"=>"alphabetique"),
          array("text"=>"Pays","value"=>"pays"),
          array("text"=>"Ordre chronologique","value"=>"chronologique"),
          array("text"=>"Durée","value"=>"duree"),
          array("text"=>"Réalisateur","value"=>"realisateur")
        ]
      )];
    ?>

    <form action='filmRecherche.php' method="POST">
        <?php
        function criteres_checkbox($criteresCombo){
          $html = $criteresCombo["text"];
          $html .= "<select name='$criteresCombo[name]'>";
          foreach ( $criteresCombo["choices"] as $cc){
            $html .= "<option value='$cc[value]'>$cc[text]</option>";
          }
          $html .= "</select>";
          $html .= $criteresCombo["text2"];
          echo $html;
        }

        criteres_checkbox($criteresCombo);

        ?>
      <input type="text" name="recherche">
      <input type="submit" name="rechercheFilm">
      <br>

        <?php
        function criteres_radio($criteres){
          $html = $criteres["text"] . "<br>";
          $i = 0;
          foreach ( $criteres["choices"] as $c){
            $i +=1;
            $html .= "<input type ='radio' name='$criteres[name]' value='$c[value]' id='$criteres[name]-$i'>";
            $html .= " <label for='$criteres[name]-$i'>$c[text]</label>";
          }
          echo $html;
        }

        foreach($criteres as $c){
          criteres_radio($c);
        }

         ?>
         <br><input type="submit" name="criteresFilm">

    </form>
  </section>
  </body>
</html>
