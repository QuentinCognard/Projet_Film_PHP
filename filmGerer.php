<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Gestion  </title>
    <link rel="stylesheet" type="text/css" href="accueil.css">
  </head>
  <header>
    <h1><a href="accueil.php"> Film Search</a></h1>
  </header>
  <body>
    <section id='principale'>
    <?php


    if (isset($_POST['supprimerFilm'])) {
      $file_db=new PDO("sqlite:BD_GENERAL.sqlite");
      $result=$file_db->query("SELECT * from films WHERE titre_original LIKE '".$_POST['supprimer']."%'");
      $resultdel = $file_db->prepare("DELETE from films WHERE titre_original LIKE '".$_POST['supprimer']."%'");
      $resultdel->execute();
      echo "<p> Le(s) film(s) suivant ont été supprimé: </p><br>";
      echo "<ul>";
      foreach($result as $c){
        echo "<li>$c[titre_original]";
      }
      echo "</ul>";

      $file_db = null;

    }

    elseif (isset($_POST['ajouterFilm'])) {
      $file_db=new PDO("sqlite:BD_GENERAL.sqlite");

      $result_id=$file_db->query("SELECT max(code_film) from films");
      $id=$result_id->fetch();
      $id[0]+=1;

      $result_newid_real=$file_db->query("SELECT max(code_indiv) as maxIdReal from individus");
      $newid_real=$result_newid_real->fetch();
      $newid_real['maxIdReal']+=1;

    $test_real=$file_db->query("SELECT * from individus where nom LIKE '".$_POST['realisateurFilm']."%'");
    $real=$test_real->fetch();

    if ($real['nom']==null){
      $add_real=$file_db->prepare("INSERT INTO individus(code_indiv,nom)
      VALUES (:code_indiv,':nom')");
      $add_real->bindParam(':nom',$_POST['realisateurFilm']);
      $add_real->bindParam(':code_indiv',$newid_real['maxIdReal']);
      $add_real->execute();
    }

    $test_real=$file_db->query("SELECT * from individus where nom LIKE '".$_POST['realisateurFilm']."%'");
    $real=$test_real->fetch();



    $insert = "INSERT INTO films (code_film,titre_original,titre_francais,pays,date, duree,couleur,realisateur,image)
    VALUES (:code_film,:titre_original,:titre_francais,:pays,:date, :duree,:couleur,:realisateur,:image)";

    $result = $file_db->prepare($insert);



      $result->bindValue(':code_film',$id[0]);
      $result->bindParam(':titre_original',$_POST["nomFilm"]);
      $result->bindParam(':titre_francais',$_POST["nomFilm"]);
      $result->bindParam(':pays',$_POST["comboPays"]);
      $result->bindParam(':date',$_POST["dateFilm"]);
      $result->bindParam(':duree',$_POST["dureeFilm"]);
      $result->bindParam(':couleur',$_POST["comboCouleurs"]);
      $result->bindValue(':realisateur',$real[0]);
      $result->bindParam(':image',$_POST["imageFilm"]);

      $result->execute();



      echo "<p> Film ajouté à la base de donnée :</p><br>";
      echo "<ul>";
      echo "<li>$id[0]";
      echo "<li>$_POST[nomFilm]";
      echo "<li>$_POST[nomFilm]";
      echo "<li>$_POST[comboPays]";
      echo "<li>$_POST[dateFilm]";
      echo "<li>$_POST[dureeFilm]";
      echo "<li>$_POST[comboCouleurs]";
      echo "<li>$_POST[realisateurFilm]";
      echo "<li>$_POST[imageFilm]";
      echo "</ul>";

      $file_db=null;


    }

    ?>
    </section>
  </body>
</html>
