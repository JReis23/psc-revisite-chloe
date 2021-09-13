<?php
$ensemblePartenaire=$DB->query("SELECT * FROM partenaire");

echo '<div class="container-fluid  sectionPartenaire p-5">';

if(adminConnecte())
  {
    echo '<a href="'.RACINE_SITE.'admin/footer_admin/footer_partenaire_liste.php"> Liste partenaire </a>';
  }

  echo '<div class="row d-flex justify-content-between">';


while($partenaire=$ensemblePartenaire->fetch())
  {
    echo '<div class="col text-center pb-4">
    <a target="blank" href="'.$partenaire['adresse'].'">
    <img src="'.RACINE_SITE.''.$partenaire['logo'].'" class="d-fluid" alt="'.$partenaire['nom'].'">
    </a>
    </div>'; 
  }
  

echo '</div>';
echo '</div>';

?>

      

     
























