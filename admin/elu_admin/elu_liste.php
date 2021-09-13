<?php

require_once("../../inc/init.php");
nestPasAdmin();
require_once("../../inc/head.php");
require_once("../../inc/nav_admin.php");
require_once("../../inc/nav.php");

$barreVerte = 
'<div class="col-12  m-1   border text-light   colorPSC_gradiant" >
<div class="row d-flex justify-content-between">
    <div class="col-2 ">
        NOM
    </div>
    
    <div class="col-2">
        PRENOM
    </div>

    <div class="col-2">
        FONCTION
    </div>

    <div class="col-2">
        MANDAT
    </div>

   

    <div class="col-1">
        PHOTO
    </div>

    <div class="col-2">
        
    </div>


</div>
</div>';




// TEST DESINFECTION
//$exemple='<h1 style="color:green">j\'aime les fruits</h1>';

// Désinfection/Sanitizing des inputs contre les injections mal veillantes dans le la BD 
//htmlentities() - Convertit les caractères spéciaux en leur entité HTML,y compris les single et double quotes
//trim() - Supprime les espaces en trop au début et à la fin d’une string
//stripslashes() -  Supprime les antislashes d’une string

//$exemple=htmlentities($exemple,ENT_COMPAT);
//echo $exemple;
$dates=$DB->query("SELECT mandat_debut ,mandat_fin FROM categorie_delegue WHERE id_categorie=1");
$datesArray=$dates->fetch(PDO::FETCH_ASSOC);
$mandatDebut=$datesArray['mandat_debut'];
$mandatFin=$datesArray['mandat_fin'];
?>


<div class="container">
    <h1 class="text-center">Liste des élus</h1>
    <a href="elu_form.php?action=ajouter">Ajouter un élu</a>
    <br>
    <a href="elu_mandat_form.php">Modifier les dates du mandat</a>

    <div class="row  mt-5">
          
        
        <!-- Ici commence l'organization pour les categories  -->

        <div class="col-12  text-center pt-5">
            <h4>Les Délégués du Pays Sud Charente  -  Mandat <?php echo $mandatDebut.'-'.$mandatFin?> </h4>
        </div>

        

        <?php
        echo $barreVerte;
        $listeElu=$DB->query("SELECT * FROM elu WHERE categorie=1  ORDER BY placement ");  

        while($listeEluArray=$listeElu->fetch(PDO::FETCH_ASSOC))
        {
            include('elu_liste_template.php');
        }
        ?>




        <div class="col-12  text-center pt-5">
            <h4>Les Délégués CdC Sud Charente</h4>
        </div>



        <?php

        echo $barreVerte;

        $listeElu=$DB->query("SELECT * FROM elu WHERE categorie=2  ORDER BY nom ");  

        while($listeEluArray=$listeElu->fetch(PDO::FETCH_ASSOC))
        {
            include('elu_liste_template.php');
        }
        ?>

        


        <div class="col-12  text-center pt-5">
            <h4>Les Délégués Cdc - Lavalette-Tude-Dronne</h4>
        </div>

        <?php
        echo $barreVerte;
        $listeElu=$DB->query("SELECT * FROM elu WHERE categorie=3  ORDER BY nom ");  

        while($listeEluArray=$listeElu->fetch(PDO::FETCH_ASSOC))
        {
            include('elu_liste_template.php');
        }
        ?>





    </div>

</div>











<?php
require_once("../../inc/fin.php");
?>