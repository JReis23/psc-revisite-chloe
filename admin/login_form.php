<?php
require_once("../inc/init.php");
require_once("../inc/head.php");


$erreur='';
if(isset($_GET['erreur']))
{
    if($_GET['erreur']==1)
    {
        $erreur='Email inconnu !';
    }

    elseif($_GET['erreur']==2)
    {
        $erreur='Mot de passe incorrect !';
    }

}
?>

<div class="container">
    <div class="row pt-5 d-flex justify-content-center">

        <div class=" col-3 mt-5">
            
            <img class="img-fluid" src="<?php echo RACINE_SITE ?>inc/image/logo/img_pays_transp_small.png">

            <form method="post"  action="login_DB.php">

                <label for="email" class="form-label">Email</label>
                <input type="email" name="email"  id="email"  class="form-control">

                <label for="mdp" class="form-label">Mot de passe</label>
                <input type="password" name="mdp"  id="mdp"  class="form-control">

                <button type="submit" class="btn btn-success mt-4 mb-4">Se connecter</button>

            </form>

            <h5 style="color:red"><?php echo $erreur ?></h5>
           
        </div>
    </div>

</div>




<?php
require_once("../inc/fin.php");
?>