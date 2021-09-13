<?php
require_once ("../../inc/init.php");
nestPasAdmin();
require_once ("../../inc/head.php");
require_once("../../inc/nav_admin.php");
require_once ("../../inc/nav.php");
?>

<div class="container">
    <h3 class="mt-5">Ajouter un partenaire</h3>

    <form class="mt-5 " method="post" enctype="multipart/form-data" action="footer_partenaire_ajout_DB.php">
        <label class="form-label" for="nom">Nom</label>
        <input class="form-control" type="text" id="nom" name="nom">

        <label class="form-label mt-4" for="logo">Logo</label>
        <input class="form-control" type="file" id="logo" name="logo">

        <label class="form-label mt-4" for="adresse">Adresse web</label>
        <input class="form-control" type="text" id="adresse" name="adresse">

        <button class="btn btn-primary mb-5 mt-3" type="submit" value="ajouter" name="ajouter">Ajouter</button>       

    </form>
    <p><a href="accueil.php">Revenir à l'accueil</a></p>

</div>


