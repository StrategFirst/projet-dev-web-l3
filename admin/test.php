<head>
    <meta charset="UTF-8"/>
    <!-- ligne pour la favicon -->
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <title> Connexion à la BDD </title>

    <link  rel="stylesheet" type="text/css" href="BDD.css"/>

  </head>

<h1>Test de connexion a MySQL</h1>

<p>id : <?php echo $_POST["bdd_id"]?></p>
<p>password : <?php echo $_POST["bdd_password"]?></p>
<p>port: <?php echo $_POST["bdd_port"]?></p>

<?php 
        session_start();
        $_SESSION["BDD_CHECK"]=true;
?>

<a href=../index.php > retour au site </a>