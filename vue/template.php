<!DOCTYPE html>
<html>
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
    <a id="home" href='./'><h1> <i>Conv</i>Sport </h1></a>

    <div class="navigation">
      <nav>
          <?= (isset($_SESSION["role"])) ? '<a class="navigation_gauche" href="./?action=admin"> Administration </a>' : '' ?>
          <a class="navigation_gauche" href='./?action=consult'> Consultation </a>

          <?= (isset($_SESSION["role"])) ?
            '<a class="navigation_droite" onclick="destroy_session()"> Deconnexion </a>' :
            '<a class="navigation_droite" href="./?action=connexion"> Connexion </a>' ?>

      </nav>

    </div>
    </header>
    <div id="contenu">

    <?php echo $contenu ?>

    </div>


  </body>
</html>
