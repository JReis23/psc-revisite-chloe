<?php
require_once("../../inc/init.php");
require_once("../../inc/head.php");









$id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);

$actualite=$DB->prepare("SELECT * FROM actualite WHERE id_actualite=:id ");
$actualite->bindValue(':id', $id, PDO::PARAM_INT);
$actualite->execute();


          $actualiteArray=$actualite->fetch(PDO::FETCH_ASSOC);
          $titre=$actualiteArray['titre'];
          $accroche=$actualiteArray['accroche']; 
          $id=$actualiteArray['id_actualite']; 
          $image=$actualiteArray['image'];
          $contenu=$actualiteArray['contenu'];
          $rubrique=$actualiteArray['rubrique'];
          $date_debut=$actualiteArray['date_debut'];

          $date_fin=$actualiteArray['date_fin'];  
          $date_evenement= $actualiteArray['date_evenement']; 



?>

<div class=" container colorGreyPale px-5 py-5 ">
    <h4 class="fw-bold colorTextSante"><?php echo $titre?></h4>
    
    <h6 class="fw-bold"><?php echo $accroche ?></h6>
    <?php
    if (!empty($image))
            {
            echo '<img  class="img-fluid"  src="'.RACINE_SITE.$image.'">';
            }

    ?>
    <?php echo $contenu ?>



    
  </div>

 

  

<?php

require_once("../../inc/fin.php");
?>