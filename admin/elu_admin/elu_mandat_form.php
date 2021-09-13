<?php

require_once("../../inc/init.php");
nestPasAdmin();   //  Si n'est pas Admin il est jété à l'accueil !
require_once("../../inc/head.php");
require_once("../../inc/nav_admin.php");
require_once("../../inc/nav.php");




$dates=$DB->query("SELECT mandat_debut ,mandat_fin FROM categorie_delegue WHERE id_categorie=1");
$datesArray=$dates->fetch(PDO::FETCH_ASSOC);
$mandatDebut=$datesArray['mandat_debut'];
$mandatFin=$datesArray['mandat_fin'];

?>

<div class="container">
   <h1 class="p-5 text-center">Changer les dates du mandat</h1>
   
   
   <div class=" row d-flex justify-content-center">
      <div class="col-3 ">
         <form action="elu_mandat_DB" method="post">
         
            <label class="form-label" for="mandat_debut">Année de début du mandat</label>
            <input type="number" class="form-control"  id="mandat_debut"  name="mandat_debut" value="<?php echo $mandatDebut ?>">
         

         
            <label class="form-label" for="mandat_fin">Année de fin du mandat</label>
            <input type="number" class="form-control"  id="mandat_fin"  name="mandat_fin" value="<?php echo $mandatFin ?>">
         


            <button type="submit" class="mt-4 btn btn-primary" >Modifier</button> 
         
            <p class="m-5 text-center"><a class="" href="elu_liste.php">Revenir à la liste</a></p>
         </form>
         
      </div>

      
   </div>


</div>