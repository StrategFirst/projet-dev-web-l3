<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8"/>
    <!-- ligne pour la favicon -->
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <title> Connexion à la BDD </title>

    <link  rel="stylesheet" type="text/css" href="admin/BDD.css"/>

  </head>
<div id="bdd_connexion_box">
      <form action="admin/test.php" method="POST">
        <h1>Connexion a MySQL</h1>
        <label><b>id</b></label>
        <input type="text" placeholder="Entrez l'id" name="bdd_id" required>

        
        <label><b>Mot de passe</b></label>
        <input type="text" placeholder="Entrez le mot de passe" name="bdd_password">

        <label><b>PORT</b></label>
        <input type="text" name="bdd_port" value="3308">

        <input type="submit" id="submit" value="connexion">
        

      </form>
    </div>

</html>