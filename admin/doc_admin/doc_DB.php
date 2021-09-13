<?php
require_once('../../inc/init.php');
nestPasAdmin();
var_dump($_POST);
var_dump($_FILES);

$nom=$_POST['nom'];
$lien=$_POST['lien'];
$rubrique=$_POST['rubrique'];
$description=$_POST['description'];
$id=$_POST['id'];
$nomFichier=$_FILES['fichier']['name'];
$nomFichierTmp=$_FILES['fichier']['tmp_name'];
$tailleFichier=$_FILES['fichier']['size'];



if($_POST['action']=='Ajouter')
{  
    var_dump($_FILES);
    //AJOUTER LE FICHIER SUR LE SERVER
    //Crée le lien vers le fichier sur le server
    $lien='inc/document/'.$nomFichier;
    copy($nomFichierTmp,$_SERVER['DOCUMENT_ROOT'].RACINE_SITE.$lien);
    
    $ajoutDoc=$DB->prepare("INSERT INTO document (nom, nom_fichier, lien, rubrique, description) VALUES (:nom, :nomFichier, :lien, :rubrique, :description)");
    $ajoutDoc->bindValue(':nom',$nom,PDO::PARAM_STR);
    $ajoutDoc->bindValue(':nomFichier',$nomFichier,PDO::PARAM_STR);
    $ajoutDoc->bindValue(':lien',$lien,PDO::PARAM_STR);
    $ajoutDoc->bindValue(':rubrique',$rubrique,PDO::PARAM_INT);
    $ajoutDoc->bindValue(':description',$description,PDO::PARAM_STR);
    $ajoutDoc->execute();

    header('location:doc_liste.php');
    exit;
    
}
elseif($_POST['action']=='Modifier')
{    
    //Si on ajoute un fichier alors que l'on modifie
    if(!empty($_FILES['fichier']['name']))
    {  
        // Dabord on supprime le fichier qui existe déjà

        unlink($_SERVER['DOCUMENT_ROOT'].RACINE_SITE.$lien);

        //Ajouter le nouveau fichier

        $lien='inc/document/'.$nomFichier;
        copy($nomFichierTmp,$_SERVER['DOCUMENT_ROOT'].RACINE_SITE.$lien);

        $modifDoc=$DB->prepare("UPDATE document SET lien=:lien, nom_fichier=:nomFichier WHERE id_document=:id");
        $modifDoc->bindValue(':lien',$lien,PDO::PARAM_STR);
        $modifDoc->bindValue(':id',$id,PDO::PARAM_INT);
        $modifDoc->bindValue(':nomFichier',$nomFichier,PDO::PARAM_STR);
        $modifDoc->execute();
    }

        
    
    $modifDoc=$DB->prepare("UPDATE document SET nom=:nom, rubrique=:rubrique, description=:description WHERE id_document=:id");
    $modifDoc->bindValue(':nom',$nom,PDO::PARAM_STR);
    
    $modifDoc->bindValue(':rubrique',$rubrique,PDO::PARAM_INT);
    $modifDoc->bindValue(':description',$description,PDO::PARAM_STR);
    $modifDoc->bindValue(':id',$id,PDO::PARAM_INT);

    $modifDoc->execute();

    header('location:doc_liste.php');
    exit;
}


?>
