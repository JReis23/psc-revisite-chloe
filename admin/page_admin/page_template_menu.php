<?php // récuperer les données du bloc menu

$listeVignette=$DB->query("SELECT bandeau, affichage_bandeau, affichage_image, affichage_texte, vignette1, vignette2, vignette3, vignette4, vignette5 FROM menu WHERE id_menu=$menu");
$listeVignetteArray= $listeVignette->fetch(PDO::FETCH_ASSOC);
$affichageMenuBandeau=$listeVignetteArray['affichage_bandeau'];
$affichageMenuImage=$listeVignetteArray['affichage_image'];
$affichageMenuTexte=$listeVignetteArray['affichage_texte'];

if($affichageMenuBandeau==1)
{
    echo '<div class="d-flex justify-content-center mb-5 pt-3">
        <h4 class=" col-10 col-md-8 col-lg-7 col-xl-6 text-center menuRight '.$couleur.'" style="padding:10px 10px 10px 10px;border-radius : 10px">
        '.$listeVignetteArray['bandeau'].'</h4>       
       </div>';
}
echo '<div class=" p-3 row d-flex justify-content-around">';
    
    
    
    for($num=1; $num<6;$num++)
    {
        $vignetteNum='vignette'.$num;
        $idVignette=$listeVignetteArray[$vignetteNum];
        if(!empty($idVignette))
        {
            $VignettePDOstat=$DB->query("SELECT * FROM vignette WHERE id_vignette=$idVignette");
            $vignetteArray=$VignettePDOstat->fetch(PDO::FETCH_ASSOC);
            $vignetteAffichage=$vignetteArray['affichage'];
            $vignetteLien=$vignetteArray['lien'];
            $vignetteTitre=$vignetteArray['titre'];
            $vignetteTexte=$vignetteArray['texte'];
            $vignetteImage=$vignetteArray['image'];
            if ($vignetteAffichage==0){$vignetteDisplay='d-none';}else{$vignetteDisplay='';}
              
            
                echo '<a href="'.RACINE_SITE.'admin/page_admin/page_template.php?nom='.$vignetteLien.'" class=" mb-5 '.$vignetteDisplay.' contenu '.$couleur.'">'; 
               if(!empty($vignetteImage)&&$affichageMenuImage==1)       
                {echo '<img  src="'.RACINE_SITE.$vignetteImage.'">';}
                elseif($affichageMenuImage==1)
                {echo '<img src="'.RACINE_SITE.'/inc/image/img_menu/'.$couleur.'_vignetteDefault.jpg">';}
            
            echo    '<h5>'.$vignetteTitre.'</h5>';
                if($affichageMenuTexte==1)
                {echo '<p class="">'.$vignetteTexte.'</p>';}
                  
            echo '</a>';
            
           
        }
    }
        ?>
</div>