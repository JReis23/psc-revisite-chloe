<?php
require_once("../../inc/init.php");
nestPasAdmin();
require_once("../../inc/head.php");
require_once("../../inc/nav_admin.php");
require_once("../../inc/nav.php");

$ensembleEquipe=$DB->query("SELECT * FROM equipe");  //requete SQL

/*while($equipier=$ensembleEquipe->fetch())   Faire après !!
{
echo '<pre>';
print_r($equipier);
echo '</pre>';
}*/

?>

<div class="container">
    <h3 class="text-center pt-4 mb-3">Liste des équipiers</h3>

    
    <div class="row d-flex justify-content-center">

        <?php
            while($equipier=$ensembleEquipe->fetch())
            {
            echo '<div class=" col-12 col-sm-6  col-md-5  col-xl-4  border border-success   my-3 mx-5 py-4">';

            echo '<b>Nom</b> : '.$equipier['nom'].'<br>';
            echo '<b>Prénom</b> : '.$equipier['prenom'].'<br>';
            echo '<b>Fonction</b> : '.$equipier['fonction'].'<br>';
            echo '<b>Email</b> : '.$equipier['email'].'<br>';
            echo '<b>Tel</b> : '.$equipier['tel'].'<br>';
            //echo '<b>ID</b> : '.$equipier['id_equipe'].'<br>';
           // echo 'equipe_modif_form.php?id='.$equipier['id_equipe'].'';
            echo '<br>';
            //echo '<b>Portrait:</b><img src="'.RACINE_SITE.''.$equipier['lien_photo'].'" class="d-fluid  mt-5"  alt="'.$equipier['nom'].'"><br>';

            echo '<a href="equipe_modif_form.php?id='.$equipier['id_equipe'].'">Modifier</a>';
            echo ' / ';
            
            echo '
            <a  href="#" onclick="if(confirm(\''.$equipier['nom'].' \n Voulez-vous vraiment supprimer cet équipier ?\'))document.location.href=\''.RACINE_SITE.'admin/equipe_admin/equipe_delete_.php?id='.$equipier['id_equipe'].'\'">Supprimer</a>';
            //echo '<a onclick="supprimerEquipier()" href="equipe_delete.php?id=' .$equipier['id_equipe'] . '">Supprimer</a>';
            echo '</div>';
            
            }
    
        ?>

            <p class="text-end  m-5 "><a href="equipe_ajout_form.php"  class="btn btn-primary">Ajouter un équipier</a></p>

    </div>



</div>
<?php
require_once("../../inc/fin.php");
?>