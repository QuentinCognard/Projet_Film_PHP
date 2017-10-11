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
    <section id='principale'>
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
         <?php
         $exemples =
           [array(
             "id"=>"15",
             "link"=>"https://vignette2.wikia.nocookie.net/fr.starwars/images/e/e0/Lundi.png/revision/latest?cb=20151011153017",
             "name"=>"Star Wars",
             "section"=> "exemple1"
         ),
         array(
           "id"=>"16",
           "link"=>"http://fr.web.img6.acsta.net/medias/nmedia/00/00/01/27/69197311_af.jpg",
           "name"=> "2001 L'odyssée de l'espace",
           "section" => "exemple2"

         )

       ];
       ?>
      <section id='exempleF'>
         <h2> Exemples de Film : </h2>
<?php
       foreach($exemples as $e){
         echo "<section id=$e[section]>";
         echo "<p> $e[name] </p>";
         echo "<a href='filmExemple.php?id=$e[id]'><img src=$e[link] alt='Erreur Image 1' height='300' width='200'></a>";
       }
   ?>


           <!-- <section id='exemple1'>
             <p> Star Wars </p>
             <a href='filmExemple.php?id=15'><img src='https://vignette2.wikia.nocookie.net/fr.starwars/images/e/e0/Lundi.png/revision/latest?cb=20151011153017' alt='Erreur Image 1'></a>
         </section>
          <section id='exemple2'>
            <p> 2001 L'odyssée de l'espace </p>
            <a href='filmExemple.php?id=16'><img src="http://fr.web.img6.acsta.net/medias/nmedia/00/00/01/27/69197311_af.jpg"alt="Oups l'image 2 ne marche plus :(  " height="300" width="200"></a> -->


         </section>
    </form>
  </section>
  </body>
</html>
