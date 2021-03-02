<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/> 
    <!-- ces 3 lignes sont censée rechargée le chache (donc le css) a chaque fois que l'on rafraichit la page -->
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" /> 
    
   <title> ConvSport </title>

    <link  rel="stylesheet" type="text/css" href="vue/style/global.css"/>
    
  </head>

  <body>
    <header>
    <h1> <i>Conv</i>Sport </h1>

    <div class="navigation">
      <nav>
          <a class="navigation_gauche" href=""> Administration </a>
          <a class="navigation_gauche" href=""> Consultation </a>
          
          <a class="navigation_droite" href=""> Connexion </a>
      </nav>    
        
    </div>
    </header>
    <div id="contenu">
    
    <?php echo $contenu ?>

    </div>  


  </body>
</html>
