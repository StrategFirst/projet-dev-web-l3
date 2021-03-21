<?php if(isset($err_code) && isset($err_msg)) require "vue/erreur_box.php"; ?>



    <div id="connexion_box">
      <form action="./?action=connexion" method="post">
        <h1>Connexion</h1>
        <label><b>Nom d'utilisateur</b></label>
        <input type="text" placeholder="Entrez le nom de l'utilisateur" name="username" required>


        <label><b>Mot de passe</b></label>
        <input type="password" placeholder="Entrez le mot de passe" name="password" required>

        <input type="submit" id="submit" value="connexion">

      </form>
    </div>
