<?php
require_once ("../../inc/init.php");
nestPasAdmin();
require_once ("../../inc/head.php");
require_once("../../inc/nav_admin.php");
require_once ("../../inc/nav.php");

$ensemblePartenaire=$DB->query("SELECT * FROM partenaire");  //  Requette SQL

echo '<div class="container-fluid  sectionPartenaire p-3">';
echo '<h3 class="mb-5">Liste des partenaires en pied de page</h3>';
echo '<a href="footer_partenaire_ajout_form.php">Ajouter un partenaire</a>';
echo '<div class="row d-flex justify-content-around">';

while($partenaire=$ensemblePartenaire->fetch())
{
  echo '<div class="col-3 border   m-1 mb-4  pb-4">';
  echo '<b>nom</b> : '.$partenaire['nom'].'<br>';
  echo '<b>id</b> :'.$partenaire['id_partenaire'].'<br>';
  echo '<b>adresse</b> : <a href="'.$partenaire['adresse'].'">'
  .$partenaire['adresse'].
  '</a>';
  echo '<br>';
  
  echo '<b>logo :</b><img src="'.RACINE_SITE.''.$partenaire['logo'].'" class="d-fluid  mt-5" alt="'.$partenaire['nom'].'"><br>';
  echo '<a href="footer_partenaire_modif_form.php?couleur=rouge&id='.$partenaire['id_partenaire'].'">Editer</a> ';
  echo '/';
  echo '<a href="#" onclick="if(confirm(\'Êtes-vous sûr de vouloir SUPPRIMER ce Partenaire ?\'))
  document.location.href=\'footer_partenaire_delete.php?id='.$partenaire['id_partenaire'].'\'">
  Supprimer</a>';
  echo '</div>'; 


  
  
}

echo '</div>';
echo '</div>';


?>




