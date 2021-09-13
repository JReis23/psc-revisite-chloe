<?php
require_once('../../inc/init.php');
nestPasAdmin();
var_dump($_POST);
var_dump($_FILES);




$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$fonction=$_POST['fonction'];
$categorie=$_POST['categorie'];
if(!empty($_POST['mandat'])){$mandat=$_POST['mandat'];}
else{$mandat=NULL;}
$placement=$_POST['placement'];

$photoName=$_FILES['photo']['name'];
$photoTempName=$_FILES['photo']['tmp_name'];



// SOURCE - https://www.numelion.com/majuscule-en-php-et-minuscule.html

$nom = strtoupper($nom);  //ça permets de mettre tout le nom en majiscules
$prenom = ucwords($prenom);  // ça permets de mettre tout les premières lettre en majiscules


//ASSAINIR et SECURISER LE CODE avec:
// htmlentities(), trim()  et  stripslashes() enlève le scaracters qui peuvent servir à entrer du code pirate.

$nom=htmlentities(trim(stripslashes($nom)),ENT_QUOTES);

$prenom=stripslashes($prenom);  // Une autre façon de assainir et sécuriser le code.
$prenom=trim($prenom);
$prenom=htmlentities($prenom);

$fonction=htmlentities(trim(stripslashes($fonction)),ENT_QUOTES);
$categorie=htmlentities(trim(stripslashes($categorie)),ENT_QUOTES);
$mandat=htmlentities(trim(stripslashes($mandat)),ENT_QUOTES);


// AJOUTER UN ELU
if($_POST['action']=='Ajouter')
{
    $photoLien='';
    // Si on a selectionné une photo dans le formulaire
    if(!empty($_FILES['photo']['name']))
    {
        //Ajouter une imge sur le serveur
        $photoDossier=$_SERVER['DOCUMENT_ROOT'].RACINE_SITE .'inc/image/img_pays/img_pays_elu/'.$photoName;
        copy($photoTempName,$photoDossier);
        //  créer le lien
        $photoLien='inc/image/img_pays/img_pays_elu/'.$photoName;

    }

    $ajoutDB=$DB->prepare("INSERT INTO elu (nom, prenom, fonction, mandat, categorie, placement, photo) VALUES (:nom, :prenom, :fonction, :mandat, :categorie, :placement, :photo)");

    $ajoutDB->bindValue(':nom', $nom,PDO::PARAM_STR);
    $ajoutDB->bindValue(':prenom', $prenom,PDO::PARAM_STR); //bindValue c'est Lier la valeur de la variable
    $ajoutDB->bindValue(':fonction', $fonction,PDO::PARAM_STR);
    $ajoutDB->bindValue(':mandat', $mandat,PDO::PARAM_STR);
    $ajoutDB->bindValue(':categorie',$categorie,PDO::PARAM_STR);
    $ajoutDB->bindValue(':photo',$photoLien,PDO::PARAM_STR);
    $ajoutDB->bindValue(':placement',$placement);
    $ajoutDB->execute();
    header("location:elu_liste.php");  // location: dirige vers la page indiquée -> elu_liste.php
    exit;
    //echo '<a href="elu_liste.php">Revenir à la liste</a>';
}

elseif($_POST['action']=='Modifier')
{
    echo 'Modifier élu';
    echo '<a href="elu_liste.php">Revenir à la liste</a>';
    if (isset($_POST['deletePhoto']))
    {
        // Récuperer le lien de l'image qui existe déjà
        $elu_photo_delete=$DB->prepare("SELECT photo FROM elu WHERE id_elu=:id");
        $elu_photo_delete->bindValue(':id',$_POST['id'],PDO::PARAM_INT);
        $elu_photo_delete->execute();
        $elu_photo_deleteArray=$elu_photo_delete->fetch(PDO::FETCH_ASSOC);
        // SUpprimer l'image sur le server
        $imageLien=$elu_photo_deleteArray['photo'];
        unlink($_SERVER['DOCUMENT_ROOT'].RACINE_SITE.$imageLien);

        $eluPhotoUpdate=$DB->prepare("UPDATE elu SET photo=''  WHERE id_elu=:id");
        
        
        $eluPhotoUpdate->bindValue(':id',$_POST['id'],PDO::PARAM_INT);
        $eluPhotoUpdate->execute();
    }
    if(!empty($_FILES['photo']['name']))
    {
        // Récuperer le lien de l'image qui existe déjà
        $elu_photo_delete=$DB->prepare("SELECT photo FROM elu WHERE id_elu=:id");
        $elu_photo_delete->bindValue(':id',$_POST['id'],PDO::PARAM_INT);
        $elu_photo_delete->execute();
        $elu_photo_deleteArray=$elu_photo_delete->fetch(PDO::FETCH_ASSOC);
        // SUpprimer l'image sur le server
        $imageLien=$elu_photo_deleteArray['photo'];
        if(!empty($imageLien))
        {unlink($_SERVER['DOCUMENT_ROOT'].RACINE_SITE.$imageLien);}
        // Copier la nouvelle image sur le server
        $photoDossier=$_SERVER['DOCUMENT_ROOT'].RACINE_SITE .'inc/image/img_pays/img_pays_elu/'.$photoName;
        copy($photoTempName,$photoDossier);
        //  Créer le lien
        $photoLien='inc/image/img_pays/img_pays_elu/'.$photoName;

        var_dump($photoLien);
        //Mettreajour
        $eluPhotoUpdate=$DB->prepare("UPDATE elu SET photo=:photo  WHERE id_elu=:id");
        
        $eluPhotoUpdate->bindValue(':photo',$photoLien,PDO::PARAM_STR);
        $eluPhotoUpdate->bindValue(':id',$_POST['id'],PDO::PARAM_INT);
        $eluPhotoUpdate->execute();

    }

    var_dump($nom);
   // $eluUpdate=$DB->prepare("UPDATE elu SET nom=:nom, prenom='Micheline' WHERE id_elu=:id");
    //$eluUpdate->bindValue(':nom',$nom,PDO::PARAM_STR);
    // Mettre à jour la ligne de la BD
    $eluUpdate=$DB->prepare("UPDATE elu SET nom=:nom, prenom=:prenom, fonction=:fonction, mandat=:mandat, categorie=:categorie, placement=:placement  WHERE id_elu=:id");
    $eluUpdate->bindValue(':nom',$nom,PDO::PARAM_STR);
    $eluUpdate->bindValue(':prenom',$prenom,PDO::PARAM_STR);
    $eluUpdate->bindValue(':fonction',$fonction,PDO::PARAM_STR);
    $eluUpdate->bindValue(':categorie',$categorie,PDO::PARAM_STR);
    $eluUpdate->bindValue(':mandat',$mandat,PDO::PARAM_STR);
    $eluUpdate->bindValue(':placement',$placement);
  
    $eluUpdate->bindValue(':id',$_POST['id'],PDO::PARAM_INT);
    
    $eluUpdate->execute();

   
    header("location:elu_liste.php");
    exit;

    echo '<a href="elu_liste.php">Revenir à la liste</a>';

}



// TEST DESINFECTION
//$exemple='<h1 style="color:green">j\'aime les fruits</h1>';

// Désinfection/Sanitizing des inputs contre les injections mal veillantes dans le la BD 

//htmlentities() - Convertit les caractères spéciaux en leur entité HTML,y compris les single et double quotes
//trim() - Supprime les espaces en trop au début et à la fin d’une string
//stripslashes() -  Supprime les antislashes d’une string

//$exemple=htmlentities($exemple,ENT_COMPAT);
//echo $exemple;


?>