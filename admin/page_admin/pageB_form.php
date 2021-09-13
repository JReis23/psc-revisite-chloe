<?php
 
require_once("../../inc/init.php");
nestPasAdmin();
require_once("../../inc/head.php");
require_once("../../inc/nav_admin.php");
require_once("../../inc/nav.php");


//echo 'La page modifié est :'.$_GET['nom'].'';


$text = $DB->query("SELECT * FROM page WHERE nom= '$_GET[nom]' ");
$textArray = $text->fetch(PDO::FETCH_ASSOC);

//debug($textArray);

$contenu = $textArray['contenu'];



?>


<!--faire un systeme pour que l'on revienne à la page édité  ex:
- associer à chaque texte une lien  -->


<div class="container">
    <h3 class="text-center pt-5">Modifier le texte de : <?php echo $textArray['nom'] ?></h3>
    <a href="<?php echo RACINE_SITE.$textArray['lien'] ?>">Annuler</a>
    <div class=" d-flex justify-content-center">
        <div class="col-6">
        <form method="post" enctype="multipart/form-data" action="page_DB.php">

        <label for="contenu"   class="form-label  pt-3"></label> 
        <textarea rows="15"   name="contenu"   id="contenu"  class="form-control"><?php echo $contenu ?></textarea>
        <script>
            ClassicEditor
                .create(document.querySelector('#contenu'))
                .catch(error =>{console.error(error);});

        </script>

        <input type="hidden"  name="page"   value="<?php echo $textArray['nom']?>">
        <input type="hidden"  name="lien"   value="<?php echo $textArray['lien']?>">
        <button type="submit" class="btn btn-primary mt-4 mb-4">Modifier</button>
        </form>
        </div>
    </div>
</div>
 




<?php
require_once("../../inc/footer.php");

require_once("../../inc/footer_partenaires.php");
require_once("../../inc/fin.php");


?>