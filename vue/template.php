<!DOCTYPE html>
<html lang="fr-FR" dir="ltr">
  <head>
    <meta charset="utf-8"/>
    <!-- ces 3 lignes sont censée rechargée le chache (donc le css) a chaque fois que l'on rafraichit la page -->
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <!-- ligne pour la favicon -->
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

   <title> ConvSport </title>

    <link  rel="stylesheet" type="text/css" href="vue/style/global.css"/>
    <script src=./template.js defer></script>
  </head>

  <body>
    <header>
    <?php if(session_status() ==PHP_SESSION_NONE)
            {
              session_start();
            }
          ?>
    <a id="home" href='./'><h1> <i>Conv</i>Sport </h1></a>

    <div class="navigation">
      <nav>
        <a class="navigation_gauche" href='./?action=consult'> Consultation </a>
        <?php
          if(isset($_SESSION["role"])) {
            if($_SESSION["role"] == 'entraineur') {
              echo '<a class="navigation_gauche" href="./?action=convocation"> Convocations </a>';
              echo '<a class="navigation_gauche" href="./?action=absence"> Absences </a>';
              echo '<a class="navigation_gauche" href="./?action=rencontres&mode=lecture"> Rencontres </a>'; // lecture seul
              echo '<a class="navigation_gauche" href="./?action=effectif&mode=lecture"> Effectif </a>'; // lecture seul

            } else if ($_SESSION["role"] == 'secretaire') {
              echo '<a class="navigation_gauche" href="./?action=effectif"> Effectifs </a>';
              echo '<a class="navigation_gauche" href="./?action=rencontres&mode=edition"> Rencontres </a>';
              echo '<a class="navigation_gauche" href="./?action=absence"> Absences </a>';
            }
            echo '<a class="navigation_droite" onclick="destroy_session()"> Deconnexion </a>';
          } else {
            echo '<a class="navigation_droite" href="./?action=connexion"> Connexion </a>';
          }
        ?>

      </nav>

    </div>
    </header>
    
    <div id="contenu">

    <?php echo $contenu ?>

    </div>


  </body>
</html>
