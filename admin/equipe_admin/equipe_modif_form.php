<?php
require_once("../../inc/init.php");
nestPasAdmin();
require_once("../../inc/head.php");
require_once("../../inc/nav_admin.php");
require_once("../../inc/nav.php");

//echo 'Voice la variable $_GET !';
//echo '<pre>';
//print_r($_GET);
//echo '</pre>';

$membreEquipe=$DB->query("SELECT * FROM equipe WHERE id_equipe=$_GET[id]");  //requete SQL
$equipeArray=$membreEquipe->fetch();

//echo 'Voici la variable $equipeArray !';
//echo '<pre>';
//print_r($equipeArray);
//echo '</pre>';




?>

<div class="container ">
    <h3 class="text-center pt-5 ">Modifier un équipier</h3>
        <div class="row d-flex justify-content-center ">
            <div class="col-4   border border-success  rounded ">

                <form method="post" action="equipe_modif_DB.php">
                    <label for="nom" class="form-label pt-3">Nom</label>
                    <input type="text" name="nom" id="nom" class="form-control" value="<?php echo $equipeArray['nom']  ?>">

                    <label for="prenom" class="form-label pt-3">Prénom</label>
                    <input type="text" name="prenom" id="prenom" class="form-control" value="<?php echo $equipeArray['prenom'] ?>">

                    <label for="fonction" class="form-label pt-3">Fonction</label>
                    <input type="text" name="fonction" id="fonction" class="form-control"  value="<?php echo $equipeArray['fonction'] ?>">

                    <label for="email" class="form-label pt-3">Email</label>
                    <input type="text" name="email" id="email" class="form-control"  value="<?php echo $equipeArray['email'] ?>">

                    <label for="photo" class="form-label pt-3">Photo</label>
                    <input type="file" name="photo" id="photo" class="form-control" >

                    <label for="telephone" class="form-label pt-3">Téléphone</label>
                    <input type="text" name="tel" id="telephone" class="form-control"  value="<?php echo $equipeArray['tel'] ?>">

                    <!--<label for="id" class="form-label pt-3">ID</label> -->
                    <input type="hidden" name="id_equipe" id="id" class="form-control"  value="<?php echo $equipeArray['id_equipe'] ?>">

                    <button type="submit" class="btn btn-primary mt-3  mb-3">Modifier</button>

                </form>

            </div>
        </div>

</div>




<?php
require_once("../../inc/fin.php")
?>