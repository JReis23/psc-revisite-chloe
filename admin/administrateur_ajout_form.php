<?php
require_once ("../inc/init.php");
require_once ("../inc/head.php");
require_once ("../inc/nav_admin.php");

require_once ("../inc/nav.php");

if(adminConnecte()) {
?>

<h3>Ajouter un administrateur</h3>
<div class="container d-flex justify-content-center">
    <div class="col-4">
        <form  class="m-5" method = "post" action="../inscription_validee.php"> 
            <label class="form-label" for="nom">Nom</label> 
            <input class="form-control" type="text" id="nom" name="nom"> 

            <label class="form-label mt-3" for="prenom">Prénom</label>
            <input class="form-control" type="text"  id="prenom" name="prenom">

            <label class="form-label mt-3 "for="email">Email</label>
            <input class="form-control" type="email" name="email" placeholder = "exemple@gmail.com" required  id="email">
            
           <!-- <span id="email" class="font-italique font-weigth-light"></span> -->

            <label class="form-label  mt-3" for="mdp">Mot de passe</label>
            <input class="form-control" type="password"  id="mdp" name="mdp">

            <button class="btn btn-primary mt-5" type="submit" value="envoyer_inscription" name="inscription">inscription2</button>
        </form>
        <p><a href="administration.php" >Revenir à la page administration</a></p>

    </div>

    
</div>


<?php
}
require_once("../inc/fin.php");

?>