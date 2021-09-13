<?php
require_once("../../inc/init.php");
nestPasAdmin();
require_once("../../inc/head.php");
require_once("../../inc/nav_admin.php");
require_once("../../inc/nav.php");
?>

<div class="container">
    <h3 class="text-center pt-5">Ajouter un équipier</h3>
    <div class="row d-flex justify-content-center">
    <div class="col-4">
        <form method="post"   enctype="multipart/form-data"  action="equipe_ajout_DB.php">
            <label for="nom" class="form-label pt-3">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control">

            <label for="prenom" class="form-label pt-3">Prénom</label>
            <input type="text" name="prenom" id="prenom" class="form-control">

            <label for="fonction" class="form-label pt-3">Fonction</label>
            <input type="text" name="fonction" id="fonction" class="form-control">

            <label for="email" class="form-label pt-3">Email</label>
            <input type="text" name="email" id="email" class="form-control">

            <label for="photo" class="form-label pt-3">Photo</label>
            <input type="file" name="photo" id="photo" class="form-control">

            <label for="telephone" class="form-label pt-3">Téléphone</label>
            <input type="text" name="tel" id="telephone" class="form-control">

            <button type="submit" class="btn btn-primary mt-3">Ajouter</button>

        </form>

    </div>
    </div>

</div>




<?php
require_once("../../inc/fin.php")
?>