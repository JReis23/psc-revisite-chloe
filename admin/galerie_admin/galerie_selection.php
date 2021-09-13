<?php
require_once('../../inc/init.php');


$galerieListePDOstat=$DB->query("SELECT * FROM galerie ");
$galerie='';
$var=0;
while($galerieListeArray=$galerieListePDOstat->fetch(PDO::FETCH_ASSOC))
{$var++;
    
    $galerie.=
    '<div class="col-2  p-1  border ">
    
    <a href="'.RACINE_SITE.$galerieListeArray['lien'].'"><img class="img-fluid border my-3" src="'.RACINE_SITE.$galerieListeArray['lien'].'"></a>
    <span class="text-center">'.$galerieListeArray['nom'].'</span><br/>
    <input type="hidden" id="to-copy'.$var.'" value="'.RACINE_SITE.$galerieListeArray['lien'].'">
    <button class="" id="copy'.$var.'" type="button">lien</button>

    <script>
var toCopy'.$var.'  = document.getElementById( "to-copy'.$var.'" ),
    btnCopy'.$var.' = document.getElementById( "copy'.$var.'" );
   

    btnCopy'.$var.'.addEventListener( "click", function(){
      toCopy'.$var.'.type="text";
      toCopy'.$var.'.select();
      document.execCommand( "copy" );
      toCopy'.$var.'.type="hidden";
      
    } );
</script>
    
    
    
    

   
    </div>';

}

require_once("../../inc/head.php");




?>



<div class="container-fluid">
    <h5 class="text-center">Sélectionner l'image à insérer</h5>

    <p> Vous pouvez ajouter une image à cette galerie en cliquant <a href="galerie_form.php?action=ajouter">directement ici</a>
    <br>
    Cliquez sur le bouton pour copier le lien vers le presse-papier.

    
    

    <div class="row  mt-5">
        <?php echo $galerie ?>
    </div>
</div>







<?php
require_once("../../inc/fin.php");
?>