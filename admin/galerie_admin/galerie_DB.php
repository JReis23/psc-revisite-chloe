<?php

require_once("../../inc/init.php");
nestPasAdmin();


//var_dump($_POST);
//var_dump($_FILES);

$id=filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
$action=htmlentities(trim(stripslashes($_POST['action'])), ENT_QUOTES);
$nom=htmlentities(trim(stripslashes($_POST['nom'])), ENT_QUOTES);
$description=htmlentities(trim(stripslashes($_POST['description'])), ENT_QUOTES);
$rubrique=filter_var($_POST['rubrique'],FILTER_SANITIZE_NUMBER_INT);


if($action=='Ajouter')
{
$nomImage=$_FILES['image']['name'];
$tmp_name=$_FILES['image']['tmp_name'];
copy($tmp_name, $_SERVER['DOCUMENT_ROOT'].RACINE_SITE.'inc/image/galerie/'.$nomImage);
$lien='inc/image/galerie/'.$nomImage;



$ajoutGalerie=$DB->prepare("INSERT INTO galerie (nom, description, lien, rubrique) VALUES (:nom, :description, :lien, :rubrique)");


$ajoutGalerie->bindValue(':nom', $nom,PDO::PARAM_STR); //bindValue c'est Lier la valeur de la variable
$ajoutGalerie->bindValue(':description', $description,PDO::PARAM_STR);
$ajoutGalerie->bindValue(':rubrique', $rubrique,PDO::PARAM_INT);
$ajoutGalerie->bindValue(':lien', $lien, PDO::PARAM_STR);

$ajoutGalerie->execute();

}

elseif($action=='Modifier')
{
    if(!empty($_FILES['image']['name']))
    {
        $galerieExistant=$DB->prepare("SELECT lien FROM galerie WHERE id_galerie=:id");
        $galerieExistant->bindValue(':id', $id,PDO::PARAM_INT);
        $galerieExistant->execute();
        $galerieExistantArray=$galerieExistant->fetch(PDO::FETCH_ASSOC);
        $lien=$galerieExistantArray['lien'];

        // Supprimer l'image du server si le lien est defini
        if(!empty($lien))
        {
             unlink($_SERVER['DOCUMENT_ROOT'].RACINE_SITE.$lien);
        }  
         
        //Copier une nouvelle image sur le server et definir un nouveau lien
        $nomImage=$_FILES['image']['name'];
        $tmp_name=$_FILES['image']['tmp_name'];
        copy($tmp_name, $_SERVER['DOCUMENT_ROOT'].RACINE_SITE.'inc/image/galerie/'.$nomImage);
        $lien='inc/image/galerie/'.$nomImage;
        
        //mettre à jour le lien de l'image
        $updateImage=$DB->prepare("UPDATE galerie SET lien=:lien WHERE id_galerie=:id");
        $updateImage->bindValue(':lien',$lien,PDO::PARAM_STR);
        $updateImage->bindValue(':id', $id,PDO::PARAM_INT);
        $updateImage->execute();
        
    }

        //Mettre à jour le reste de données
        $updateImage=$DB->prepare("UPDATE galerie SET nom=:nom , description=:description , rubrique=:rubrique WHERE id_galerie=:id");
        $updateImage->bindValue(':nom',$nom,PDO::PARAM_STR);
        $updateImage->bindValue(':description',$description,PDO::PARAM_STR);
        $updateImage->bindValue(':rubrique',$rubrique,PDO::PARAM_INT);
        $updateImage->bindValue(':id', $id,PDO::PARAM_INT);
        $updateImage->execute();



}
header('location:galerie_liste.php');
//echo '<a href="galerie_liste.php">Revenir à la liste</a>';









?>