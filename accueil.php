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

      $genreCombo=array(
        "type" => "comboBox",
        "name" => "genreCombo",
        "value" => "genreCombo",
        "text" => "Rechercher par 'genre' : "
      );

      $criteresCombo=array(
        "type" => "comboBox",
        "name" => "criteresCombo",
        "value" => "criteresCombo",
        "text" => "<br>Rechercher par ",
        "text2" => " : ",
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
          "text"=>"<br>Trier les films selon les criteres: ",
          "name"=>"criteres",
          "choices"=> [
          array("text"=>"Alphabétique","value"=>"alphabetique"),
          array("text"=>"Ordre chronologique","value"=>"chronologique"),
          array("text"=>"Durée","value"=>"duree")
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

        function genres_checkbox($genreCombo){
          $file_db_genre=new PDO("sqlite:BD_GENERAL.sqlite");
          $result_genre=$file_db_genre->query("SELECT * FROM genres");
          $html = $genreCombo["text"];
          $html .= "<select name='$genreCombo[name]'>";
          foreach ($result_genre as $rg){
            $html .= "<option value='$rg[nom_genre]'>$rg[nom_genre]</option>";
          }
          $html .= "</select>";
          echo $html;
        }

        genres_checkbox($genreCombo);
        ?>

        <input type="submit" value='Rechercher' name="genreFilm"><br>

        <?php

        criteres_checkbox($criteresCombo);

        ?>
      <input type="text" name="recherche">
      <input type="submit" value='Rechercher' name="rechercheFilm">
      <br>

        <?php
        function criteres_radio($criteres){
          $html = $criteres["text"] . "<br>";
          $i = 0;
          foreach ( $criteres["choices"] as $c){
            $i +=1;
            $html .= "<br><input type ='radio' name='$criteres[name]' value='$c[value]' id='$criteres[name]-$i'>";
            $html .= " <label for='$criteres[name]-$i'>$c[text]</label>";
          }
          echo $html;
        }

        foreach($criteres as $c){
          criteres_radio($c);
        }

         ?>
         <br>
         <br><input type="submit" value='Trier' name="criteresFilm">
         <?php
         $exemples =
           [array(
             "id"=>"15",
             "link"=>"https://vignette2.wikia.nocookie.net/fr.starwars/images/e/e0/Lundi.png/revision/latest?cb=20151011153017",
             "name"=>"Star Wars",
             "value"=>"Star Wars: Episode V, T",
             "section"=> "exemple1",
             "Debutligne" => "true",
             "Finligne" => "false"
         ),
         array(
           "id"=>"16",
           "link"=>"http://fr.web.img6.acsta.net/medias/nmedia/00/00/01/27/69197311_af.jpg",
           "name"=> "2001 L'odyssée",
           "value"=> "2001",
           "section" => "exemple2",
           "Debutligne" => "false",
           "Finligne" => "false"
         ),
         array(
           "id"=>"17",
           "link"=>"http://fr.web.img5.acsta.net/medias/nmedia/00/00/00/33/spiderman.jpg",
           "name"=> "Spider-Man",
           "value"=> "Spider",
           "section" => "exemple3",
           "Debutligne" => "false",
            "Finligne" => "true"
         ),
         array(
           "id"=>"18",
           "link"=>"http://fr.web.img6.acsta.net/medias/04/34/49/043449_af.jpg",
           "name"=> "Matrix",
           "value"=>"Matrix",
           "section" => "exemple4",
           "Debutligne" => "true",
            "Finligne" => "false"
         ),
         array(
           "id"=>"19",
           "link"=>"http://images.fan-de-cinema.com/affiches/large/63/53663.jpg",
           "name"=> "2046",
           "value"=>"2046",
           "section" => "exemple5",
           "Debutligne" => "false",
            "Finligne" => "false"
          ),
         array(
           "id"=>"20",
           "link"=>"http://www.dailymars.net/wp-content/uploads/2013/09/Ben_Hur.jpg",
           "name"=> "Ben-Hur",
           "value"=>"Ben",
           "section" => "exemple6",
           "Debutligne" => "false",
            "Finligne" => "true"
         )

       ];
       ?>
       <h2> Exemples de Film : </h2>
      <section class='exempleF'>

<?php
       foreach($exemples as $e){
        //  echo "<section id=$e[section]>";
         if($e['Debutligne']=="true"){
           echo "<div class='exempleF2'>";
         }
         echo "<section id=$e[section]$e[id]>";
         echo "<p> $e[name] </p>";
         echo "<a href='filmExemple.php?value=$e[value]&link=$e[link]'><img src=$e[link] name='test' onmouseover='image.src=https://www.noelshack.com/2017-41-5-1507885240-test.jpg' alt='Erreur Image $e[id]' height='300' width='200'></a>";
         echo "</section>";
         if($e['Finligne']=="true"){
           echo "</div>";
         }
        //  echo"</section>";
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
