<?php
require_once("../inc/init.php");
require_once("../inc/head.php");


if(adminConnecte())  //si admin. on on affiche la NAV Admin
{
  require_once("../inc/nav_admin.php");
}


require_once("../inc/nav.php");




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
          
         



?>

<div class=" container colorGreyPale px-5 py-5 ">
    <h4 class="fw-bold colorTextSante"><?php echo $titre?></h4>
    
    <h6 class="fw-bold"><?php echo $accroche ?></h6>
    <img  style="height:300px" src="<?php echo RACINE_SITE.$image ?>">
    <?php echo $contenu ?>


    <?php 
    if(adminConnecte())  // Fonction adminConnecte  permetra la visiblité du button MODIFIER seulement pour l'Administrateur.
    {
      echo '<a href="'.RACINE_SITE.'admin/actualite_admin/actualite_form.php?id='.$id.'&action=modifier">Modifier</a>';
    }
 

    ?>
    
  </div>

 

  <div class="container border-top border-5 pt-3" style="border-color: rgb(83, 83, 83);">
    <div class="row">

       <?php
          $autresactualitePDOStat=$DB->query("SELECT * FROM actualite  WHERE rubrique=$rubrique AND id_actualite!=$id  ORDER BY date_debut DESC LIMIT 4");
          while ($autresactualiteArray=$autresactualitePDOStat->fetch(PDO::FETCH_ASSOC))
          {
            $titre=stripslashes($autresactualiteArray['titre']);
            $accroche=$autresactualiteArray['accroche']; 
            $id=$autresactualiteArray['id_actualite'];
            $image=$autresactualiteArray['image'];
            
            echo '<div class="col-12 col-sm-6 col-md-4  col-lg-3 ">';
            if (!empty($id))
            {
            echo '<div class=" colorGreyPale px-3 py-3   rounded-3 ">
            <h5 class="fw-bold colorTextSante">'.$titre.'</h5>';
            if (!empty($image))
            {
            echo '<img  class="img-fluid"  src="'.RACINE_SITE.$image.'">';
            }
            echo $accroche.'
            <form  class="text-end">
              <a href="'.RACINE_SITE.'actualite/actualite.php?id='.$id.'"style="border-radius : 5px; background-color:rgb(217, 233, 255)" >Lire</a>
              </form>
            </div>';
            }
            echo '</div>';
          }

       ?>
       

    
    </div>

</div>

<?php
require_once("../inc/footer.php");
require_once("../inc/footer_partenaires.php");
require_once("../inc/fin.php");
?>